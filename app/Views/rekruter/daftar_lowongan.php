<?= $this->extend('layout/rekruter/template_daftar_lowongan'); ?>

<?= $this->section('content'); ?>

<form action="">
  <div class="form-control mt-32 mx-32">
    <div class="flex">
      <a href="<?= base_url(); ?>/Rekruter/tambahLowongan/<?= $daftar_lowongan[0]['id_rekruter']; ?>" class="btn btn-primary px-20">Tambah Lowongan</a>
      <div class="input-group justify-end">
        <input type="text" placeholder="Cari Jenis Lowongan/Posisi..." class="input input-bordered w-1/2" name="keyword" value="<?= (old('keyword')) ? old('keyword') : '' ?>" />
        <button class="btn btn-square bg-slate-900" type="submit" name="submit">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</form>


<div class="overflow-x-auto mx-32 mt-10 mb-32">
  <table class="table w-full text-center">
    <!-- head -->
    <thead>
      <tr>
        <th>No</th>
        <th>Jenis Lowongan</th>
        <th>Posisi</th>
        <th>Tanggal Dibuat</th>
        <th>Deadline</th>
        <th>Detail</th>
      </tr>
    </thead>

    <?php $no = 1 + (10 * ($current_page - 1));   ?>
    <?php foreach ($daftar_lowongan as $dl) : ?>
      <tbody>
        <tr class="hover">
          <td><?= $no++; ?></td>
          <th><?= $dl['tipe']; ?></th>
          <td><?= $dl['posisi']; ?></td>
          <td><?= date('d-m-Y', strtotime($dl['updated_at'])); ?></td>
          <td><?= date('d-m-Y', strtotime($dl['deadline'])); ?></td>
          <td><a href="<?= base_url(); ?>/<?= $dl['tipe']; ?>/detailDaftarLowongan/<?= $dl['id']; ?>" class="btn btn-active btn-primary">Detail</a></td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>
  <div class="mt-14 text-center">
    <?= $pager->links('DaftarLowongan', 'lowongan_pagination'); ?>
  </div>
</div>

<?= $this->endSection(); ?>