<?php

//include_once 'JSON_DB.php';
include_once 'MYSQL_DB.php';

/**
 * Validaciones de input de usuario
 */
class Validator
{

  private $errors;
  private $JSON_DB;
  //private $MYSQL_DB;

  public function __construct()
  {
    $this->errors = [];
   // $this->JSON_DB = new JSON_DB();
    $this->MYSQL_DB = new MYSQL_DB();
  }

  public function validateRemito($numero_de_remito)
  {
    if (!$numero_de_remito) {
      $this->errors['numero_de_remito'] = 'Por favor, ingrese numero_de_remito';
    }
    else if ($this->MYSQL_DB->findRemito($numero_de_remito) !== FALSE){
      $this->errors['numero_de_remito'] = "Este numero_de_remito ya existe";
    }
  }

  public function getErrors()
  {
    return $this->errors;
  }
}
