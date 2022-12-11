<?php

namespace App\Controllers;

use App\Models\LowonganModel;
use App\Models\PelamarModel;
use App\Models\RekruterModel;
use App\Models\DLKualifikasiModel;
use App\Models\DLDeskripsiModel;
use App\Models\DLBenefitdllModel;

use CodeIgniter\I18n\Time;
use DateTime;

class Magang extends BaseController
{
  protected $LowonganModel;
  protected $PelamarModel;
  protected $RekruterModel;
  protected $DLKualifikasiModel;
  protected $DLDeskripsiModel;
  protected $DLBenefitdllModel;

  public function __construct()
  {
    $this->LowonganModel = new LowonganModel();
    $this->PelamarModel = new PelamarModel();
    $this->RekruterModel = new RekruterModel();
    $this->DLKualifikasiModel = new DLKualifikasiModel();
    $this->DLDeskripsiModel = new DLDeskripsiModel();
    $this->DLBenefitdllModel = new DLBenefitdllModel();
  }

  public function index($id_pelamar)
  {
    $currentPage = $this->request->getVar('page_Magang') ? $this->request->getVar('page_Magang') : 1;

    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $magang = $this->LowonganModel->search($keyword);
    } else {
      $magang = $this->LowonganModel;
    }

    $data = [
      'title' => 'Loma | Magang',
      // 'magang' => $this->MagangModel->getLowongan('Magang'),
      // 'magang' => $this->MagangModel->getLowongan('Magang'),
      'pelamar' => $this->PelamarModel->getPelamar($id_pelamar),
      'magang' => $magang->getLowongan('Magang', 10),
      'pager' => $magang->pager,
      'current_page' => $currentPage
    ];

    // dd($data['magang']);
    return view('magang/index', $data);
  }
  
  public function detailLowongan($id, $id_pelamar)
  {
    $detail_magang = $this->LowonganModel->getDetailLowongan('Magang', $id);
    
    $tgl_update = new DateTime($detail_magang[0]['updated_at']);
    $tgl_now = Time::now();
    $interval = $tgl_now->diff($tgl_update);

    $data = [
      'title' => 'Loma | Detail Lowongan',
      'detail_magang' => $detail_magang,
      'interval' => $interval->days,
      'dl_kualifikasi' => $this->DLKualifikasiModel->getDLKualifikasi($id),
      'dl_deskripsi' => $this->DLDeskripsiModel->getDLDeskripsi($id),
      'dl_benefit' => $this->DLBenefitdllModel->getDLBenefitdll($id),
      'pelamar' => $this->PelamarModel->getPelamar($id_pelamar),
    ];

    // dd($data['detail_magang']);
    return view('magang/detail_lowongan', $data);
  }

  public function detailDaftarLowongan($id, $id_rekruter)
  {
    $detail_magang = $this->LowonganModel->getDetailLowongan('Magang', $id);
    
    $tgl_update = new DateTime($detail_magang[0]['updated_at']);
    $tgl_now = Time::now();
    $interval = $tgl_now->diff($tgl_update);

    $data = [
      'rekruter' => $this->RekruterModel->getRekruter($id_rekruter),
      'title' => 'Loma | Detail Lowongan',
      'detail_magang' => $detail_magang,
      'interval' => $interval->days,
      'dl_kualifikasi' => $this->DLKualifikasiModel->getDLKualifikasi($id),
      'dl_deskripsi' => $this->DLDeskripsiModel->getDLDeskripsi($id),
      'dl_benefit' => $this->DLBenefitdllModel->getDLBenefitdll($id),
    ];

    // dd($data['detail_magang']);
    return view('magang/detail_daftar_lowongan', $data);
  }

  public function hapusLowongan($id, $id_rekruter)
  {
    $this->LowonganModel->delete($id);

    session()->setFlashdata('success', 'Lowongan berhasil dihapus.');

    return redirect()->to('/Rekruter/daftarLowongan/' . $id_rekruter);
  }
}
