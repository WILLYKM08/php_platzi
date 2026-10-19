<?php

namespace App\Controllers;

use Framework\Validator;
class AuthController
{
  public function login()
  {
    view('login');
  }

  public function authenticate()
  {
    Validator::make($_POST,[
      'user'    =>    'required|email',
      'password' =>    'required|min:6',
    ]);

    $login = auth()->login($_POST['user'], $_POST['password']);

    if(!$login) 
    {
      sessionManager()->setFlash('errors', 'Usuario o contraseña inválidos');
      sessionManager()->setFlash('old_user', $_POST['user'] ?? '');

      back();
    }
    
    redirect('/');
  }


  public function logout() 
  {
    auth()->logout();
    redirect('/login');
  }
}