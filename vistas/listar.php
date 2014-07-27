<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Mostrar datos</title>
</head>
<body>
<table>
	<tr>
		<th>No
		</th><th>Dato
	</th></tr>
	<?php
	foreach($items as $item)
	{
	?>
	<tr>
		<td><?php echo $item['usuario']?></td>
		<td><?php echo $item['password']?></td>
	</tr>
	<?php
	}
	?>
</table>
</body>
</html>