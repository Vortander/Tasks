<?php

	namespace app\controllers;

	use app\models\TaskModel as Task;
	use app\modules\View as View;

	require_once dirname(__DIR__) . '/models/TaskModel.php';
	require_once dirname(__DIR__) . '/modules/View.php';

	class TaskController {

		public function index() {

			//$inserted = $this->insert_task();
			//print($inserted);

			$task_model = new Task();
			$result = $task_model->get_tasks_list();

			$list = array();

			if ( $result ) {
				while ( $row = pg_fetch_assoc( $result ) ) {
					array_push( $list, $row );
				}
			}

			$data = [ 'list' => $list ];
			return View::display( 'TaskList', $data );

		}

		public function insert_task() {
			$task_model = new Task();

			// ob_start();
			// var_dump($_POST);
			// error_log( ob_get_clean(), 4 );

			$result = $task_model->insert_task( $_POST );
			return $result;
		}

	}
