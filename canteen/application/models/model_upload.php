<?php
class BoardTasks{
	public $name, $msg, $status;
	function __construct($name, $msg, $status){
		$this->name = $name;
		$this->msg = $msg;
		$this->status = $status;
	}
}
class Model_Upload extends Model{
	public function get_data(){
		$this->ConnectDB();
		// считываем данные запросом и возвращаем результат ввиде массива экземпляров BoardTasks
		$result = $this->query("SELECT filename, msg, status FROM board WHERE user_id = '$_SESSION[user_id]' ORDER BY id DESC");
		$data = array();
		while($out = mysqli_fetch_array($result)){
			$data[] = new BoardTasks($out["filename"], $out["msg"], $out["status"]);
		}
		return $data;
	}
	public function send_data($obj){
		$this->ConnectDB();
		$this->query("INSERT INTO board VALUES('',\"".$obj["attach"]["name"]."\",\"".$_SESSION["user_id"]."\",\"".$obj["msg"]."\", 0)");
		if(is_uploaded_file($obj["attach"]["tmp_name"])){
			move_uploaded_file($obj["attach"]["tmp_name"], "out\\".$obj["attach"]["name"]);
			return 1;
		}
		else {logger("Failed to upload ".$obj["attach"]["name"]);}
	}
}