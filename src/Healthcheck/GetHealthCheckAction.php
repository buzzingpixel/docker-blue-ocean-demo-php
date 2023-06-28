<?php

declare(strict_types=1);

namespace Buzzingpixel\DockerBlueOceanDemoPhpApp\Healthcheck;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class GetHealthCheckAction
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
    ): ResponseInterface {
        $response = $response->withHeader(
            'Content-type',
            'application/json',
        );

        $response->getBody()->write(json_encode([
            'status' => 'ok',
        ]));

        return $response;
    }
}
