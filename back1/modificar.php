<?php

include_once 'MYSQL_DB.php';

//var_dump($_POST);
if($_POST){ 
$user = new MYSQL_DB();
$encontrado = $user->buscarRemito($_POST["id_operacion"]);
}


/*echo "<br><br>";
var_dump($encontrado);
echo "<br><br>";
echo $encontrado["taller"] . "<br><br>";*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width initial-scale=1.0">
  <?php if(!$_POST){ ?> <meta http-equiv="refresh" content="0;URL=index.php"> <?php } ?>
  <title>Tickets</title>
  <link rel="stylesheet" href="css/dev-styles.css">
</head>
<body>
  <header>
    <h1>Modificar Ticket</h1>
  </header>
  <main>
    <div class="form__container">
      <form action="validarModificaciones.php" method="POST">
      	        <div class="form-example" hidden>
          <label for="id_operacion">Número de operación</label>
          <input type="text" name="id_operacion" id="" value="<?php echo $encontrado["id_operacion"]; ?>">
        </div>

        <div class="form-example">
          <label for="taller">Taller</label>
          <input type="text" name="taller" id="" value="<?php echo $encontrado["taller"]; ?>" required>
        </div>
        <div class="form-example">
          <label for="cbu">CBU</label>
          <input type="number" name="cbu" id="" value="<?php echo $encontrado["cbu"]; ?>" required>
        </div>
        <div class="form-example">
          <label for="fecha_de_expedicion">Fecha de expedición</label>
          <input type="number" name="fecha_de_expedicion" id="" value="<?php echo $encontrado["fecha_de_expedicion"]; ?>" required>
        </div>
        <div class="form-example">
          <label for="numero_de_remito">Nro. de Remito</label>
          <input type="number" name="numero_de_remito" id="" value="<?php echo $encontrado["numero_de_remito"]; ?>" required>
          </div> <?php if(isset($errors['numero_de_remito'])){echo '<span>'. $errors['numero_de_remito'] .'</span><br>';} ?>
          <div class="form-example">
            <label for="descripcion_producto">Descripción Producto</label>
            <input type="text" name="descripcion_producto" id="" value="<?php echo $encontrado["descripcion_producto"]; ?>" required>
          </div>
          <div class="form-example">
            <label for="costo_por_unidad">Costo por Unidad</label>
            <input type="number" name="costo_por_unidad" id="" value="<?php echo $encontrado["costo_por_unidad"]; ?>" required>
          </div>
          <div class="form-example">
            <label for="cantidad_original">Cantidad Original</label>
            <input type="number" name="cantidad_original" id="" value="<?php echo $encontrado["cantidad_original"]; ?>" required>
          </div>
          <div class="form-example">
            <label for="terminados">Terminados</label>
            <input type="number" name="terminados" id="" value="<?php echo $encontrado["terminados"]; ?>" required>
          </div>
          <div class="form-example">
            <label for="descuento">Descuento</label>
            <input type="number" name="descuento" id="" value="<?php echo $encontrado["descuento"]; ?>" required>
          </div>
          <div class="form-example">
            <label for="total_neto">Total Neto</label>
            <input type="number" name="total_neto" id="" value="<?php echo $encontrado["total_neto"]; ?>" required>
          </div>
          <div class="form-example">
            <input type="submit" value="Modificar">
          </div>
        </form>
      </div>
    </main>
    <footer>
      
    </footer>
    <script src="js/index.js"></script>
  </body>
  </html>