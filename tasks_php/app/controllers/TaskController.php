<?php

	namespace app\controllers;

	use app\models\TaskModel as Task;
	use app\modules\View as View;

	require_once dirname(__DIR__) . '/models/TaskModel.php';
	require_once dirname(__DIR__) . '/modules/View.php';

	class TaskController {

		public function index() {

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

		public function insert_or_update_task() {
			$task_model = new Task();

			$result_id = $task_model->insert_or_update_task( $_POST );
			View::send_to_view( $result_id );
		}

	}
