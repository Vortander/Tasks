<?php

	namespace app\config;

	class Database {

		public static $connection;

		public function connect( $inipath ) {

			$params = parse_ini_file( $inipath );
			if ( $params === false ) {
				throw new \Exception( "Error reading database.ini file." );
			}
			else {
				$db_connection = pg_connect( "host=" . $params['host'] . " " . "dbname=" . $params['database'] . " " . "user=" . $params['username'] . " " . "password=" . $params['password'] );
				// if ( $db_connection == false ) {
				// 	throw new \Exception( "Error while connecting database." );
				// }
				// else {
				// 	print( $db_connection );
				// }
			}


		}
	}