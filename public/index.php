<?php

declare(strict_types=1);

use BuzzingPixel\Container\Container;
use Buzzingpixel\DockerBlueOceanDemoPhpApp\Healthcheck\GetHealthCheckAction;
use Buzzingpixel\DockerBlueOceanDemoPhpApp\HomePage\GetHomePageAction;
use Slim\Factory\AppFactory;

require dirname(__DIR__) . '/vendor/autoload.php';

$container = new Container();

$app = AppFactory::create(
    container: $container,
);

$app->get('/', GetHomePageAction::class);

$app->get('/healthcheck', GetHealthCheckAction::class);

$app->run();
