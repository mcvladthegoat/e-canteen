<?php
class Model_Myorder extends Model{
	function __construct(){
		$this->ConnectDB();
	}
	function Push($mode){
		foreach ($_SESSION["orders"] as $key => $value) {
			$push_q = $this->query("INSERT INTO orders VALUES('', $_SESSION[user_id], CURDATE(), $value[type], $value[dish_id], 0)"); //ПОПРАВИТЬ
			if(!$push_q) {echo "FATAL ERROR IN: function Push()"; exit(); }
	
		}	
		return $push_q;
		
		// $str = "";
		// switch($mode){
		// 	case "all": foreach ($_SESSION["orders"] as $key => $value)	$str .= $value["dish_id"] .","; break;
		// 	case 0: case 1: case 2: foreach ($_SESSION["orders"] as $key => $value){if($value["type"] == $mode) $str.= $value["dish_id"] .","; } break;
		// }
		// $str = substr_replace($str, "", -1);
		// $push_res = $this->query("INSERT INTO orders VALUES('',  '$str', 0)");
		// if($push_res) return true; else false;
	}
	function GetCurrentOrders(){
		$output = array(); $i = 0;
		$get_current_orders = $this->query("SELECT id, dish_id, type FROM orders WHERE date = CURDATE() AND user_id=$_SESSION[user_id]");
		if(mysqli_num_rows($get_current_orders)){
			while($out = mysqli_fetch_array($get_current_orders)){
				$type = $out["type"];
				$output[$type][$i] = $this->GetInfo($out["dish_id"]);
				$output[$type][$i]["order_id"] = $out["id"];
				$i++;
			}
		}
		return $output;
	}
	function GetInfo($id){
		$get_info = $this->query("SELECT dish_name, price FROM dishes WHERE id=$id");
		if(mysqli_num_rows($get_info)){
			while($out = mysqli_fetch_row($get_info)) {
				$outdata["dish_name"] = $out[0];
				$outdata["price"] = $out[1];
				$outdata["dish_id"] = $id;
			}
		}
		return $outdata;
	}
	function Del($id){
		$delete_order = $this->query("DELETE FROM orders WHERE id='$id'");
		if($delete_order){return true;} else return false;
	}
	// function Del($mode)
}