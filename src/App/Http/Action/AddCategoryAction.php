<?php


namespace App\Http\Action;


use LosMiddleware\LosLog\StaticLogger;
use Prooph\Common\Messaging\MessageFactory;
use Prooph\ServiceBus\CommandBus;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Rhumsaa\Uuid\Console\Exception;
use Rhumsaa\Uuid\Uuid;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Helper\ServerUrlHelper;
use Zend\Expressive\Template\TemplateRendererInterface;

class AddCategoryAction
{
    /**
     * @var TemplateRendererInterface
     */
    private $template;

    /**
     * @var ServerUrlHelper
     */
    private $urlHelper;

    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * @var MessageFactory
     */
    private $commandFactory;

    public function __construct(
        TemplateRendererInterface $template,
        ServerUrlHelper $urlHelper,
        CommandBus $commandBus,
        MessageFactory $factory
    )
    {
        $this->template = $template;
        $this->urlHelper = $urlHelper;
        $this->commandBus = $commandBus;
        $this->commandFactory = $factory;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $out = null
    ) : ResponseInterface
    {
        $data = [];
        if ($request->getMethod() == 'POST') {
            $data = $request->getParsedBody();
            $data['category_id'] = Uuid::uuid4()->toString();

            try {
                $command = $this->commandFactory->createMessageFromArray(
                    RegisterUser::class,
                    [
                        'payload' => $data
                    ]
                );

                $this->commandBus->dispatch($command);

                return new RedirectResponse($this->urlHelper->generate('/registered'));
            } catch (Exception $e){
                StaticLogger::save($e->getMessage());
            }
        }
        return new HtmlResponse($this->template->render('app::', $data));
    }
}
