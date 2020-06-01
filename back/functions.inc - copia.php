<?php /*
include_once 'MYSQL_DB.php';


function getUsersJSON()
{
  $users = file_get_contents('json/users.json');
  return json_decode($users, true);
}

function validateCuil($cuil)
{
  $users = getUsersJSON();

  if (!$cuil) {
    return "Por favor, ingrese su dirección de cuil";
  } else if (!filter_var($cuil, FILTER_VALIDATE_cuil)) {
    return "El cuil es inválido";
  } else {
    foreach ($users as $key => $user) {
      if ($user['cuil'] == $cuil) {
        return "Este cuil ya pertenece a un usuario";
      }
    }
    return "";
  }
}

function validatePassword($value)
{
  if (!$value) {
    return "Por favor, elija una contraseña";
  } else if (!(strlen($value) >= 6)) {
    return "La contraseña debe tener al menos 6 caracteres";
  } else {
    return "";
  }
}



function validateUserPic($value)
{
  $ext = pathinfo($value['name'], PATHINFO_EXTENSION);

  if ($value['error'] == 4) {
    return "";
  } else if ($value['error'] == 1) {
    return 'La imagen no debe pesar mas de 2mb';
  } else if ($value['error']) {
    return 'Hubo un error al cargar el archivo';
  } else if ($ext != "jpeg" && $ext != "jpg" && $ext != "png"){
    return 'La imagen debe estar en formato PNG, JPG o JPEG';
  } else {
    return "";
  }
}

function validateUserName($userName)
{
  if (strlen($userName) < 4 || !preg_match("/[a-z]{2,}/i", $userName)) {
    return "El nombre de usuario debe tener más de 4 caracteres y al menos dos letras";
  }
  return "";
}

function registerUser()
{
  $users = getUsersJSON();
  $user = array(
    'userName' => strstr($_POST['email'],'@',true),
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    'userPic' => $_FILES['userPic']
  );

  $users[] = $user;
  $users = json_encode($users);
  file_put_contents('json/users.json', $users);
}

function findUser($userRequested)
{
  $users = getUsersJSON();

  foreach ($users as $user) {
    if ($user['email'] === $userRequested) {
      return $user;
    }
  }
  return NULL;
}

function loginByCookie()
{
  $MYSQL_DB = new MYSQL_DB();
  if (isset($_COOKIE['login']) && isset($_SESSION['login']) == FALSE) {
    $_SESSION['login'] = TRUE;
    $_SESSION['user'] = $MYSQL_DB->findUser($_COOKIE['user']);
   }
}
*/ ?>
