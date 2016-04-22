<?php
class Controller_accepted extends Controller{
	function __construct(){
		parent::__construct();
		$this->view = new View();
	}
	function action_index(){
		if(!sizeof($_SESSION["user_id"]) > 0){ //DL9 LOGINA
			header("Location: /canteen/main");
		}
		$this->view->generate("accepted_view.php","tmpl.php");
	}
}