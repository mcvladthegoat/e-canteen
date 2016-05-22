<?php
class Controller_Main extends Controller{
	function __construct(){
		parent::__construct();
		$this->model = new Model_Main();
		$this->view = new View();
	}
	function action_index(){
		if(sizeof($_POST) > 0){ // ЗНАЧИТ, КТО-ТО ХОЧЕТ АВТОРИЗОВАТЬСЯ
			$code = $this->model->CheckUserInDB($_POST);
			if($code == 0){
				$_SESSION["orders"] = array();
				header("Location: /canteen/breakfast");
			}
			else { header("Location: /canteen/main"); }  //Редиректим на мейн, если авторизация не прошла
		}
		else if(!isset($_SESSION["user_id"])){
			$this->view->generate('login_view.html', 'tmpl.php');// Просто главная страница с логинизацией. Юзер не логинился
		}
		else{
			header("Location: /canteen/breakfast");
		}
	}

	function action_log_in(){
		$json = file_get_contents('php://input');
	
		$param = json_decode($json);
		$data = array('login' => $param->login, "pwd" => $param->pwd);
		$code = $this->model->CheckUserInDB2($data);
		echo $code;
	}

	public function action_logOut(){
		unset($_SESSION["user_id"]);
		// header("Location:");
		header("Location: /canteen/main");
		exit();
	}
}