<?php

declare(strict_types=1);

namespace Buzzingpixel\DockerBlueOceanDemoPhpApp\HomePage;

use BuzzingPixel\Templating\TemplateEngineFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

readonly class GeHomePageAction
{
    public function __construct(
        private TemplateEngineFactory $templateEngineFactory
    ) {
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
    ): ResponseInterface {
        $response->getBody()->write(
            $this->templateEngineFactory->create()
                ->templatePath(__DIR__ . '/HomePage.phtml')
                ->vars([
                    'pageTitle' => 'Docker Blue Ocean Demo for PHP',
                    'headline' => 'Hello World',
                ])
                ->render()
        );

        return $response;
    }
}
