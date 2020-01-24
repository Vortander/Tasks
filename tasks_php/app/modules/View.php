<?php

	namespace app\modules;

	class View {

		public static function display( $view, $data = [] ) {

			$view = __DIR__ . '/../Views/' . $view . '.php';
			extract( $data );

			ob_start();
			include $view;
			return ob_get_clean();
		}
	}