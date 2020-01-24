<?php

	namespace app\controllers;

	use app\models\TaskModel as Task;
	use app\modules\View as View;


	class TaskController {

		public function index() {

			$task = new TaskController();
			$list = $task->list();
			$data = [ 'list' => $list ];

			return View::display( 'TaksList', $data );

		}

	}
