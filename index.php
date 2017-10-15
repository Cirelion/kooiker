<?php

//phpinfo();
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

use Symfony\Component\HttpFoundation\Request;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\AssetServiceProvider;

require 'vendor/autoload.php';

$app          = new Silex\Application();
$request      = new Request();
$app['debug'] = true;

Request::enableHttpMethodParameterOverride();

require 'config/db_settings.php';

$app->register( new AssetServiceProvider() );
$app->register( new TwigServiceProvider(), array ( 'twig.path' => __DIR__ . '/views' ) );

$app['CmsProvider'] = function () use ( $app ) {
	return new Providers\CmsProvider( $app['db'] );
};
$app['HomeProvider'] = function () use ( $app ) {
    return new Providers\HomeProvider( $app['db'] );
};


$app->mount( 'cms/', new Controllers\CmsController() );
$app->mount( '/', new Controllers\HomeController() );
$app->run();