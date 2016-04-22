<?php
class Model_Lunch extends Model{
	function __construct(){
		$this->ConnectDB();
	}
	function GetTodayMenus($type){
		$outdata = array();
		$get_menu = $this->query("SELECT id, dish_id FROM menus WHERE type=$type AND date=CURDATE()");
		if(mysqli_num_rows($get_menu)){
			$i=0;
			while ($out = mysqli_fetch_row($get_menu)) {
				$tmp = $this->GetInfo($out[1]);
				$outdata[$i]["dish_name"] = $tmp["dish_name"];
				$outdata[$i]["dish_id"] = $out[1];
				$outdata[$i]["price"] = $tmp["price"];
				$i++;
			}
		}
		return $outdata;
	}
	function GetInfo($id){
		$get_info = $this->query("SELECT dish_name, price FROM dishes WHERE id=$id");
		if(mysqli_num_rows($get_info)){
			while($out = mysqli_fetch_row($get_info)) {
				$outdata["dish_name"] = $out[0];
				$outdata["price"] = $out[1];
				$outdata["dish_id"] = $id;
				$outdata["type"] = 1;
			}
		}
		return $outdata;
	}
}