<style>
a:hover{
	cursor: pointer;
}
td a{
	margin-right:10px;
}
form{
	width: 400px;
}
form div{
	margin:10px;
}
#EW{
	display: none;
}
</style>
<div class="page-header">
  <h1>Управление блюдами</h1>
</div>
<table class="table table-hover table-bordered table-striped">
	<tr><td>Название</td><td>Описание</td><td>Цена, <span class="price">&#8381;</span></td><td>Действия</td></tr>
	<?php
	foreach ($data as $key => $value) {
		echo "<tr><td>".$value[1]."</td><td>".$value[2]."</td><td>".$value[3]."</td><td><a href=dishes_control/del/".$value[0]."><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><a onclick=\"OpenEditWindow('$value[0]', '$value[1]', '$value[2]', '$value[3]')\"><span class='glyphicon glyphicon-pencil' aria-hidden='true'></a>";
		if(file_exists("application/images/".$value[0].".jpg")) echo "<a href='/canteen/application/images/$value[0].jpg' rel='iLoad|Картинка блюда'><span class='glyphicon glyphicon-picture' aria-hidden='true'></span></a>";
		echo "</td></tr>";
	}
	?>
</table>

<div class="row"><div class="col-md-6">
<div class="panel panel-default" align=center><form method="post" enctype="multipart/form-data" action="dishes_control/add">
	<div class="panel-body"><h3 align=center>Добавить новое блюдо</h3>
	<div class="input-group"><span class="input-group-addon">Название</span><input class="form-control" type="text" name="dish_name"></div>
	<div class="input-group"><span class="input-group-addon">Его описание</span><input class="form-control" type="text" name="desc"></textarea></div>
	<div class="input-group"><span class="input-group-addon">Цена</span><input class="form-control" type="text" name="price" required></div>
	<div class="input-group"><span class="input-group-addon">Фотография</span><input class="form-control" type="file" name="image"></div>

	<div class="input-group"><button type="submit" class="btn btn-primary">Готово</button></div>
</div></form></div>
</div>
<div class="col-md-6" id="EW">
	<div class="panel panel-default" align=center>
		<form method="post" enctype="multipart/form-data" action="dishes_control/edit" id="EditWindow">
		<div class="panel-body"><h3 align=center>Редактировать блюдо</h3>
		<div class="input-group"><span class="input-group-addon">Название</span><input class="form-control" type="text" name="dish_name"></div>
		<div class="input-group"><span class="input-group-addon">Его описание</span><input class="form-control" type="text" name="desc"></input></div>
		<div class="input-group"><span class="input-group-addon">Цена</span><input class="form-control" type="text" name="price" required></div>
		<div class="input-group"><span class="input-group-addon">Фотография</span><input class="form-control" type="file" name="image"></div>
		<div class="input-group"><button type="submit" class="btn btn-info">Готово</button></div>
		<input name="id" type="hidden" value="">
</div></form>
	</div>
</div>

</div>


<script>
function OpenEditWindow(id, elem1, elem2, elem3){
	$("#EW").slideDown("slow");
	$("#EditWindow").find("input[name=dish_name]").val(elem1);
	$("#EditWindow").find("input[name=desc]").val(elem2);
	$("#EditWindow").find("input[name=price]").val(elem3);
	$("#EditWindow").find("input[name=id]").val(id);
}
</script>