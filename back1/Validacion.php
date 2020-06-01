<?php

include_once 'MYSQL_DB.php';

class Validacion
{

  private $errors;

  public function __construct()
  {
    $this->errors = [];
    $this->MYSQL_DB = new MYSQL_DB();
  }

  public function validarRemito($numero_de_remito)
  {
    if (!$numero_de_remito) {
      $this->errors['numero_de_remito'] = 'Por favor, ingrese numero_de_remito';
    }
    else if ($this->MYSQL_DB->buscarRemito($numero_de_remito) !== FALSE){
      $this->errors['numero_de_remito'] = "Este numero de remito ya existe";
    }
  }

  public function getErrors()
  {
    return $this->errors;
  }
}
