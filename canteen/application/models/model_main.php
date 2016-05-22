<?php
class Model_Main extends Model{
	function __construct(){
		$this->ConnectDB();
	}
	
	function CheckUserInDB($d){
		$q = "SELECT id FROM users WHERE login='$d[login]' AND pwd='$d[pwd]'";
		$res = $this->query($q);
		$res->data_seek(0);
		$user_id = $res->fetch_row()[0];
		if(sizeof($user_id) > 0){
			$_SESSION["user_id"] = $user_id;
			return $user_id;
		}
		else return 0;
	}

	function CheckUserInDB2($d){
		$q = "SELECT id FROM users WHERE login='$d[login]' AND pwd='$d[pwd]'";
		$res = $this->query($q);
		$res->data_seek(0);
		$user_id = $res->fetch_row()[0];
		return ($user_id > 0) ? $user_id : 0;
	}

	function DownloadOrders($user_id){
		$dwnld = $this->query("SELECT dishlist FROM orders WHERE date=CURDATE() AND user_id=$user_id");
		if(mysqli_num_rows($dwnld)){
			while($out = mysqli_fetch_row($dwnld)){
				$output = explode(",", $out[0]);
			}
		}
		return $output;
	}

	function GetDishById($id){
		$res = $this->query("SELECT dish_name FROM dishes WHERE id=$id");
		$res->data_seek(0); return $res->fetch_row()[0];
	}
	function GetDishPrice($id){
		$res = $this->query("SELECT price FROM dishes WHERE id=$id");
		$res->data_seek(0); return $res->fetch_row()[0];
	}
	function test(){
		$g = parse_str($_POST);
		$this->query("INSERT INTO users values('', '$g', '3', '4')");
	}
}