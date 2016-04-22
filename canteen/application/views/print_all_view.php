<html>
<head>
	<meta charset="utf-8">
	<style>
	div{
		text-align:center;
		font-family:helvetica;
	}
	table{
		font-size: 22px;
		text-align: center;
		border: 2px solid;
		border-collapse: collapse;
	}
	td{
		border: 1px solid;
		padding: 5px;
	}

	</style>
</head>
<body onload="print(1);">
<div>
  <h1>Отчеты о сформированных заказах</h1>
	<?php
	foreach ($data as $key => $value) {
		echo "<h2>$value[user_name]</h2><h2>Дата: $value[date]</h2><table align=center><tr><td>Блюдо</td><td>Цена, руб.</td></tr>";
		foreach ($value["dishes"] as $k => $v) {
			echo "<tr><td>$v[dish_name]</td><td>$v[price]</td></tr>";
		}
		echo "</table>";
		echo "<h3>Итого: $value[sum] руб.</h3><br>";
	}
	?>
</div>
</body>
</html>