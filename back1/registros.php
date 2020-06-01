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
<form action="resultadoBusqueda.php" method="POST">
        <div class="form-example" style="float: left;">
          <label for="id_operacion">Operación:</label>
          <input type="text" name="id_operacion" >	
        </div>
               <div class="form-example" style="float: left;">
          <label for="taller">Taller</label>
          <input type="text" name="taller" >
        </div>
        <div class="form-example" style="float: left;">
          <label for="cbu">CBU</label>
          <input type="number" name="cbu" >
        </div>
        <div class="form-example" style="float: left;">
          <label for="fecha_de_expedicion">Fecha de expedición</label>
          <input type="number" name="fecha_de_expedicion" >
        </div>
        <div class="form-example" style="float: left;">
          <label for="numero_de_remito">Nro. de Remito</label>
          <input type="number" name="numero_de_remito" >
          </div> <?php if(isset($errors['numero_de_remito'])){echo '<span>'. $errors['numero_de_remito'] .'</span><br>';} ?>
          <div class="form-example" style="float: left;">
            <label for="descripcion_producto">Descripción Producto</label>
            <input type="text" name="descripcion_producto" >
          </div>
          <div class="form-example" style="float: left;">
            <label for="costo_por_unidad">Costo por Unidad</label>
            <input type="number" name="costo_por_unidad" >
          </div>
          <div class="form-example" style="float: left;">
            <label for="cantidad_original">Cantidad Original</label>
            <input type="number" name="cantidad_original" >
          </div>
          <div class="form-example" style="float: left;">
            <label for="terminados">Terminados</label>
            <input type="number" name="terminados" >
          </div>
          <div class="form-example" style="float: left;">
            <label for="descuento">Descuento</label>
            <input type="number" name="descuento" >
          </div>
          <div class="form-example" style="float: left;">
            <label for="total_neto">Total Neto</label>
            <input type="number" name="total_neto" >
          </div>
          <div class="form-example" style="float: left;">
            <input type="submit" value="Buscar"> 
          </div>
    </form>

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
				<tr> <?php while($result){ foreach($result as $key => $value){ ?>
				<th scope="col"> <?php if($key == "id_operacion"){ echo $value;?> <form action="modificar.php" method="POST"><button type="submit" name="<?php echo $key; ?>" value="<?php echo $value; ?>">Modificar</button></form> <?php } else{ echo $value; }?> </th>
				<?php } if($key == "total_neto"){ ?> </tr>
          </div>
				<?php } $result = $query->fetch(PDO::FETCH_ASSOC); } ?>
			</tbody>
			</table>
		</body>
	</main>
	</html>