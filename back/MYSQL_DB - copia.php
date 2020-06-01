<?php
include_once 'DB.php';

class MYSQL_DB implements DB {
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

  public function getUsers()
  {

  }

  public function findRemito($numero_de_remito)
  {
    $stmt = $this->con->prepare("SELECT * FROM clientes WHERE numero_de_remito = :numero_de_remito");
    $stmt->bindValue(":numero_de_remito", $numero_de_remito, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($user)) {
      return $user;
    }else{
      return FALSE;
    }
  }

    public function findIdCliente($id_cliente)
  {
    $stmt = $this->con->prepare("SELECT * FROM clientes WHERE id_cliente = :id_cliente");
    $stmt->bindValue(":id_cliente", $id_cliente, PDO::PARAM_STR);
    $stmt->execute();

    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($cliente)) {
      return $cliente;
    }else{
      return FALSE;
    }
  }

  public function addRemito($data)
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


  public function updateUser_taller($taller, $id)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET taller = :taller WHERE id = :id");
    $stmt->bindValue(":taller", $taller, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function updateUser_cbu($cbu, $id)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET cbu = :cbu WHERE id = :id");
    $stmt->bindValue(":cbu", $cbu, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }


  public function updateUser_fecha_de_expedicion($fecha_de_expedicion, $id)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET fecha_de_expedicion = :fecha_de_expedicion WHERE id = :id");
    $stmt->bindValue(":fecha_de_expedicion", $fecha_de_expedicion, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function updateUser_numero_de_remito($numero_de_remito, $id)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET numero_de_remito = :numero_de_remito WHERE id = :id");
    $stmt->bindValue(":numero_de_remito", $numero_de_remito, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }
    public function updateUser_descripcion_producto($descripcion_producto, $id)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET descripcion_producto = :descripcion_producto WHERE id = :id");
    $stmt->bindValue(":descripcion_producto", $descripcion_producto, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

      public function updateUser_costo_por_unidad($costo_por_unidad, $id)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET costo_por_unidad = :costo_por_unidad WHERE id = :id");
    $stmt->bindValue(":costo_por_unidad", $costo_por_unidad, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

      public function updateUser_cantidad_original($cantidad_original, $id)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET cantidad_original = :cantidad_original WHERE id = :id");
    $stmt->bindValue(":cantidad_original", $cantidad_original, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

      public function updateUser_terminados($terminados, $id)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET terminados = :terminados WHERE id = :id");
    $stmt->bindValue(":terminados", $terminados, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }


      public function updateUser_descuento($descuento, $id)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET descuento = :descuento WHERE id = :id");
    $stmt->bindValue(":descuento", $descuento, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

      public function updateUser_total_neto($total_neto, $id)
  {
    $stmt = $this->con->prepare("UPDATE clientes SET total_neto = :total_neto WHERE id = :id");
    $stmt->bindValue(":total_neto", $total_neto, PDO::PARAM_STR);
    $stmt->bindValue(":id", $id, PDO::PARAM_STR);
    $stmt->execute();
  }

}
?>
