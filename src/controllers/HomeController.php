<?php
/**
 * Created by PhpStorm.
 * User: myron
 * Date: 08/08/2017
 * Time: 10:20 AM
 */

namespace Controllers;

use Silex\ControllerCollection;
Use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Providers\HomeProvider;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\Routing\Generator\UrlGenerator;

class HomeController implements ControllerProviderInterface {

	/** @var HomeProvider */

	protected $Home_Provider;
	protected $app;

	function connect( Application $app ) {
		/** @var UrlGenerator $url_generator */
		/** @var  Request $request */
		/** @var ControllerCollection $controllers */

		$this->app   = $app;
		$controllers = $app['controllers_factory'];

		$controllers->get( '/', array ( $this, 'getHomeItems' ) )->bind( 'home.home' );
        $controllers->get( '/ah', array ( $this, 'getAhItems' ) )->bind( 'home.ah' );

		$controllers->before( array ( $this, 'setHomeProvider' ) );

		return $controllers;
	}

	function getHomeItems() {
		return $this->app['twig']->render( 'home/home/home.twig' );
	}
    function getAhItems() {
        return $this->app['twig']->render( 'home/ah/ah.twig' );
    }
	function setHomeProvider() {
		/** @var HomeProvider $Home_Provider */
		$this->Home_Provider = $this->app['HomeProvider'];
	}

}