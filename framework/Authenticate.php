<?php

namespace Framework;

class Authenticate
{
  public function login(string $username, string $password): bool{
    $user = db()->query('SELECT * FROM users WHERE username = :username', [
      'username' => $username,
    ])->first();

    if ($user && password_verify($password, $user['password'])) 
      {
      sessionManager()->set('user', [
        'id' => $user['id'],
        'username' => $user['username'],
        'name' => $user['name']
      ]);

      return true;
    }

    return false;
  }

  public function logout(): void 
  {
    sessionManager()->remove('user');
    session_destroy();
  }
}