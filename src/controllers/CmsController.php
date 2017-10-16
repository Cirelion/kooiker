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
use Providers\CmsProvider;
use Silex\Api\ControllerProviderInterface;
use Symfony\Component\Routing\Generator\UrlGenerator;

class CmsController implements ControllerProviderInterface {

	/** @var CmsProvider */

	protected $Cms_Provider;
	protected $app;

	function connect( Application $app ) {
		/** @var UrlGenerator $url_generator */
		/** @var  Request $request */
		/** @var ControllerCollection $controllers */

		$this->app   = $app;
		$controllers = $app['controllers_factory'];

		$controllers->get( '/', array ( $this, 'getHomeItems' ) )->bind( 'cms.templates' );
		$controllers->get( '/account', array ( $this, 'getAccountSettings' ) )->bind( 'cms.editAccount' );

		$controllers->before( array ( $this, 'setCmsProvider' ) );

		return $controllers;
	}

	function getHomeItems() {
		return $this->app['twig']->render( 'cms/templates/ah.twig' );
	}

	function getAccountSettings() {
		return $this->app['twig']->render( 'cms/accountsettings.twig' );
	}

	function setCmsProvider() {
		/** @var CmsProvider $Cms_Provider */
		$this->Cms_Provider = $this->app['CmsProvider'];
	}

}