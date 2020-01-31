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
	}