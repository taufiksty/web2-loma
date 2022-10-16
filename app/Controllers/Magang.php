<?php

namespace App\Controllers;

class Magang extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Loma | Magang',
    ];
    
    return view('magang/index', $data);
  }
}
