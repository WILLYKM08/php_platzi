<?php

namespace App\Controllers;

class AuthController
{
  public function login()
  {
    view('login');
  }

  public function authenticate()
  {
    $validator = validator($_POST,[
      'user'    =>    'required|email',
      'password' =>    'required|min:6',
    ]);

    if($validator->passes()) {
      $user = db()->query('SELECT * FROM users WHERE username = :username', [
        'username' => $_POST['user']
      ])->first();

      if($user && password_verify($_POST['password'], $user['password'])) {
      $_SESSION['user'] = [
        'id'  =>  $user['id'],
        'user'=>  $user['email'],
        'name'=>  $user['name'],
      ];

      redirect('/');
    }
    }


    view('login');
  }

  public function logout() 
  {
    unset($_SESSION['user']);
    session_destroy();
    redirect('/');
  }
}