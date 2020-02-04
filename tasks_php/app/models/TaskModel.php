<?php

	namespace app\models;

	use app\config\Database;

	require_once dirname( __DIR__ ) . '/config/Database.php';

	class TaskModel {


		public function get_tasks_list() {

			$connection = new Database;
			$connection->connect( dirname( __DIR__ ) . '/../database.ini' );

			$sql = "SELECT * from tasks_app.tasks";
			$query_result = pg_query( $connection->db_connection, $sql );

			pg_close( $connection->db_connection );

			return $query_result;

		}


		public function insert_task( $data ) {

			$connection = new Database;
			$connection->connect( dirname( __DIR__ ) . '/../database.ini' );

			$result = pg_insert( $connection->db_connection, 'tasks_app.tasks', $data );
			if ( $result ) {
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
	}