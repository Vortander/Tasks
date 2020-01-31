<?php

	namespace app;

	use app\config\Router;
	use app\config\Request;
	use app\config\Dispatcher;

	require_once __DIR__ . '/app/config/Router.php';
	require_once __DIR__ . '/app/config/Request.php';
	require_once __DIR__ . '/app/config/Dispatcher.php';

	$dispatch = new Dispatcher;
	$dispatch->dispatch( 'Task' );

