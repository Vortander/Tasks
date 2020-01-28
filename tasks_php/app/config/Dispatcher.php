<?php

	namespace app\config;

	class Dispatcher {

		public function dispatch( $controller_name ) {

			$this->request = new Request();
			Router::parse( $this->request->url, $this->request );

			$controller = $this->loadController( $controller_name );

			call_user_func_array( [ $controller, $this->request->action ], $this->request->params );

		}

		public function loadController( $controller_name ) {

			//TODO: controller_name
			$name = $controller_name . 'Controller';
			$file = 'controllers/' . $name . '.php';

			require( dirname( __DIR__ ) . '/' . $file );

			$controller_class_name = 'app\\controllers\\' .  $name;
			$controller = new $controller_class_name;
			return $controller->index();
		}

	}

