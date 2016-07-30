<?php


namespace App\Http\Container;


use App\Http\Action\NewUserAction;
use Interop\Container\ContainerInterface;
use Prooph\ServiceBus\CommandBus;
use Prooph\Common\Messaging\FQCNMessageFactory;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\Helper\ServerUrlHelper;

class NewUserActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        // TODO: Implement __invoke() method.
        return new NewUserAction(
            $container->get(TemplateRendererInterface::class),
            $container->get(CommandBus::class),
            $container->get(FQCNMessageFactory::class),
            $container->get(ServerUrlHelper::class)
        );
    }
}
