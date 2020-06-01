<?php
include_once 'init.php';
include_once 'Validator.php';
include_once 'User.php';


$valid = new Validator();

  if ($_POST) {
    $valid->validateRemito($_POST["numero_de_remito"]);
    if (empty($valid->getErrors())) {
      $OBJ_user = new User(0);
      $OBJ_user->register();
      header("Location: registros.php");
    }else{
      $errors = $valid->getErrors();
    }
  }

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width initial-scale=1.0">
  <title>Tickets</title>
  <link rel="stylesheet" href="css/dev-styles.css">
</head>
<body>
  <header>
    <h1>Tickets</h1>
  </header>
  <main>
    <div class="form__container">
      <form action="#" method="POST">
        <div class="form-example">
          <label for="taller">Taller</label>
          <input type="text" name="taller" id="" required>
        </div>
        <div class="form-example">
          <label for="cbu">CBU</label>
          <input type="number" name="cbu" id="" required>
        </div>
        <div class="form-example">
          <label for="fecha_de_expedicion">Fecha de expedición</label>
          <input type="number" name="fecha_de_expedicion" id="" required>
        </div>
        <div class="form-example">
          <label for="numero_de_remito">Nro. de Remito</label>
          <input type="number" name="numero_de_remito" id="" required>
        </div> <?php if(isset($errors['numero_de_remito'])){echo '<span>'. $errors['numero_de_remito'] .'</span><br>';} ?>
        <div class="form-example">
          <label for="descripcion_producto">Descripción Producto</label>
          <input type="text" name="descripcion_producto" id="" required>
        </div>
         <div class="form-example">
          <label for="costo_por_unidad">Costo por Unidad</label>
          <input type="number" name="costo_por_unidad" id="" required>
        </div>
         <div class="form-example">
          <label for="cantidad_original">Cantidad Original</label>
          <input type="number" name="cantidad_original" id="" required>
        </div>
         <div class="form-example">
          <label for="terminados">Terminados</label>
          <input type="number" name="terminados" id="" required>
        </div>
         <div class="form-example">
          <label for="descuento">Descuento</label>
          <input type="number" name="descuento" id="" required>
        </div>
         <div class="form-example">
          <label for="total_neto">Total Neto</label>
          <input type="number" name="total_neto" id="" required>
        </div>
        <div class="form-example">
          <input type="submit" value="Enviar">
        </div>
      </form>
    </div>
  </main>
  <footer>
    
  </footer>
  <script src="js/index.js"></script>
</body>
</html>