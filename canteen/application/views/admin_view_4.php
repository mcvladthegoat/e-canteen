<div class="page-header">
  <h1>Заказы пользователей <small><a href="print_all"><span class='glyphicon glyphicon-print' aria-hidden='true'></span> Распечатать все заказы</a></small></h1>
</div>
<h2>Текущие</h2>
<table class="table table-hover table-bordered table-striped">
	<tr><td>ФИО пользователя</td><td>Состав заказа</td><td>Сумма, <span class="price">&#8381;</span></td><td>Дата заказа</td><td>Действия</td></tr>
	<?php
	foreach ($data as $key => $value) {
		if($value["paid"] == 0)
		echo "<tr><td>".$value["user_name"]."</td><td>".$value["dishes_string"]."</td><td>".$value["sum"]."</td><td>".$value["date"]."</td><td><a href=orders/del/".$value["user_id"]."&".$value["date"]."><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>&nbsp<a href=print/".$value["user_id"]."&".$value["date"]."><span class='glyphicon glyphicon-print' aria-hidden='true'></span></a>&nbsp<a href=orders/set_paid/".$value["user_id"]."&".$value["date"]."><span class='glyphicon glyphicon-check' aria-hidden='true'></span></a></td></tr>";
	}
	?>
</table>
<h2 style="margin-top:50px;">Архив <small>обработанные администратором</small></h2>
<table class="table table-hover table-bordered table-striped">
	<tr><td>ФИО пользователя</td><td>Состав заказа</td><td>Сумма, <span class="price">&#8381;</span></td><td>Дата заказа</td><td>Действия</td></tr>
	<?php
	foreach ($data as $key => $value) {
		if($value["paid"] == 1)
		echo "<tr><td>".$value["user_name"]."</td><td>".$value["dishes_string"]."</td><td>".$value["sum"]."</td><td>".$value["date"]."</td><td><a href=orders/del/".$value["user_id"]."&".$value["date"]."><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>&nbsp<a href=orders/print/".$value["user_id"]."&".$value["date"]."><span class='glyphicon glyphicon-print' aria-hidden='true'></span></a></td></tr>";
	}
	?>
</table>
