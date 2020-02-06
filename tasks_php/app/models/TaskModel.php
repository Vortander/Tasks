<?php

	namespace app\models;

	use app\config\Database;

	require_once dirname( __DIR__ ) . '/config/Database.php';

	class TaskModel {

		private static function _validate_data( &$data ) {

			$data["task_content"] = trim( $data["task_content"], " \t\n\r\0\x20\xc2\xa0" );
			$validate = empty(  $data["task_content"] ) ? FALSE : TRUE;

			return $validate;

		}

		private static function _get_inserted_task_id ( $resource ) {

			$inserted_row = pg_fetch_object( $resource );

			return $inserted_row->id;

		}

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

			$validation = $this->_validate_data( $data );

			if ( $validation !== FALSE ) {
				$sql = "INSERT INTO tasks_app.tasks ( task_content, tag_id, done ) VALUES ( $1, $2, $3 ) RETURNING *";
				$result = pg_query_params( $connection->db_connection, $sql, array( $data["task_content"], $data["tag_id"], $data["done"] ) );

				if ( $result !== FALSE ) {
					return $this->_get_inserted_task_id( $result );
				}
			}

			pg_close( $connection->db_connection );

			return "false";

		}

	}