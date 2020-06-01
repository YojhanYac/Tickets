<?php
include_once 'MYSQL_DB.php';

var_dump($_POST);
echo "POST <br><br>";

$contador = 0;
foreach ($_POST as $key => $value) {
  if($value == "0")
  {
    $contador++;
  }
}
echo " contador: ". $contador . "<br><br>";

if(isset($_POST) && $contador != 11){ 
$user = new MYSQL_DB();
$encontrado = $user->buscador($_POST["id_operacion"], $_POST["taller"], $_POST["cbu"], $_POST["fecha_de_expedicion"], $_POST["numero_de_remito"], $_POST["descripcion_producto"], $_POST["costo_por_unidad"], $_POST["cantidad_original"], $_POST["terminados"], $_POST["descuento"], $_POST["total_neto"]);
var_dump($encontrado);
echo "encontrado <br><br>";

}
else
{
  echo "else";
}
  echo "fuera";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
   <?php if(!$_POST){ ?> <meta http-equiv="refresh" content="0;URL=registros.php"> <?php } ?>
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
          <input type="text" name="id_operacion">	
        </div>
               <div class="form-example" style="float: left;">
          <label for="taller">Taller</label>
          <input type="text" name="taller">
        </div>
        <div class="form-example" style="float: left;">
          <label for="cbu">CBU</label>
          <input type="number" name="cbu">
        </div>
        <div class="form-example" style="float: left;">
          <label for="fecha_de_expedicion">Fecha de expedición</label>
          <input type="number" name="fecha_de_expedicion">
        </div>
        <div class="form-example" style="float: left;">
          <label for="numero_de_remito">Nro. de Remito</label>
          <input type="number" name="numero_de_remito">
          </div> <?php if(isset($errors['numero_de_remito'])){echo '<span>'. $errors['numero_de_remito'] .'</span><br>';} ?>
          <div class="form-example" style="float: left;">
            <label for="descripcion_producto">Descripción Producto</label>
            <input type="text" name="descripcion_producto">
          </div>
          <div class="form-example" style="float: left;">
            <label for="costo_por_unidad">Costo por Unidad</label>
            <input type="number" name="costo_por_unidad">
          </div>
          <div class="form-example" style="float: left;">
            <label for="cantidad_original">Cantidad Original</label>
            <input type="number" name="cantidad_original">
          </div>
          <div class="form-example" style="float: left;">
            <label for="terminados">Terminados</label>
            <input type="number" name="terminados">
          </div>
          <div class="form-example" style="float: left;">
            <label for="descuento">Descuento</label>
            <input type="number" name="descuento">
          </div>
          <div class="form-example" style="float: left;">
            <label for="total_neto">Total Neto</label>
            <input type="number" name="total_neto">
          </div>
          <div class="form-example" style="float: left;">
            <input type="submit" value="Buscar">
          </div>
    </form>

    <div>    
  <button style="float: left;" onclick="window.location.href = 'http://localhost/Tickets/index.php';">Cargar un nuevo ticket</button>
    <button style="float: left;" onclick="window.location.href = 'http://localhost/Tickets/registros.php';">Ver lista de tickets</button>
  </div>

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
        <tr> <?php if(isset($_POST) && $contador != 11 && $encontrado != false){  foreach ($encontrado as $valor){ foreach($valor as $key => $value){ ?>
        <th scope="col"> 
          <?php if($key == "id_operacion"){ ?> <form action="modificar.php" method="POST"><button type="submit" name="<?php echo $key; ?>" value="<?php echo $value; ?>">Modificar</button></form> <?php } else{ echo $value; }?> </th>
        <?php } if($key == "total_neto"){ ?> </tr>
          </div>
        <?php 
} } } else { echo "No se encontraron tickets con los valores de busqueda";}?>
      </tbody>
      </table>
		</body>
	</main>
	</html>  