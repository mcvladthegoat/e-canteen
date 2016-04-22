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
  <h1>Отчет о сформированном заказе</h1>
  <h2><?php echo $data["fio"]; ?></h2> 	
  <h2>Дата: <?php echo $data["date"]; ?></h2> 	
<table align=center>
	<tr><td>Блюдо</td><td>Цена, руб.</td></tr>
	<?php
	foreach ($data["dishes"] as $key => $value) {
		echo "<tr><td>$value[name]</td><td>$value[price]</td></tr>";
	}
	echo "</table><h2>Итого: ".$data["sum"]." руб.</h2>";	
	?>
</div>
</body>
</html>