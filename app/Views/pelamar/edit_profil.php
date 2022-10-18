<?= $this->extend('layout/pelamar/template_profil'); ?>

<?= $this->section('content'); ?>

<div class="container mt-24 mx-9">
  <div class="grid w-auto" style="grid-template-columns: 20% 5% 60%;">
    <div class="h-full place-items-start">
      <ul class="menu card rounded-box bg-base-300 md:w-56 fixed">
        <li><a href="/Pelamar/index/<?= $pelamar['id_pelamar']; ?>" class="active">Profil</a></li>
      </ul>
    </div>
    <div class="divider divider-horizontal"></div>

    <form action="/Pelamar/editProfil/<?= $pelamar['id_pelamar']; ?>" method="POST" enctype="multipart/form-data">
      <?= csrf_field(); ?>
      <!-- <input type="hidden" name="fotoOld" value="<?= $pelamar['foto']; ?>"> -->
      <div class="h-fit card rounded-box place-items-center w-full pb-5 overflow-y-auto">
        <div class="avatar mb-8">
          <div class="w-48 rounded">
            <img src="https://placeimg.com/192/192/people" />
          </div>
        </div>
        <label class="input-group input-group-vertical">
          <span>Nama</span>
          <input type="text" class="input input-bordered input-display" id="nama" name="nama" value="<?= old('nama'); ?>" />
        </label>
        <label class="input-group input-group-vertical mt-5">
          <span>Email</span>
          <input type="text" class="input input-bordered input-display" id="nama" name="nama" value="<?= old('nama'); ?>" />
        </label>
        <label class="input-group input-group-vertical mt-5">
          <span>Username</span>
          <input type="text" class="input input-bordered input-display" id="nama" name="nama" value="<?= old('nama'); ?>" />
        </label>
        <label class="input-group input-group-vertical mt-5">
          <span>Nomor Telepon</span>
          <input type="text" class="input input-bordered input-display" id="nama" name="nama" value="<?= old('nama'); ?>" />
        </label>
        <label class="input-group input-group-vertical mt-5">
          <span>Tempat, Tanggal Lahir</span>
          <input type="text" class="input input-bordered input-display" id="nama" name="nama" value="<?= old('nama'); ?>" />
        </label>
        <label class="input-group input-group-vertical mt-5">
          <span>Gender</span>
          <input type="text" class="input input-bordered input-display" id="nama" name="nama" value="<?= old('nama'); ?>" />
        </label>
        <br><br>
        <label class="input-group input-group-vertical mt-5">
          <span>Asal Universitas</span>
          <input type="text" class="input input-bordered input-display" id="nama" name="nama" value="<?= old('nama'); ?>" />
        </label>
        <label class="input-group input-group-vertical mt-5">
          <span>Program Studi</span>
          <input type="text" class="input input-bordered input-display" id="nama" name="nama" value="<?= old('nama'); ?>" />
        </label>
        <br><br>
        <div class="grid grid-cols-2 gap-4 w-full">
          <div class="lisensi-dan-sertifikasi w-full">
            <label class="input-group input-group-vertical mt-5">
              <span>Lisensi dan Sertifikasi</span>
              <div class="border-2 p-3">Muhamad Taufik Satya</div>
              <div class="rounded-box border-x-2 border-b-2 p-3">Muhamad Taufik Satya</div>
            </label>
          </div>
          <div class="id-kredensial w-full">
            <label class="input-group input-group-vertical mt-5">
              <span>ID Kredensial</span>
              <div class="border-2 p-3">Muhamad Taufik Satya</div>
              <div class="rounded-box border-x-2 border-b-2 p-3">Muhamad Taufik Satya</div>
            </label>
          </div>
        </div>
        <a href="" class="btn btn-accent my-12 px-12">Simpan</a>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection(); ?>