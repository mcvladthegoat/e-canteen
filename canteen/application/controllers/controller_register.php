<?php
class Controller_register extends Controller{
	function __construct(){
		parent::__construct();
		$this->model = new Model_register();
		$this->view = new View();
	}
	function action_index(){
		if(sizeof($_POST) > 0){
			if($this->model->CheckEmail($_POST) == 0){
				if($this->model->CreateNewUser($_POST) == 0){
					unset($_POST);
					header("Location: upload");
				}
			}
			else{ $this->view->generate('register_view.php', 'template_view.php', 'exists'); }
		}
		else{
			$this->view->generate('register_view.php', 'template_view.php');
		}
	}
}