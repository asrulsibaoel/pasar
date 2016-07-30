<?php


namespace App\Http\Action;


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

    public function __construct(ServerUrlHelper $urlHelper, CommandBus $commandBus, MessageFactory $commandFactory)
    {
        $this->urlHelper = $urlHelper;
        $this->commandBus = $commandBus;
        $this->commandFactory = $commandFactory;
    }

    public function __invoke(
        RequestInterface $request,
        ResponseInterface $response,
        callable $out = null
    ): ResponseInterface {
        // TODO: Implement __invoke() method.
        $data = [];
        if($request->getMethod() == 'POST'){
            StaticLogger::save($request);
        }
        return new JsonResponse($data);
    }
}
