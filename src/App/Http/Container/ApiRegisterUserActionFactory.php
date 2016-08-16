<?php


namespace App\Http\Container;


use App\Http\Action\ApiRegisterUserAction;
use Interop\Container\ContainerInterface;
use Prooph\ServiceBus\CommandBus;
use Prooph\Common\Messaging\FQCNMessageFactory;
use Zend\Expressive\Helper\ServerUrlHelper;

class ApiRegisterUserActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        // TODO: Implement __invoke() method.
        return new ApiRegisterUserAction(
            $container->get(CommandBus::class),
            $container->get(FQCNMessageFactory::class),
            $container->get(ServerUrlHelper::class)
        );
    }
}
