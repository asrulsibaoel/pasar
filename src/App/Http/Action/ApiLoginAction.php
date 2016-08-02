<?php


namespace App\Http\Action;


use App\Projection\User\UserFinder;
use LosMiddleware\LosLog\StaticLogger;
use Prooph\Common\Messaging\MessageFactory;
use Prooph\ServiceBus\CommandBus;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Helper\ServerUrlHelper;

class ApiLoginAction
{
//    private $tempalte;
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

    /**
     * @var UserFinder
     */
    private $user;

    /**
     * @param ServerUrlHelper $urlHelper
     * @param CommandBus $commandBus
     * @param MessageFactory $commandFactory
     */
    public function __construct(
        ServerUrlHelper $urlHelper,
        CommandBus $commandBus,
        MessageFactory $commandFactory,
        UserFinder $user
    )
    {
        $this->urlHelper = $urlHelper;
        $this->commandBus = $commandBus;
        $this->commandFactory = $commandFactory;
        $this->user = $user;
    }

    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param callable|null $out
     * @return ResponseInterface
     */
    public
    function __invoke(
        RequestInterface $request,
        ResponseInterface $response,
        callable $out = null
    ): ResponseInterface
    {
        // TODO: Implement __invoke() method.
        $data = [];

        if ($request->getMethod() == 'POST') {
            $body = $request->getParsedBody();
//            StaticLogger::save($data['email'], $data['password']);
            $user = $this->user->checkLogin($body['email'], $body['password']);
            if(!empty($user)){
                $data = (array) $user;
                $data['login'] = true;
            } else {
                $data['login'] = false;
            }
        }
        return new JsonResponse($data);
    }
}
