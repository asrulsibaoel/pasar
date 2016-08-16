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
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Helper\ServerUrlHelper;

class ApiRegisterUserAction
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * @var ServerUrlHelper
     */
    private $urlHelper;

    /**
     * @var MessageFactory
     */
    private $commandFactory;

    public function __construct(CommandBus $commandBus, MessageFactory $commandFactory, ServerUrlHelper $urlHelper)
    {
        // TODO: Implement __invoke() method.
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
        $data = $request->getParsedBody();
        StaticLogger::save($data);
//        try {
//            $data['user_id'] = Uuid::uuid4()->toString();
//
//            $command = $this->commandFactory->createMessageFromArray(
//                RegisterUser::class,
//                [
//                    'payload' => $data
//                ]
//            );
//
//            $this->commandBus->dispatch($command);
//        } catch (Exception $e) {
//            StaticLogger::save($e->getMessage());
//        }

        return new JsonResponse($data);
    }
}
