<?php

namespace App\Controllers;

use App\Models\MagangModel;

class Magang extends BaseController
{
  protected $MagangModel;

  public function __construct()
  {
    $this->MagangModel = new MagangModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Loma | Magang',
      'magang' => $this->MagangModel->getLowongan('Magang')
    ];
    
    return view('magang/index', $data);
  }
  public function detailLowongan()
  {
    $data = [
      'title' => 'Loma | Magang', 
    ];

    return view('magang/detail_lowongan', $data);
  }
}
