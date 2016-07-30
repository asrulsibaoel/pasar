<?php


namespace App\Http\Container;


use App\Http\Action\AddCategoryAction;
use Interop\Container\ContainerInterface;
use Prooph\ServiceBus\CommandBus;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\Helper\ServerUrlHelper;
use Prooph\Common\Messaging\FQCNMessageFactory;

class AddCategoryActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        // TODO: Implement __invoke() method.
        return new AddCategoryAction(
            $container->get(TemplateRendererInterface::class),
            $container->get(ServerUrlHelper::class),
            $container->get(CommandBus::class),
            $container->get(FQCNMessageFactory::class)
        );
    }
}
