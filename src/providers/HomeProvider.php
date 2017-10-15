<?php

namespace Providers;

use Doctrine\DBAL\Connection;

class HomeProvider {

	/** @var \Doctrine\DBAL\Connection */

	protected $db;

	/** @var HomeProvider */

	protected $Home_provider;

	function __construct( Connection $db ) {
		$this->db = $db;
	}

	function getHomeItems() {
	}

}