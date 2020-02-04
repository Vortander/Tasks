<?php

	namespace app\config;

	class Router {

		static public function parse( $url, $request ) {

			$url = trim( $url );
			$explode_url = explode( "/", $url );

			$request->controller = $explode_url[1];
			$request->action = $explode_url[2];
			$request->params = array_slice( $explode_url, 3 );

		}
	}