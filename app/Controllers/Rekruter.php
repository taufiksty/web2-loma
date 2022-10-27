<?php

namespace App\Controllers;

use App\Models\RekruterModel;

class Rekruter extends BaseController
{
  protected $RekruterModel;

  public function __construct()
  {
    $this->RekruterModel = new RekruterModel();
  }

  public function index($id_rekruter)
  {
    $data = [
      'title' => 'Loma | Rekruter',
      'rekruter' => $this->RekruterModel->getRekruter($id_rekruter)
    ];

    return view('rekruter/profil', $data);
  }

  public function editProfil($id_rekruter)
  {
    $data = [
      'title' => 'Loma | Edit Profil',
      'rekruter' => $this->RekruterModel->getRekruter($id_rekruter)
    ]
  }

  public function daftarLowongan()
  {
    return view('rekruter/daftar_lowongan');
  }
}
