<?php

	namespace app\config;

	class Dispatcher {

		public function dispatch() {

			$this->request = new Request();
			Router::parse( $this->request->url, $this->request );

			$controller = $this->loadController();

			call_user_func_array( [ $controller, $this->request->action ], $this->request->params );

		}

		public function loadController() {

			$name = $this->request->controller . "Controller";
			$file = 'controllers/' . $name . '.php';

			require( dirname( __DIR__ ) . '/' . $file );

			$controller_class_name = 'app\\controllers\\' .  $name;
			$controller = new $controller_class_name;

			return $controller;

		}

	}

