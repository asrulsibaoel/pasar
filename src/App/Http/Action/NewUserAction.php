<?php


namespace App\Http\Action;


use App\Module\User\Model\Command\RegisterUser;
use LosMiddleware\LosLog\StaticLogger;
use Prooph\Common\Messaging\MessageFactory;
use Prooph\ServiceBus\CommandBus;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Rhumsaa\Uuid\Console\Exception;
use Rhumsaa\Uuid\Uuid;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Helper\ServerUrlHelper;
use Zend\Expressive\Template\TemplateRendererInterface;

class NewUserAction
{
    /**
     * @var TemplateRendererInterface
     */
    private $template;

    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * @var MessageFactory
     */
    private $commandFactory;

    /**
     * @var ServerUrlHelper
     */
    private $urlHelper;

    public function __construct(
        TemplateRendererInterface $template,
        CommandBus $commandBus,
        MessageFactory $commandFactory,
        ServerUrlHelper $urlHelper
    )
    {
        $this->template = $template;
        $this->commandBus = $commandBus;
        $this->commandFactory = $commandFactory;
        $this->urlHelper = $urlHelper;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $out = null
    ) : ResponseInterface
    {
        // TODO: Implement __invoke() method.
        $data = [];
        if ($request->getMethod() == 'POST') {
            $data = $request->getParsedBody();
            $data['user_id'] = Uuid::uuid4()->toString();

            try {
                $command = $this->commandFactory->createMessageFromArray(
                    RegisterUser::class,
                    [
                        'payload' => $data
                    ]
                );

                $this->commandBus->dispatch($command);

                return new RedirectResponse($this->urlHelper->generate('/registered'));
            } catch (Exception $e) {
                StaticLogger::save($e->getMessage());
            }
        }
        return new HtmlResponse($this->template->render('app::users/new-user', $data));
    }
}
