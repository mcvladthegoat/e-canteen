<?php
class Controller_admin extends Controller{
	function __construct(){
		parent::__construct();
		$this->model = new Model_Admin();
		$this->view = new View();
	}

	function action_index(){
		if((sizeof($_POST) > 0) && (!isset($_SESSION["admin"]))){
			if(sizeof($this->model->CheckAdmin($_POST)) > 0){
				$_SESSION["admin"] = true;
				header("Location: /canteen/admin/dishes_control");
			}
			else $this->view->generate('admin_login.php', 'template_view.php', 'error_login');
		}
		elseif(isset($_SESSION["admin"])){
			 // Темплейт с блюдами
			$this->view->generate('admin_view_1.php', 'template_view.php', $this->model->GetDishes(), null);
		}
		else $this->view->generate('admin_login.php', 'template_view.php');

		// $data = $this->model->get_data();
	}
	function action_dishes_control($param, $_info){
		if(!isset($_SESSION["admin"])) header("Location: /canteen/admin");
		if($param == "add"){ //ЗНАЧИТ, АДМИН ХОЧЕТ ДОБАВИТЬ НОВОЕ БЛЮДО
			if($this->model->InsertNewDish($_POST)){
				header("Location: /canteen/admin/dishes_control");
			}
			else echo "FATAL ERROR in insert";
		}
		if($param == "del"){
			if($this->model->DeleteDish($_info)){
				header("Location: /canteen/admin/dishes_control");
			}
			else{
				echo "FATAL ERROR in del";
			}
		}
		if($param == "edit"){
			if($this->model->ChangeDish($_POST)){
				header("Location: /canteen/admin/dishes_control");
			}
			else{
				echo "FATAL ERROR in edit";
			}
		}
		else $this->view->generate('admin_view_1.php', 'template_view.php', $this->model->GetDishes(), null);
	}
	function action_menus($param, $_info){
		if(!isset($_SESSION["admin"])) header("Location: /canteen/admin");
		if($param == "add"){ //ЗНАЧИТ, АДМИН ХОЧЕТ ДОБАВИТЬ НОВОЕ МЕНЮ
			if($this->model->CreateMenu($_POST)){
				header("Location: /canteen/admin/menus");
			}
		}	
		if($param == "del"){
			if($this->model->DeleteMenu($_info)){
				header("Location: /canteen/admin/menus");
			}
			else{
				echo "FATAL ERROR in del";
			}
		}
		if($param == "copy"){
			if($this->model->CopyMenu($_POST["from_date"], $_POST["to_date"], $_POST["type"])){
				header("Location: /canteen/admin/menus");
			}
		}
		else{
			$out = array(); $data= array();
			if(!isset($_POST["date"])) $_POST["date"] = date("Y-m-d");
			for($i=0;$i<=2;++$i){
				$data["type"] = $i;
				$out[$i] = $this->model->GetMenus($_POST["date"] ,$data["type"]);
			}
			$out2 = $this->model->GetDishes();
			$this->view->generate('admin_view_2.php', 'template_view.php', $out, $_POST["date"], $out2); 
		}
	}
	function action_users($param, $_info){
		if(!isset($_SESSION["admin"])) header("Location: /canteen/admin");
		if($param == "add"){
			if($this->model->CreateUser($_POST)){
				header("Location: /canteen/admin/users");
			}
		}
		if($param == "del"){
			if($this->model->DeleteUser($_info)){
				header("Location: /canteen/admin/users");
			}
		}
		if($param == "edit"){
			if($this->model->ChangeUser($_POST)){
				header("Location: /canteen/admin/users");
			}
		}
		else{
			$this->view->generate("admin_view_3.php", 'template_view.php', $this->model->GetUsers(), null, null);
		}
	}
	function action_orders($param, $_info){
		if(!isset($_SESSION["admin"])) header("Location: /canteen/admin");
		if($param == "del"){
			$exploded_data = explode("&", $_info);
			if($this->model->DeleteOrder($exploded_data)){
				header("Location: /canteen/admin/orders");
			}
		}
		if($param == "set_paid"){
			$exploded_data = explode("&", $_info);
			$this->model->SetPaidStatus($exploded_data);
			header("Location: /canteen/admin/orders");
		}
		else{
			$data = $this->model->GetOrders();
			$str = "";
			$newdata = array();
			foreach($data as $key=>$value){
				$newdata[$value["user_id"] . $value["date"]][] = $value;
			}
			$data = array(); $i=0;
			foreach ($newdata as $key => $value) {
				$data[$i]["sum"] = 0; $data[$i]["dishes_string"]='';
				foreach ($value as $m => $v) {
					$data[$i]["sum"] += $this->model->GetDishPrice($v["dish_id"]);
					$data[$i]["dishes_string"] .= ', ' . $this->model->GetDishById($v["dish_id"]) ;
				}
				$data[$i]["date"] = $value[0]["date"];
				$data[$i]["paid"] = $value[0]["paid"];
				$data[$i]["user_id"] = $value[0]["user_id"];
				$data[$i]["user_name"] = $this->model->GetUserById($value[0]["user_id"]);
				$data[$i]["dishes_string"] = substr($data[$i]["dishes_string"], 2);
				$i++;
			}
			// var_dump($data);
			// exit();
			// foreach ($data as $key => $value) {
			// 	$tmp = explode(",", $value["3"]);
			// 	$data[$key]["5"] = 0;
			// 	foreach ($tmp as $k => $v) {
			// 		$d_id = $this->model->GetDishById($v);
			// 		$str .= $d_id.", ";
			// 		$data[$key]["5"] += $this->model->GetDishPrice($v);
			// 	}
			// 	$str = substr_replace($str, "", -2);
			// 	$data[$key]["3"] = $str;
			// 	$data[$key]["1"] = $this->model->GetUserById($data[$key]["1"]);
			// 	$str = '';
			// }
			$this->view->generate('admin_view_4.php', 'template_view.php', $data);
		}
	}
	function action_print_all($_info){
			$data = $this->model->GetNewOrders();
			$str = "";
			$newdata = array();
			foreach($data as $key=>$value){
				$newdata[$value["user_id"] . $value["date"]][] = $value;
			}
			$data = array(); $i=0;
			foreach ($newdata as $key => $value) {
				$data[$i]["sum"] = 0; $j=0;
				foreach ($value as $m => $v) {
					$tmp_price = $this->model->GetDishPrice($v["dish_id"]);
					$data[$i]["sum"] += $tmp_price;
					$data[$i]["dishes"][$j]["dish_name"] = $this->model->GetDishById($v["dish_id"]);
					$data[$i]["dishes"][$j]["price"] = $tmp_price;
					$j++;
				}
				$time = strtotime($value[0]["date"]);
				$data[$i]["date"] = date("d.m.Y", $time);
				$data[$i]["paid"] = $value[0]["paid"];
				$data[$i]["user_id"] = $value[0]["user_id"];
				$data[$i]["user_name"] = $this->model->GetUserById($value[0]["user_id"]);
				$i++;
			}
			// $to_print = array();

			// // var_dump($data);
			// foreach ($data as $key => $value) {
			// 	$_n = $this->model->GetUserById($value[1]);
			// 	$tmp = explode(",", $value["3"]);
			// 	$i=0;
			// 	$to_print[$_n]["sum"] = 0;
			// 	foreach ($tmp as $k => $v) {
			// 		$to_print[$_n][$i]["dish_name"] = $this->model->GetDishById($v);
			// 		$to_print[$_n][$i]["price"] = $this->model->GetDishPrice($v);
			// 		$i++;
			// 	}
			// }
			// foreach ($to_print as $key => $value) {
			// 	foreach ($value as $k => $v) {
			// 		$to_print[$key]["sum"] += $v["price"];
			// 	}
				
			// }
			// // var_dump($to_print);	
			$this->view->generate('', 'print_all_view.php', $data);
	}
	function action_print($_info){
		if(!isset($_SESSION["admin"])) header("Location: /canteen/admin");
			$exploded_data = explode("&", $_info);
			$data = $this->model->GetOrdersByData($exploded_data);
			$to_print = array();
			$to_print["fio"] = $this->model->GetUserById($data[0]["user_id"]);
			$time = strtotime($data[0]["date"]);
			$to_print["date"] = date("d.m.Y", $time);
			$to_print["sum"] = 0;
			$i = 0;
			foreach ($data as $k => $v) {
				$d_id = $this->model->GetDishById($v["dish_id"]);
				$d_price = $this->model->GetDishPrice($v["dish_id"]);
				$to_print["dishes"][$i]["name"] = $d_id;
				$to_print["dishes"][$i]["price"] = $d_price;
				$to_print["sum"] += $d_price;
				$i++;
			}
			//var_dump($to_print);
			$this->view->generate('', 'print_view.php', $to_print);
	}
	function action_logout(){
		unset($_SESSION["admin"]);
		// header("Location:");
		header("Location: /canteen/admin");
		exit();
	}
}