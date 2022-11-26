<?= $this->extend('layout/pelamar/template_profil'); ?>

<?= $this->section('content'); ?>

<div class="container mt-24 mx-9">
  <div class="grid w-auto" style="grid-template-columns: 20% 5% 60%;">
    <div class="h-full place-items-start">
      <ul class="menu card rounded-box bg-base-300 md:w-56 fixed">
        <li><a href="#" class="active">Profil</a></li>
        <li><a href="<?= base_url(); ?>/Pelamar/historiLamaran/<?= $pelamar['id']; ?>">Histori</a></li>
      </ul>
    </div>
    <div class="divider divider-horizontal"></div>

    <div class="h-fit card rounded-box place-items-center w-full pb-5 overflow-y-auto">

      <?php if (session()->getFlashdata('success')) { ?>
        <div class="mt-0 mb-3 w-auto z-10 fixed">
          <div class="alert alert-success shadow-lg" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><?php echo session()->getFlashdata('success'); ?></span>
            <span class="ml-20 font-bold text-base cursor-pointer hover:bg-slate-500 hover:rounded hover:py-px hover:px-1" onclick="this.parentElement.classList.add('hidden')">&times;</span>
          </div>
        </div>
      <?php }; ?>

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
        <div class="rounded-box border-2 p-3"><?= $pelamar['tl']; ?></div>
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

      <label class="input-group input-group-vertical mt-5">
        <div class="grid grid-cols-2 gap-x-4 w-full">
          <span>Lisensi dan Sertifikasi</span>
          <span class="rounded-t-lg">ID Kredensial</span>
          <?php foreach ($lis_and_ser as $ls) : ?>
            <div class="rounded-b-lg border-x-2 border-b-2 p-3"><?= $ls['ls']; ?></div>
            <div class="rounded-b-lg border-x-2 border-b-2 p-3"><?= $ls['id_kred']; ?></div>
          <?php endforeach; ?>
        </div>
      </label>

      <a href="/Pelamar/editProfil/<?= $pelamar['id']; ?>" class="btn btn-secondary my-12">Edit Profil</a>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>