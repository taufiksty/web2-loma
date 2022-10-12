<?php 

namespace App\Controllers;

class Sign extends BaseController
{
  public function signIn()
  {
    return view('sign/sign_in');
  }
}