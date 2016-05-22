<?php
class Controller_breakfast extends Controller{
	function __construct(){
		parent::__construct();
		$this->model = new Model_breakfast();
		$this->view = new View();
	}

	function action_index(){
		// if(!sizeof($_SESSION["user_id"]) > 0){ //DL9 LOGINA
		// 	header("Location: /canteen/main");
		// }
		$data = $this->model->GetTodayMenus(0);
		$this->view->generate("breakfast_view.php","tmpl.php", $data);
	}
	function action_add($param, $_info){
		$info = $this->model->GetInfo($param);
		array_push($_SESSION["orders"], $info);
		header("Location: /canteen/breakfast");
	}
	function action_get_breakfast($param){
		$data = $this->model->GetTodayMenus(0);
		echo json_encode($data);
	}
}