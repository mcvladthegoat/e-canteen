<?php
class Controller_Lunch extends Controller{
	function __construct(){
		parent::__construct();
		$this->model = new Model_lunch();
		$this->view = new View();
	}

	function action_index(){
		if(!sizeof($_SESSION["user_id"]) > 0){ //DL9 LOGINA
			header("Location: /canteen/main");
		}
		$data = $this->model->GetTodayMenus(1);
		$this->view->generate("lunch_view.php","tmpl.php", $data);
	}
	function action_add($param, $_info){
		$info = $this->model->GetInfo($param);
		array_push($_SESSION["orders"], $info);
		header("Location: /canteen/lunch");
	}
}