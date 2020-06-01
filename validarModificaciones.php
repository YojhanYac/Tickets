<?php 

include_once 'MYSQL_DB.php';

$user = new MYSQL_DB();

$user->modificar_taller($_POST["taller"], $_POST["id_operacion"]);
$user->modificar_cbu($_POST["cbu"], $_POST["id_operacion"]);
$user->modificar_fecha_de_expedicion($_POST["fecha_de_expedicion"], $_POST["id_operacion"]);
$user->modificar_numero_de_remito($_POST["numero_de_remito"], $_POST["id_operacion"]);
$user->modificar_descripcion_producto($_POST["descripcion_producto"], $_POST["id_operacion"]);
$user->modificar_costo_por_unidad($_POST["costo_por_unidad"], $_POST["id_operacion"]);
$user->modificar_cantidad_original($_POST["cantidad_original"], $_POST["id_operacion"]);
$user->modificar_terminados($_POST["terminados"], $_POST["id_operacion"]);
$user->modificar_descuento($_POST["descuento"], $_POST["id_operacion"]);
$user->modificar_total_neto($_POST["total_neto"], $_POST["id_operacion"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<title>Tickets</title>
</head>
<body>
	<header>

		<h1>Ticket Modificado!</h1>

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
				<tr> <?php foreach($_POST as $key => $value){ ?>
					<th scope="col"> <?php if($key == "id_operacion"){ ?> <form action="modificar.php" method="POST"><button type="submit" name="<?php echo $key; ?>" value="<?php echo $value; ?>">Modificar</button></form><form action="eliminarTicket.php" method="POST"><button type="submit" name="<?php echo $key; ?>" value="<?php echo $value; ?>">Elminar</button></form> <?php } else{ echo $value; }?> </th>
					<?php } if($key == "total_neto"){ ?> </tr>
				</div>
			<?php } ?>
		</tbody>
	</table>
	<br>

	<input type="button" value="Volver al ticket modificado" onClick="history.go(-1);">
	<button onclick="window.location.href = 'http://localhost/Tickets/index.php';">Cargar un nuevo ticket</button>
	<button onclick="window.location.href = 'http://localhost/Tickets/registros.php';">Ver lista de tickets</button>
</header>	
<main>
</main>
<footer>

</footer>
</body>
</html>