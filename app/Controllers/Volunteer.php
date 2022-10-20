<?php

namespace App\Controllers;

class Volunteer extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Loma | Volunteer',
    ];
    
    return view('Volunteer/index', $data);
  }
}