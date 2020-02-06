<?php

	namespace app\modules;

	class View {

		public static function display( $view, $data = [] ) {

			$view = dirname(__DIR__) . '/views/' . $view . '.php';

			extract( $data );

			ob_start();
			include $view;
			#return ob_get_clean();
		}

		public static function send_to_view( $data ) {
			echo $data;
		}

	}