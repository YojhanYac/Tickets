<?php

class User {

  private $id;
  private $MYSQL_DB;

  public function __construct($id = 0)
  {
    $this->id = $id;
    $this->MYSQL_DB = new MYSQL_DB();
  }

  public function registrar()
  {
    $data = array(
      'taller' => $_POST['taller'],
      'cbu' => $_POST['cbu'],
      'fecha_de_expedicion' => $_POST['fecha_de_expedicion'],
      'numero_de_remito' => $_POST['numero_de_remito'],
      'descripcion_producto' => $_POST['descripcion_producto'],
      'costo_por_unidad' => $_POST['costo_por_unidad'],
      'cantidad_original' => $_POST['cantidad_original'],
      'terminados' => $_POST['terminados'],
      'descuento' => $_POST['descuento'],
      'total_neto' => $_POST['total_neto']
    );

    $this->MYSQL_DB->agregarRemito($data);
  }
  public function getId()
  {
    return $this->id;
  }

  public function getMYSQL_DB()
  {
    return $this->MYSQL_DB;
  }
}
