<?php


namespace App\Http\Action;


use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

final class UserManagementAction
{

    /**
     * @var TemplateRendererInterface
     */
    private $template;

    public function __construct(TemplateRendererInterface $template)
    {
        $this->template = $template;
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.

        $data = [];

        return new HtmlResponse($this->template->render('app::users/index', $data));
    }
}
