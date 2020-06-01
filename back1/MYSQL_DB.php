<?php

class MYSQL_DB{
  private $dsn = "mysql:host=127.0.0.1;dbname=ticketsdb;port=3306;charset=utf8";
  private $user = "root";
  private $pass = "";
  private $con;

  public function __construct()
  {
    $this->con = new PDO($this->dsn, $this->user, $this->pass);
  }

  public function getCon()
  {
    return $this->con;
  }

  public function buscarRemito($id_operacion)
  {
    $stmt = $this->con->prepare("SELECT * FROM clientes WHERE id_operacion = :id_operacion");
    $stmt->bindValue(":id_operacion", $id_operacion, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($user)) {
      return $user;
    }else{
      return FALSE;
    }
  }

  public function agregarRemito($data)
  {
    $stmt = $this->con->prepare("INSERT INTO clientes(taller, cbu, fecha_de_expedicion, numero_de_remito, descripcion_producto, costo_por_unidad, cantidad_original, terminados, descuento, total_neto)
      VALUES (:taller, :cbu, :fecha_de_expedicion, :numero_de_remito, :descripcion_producto, :costo_por_unidad, :cantidad_original, :terminados, :descuento, :total_neto)");
    $stmt->bindValue(":taller", $data['taller'], PDO::PARAM_STR);
    $stmt->bindValue(":cbu", $data['cbu'], PDO::PARAM_STR);
    $stmt->bindValue(":fecha_de_expedicion", $data['fecha_de_expedicion'], PDO::PARAM_STR);
    $stmt->bindValue(":numero_de_remito", $data['numero_de_remito'], PDO::PARAM_STR);
    $stmt->bindValue(":descripcion_producto", $data['descripcion_producto'], PDO::PARAM_STR);
    $stmt->bindValue(":costo_por_unidad", $data['costo_por_unidad'], PDO::PARAM_STR);
    $stmt->bindValue(":cantidad_original", $data['cantidad_original'], PDO::PARAM_STR);
    $stmt->bindValue(":terminados", $data['terminados'], PDO::PARAM_STR);
    $stmt->bindValue(":descuento", $data['descuento'], PDO::PARAM_STR);
    $stmt->bindValue(":total_neto", $data['total_neto'], PDO::PARAM_STR);


    if (!$stmt->execute()) {
      Echo "Hubo un error al cargar el usuario, intente de nuevo más tarde";
    }
  }


  public function modificar_taller($taller, $id_operacion)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET taller = :taller WHERE id_operacion = :id_operacion");
    $stmt->bindValue(":taller", $taller, PDO::PARAM_STR);
    $stmt->bindValue(":id_operacion", $id_operacion, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function modificar_cbu($cbu, $id_operacion)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET cbu = :cbu WHERE id_operacion = :id_operacion");
    $stmt->bindValue(":cbu", $cbu, PDO::PARAM_STR);
    $stmt->bindValue(":id_operacion", $id_operacion, PDO::PARAM_STR);
    $stmt->execute();
  }


  public function modificar_fecha_de_expedicion($fecha_de_expedicion, $id_operacion)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET fecha_de_expedicion = :fecha_de_expedicion WHERE id_operacion = :id_operacion");
    $stmt->bindValue(":fecha_de_expedicion", $fecha_de_expedicion, PDO::PARAM_STR);
    $stmt->bindValue(":id_operacion", $id_operacion, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function modificar_numero_de_remito($numero_de_remito, $id_operacion)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET numero_de_remito = :numero_de_remito WHERE id_operacion = :id_operacion");
    $stmt->bindValue(":numero_de_remito", $numero_de_remito, PDO::PARAM_STR);
    $stmt->bindValue(":id_operacion", $id_operacion, PDO::PARAM_STR);
    $stmt->execute();
  }
  public function modificar_descripcion_producto($descripcion_producto, $id_operacion)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET descripcion_producto = :descripcion_producto WHERE id_operacion = :id_operacion");
    $stmt->bindValue(":descripcion_producto", $descripcion_producto, PDO::PARAM_STR);
    $stmt->bindValue(":id_operacion", $id_operacion, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function modificar_costo_por_unidad($costo_por_unidad, $id_operacion)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET costo_por_unidad = :costo_por_unidad WHERE id_operacion = :id_operacion");
    $stmt->bindValue(":costo_por_unidad", $costo_por_unidad, PDO::PARAM_STR);
    $stmt->bindValue(":id_operacion", $id_operacion, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function modificar_cantidad_original($cantidad_original, $id_operacion)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET cantidad_original = :cantidad_original WHERE id_operacion = :id_operacion");
    $stmt->bindValue(":cantidad_original", $cantidad_original, PDO::PARAM_STR);
    $stmt->bindValue(":id_operacion", $id_operacion, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function modificar_terminados($terminados, $id_operacion)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET terminados = :terminados WHERE id_operacion = :id_operacion");
    $stmt->bindValue(":terminados", $terminados, PDO::PARAM_STR);
    $stmt->bindValue(":id_operacion", $id_operacion, PDO::PARAM_STR);
    $stmt->execute();
  }


  public function modificar_descuento($descuento, $id_operacion)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET descuento = :descuento WHERE id_operacion = :id_operacion");
    $stmt->bindValue(":descuento", $descuento, PDO::PARAM_STR);
    $stmt->bindValue(":id_operacion", $id_operacion, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function modificar_total_neto($total_neto, $id_operacion)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET total_neto = :total_neto WHERE id_operacion = :id_operacion");
    $stmt->bindValue(":total_neto", $total_neto, PDO::PARAM_STR);
    $stmt->bindValue(":id_operacion", $id_operacion, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function buscador($id_operacion, $taller, $cbu, $fecha_de_expedicion, $numero_de_remito, $descripcion_producto, $costo_por_unidad, $cantidad_original, $terminados, $descuento, $total_neto)
  {
    $arrayPosiciones = ["id_operacion", "taller", "cbu", "fecha_de_expedicion", "numero_de_remito", "descripcion_producto", "costo_por_unidad", "cantidad_original", "terminados", "descuento", "total_neto"];
    $arraySentencia = "SELECT * FROM clientes";
    $arrayValores = [$id_operacion, $taller, $cbu, $fecha_de_expedicion, $numero_de_remito, $descripcion_producto, $costo_por_unidad, $cantidad_original, $terminados, $descuento, $total_neto];
    $arraySentencia = "SELECT * FROM clientes";
    echo "<br><br>";

    var_dump($arrayValores);
    echo " array valores 1<br><br>";  
    $contadorDeValores = 0;
    $contadorDeArray = 0;
    if($arrayValores[1] == "" && $arrayValores[5] == "")
    {
      $contadorDeArray = 1;
      echo "<br>se puso 1 en contadorDeArray<br>";
    }
    else{
      echo "<br>contadorDeArray esta en 0<br>";
    }

    for ($i = 0; $i < 11; $i++) {
      if(($i == 1 || $i == 5) && $contadorDeArray == 0){
        if($contadorDeValores == 0 && $arrayValores[$i] != "")
        {
          $arraySentencia =  $arraySentencia . " WHERE ". $arrayPosiciones[$i] . " LIKE :" . $arrayPosiciones[$i];
          $contadorDeValores ++;
        }
        elseif($arrayValores[$i] != ""  )
        {
          $arraySentencia =  $arraySentencia . " AND ". $arrayPosiciones[$i] . " LIKE :" . $arrayPosiciones[$i];
        }

      }
      else{
        if($arrayValores[$i] != 0 && $contadorDeValores == 0){
          $arraySentencia =  $arraySentencia . " WHERE ". $arrayPosiciones[$i] . "= :" . $arrayPosiciones[$i];
          echo "<br><br>";
          echo $arrayValores[$i] . "array valores 2 <br><br>";
          $contadorDeValores++;
        }
        elseif($arrayValores[$i] != 0 && $contadorDeValores != 0){
          $arraySentencia =  $arraySentencia . " AND ". $arrayPosiciones[$i] . "= :" . $arrayPosiciones[$i];
          echo "<br><br>";
          echo $arrayValores[$i] . " array valores 3<br><br>";  
        }
      }
    }

    echo "<br><br>";
    //var_dump($arraySentencia);
    echo "<br><br> arraySentencia === " . $arraySentencia . " <br><br>";

    $stmt = $this->con->prepare($arraySentencia);
    /*$stmt->bindValue(":terminados", $terminados, PDO::PARAM_STR);
    if($arrayValores[9] != 0){
        $stmt->bindValue(":descuento", $descuento, PDO::PARAM_STR);
      }*/

      for ($i=0; $i < 11 ; $i++) { 
        if($arrayValores[$i] != 0 || $arrayValores[$i] != ""){
          if($i != 1 && $i != 5){
          $valorBind = ":".$arrayPosiciones[$i];
          $stmt->bindValue($valorBind, $arrayValores[$i], PDO::PARAM_STR);

          echo "<br><br>".$valorBind . "  " . $arrayValores[$i] . "<br><br>";
        }
        else{
          $valorBind = ":".$arrayPosiciones[$i];
          $valorDeArray = "%" . $arrayValores[$i] . "%";
          $stmt->bindValue($valorBind, $valorDeArray, PDO::PARAM_STR);

          echo "<br><br>".$valorBind . "  " . $valorDeArray . "<br><br>";

        }
        }
        elseif($arrayValores[1] != 0)
        {

          echo "nada:" . $i . "  ". $arrayValores[$i] . "<br>";
        }
      }


      $stmt->execute();

      $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (!empty($user)) {
        return $user;
      }else{
        return FALSE;
      }
    }



  }
  ?>
