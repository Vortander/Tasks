<?php

	namespace app\config;

	class Database {

		var $db_connection;

		public function connect( $inipath ) {

			$params = parse_ini_file( $inipath );
			if ( $params === false ) {
				throw new \Exception( "Error reading database.ini file." );
			}
			else {
				$connection_string = "host=" . $params['host'] . " " . "dbname=" . $params['database'] . " " . "user=" . $params['user'] . " " . "password=" . $params['password'];
				$this->db_connection = pg_connect( $connection_string );
			}
		}
	}