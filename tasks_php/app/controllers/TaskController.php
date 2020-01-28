<?php

	namespace app\controllers;

	use app\models\TaskModel as Task;
	use app\modules\View as View;


	class TaskController {

		// public function __construct() {
		// 	print("cheguei aqui");
		// }

		public function index() {

			//$task = new TaskController();
			phpinfo();
			$list = $task->list();
			$data = [ 'list' => $list ];

			return View::display( 'TaksList', $data );

		}

	}
