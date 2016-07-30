<?php

namespace App\Http\Container;

use App\Http\Action\RegisterUserAction;
use Interop\Container\ContainerInterface;
use Prooph\Common\Messaging\FQCNMessageFactory;
use Prooph\ServiceBus\CommandBus;
use Zend\Expressive\Helper\ServerUrlHelper;
use Zend\Expressive\Template\TemplateRendererInterface;

class RegisterUserActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new RegisterUserAction(
            $container->get(TemplateRendererInterface::class),
            $container->get(CommandBus::class),
            $container->get(FQCNMessageFactory::class),
            $container->get(ServerUrlHelper::class)
        );
    }
}
