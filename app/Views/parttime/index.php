<?= $this->extend('layout/pelamar/template_parttime'); ?>

<?= $this->section('content'); ?>

<form action="">
  <div class="form-control mt-24 mx-32">
    <div class="input-group">
      <input type="text" placeholder="Cari Nama Perusahaan/Posisi..." class="input input-bordered w-1/3" name="keyword" value="<?= (old('keyword')) ? old('keyword') : '' ?>" />
      <button class="btn btn-square bg-slate-900" type="submit" name="submit">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </button>
    </div>
  </div>
</form>

<div class="overflow-x-auto mx-32 mt-10 mb-32">
  <table class="table w-full text-center">
    <!-- head -->
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Perusahaan/<br>Lembaga</th>
        <th>Posisi</th>
        <th>Deadline</th>
        <th>Detail</th>
      </tr>
    </thead>

    <?php $no = 1 + (10 * ($current_page - 1));   ?>
    <?php foreach ($parttime as $p) : ?>
      <tbody>
        <tr class="hover">
          <td><?= $no++; ?></td>
          <th><?= $p['nama_perusahaan']; ?></th>
          <td><?= $p['posisi']; ?></td>
          <td><?= date('d-m-Y', strtotime($p['deadline'])); ?></td>
          <td><a href="<?= base_url(); ?>/Parttime/detailLowongan/<?= $p['id']; ?>/<?= $pelamar['id']; ?>" class="btn btn-active btn-primary">Detail</a></td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>
  <div class="mt-14 text-center">
    <?= $pager->links('Parttime', 'lowongan_pagination'); ?>
  </div>
</div>

<?= $this->endSection(); ?>