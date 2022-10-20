<?php

namespace App\Controllers;

class PartTime extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Loma | PartTime',
    ];
    
    return view('parttime/index', $data);
  }
}