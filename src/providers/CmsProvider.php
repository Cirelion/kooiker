<?php

namespace Providers;

use Doctrine\DBAL\Connection;

class CmsProvider {

	/** @var \Doctrine\DBAL\Connection */

	protected $db;

	/** @var CmsProvider */

	protected $Cms_provider;

	function __construct( Connection $db ) {
		$this->db = $db;
	}

	function getHomeItems() {
	}

	function getAccountSettings() {
	}

}