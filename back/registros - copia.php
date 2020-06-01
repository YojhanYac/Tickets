<?php

$db = new PDO("mysql:host=127.0.0.1;dbname=ticketsdb;port=3306;charset=utf8", "root", "");

$query = $db->prepare('SELECT * from clientes');
$query->execute();

$result = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<title>Tickets</title>
</head>
<main>
	<header>
		<h1>Tickets</h1>
	</header>
	<body>

		<h3 style="border: 3px red solid;">
			Lista de Operacíones
		</h3>
		<table style="width: 100%;">
			<tr style="background-color: #ff1234;">
				<th scope="col">Operación</th>
				<th scope="col">Taller</th>
				<th scope="col">CBU</th>
				<th scope="col">Fecha de expedición</th>
				<th scope="col">Nro. de remito</th>
				<th scope="col">Descripción Producto</th>
				<th scope="col">Costo por Unidad</th>
				<th scope="col">Cantidad Original</th>
				<th scope="col">Terminados</th>
				<th scope="col">Descuento</th>
				<th scope="col">Total Neto</th>
			</tr>
			<tbody style="background-color: #ff9800; ">
				<tr>  <?php while($result){
					foreach ($result as $key => $value) { ?>
						<th scope="col"><?php echo $value; ?></th>
					<?php } if($key == "total_neto")
					{
						?> </tr> <?php
					}
					$result = $query->fetch(PDO::FETCH_ASSOC); }?>
				</tbody>
			</table>
		</body>
	</main>
	</html>