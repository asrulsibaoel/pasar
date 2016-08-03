<?php


namespace App\Http\Action;


use App\Module\User\Model\User;
use Prooph\Common\Messaging\MessageFactory;
use Prooph\ServiceBus\CommandBus;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Helper\ServerUrlHelper;

class ApiSendNotifMessageAction
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var
     */
    private $message;

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
        CommandBus $commandBus,
        MessageFactory $message,
        ServerUrlHelper $urlHelper,
        User $user
    )
    {
        $this->user = $user;
        $this->commandFactory = $message;
        $this->commandBus = $commandBus;
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

        if ($request->getMethod() == "POST") {

        }

        return new JsonResponse($data);
    }
}
