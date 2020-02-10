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

			$sql = "SELECT * from tasks_app.tasks ORDER BY id";
			$query_result = pg_query( $connection->db_connection, $sql );

			pg_close( $connection->db_connection );

			return $query_result;

		}

		public function insert_or_update_task( $data ) {

			$connection = new Database;
			$connection->connect( dirname( __DIR__ ) . '/../database.ini' );

			$validation = $this->_validate_data( $data );

			if ( $validation !== FALSE ) {

				if ( $data["id"] === "-1" ) {
					$sql = "INSERT INTO tasks_app.tasks ( task_content, tag_id, done ) VALUES ( $1, $2, $3 ) RETURNING *";
					$result = pg_query_params( $connection->db_connection, $sql, array( $data["task_content"], $data["tag_id"], $data["done"] ) );
				}
				else {
					$sql = "UPDATE tasks_app.tasks SET task_content = $1, tag_id = $2, done = $3 WHERE id = $4 RETURNING *";
					$result = pg_query_params( $connection->db_connection, $sql, array( $data["task_content"], $data["tag_id"], $data["done"], $data["id"] ) );
				}

				if ( $result !== FALSE ) {
					return $this->_get_inserted_task_id( $result );
				}
			}

			pg_close( $connection->db_connection );

			return "false";

		}

	}