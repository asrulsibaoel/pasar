<?php


namespace App\Http\Container;


use App\Http\Action\ApiSendNotifMessageAction;
use Interop\Container\ContainerInterface;

class ApiSendNotifMessageActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        // TODO: Implement __invoke() method.

        return new ApiSendNotifMessageAction($container->get());
    }
}
