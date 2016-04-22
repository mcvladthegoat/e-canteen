<?php
class Controller_upload extends Controller{
	function __construct(){
		parent::__construct();
		$this->model = new Model_Upload();
		$this->view = new View();
	}

	function action_index(){
		if(sizeof($_FILES) > 0){
			$this->model->send_data(array_merge($_FILES, $_POST));
		}
		$data = $this->model->get_data();
		$this->view->generate('upload_view.php', 'template_view.php', $data);
	}
}