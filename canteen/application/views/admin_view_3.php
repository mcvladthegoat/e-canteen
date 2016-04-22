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
  <h1>Пользователи</h1>
</div>
<table class="table table-hover table-bordered table-striped">
	<tr><td>ФИО</td><td>Логин</td><td>Пароль</td><td>Действия</td></tr>
	<?php
	foreach ($data as $key => $value) {
		echo "<tr><td>$value[1]</td><td>$value[2]</td><td>$value[3]</td><td><a href=users/del/".$value[0]."><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a><a onclick=\"OpenEditWindow('$value[0]', '$value[1]', '$value[2]', '$value[3]')\"><span class='glyphicon glyphicon-pencil' aria-hidden='true'></a></td></tr>";
	}
	?>
</table>
<div class="row">
	<div class="col-md-5">
	<div class="panel panel-default">
	<div class="panel-body"><form method="post" action="/canteen/admin/users/add">
		<h3 align=center>Создать пользователя</h3>
	<div class="input-group"><span class="input-group-addon">ФИО</span><input class="form-control" type="text" name="fio"></div>
	<div class="input-group"><span class="input-group-addon">Логин</span><input class="form-control" type="text" name="login" required></div>
	<div class="input-group"><span class="input-group-addon">Пароль</span><input class="form-control" type="text" name="pwd" required></div>
	<div class="input-group"><label><button class="btn btn-success" type="submit">Создать</button></label></div></form>
</div>
</div>
</div>
	<div class="col-md-5" id="EW">
		<div class="panel panel-default">
		<div class="panel-body"><form method="post" action="/canteen/admin/users/edit" id="EditWindow">
		<h3 align=center>Изменить пользователя</h3>
		<div class="input-group"><span class="input-group-addon">ФИО</span><input class="form-control" type="text" name="fio"></div>
		<div class="input-group"><span class="input-group-addon">Логин</span><input class="form-control" type="text" name="login" required></div>
		<div class="input-group"><span class="input-group-addon">Пароль</span><input class="form-control" type="text" name="pwd" required></div>
		<div class="input-group"><label><button class="btn btn-success" type="submit">Изменить</button></label></div>
		<input type="hidden" name="id" value=""></form>
		</div>
		</div>
	</div>
</div>
<script>
function OpenEditWindow(id, fio, login, pwd){
	$("#EW").slideDown("slow");
	$("#EditWindow").find("input[name=fio]").val(fio);
	$("#EditWindow").find("input[name=login]").val(login);
	$("#EditWindow").find("input[name=pwd]").val(pwd);
	$("#EditWindow").find("input[name=id]").val(id);
}
</script>