<?php 

namespace App\Controllers;

class Auth extends BaseController
{
  public function login()
  {
    $data = [
      'config' => config('Auth')
    ];

    return view('auth/login', $data);
  }

  public function register()
  {
    $data = [
      'config' => config('Auth')
    ];

    return view('auth/register', $data);
  }
}