<div class="page-header">
  <h1>Управление меню <small><small>Выберите дату меню, затем добавьте блюда</small></small></h1>
</div>

<div class="row">
<div class="col-md-6"><div class="panel panel-default"><div class="panel-body"><form method="post">
	<h2>Выбор даты меню</h2>
<label><input type="text" type="text" class="form-control" id="datepicker" name="date" value=<?php echo "'$info'"; ?>>
<button class="btn btn-primary" type="submit">Открыть дату</button></label></form>
</div></div></div>

<div class="col-md-6"><div class="panel panel-default"><div class="panel-body">
	<div class="panel-body"><h3>Добавить блюдо в меню</h3>
		<form action="menus/add" method="post">
		<div class="col-xs-4">
		<select class="form-control" name="dish_id">
			<?php
			foreach ($data2 as $key => $value) {
				echo "<option value=$value[0]>".$value[1].", $value[3]руб.</option>";
			}
			?>
		</select>
		</div>
		<div class="col-xs-4">
		<select class="form-control" name="type">
			<option value="0">На завтрак</option>
			<option value="1">На обед</option>
			<option value="2">На ужин</option>
		</select>
	</div>
		<label><button type="submit" class="btn btn-success">Добавить</button></label>
		<input type="hidden" name="date" value=<?php echo "'$info'"; ?>>
	</form>
	</div>
</div></div></div>
</div>


<div class="row">
<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">
<h2>Завтрак</h2><ul class="list-group">
	<?php
	if(sizeof($data[0]) > 0){
		foreach ($data[0] as $key => $value) {
			echo "<li class='list-group-item'>".$value['dish_name']."<a href=menus/del/".$value[0]."><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></li>";
		}
	}
	else echo "<p>Ничего не найдено</p>";
	?>
</ul>
	<form method=post action="menus/copy">
		<label><input type="text" class="form-control" id="datepicker2" name="to_date"><button class="btn btn-primary" type="submit">Копировать на другую дату</button></label>
		<input type="hidden" name="type" value="0"></input> 
		<input type="hidden" name="from_date" value=<?php echo "'$info'"; ?>></input> 
	</form></div>
</div></div>
<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">
<h2>Обед</h2><ul class="list-group">
	<?php
	if(sizeof($data[1]) > 0){
		foreach ($data[1] as $key => $value) {
			echo "<li class='list-group-item'>".$value['dish_name']."<a href=menus/del/".$value[0]."><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></li>";
		}
	}
	else echo "<p>Ничего не найдено</p>";
	?>
</ul>
	<form method=post action="menus/copy">
		<label><input type="text" class="form-control" id="datepicker2" name="to_date"><button class="btn btn-primary" type="submit">Копировать на другую дату</button></label>
		<input type="hidden" name="type" value="1"></input> 
		<input type="hidden" name="from_date" value=<?php echo "'$info'"; ?>></input> 
	</form>
</div></div></div>
<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">
<h2>Ужин</h2><ul class="list-group">
	<?php
	if(sizeof($data[2]) > 0){
		foreach ($data[2] as $key => $value) {
			echo "<li class='list-group-item'>".$value['dish_name']."<a href=menus/del/".$value[0]."><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></li>";
		}
	}
	else echo "<p>Ничего не найдено</p>";
	?>
</ul>
	<form method=post action="menus/copy">
		<label><input type="text" class="form-control" id="datepicker2" name="to_date"><button class="btn btn-primary" type="submit">Копировать на другую дату</button></label>
		<input type="hidden" name="type" value="2"></input> 
		<input type="hidden" name="from_date" value=<?php echo "'$info'"; ?>></input> 
	</form>
</div></div></div>

<script type="text/javascript">
$('#datepicker, #datepicker2').datepicker({
    format: "yyyy-mm-dd",
    todayBtn: "linked",
    todayHighlight: true,
    autoclose: true,
    clearBtn: true,
    language: "ru"
});
</script>
</div>