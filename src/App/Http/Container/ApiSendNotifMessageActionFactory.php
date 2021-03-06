<?php


namespace App\Http\Container;


use App\Http\Action\ApiSendNotifMessageAction;
use App\Module\User\Model\User;
use Interop\Container\ContainerInterface;
use Prooph\ServiceBus\CommandBus;
use ProophTest\Common\Messaging\FQCNMessageFactory;
use Zend\Expressive\Helper\ServerUrlHelper;

class ApiSendNotifMessageActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        // TODO: Implement __invoke() method.

        return new ApiSendNotifMessageAction(
            $container->get(CommandBus::class),
            $container->get(FQCNMessageFactory::class),
            $container->get(ServerUrlHelper::class),
            $container->get(User::class)
        );
    }
}
