<h2>Ужины</h2>
<?php
	if(sizeof($data) > 0)
	foreach($data as $key=>$value){
		echo "<div class=menuitems><a data-ajax='false' href='/canteen/dinner/add/$value[dish_id]'>";
		if(file_exists("application/images/$value[dish_id].jpg")) echo "<img height='150' src=/canteen/application/images/$value[dish_id].jpg>";
		echo "<p>$value[dish_name], $value[price] <span class='price'>&#8381;</span></p></a></div>";
	}
	else echo "<div class='nowrap menuitems'><p>Блюд на сегодня нет</p></div>";
?>
