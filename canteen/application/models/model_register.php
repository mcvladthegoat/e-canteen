<?php
class Model_register extends Model{
	public function CheckEmail($d){
		$this->ConnectDB();
		$con = $this->query("SELECT id FROM users WHERE email = '$d[email]'");
		if(mysqli_num_rows($con)){
			return 1;
		}
		else { return 0; }
	}
	public function CreateNewUser($d){
		$con = $this->query("INSERT INTO users VALUES('','$d[email]','$d[pwd]','$d[info]')");
		if($con){
			$get_id = $this->query("SELECT MAX(id) AS id FROM USERS");
			$get_id->data_seek(0);
			$_SESSION["user_id"] = $get_id->fetch_row()[0];
			$_SESSION["email"] = $d["email"];
			return 0;
		}
		else { logger("Error occured: INSERT"); return 1; }
	}
}