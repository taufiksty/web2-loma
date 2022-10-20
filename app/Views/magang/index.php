<?= $this->extend('layout/pelamar/template_magang'); ?>

<?= $this->section('content'); ?>

<div class="overflow-x-auto my-32 mx-32">
  <table class="table text-center w-full">
    <!-- head -->
    <thead>
      <tr>
        <th></th>
        <th>Nama Perusahaan</th>
        <th>Jenis Lowongan</th>
        <th>Posisi</th>
        <th>Deadline</th>
        <th>Detail</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <tr>
        <th>1</th>
        <td>PT Sampoerna</td>
        <td>Magang</td>
        <td>Social Media Strategist</td>
        <td>15 Mei 2021</td>
        <td><a class="btn btn-primary">Detail</a></td>
      </tr>
    </tbody>
  </table>
</div>

<?= $this->endSection(); ?>