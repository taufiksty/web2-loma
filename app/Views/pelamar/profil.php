<?= $this->extend('layout/pelamar/template_profil'); ?>

<?= $this->section('content'); ?>

<div class="container mt-24 mx-9">
  <div class="grid w-auto" style="grid-template-columns: 20% 5% 60%;">
    <div class="h-full place-items-start">
      <ul class="menu card rounded-box bg-base-300 md:w-56 fixed">
        <li><a href="#" class="active">Profil</a></li>
        <li><a href="/Pelamar/historiLamaran">Histori</a></li>
      </ul>
    </div>
    <div class="divider divider-horizontal"></div>
    <div class="h-fit card rounded-box place-items-center w-full pb-5 overflow-y-auto">
      <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo session()->getFlashdata('message'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>
      <div class="avatar mb-8">
        <div class="w-48 rounded">
          <img src="/img/pelamar/<?= $pelamar['foto_profil']; ?>" alt="<?= $pelamar['foto_profil']; ?>" />
        </div>
      </div>
      <label class="input-group input-group-vertical">
        <span>Nama</span>
        <div class="rounded-box border-2 p-3"><?= $pelamar['nama']; ?></div>
      </label>
      <label class="input-group input-group-vertical mt-5">
        <span>Email</span>
        <div class="rounded-box border-2 p-3"><?= $pelamar['email']; ?></div>
      </label>
      <label class="input-group input-group-vertical mt-5">
        <span>Username</span>
        <div class="rounded-box border-2 p-3"><?= $pelamar['username']; ?></div>
      </label>
      <label class="input-group input-group-vertical mt-5">
        <span>Nomor Telepon</span>
        <div class="rounded-box border-2 p-3"><?= $pelamar['no_telp']; ?></div>
      </label>
      <label class="input-group input-group-vertical mt-5">
        <span>Alamat Tempat Tinggal</span>
        <div class="rounded-box border-2 p-3"><?= $pelamar['alamat']; ?></div>
      </label>
      <label class="input-group input-group-vertical mt-5">
        <span>Tanggal Lahir</span>
        <div class="rounded-box border-2 p-3"><?= $pelamar['ttl']; ?></div>
      </label>
      <label class="input-group input-group-vertical mt-5">
        <span>Gender</span>
        <div class="rounded-box border-2 p-3"><?= $pelamar['gender']; ?></div>
      </label>
      <br><br>
      <label class="input-group input-group-vertical mt-5">
        <span>Asal Universitas</span>
        <div class="rounded-box border-2 p-3"><?= $pelamar['univ']; ?></div>
      </label>
      <label class="input-group input-group-vertical mt-5">
        <span>Program Studi</span>
        <div class="rounded-box border-2 p-3"><?= $pelamar['prodi']; ?></div>
      </label>
      <br><br>
      <div class="grid grid-cols-2 gap-4 w-full">
        <div class="lisensi-dan-sertifikasi w-full">
          <label class="input-group input-group-vertical mt-5">
            <span>Lisensi dan Sertifikasi</span>
            <?php foreach ($lis_and_ser as $ls) : ?>
              <div class="rounded-none border-x-2 border-b-2 p-3"><?= $ls['ls']; ?></div>
            <?php endforeach; ?>
          </label>
        </div>
        <div class="id-kredensial w-full">
          <label class="input-group input-group-vertical mt-5">
            <span>ID Kredensial</span>
            <?php foreach ($lis_and_ser as $ls) : ?>
              <div class="rounded-none border-x-2 border-b-2 p-3"><?= $ls['id_kred']; ?></div>
            <?php endforeach; ?>
          </label>
        </div>
      </div>
      <a href="/Pelamar/editProfil/<?= $pelamar['id_pelamar']; ?>" class="btn btn-secondary my-12">Edit Profil</a>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>