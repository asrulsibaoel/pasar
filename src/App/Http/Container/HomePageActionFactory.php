<?php
namespace App\Http\Container;

use App\Http\Action\HomePageAction;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class HomePageActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new HomePageAction(
                $container->get(TemplateRendererInterface::class)
                );
    }
}
