<?php


namespace App\Http\Container;


use App\Http\Action\UserManagementAction;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class UserManagementActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        // TODO: Implement __invoke() method.
        return new UserManagementAction($container->get(TemplateRendererInterface::class));
    }
}
