<?php
//TODO Insert DB settings

$app->register(new \Silex\Provider\DoctrineServiceProvider(), array(
	'db.options' => array(
		'driver'   => 'pdo_mysql',
		'dbname'   => '',
		'host'     => '',
		'user'     => '',
		'password' => '',
	),
));