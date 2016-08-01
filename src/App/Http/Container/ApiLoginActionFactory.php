<?php


namespace App\Http\Container;


use App\Http\Action\ApiLoginAction;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Helper\ServerUrlHelper;
use Prooph\Common\Messaging\FQCNMessageFactory;
use Prooph\ServiceBus\CommandBus;
use App\Projection\User\UserFinder;

class ApiLoginActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        // TODO: Implement __invoke() method.
        return new ApiLoginAction(
            $container->get(ServerUrlHelper::class),
            $container->get(CommandBus::class),
            $container->get(FQCNMessageFactory::class),
            $container->get(UserFinder::class)
        );
    }
}
