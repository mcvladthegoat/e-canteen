<?php
class Model_Admin extends Model{

	function __construct(){
		$this->ConnectDB();
	}
	function CheckAdmin($data){ /**/
		$code = $this->query("SELECT login FROM users WHERE login='$data[login]' AND pwd = '$data[pwd]'");
		$code->data_seek(0); return $code->fetch_row()[0];
	}
	//CREATORS
	function InsertNewDish($data){/**/
		$exist_check = $this->query("SELECT id FROM dishes WHERE dish_name = '$data[dish_name]'");
		$exist_check->data_seek(0);
		if($exist_check->fetch_row()[0]){ return "exists"; } //ЗНАЧИТ, БЛЮДО УЖЕ СУЩЕСТВУЕТ
		$insert = $this->query("INSERT INTO dishes VALUES('', '$data[dish_name]', '$data[desc]', '$data[price]')");
		

		$get_id = $this->query("SELECT MAX(id) FROM dishes"); $get_id->data_seek(0); $id = $get_id->fetch_row()[0];

		if(isset($_FILES["image"]["tmp_name"]) && $insert){
			move_uploaded_file($_FILES["image"]["tmp_name"], "application/images/".$id.".jpg");
			return true;
		}
		else return "fail"; // ПРОЦЕСС ИНСЕРТА. УСПЕХ ИЛИ НЕУДАЧА
	}
	function ChangeDish($data){/**/
		$exist_check = $this->query("SELECT dish_name FROM dishes WHERE id = '$data[id]'");
		$exist_check->data_seek(0);
		if(!$exist_check->fetch_row()[0]){ return "not exists. error"; } //ЗНАЧИТ, БЛЮДО УЖЕ СУЩЕСТВУЕТ
		$insert = $this->query("UPDATE dishes SET dish_name='$data[dish_name]', price='$data[price]', `desc`='$data[desc]' WHERE id = '$data[id]'");
		// echo mysqli_error($this);
		if(isset($_FILES["image"]["tmp_name"]) && $insert){
			move_uploaded_file($_FILES["image"]["tmp_name"], "application/images/".$data['id'].".jpg");
			return true;
		}
		else return "fail"; // ПРОЦЕСС ИНСЕРТА. УСПЕХ ИЛИ НЕУДАЧА
	}
	function CreateMenu($data){
		$create_menu = $this->query("INSERT INTO menus VALUES('', $data[dish_id], $data[type], '$data[date]')");
		if($create_menu) return true;
	}
	function CreateUser($data){
		$create_user = $this->query("INSERT INTO users VALUES('', '$data[fio]', '$data[login]', '$data[pwd]')");
		if($create_user) return true;
	}
	function ChangeUser($data){
		$exist_check = $this->query("SELECT login FROM users WHERE id = '$data[id]'");
		$exist_check->data_seek(0);
		if(!$exist_check->fetch_row()[0]){ return "not exists. error"; } //ЗНАЧИТ, БЛЮДО УЖЕ СУЩЕСТВУЕТ
		$insert = $this->query("UPDATE users SET fio='$data[fio]', login='$data[login]', `fio`='$data[fio]' WHERE id = '$data[id]'");
		// echo mysqli_error($this);
		return $insert;		
	}
	//DELETERS
	function DeleteDish($data){
		$delete_dish = $this->query("DELETE FROM dishes WHERE id=$data");
		if(file_exists("application/images/".$data.".jpg")){ unlink("application/images/".$data.".jpg"); }
		if($delete_dish) return true; else return false;
	}
	function DeleteMenu($data){
		$delete_menu = $this->query("DELETE FROM menus WHERE id=$data");
		if($delete_menu) return true; else return false;
	}
	//CHANGERS
	// function ChangeMenu($data){
	// 	$change_menu = $this->query("UPDATE menus SET '$data[param]' = $data[")
	// }
	//GETTERS
	function GetOrders(){
		$get_orders = $this->query("SELECT id, user_id, date, type, dish_id, paid FROM orders");
		$outdata = array();
		if(mysqli_num_rows($get_orders)){
			while($out = mysqli_fetch_array($get_orders, MYSQLI_ASSOC)){
				$outdata[] = $out;
			}
		}
		return $outdata;
	}
	function GetNewOrders(){
		$get_orders = $this->query("SELECT id, user_id, date, type, dish_id, paid FROM orders WHERE paid=0");
		$outdata = array();
		if(mysqli_num_rows($get_orders)){
			while($out = mysqli_fetch_array($get_orders, MYSQLI_ASSOC)){
				$outdata[] = $out;
			}
		}
		return $outdata;
	}
	function GetUsers(){
		$get_users = $this->query("SELECT * FROM users");
		$outdata = array();
		$i=0;
		if(mysqli_num_rows($get_users)){
			while($out = mysqli_fetch_row($get_users)){
				$outdata[$i] = $out;
				$i++;
			}
		}
		return $outdata;
	}
	function DeleteUser($data){
		$delete_user = $this->query("DELETE FROM users WHERE id=$data");
		if($delete_user) return true; else return false;
	}
	function DeleteOrder($data){
		$delete_order = $this->query("DELETE FROM orders WHERE user_id='$data[0]' AND date='$data[1]'");
		if($delete_order) return true; else return false;
	}
	function GetDishes(){
		$get_dishes = $this->query("SELECT * FROM dishes");
		$outdata = array();
		$i=0;
		if(mysqli_num_rows($get_dishes)){
			while($out = mysqli_fetch_row($get_dishes)){
				$outdata[$i] = $out;
				$i++;
			}
		}
		return $outdata;
	}
	function GetDishById($id){
		$res = $this->query("SELECT dish_name FROM dishes WHERE id=$id");
		$res->data_seek(0); return $res->fetch_row()[0];
	}
	function GetUserById($id){
		$res = $this->query("SELECT fio FROM users WHERE id=$id");
		$res->data_seek(0); return $res->fetch_row()[0];
	}
	function GetDishPrice($id){
		$res = $this->query("SELECT price FROM dishes WHERE id=$id");
		$res->data_seek(0); return $res->fetch_row()[0];
	}
	function GetOrdersByData($data){
		$get_order = $this->query("SELECT user_id, date, dish_id FROM orders WHERE user_id='$data[0]' AND date='$data[1]'");
		if(mysqli_num_rows($get_order)){
			while($out = mysqli_fetch_array($get_order, MYSQLI_ASSOC)){
				$outdata[] = $out;
			}
		}
		return $outdata;
	}
	function CopyMenu($from_date, $to_date, $type){
		// echo $from_date."<br>".$to_date."<br>";
		$tmp = $this->query("SELECT * FROM menus WHERE type=$type and date='$from_date'");
		if(mysqli_num_rows($tmp)){
			while ($out = mysqli_fetch_row($tmp)) {
				$copy_query = $this->query("INSERT INTO menus VALUES('', $out[1], $type, '$to_date')");
			}
		}
		return true;
	}
	function GetMenus($date, $type){
		$get_menu = $this->query("SELECT * FROM menus WHERE date='$date' AND type=$type");
		$outdata = array(); $linked_data = array();
		$i=0;
		if(mysqli_num_rows($get_menu)){
			while($out = mysqli_fetch_row($get_menu)){
				$outdata[$i] = $out;
				$outdata[$i]["dish_name"] = $this->GetDishById($outdata[$i]["1"]);
				$i++;
			}
		}
		return $outdata;
	}
	function SetPaidStatus($data){
		$code = $this->query("UPDATE orders SET paid=1 WHERE user_id='$data[0]' AND date='$data[1]'");
		return $code;
	}
}