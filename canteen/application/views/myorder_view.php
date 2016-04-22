<h2>Несохранненые заказы</h2>
<h4 align=center>Дата: <?php echo date("d.m.y"); ?></h4>
<div id="orders_center" style="text-align: center">
<table align=center>
	<tr><td>Именование</td><td>Цена, <span class='price'>&#8381;</span></td></tr>
<?php
ini_set("display_errors", 0);
	$h = array(0 => 'на завтрак', 1 => 'на обед', 2 => 'на ужин');
	$sum=0; $t_sum = 0;
	if(sizeof($_SESSION["orders"] > 0))
	for($i=0;$i<3;$i++){
		echo "<tr><td><h3>".$h[$i]."</h3></td><td></td></tr><tr></tr>";
		foreach($_SESSION["orders"] as $key=>$value){
			if($value["type"] == $i){
				echo "<tr><td>$value[dish_name]</td><td>$value[price]</td><td><a href='/canteen/myorder/undo/$key' data-ajax='false'><img src='/canteen/application/images/delete.png' height=12></a></td></tr>";
				$t_sum+=$value["price"];
			}
		}
		echo "<tr><td>Итог: </td><Td>$t_sum <span class='price'>&#8381;</span></td></tr>";
		$sum += $t_sum;
		$t_sum=0;
	}
	if($sum > 0) {echo "<tr><td><a href='/canteen/myorder/pushorder' data-ajax='false'><button class='ui-btn ui-btn-a ui-btn-icon-left ui-shadow ui-corner-all' data-theme='a' data-form='ui-btn-up-a'>Сделать заказ</button></a></td><td></td></tr>";}
?>


</table><hr>
<h2>Отправленые заказы</h2>
<div id="orders_center" style="text-align: center">
<table align=center>
<?php
	$sum=0; $t_sum = 0;
	if(sizeof($data) > 0){
		echo "<tr><td>Именование</td><td>Цена,  &#8381;</td></tr>";
		for($i=0;$i<3;$i++){
			echo "<tr><td><h3>".$h[$i]."</h3></td><td></td></tr><tr></tr>";
			foreach($data[$i] as $key=>$value){
					echo "<tr><td>$value[dish_name]</td><td>$value[price]</td><td><a href='/canteen/myorder/del/$value[order_id]' data-ajax='false'><img src='/canteen/application/images/delete.png' height=12></a></td></tr>";
					$t_sum+=$value["price"];
			}
			echo "<tr><td>Итог: </td><Td>$t_sum <span class='price'>&#8381;</span></td></tr>";
			$sum += $t_sum;
			$t_sum=0;
		}
	}
?>
</table>
<h3 align=center>Итог на сегодня: <?php echo $sum; ?> <span class='price'>&#8381;</span></h3>

</div>