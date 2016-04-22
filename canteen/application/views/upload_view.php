<div>
	<h2>Загрузка нового файла</h2>
	<form action="" method="POST" enctype="multipart/form-data">
			<div class="input-group"><label>Файл для отправки</label><input type="file" name="attach" required>
				<br>
			<div class="input-group"><label>Короткий месседж</label><textarea class="form-control" name="msg"></textarea></div>
			<input class="btn btn-default" type="submit">
	</form>
	<hr noshade>
	<div class="panel panel-default">
	<table class="table">
		<thead><h3>Очередь:</h3></thead>
		<?php
		if(sizeof($data) > 0){
			foreach ($data as $key => $value) {
				echo "<tr><td>".$data[$key]->name."</td><td>".$data[$key]->msg."</td><td>";
				echo ($data[$key]->status == 0)? "<span class='glyphicon glyphicon-hourglass'></span>" : "<span class='glyphicon glyphicon-thumbs-up'></span>";
				echo "</td></tr>";
			}
		}
		?>
	</table>
</div>
</div>