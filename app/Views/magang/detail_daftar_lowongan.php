<?= $this->extend('layout/rekruter/template_daftar_lowongan'); ?>

<?= $this->section('content'); ?>

<div class="flex flex-col w-full lg:flex-row my-24">
  <div class="sticky top-20 px-14 h-full card rounded-box place-items-center">
    <div class="avatar">
      <div class="w-28 rounded">
        <img src="<?= base_url(); ?>/img/rekruter/<?= $detail_magang[0]['foto_logo']; ?>" />
      </div>
    </div>
    <p class="mt-3 font-bold text-xl"><?= $detail_magang[0]['posisi']; ?></p>
    <p class="mt-3 font-semibold text-lg"><?= $detail_magang[0]['nama_perusahaan']; ?></p>
    <p class="mt-3 text-lg"><?= $detail_magang[0]['wilayah_penempatan']; ?></p>
    <p class="mt-3 text-lg">Ditayangkan pada <?= $interval; ?> hari yang lalu</p>
    <a href="<?= base_url(); ?>/Rekruter/lihatLamaranMasuk/Magang/<?= $detail_magang[0]['id']; ?>/<?= $detail_magang[0]['id_rekruter']; ?>" class="btn btn-accent mt-9">Lihat Lamaran Masuk</a>
  </div>

  <div class="grid flex-grow h-full card rounded-box place-items-center px-14 pt-5">
    <p class="font-extrabold text-2xl"><?= $detail_magang[0]['tipe']; ?> (<?= $detail_magang[0]['lama_kegiatan']; ?> bulan)</p>

    <div class="card w-full bg-slate-100 shadow-xl mt-7">
      <div class="card-body">
        <h2 class="card-title">Kualifikasi :</h2>
        <?php foreach ($dl_kualifikasi as $dk) :; ?>
          <ul class="pl-5">
            <li class="list-disc text-lg"><?= $dk['kualifikasi']; ?></li>
          </ul>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="card w-full bg-slate-100 shadow-xl mt-7">
      <div class="card-body">
        <h2 class="card-title">Deskripsi :</h2>
        <?php foreach ($dl_deskripsi as $dd) :; ?>
          <ul class="pl-5">
            <li class="list-disc text-lg"><?= $dd['deskripsi']; ?></li>
          </ul>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="card w-full bg-slate-100 shadow-xl mt-7">
      <div class="card-body">
        <h2 class="card-title">Benefit :</h2>
        <?php foreach ($dl_benefit as $db) :; ?>
          <ul class="pl-5">
            <li class="list-disc text-lg"><?= $db['benefit']; ?></li>
          </ul>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="flex justify-end w-full mt-24">
      <a href="<?= base_url(); ?>/Magang/hapusLowongan/<?= $detail_magang[0]['id']; ?>/<?= $detail_magang[0]['id_rekruter']; ?>" class="btn btn-error px-5 mr-5 font-medium text-base" onclick="confirm('Apakah anda yakin ingin menghapus lowongan? Pelamar yang telah melamar akan diberitahu secara otomatis.');">Hapus Lowongan</a>
      <a class="btn btn-warning px-16 font-medium text-base">Edit Lowongan</a>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>