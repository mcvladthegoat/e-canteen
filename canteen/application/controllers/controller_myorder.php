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
		echo json_encode($data);
	}
	function action_pushorder($param, $_info){
		if($this->model->Push($param)){
			unset($_SESSION["orders"]);
			$_SESSION["orders"] = array();
			header("Location: /canteen/accepted");
		}

	}

	function action_push_order($param){
		$json = file_get_contents('php://input');
		$param = json_decode($json);
		$this->model->Push_api($param->user_id, $param->order);
		echo "true";
	}
	function action_get_order($param){
		$json = file_get_contents('php://input');
		$param = json_decode($json);
		$data = $this->model->GetCurrentOrders_api($param->user_id);
		echo json_encode($data);
	}
	function action_undo($param){
		if($param=='') $param = 0;
		unset($_SESSION["orders"][$param]);
		header("Location: /canteen/myorder");
	}
	function action_del_order($param){
		$json = file_get_contents('php://input');
		$param = json_decode($json);
		$this->model->DelOrder_api($param->user_id);
		echo "true";
	}
	function action_del($param, $_info){
		if($this->model->Del($param)){
			header("Location: /canteen/myorder");
		}
	}
}