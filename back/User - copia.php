<?php

class User {

  private $id;
  private $MYSQL_DB;
 // private $JSON_DB;

  public function __construct($id = 0)
  {
    $this->id = $id;
    $this->MYSQL_DB = new MYSQL_DB();
 //   $this->JSON_DB = new JSON_DB();
  }

  public function register()
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

    $this->MYSQL_DB->addRemito($data);
   // $this->JSON_DB->addCuil($data);
  }

/*  public function login($email, $pass, $remember)
  {
    if (!$user = $this->MYSQL_DB->findUser($email)) {
      return "Email y/o contraseña incorrectos";
    }
    if(password_verify($pass, $user['password'])){
      $_SESSION["login"] = true;
      $_SESSION["user"] = $user;
      if($remember){
        setcookie('login', 'true', time() + 60*60*24*30);
        setcookie('user', $user['email'], time() + 60*60*24*30);
      }
      header('Location: index.php');
    } else {
      return 'Email y/o contraseña incorrectos';
    }
  }
*/

  public function getId()
  {
    return $this->id;
  }

  public function getMYSQL_DB()
  {
    return $this->MYSQL_DB;
  }
}
