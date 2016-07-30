<?php


namespace App\Http\Action;

use App\Module\User\Model\Command\RegisterUser;
use LosMiddleware\LosLog\StaticLogger;
use Prooph\Common\Messaging\MessageFactory;
use Prooph\ServiceBus\CommandBus;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Rhumsaa\Uuid\Uuid;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Helper\ServerUrlHelper;
use Zend\Expressive\Template\TemplateRendererInterface;

final class RegisterUserAction
{
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

    /**
     * @var TemplateRendererInterface
     */
    private $template;

    /**
     * @param CommandBus $commandBus
     * @param MessageFactory $commandFactory
     * @param ServerUrlHelper $urlHelper
     */
    public function __construct(
        TemplateRendererInterface $template,
        CommandBus $commandBus,
        MessageFactory $commandFactory,
        ServerUrlHelper $urlHelper)
    {
        $this->template = $template;
        $this->commandBus = $commandBus;
        $this->commandFactory = $commandFactory;
        $this->urlHelper = $urlHelper;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $out
    ) : ResponseInterface
    {
        $data = [];

        if($request->getMethod() == "POST"){

            $data = $request->getParsedBody();
            $data['user_id'] = Uuid::uuid4()->toString();

            $command = $this->commandFactory->createMessageFromArray(
                RegisterUser::class,
                [
                    'payload' => $data
                ]
            );

            $this->commandBus->dispatch($command);

            return new RedirectResponse($this->urlHelper->generate('/registered'));
        }

        return new HtmlResponse($this->template->render('app::register', $data));
    }
}
