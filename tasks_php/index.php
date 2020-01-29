<?php

	namespace app;

	use app\config\Database;
	use app\config\Router;
	use app\config\Request;
	use app\config\Dispatcher;

	require_once __DIR__ . '/app/config/Database.php';
	require_once __DIR__ . '/app/config/Router.php';
	require_once __DIR__ . '/app/config/Request.php';
	require_once __DIR__ . '/app/config/Dispatcher.php';

	print(__DIR__);

	$connection = new Database;
	$connection->connect( __DIR__ . '/database.ini' );

	$dispatch = new Dispatcher;
	$dispatch->dispatch( 'Task' );

