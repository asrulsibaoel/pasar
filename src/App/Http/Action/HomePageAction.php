<?php

namespace App\Http\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

final class HomePageAction
{
    /**
     *
     * @var TemplateRenderInterface
     */
    private $template;

    public function __construct(TemplateRendererInterface $template)
    {
        $this->template = $template;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $out = null
    ) : ResponseInterface {
        $data = [];
//        $product = $this->productFinder->findLimited(0,7);
//        $data = [
//            'product' => $product,
//        ];

        return new HtmlResponse($this->template->render('app::home-page', $data));
    }
}
