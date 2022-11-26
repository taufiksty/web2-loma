<?php

namespace App\Controllers;

use App\Models\LowonganModel;
use App\Models\RekruterModel;
use App\Models\DLKualifikasiModel;
use App\Models\DLDeskripsiModel;
use App\Models\DLBenefitdllModel;

use CodeIgniter\I18n\Time;
use DateTime;

class Parttime extends BaseController
{
  protected $LowonganModel;
  protected $RekruterModel;
  protected $DLKualifikasiModel;
  protected $DLDeskripsiModel;
  protected $DLBenefitdllModel;

  public function __construct()
  {
    $this->LowonganModel = new LowonganModel();
    $this->RekruterModel = new RekruterModel();
    $this->DLKualifikasiModel = new DLKualifikasiModel();
    $this->DLDeskripsiModel = new DLDeskripsiModel();
    $this->DLBenefitdllModel = new DLBenefitdllModel();
  }

  public function index()
  {
    $currentPage = $this->request->getVar('page_Parttime') ? $this->request->getVar('page_Parttime') : 1;

    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $parttime = $this->LowonganModel->search($keyword);
    } else {
      $parttime = $this->LowonganModel;
    }

    $data = [
      'title' => 'Loma | Parttime',
      // 'magang' => $this->MagangModel->getLowongan('Magang'),
      // 'magang' => $this->MagangModel->getLowongan('Magang')
      'parttime' => $parttime->getLowongan('Parttime', 10),
      'pager' => $parttime->pager,
      'current_page' => $currentPage
    ];

    // dd($data['magang']);
    return view('parttime/index', $data);
  }
  
  public function detailLowongan($id)
  {
    $detail_parttime = $this->LowonganModel->getDetailLowongan('Parttime', $id);
    
    $tgl_update = new DateTime($detail_parttime[0]['updated_at']);
    $tgl_now = Time::now();
    $interval = $tgl_now->diff($tgl_update);

    $data = [
      'title' => 'Loma | Detail Lowongan',
      'detail_parttime' => $detail_parttime,
      'interval' => $interval->days,
      'dl_kualifikasi' => $this->DLKualifikasiModel->getDLKualifikasi($id),
      'dl_deskripsi' => $this->DLDeskripsiModel->getDLDeskripsi($id),
      'dl_benefit' => $this->DLBenefitdllModel->getDLBenefitdll($id),
    ];

    // dd($data['detail_parttime']);
    return view('parttime/detail_lowongan', $data);
  }

  public function detailDaftarLowongan($id)
  {
    $detail_parttime = $this->LowonganModel->getDetailLowongan('Parttime', $id);
    
    $tgl_update = new DateTime($detail_parttime[0]['updated_at']);
    $tgl_now = Time::now();
    $interval = $tgl_now->diff($tgl_update);

    $data = [
      'title' => 'Loma | Detail Lowongan',
      'detail_parttime' => $detail_parttime,
      'interval' => $interval->days,
      'dl_kualifikasi' => $this->DLKualifikasiModel->getDLKualifikasi($id),
      'dl_deskripsi' => $this->DLDeskripsiModel->getDLDeskripsi($id),
      'dl_benefit' => $this->DLBenefitdllModel->getDLBenefitdll($id),
    ];

    // dd($data['detail_parttime']);
    return view('parttime/detail_daftar_lowongan', $data);
  }

  public function hapusLowongan($id, $id_rekruter)
  {
    $this->LowonganModel->delete($id);

    session()->setFlashdata('success', 'Lowongan berhasil dihapus.');

    return redirect()->to('/Rekruter/daftarLowongan/' . $id_rekruter);
  }
}
