<?php
class Controller_myorder extends Controller{
	function __construct(){
		parent::__construct();
		$this->model = new Model_myorder();
		$this->view = new View();
	}

	function action_index(){
		if(!sizeof($_SESSION["user_id"]) > 0){ //DL9 LOGINA
			header("Location: /canteen/main");
		}
		$data = $this->model->GetCurrentOrders();
		$this->view->generate("myorder_view.php","tmpl.php", $data);
	}
	function action_pushorder($param, $_info){
		if($this->model->Push($param)){
			unset($_SESSION["orders"]);
			$_SESSION["orders"] = array();
			header("Location: /canteen/accepted");
		}

	}
	function action_undo($param){
		if($param=='') $param = 0;
		unset($_SESSION["orders"][$param]);
		header("Location: /canteen/myorder");
	}
	function action_del($param, $_info){
		if($this->model->Del($param)){
			header("Location: /canteen/myorder");
		}
	}
}