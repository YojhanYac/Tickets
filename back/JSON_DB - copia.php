<?php

class JSON_DB implements DB {

  public function getUsers()
  {
    $users = file_get_contents('json/users.json');
    return json_decode($users, true);
  }

  public function addUser($user)
  {
    $users = $this->getUsers();
    $users[] = $user;
    $users = json_encode($users);
    file_put_contents('json/users.json', $users);
  }

  public function findUser($requestedUser)
  {
    $users = $this->getUsers();

    foreach ($users as $user) {
      if ($user['email'] === $requestedUser) {
        return $user;
      }
    }
    return FALSE;
  }

}
