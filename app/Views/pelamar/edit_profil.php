<?= $this->extend('layout/pelamar/template_profil'); ?>

<?= $this->section('content'); ?>

<div class="container mt-24 mx-9">
  <div class="grid w-auto" style="grid-template-columns: 20% 5% 60%;">
    <div class="h-full place-items-start">
      <ul class="menu card rounded-box bg-base-300 md:w-56 fixed">
        <li><a href="/Pelamar/index/<?= $pelamar['id']; ?>" class="active hover:font-semibold">Profil</a></li>
      </ul>
    </div>
    <div class="divider divider-horizontal"></div>

    <form action="<?= base_url(); ?>/Pelamar/simpan/<?= $pelamar['id']; ?>" method="POST" enctype="multipart/form-data">
      <?= csrf_field(); ?>

      <input type="hidden" name="fotoProfilOld" value="<?= $pelamar['foto_profil']; ?>">

      <div class="h-fit card rounded-box place-items-center w-full pb-5 overflow-y-auto">

        <div class="alert alert-info shadow-lg mb-3 w-auto z-10 fixed hidden" id="alertLisAndSer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <span>Anda sudah memasukkan 5 sertifikasi.</span>
          <span class="ml-20 font-bold text-base cursor-pointer hover:bg-slate-500 hover:rounded hover:py-px hover:px-1" onclick="this.parentElement.classList.add('hidden')">&times;</span>
        </div>

        <div class="avatar mb-8 flex flex-row gap-x-7">
          <div class="w-48 rounded basis-1/2">
            <img src="/img/pelamar/<?= $pelamar['foto_profil']; ?>" class="img-thumbnail img-preview" />
          </div>
          <div class="foto-profil-input basis-1/2 pt-20">
            <label class="block">
              <span class="sr-only">Choose profile photo</span>
              <input type="file" name="fotoProfil" id="fotoProfil" onchange="previewImg()" class="block w-full text-sm text-slate-500
              file:mr-4 file:py-2 file:px-4
              file:rounded-full file:border-0
              file:text-sm file:font-semibold
              file:bg-violet-50 file:text-violet-700
              hover:file:bg-violet-100
            " />
            </label>
          </div>
        </div>

        <label class="input-group input-group-vertical">
          <span>Nama</span>
          <input type="text" class="input input-bordered input-display <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $pelamar['nama']; ?>" placeholder="nama" />
        </label>
        <label class="label w-full hidden invalid:block">
          <span class="label-text-alt invalid:text-red-500"><?= $validation->getError('nama'); ?></span>
        </label>

        <label class="input-group input-group-vertical mt-5">
          <span>Email</span>
          <input type="email" class="input input-bordered input-display" id="email" name="email" value="<?= $pelamar['email']; ?>" placeholder="email" disabled />
        </label>

        <label class="input-group input-group-vertical mt-5">
          <span>Username</span>
          <input type="text" class="input input-bordered input-display" id="username" name="username" value="<?= $pelamar['username']; ?>" placeholder="username" disabled />
        </label>

        <label class="input-group input-group-vertical mt-5">
          <span>Nomor Telepon</span>
          <input type="text" class="input input-bordered input-display <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>" id="no_telp" name="no_telp" value="<?= (old('no_telp')) ? old('no_telp') : $pelamar['no_telp']; ?>" placeholder="cth. 08979320117" />
        </label>
        <label class="label w-full hidden invalid:block">
          <span class="label-text-alt invalid:text-red-500"><?= $validation->getError('no_telp'); ?></span>
        </label>

        <label class="input-group input-group-vertical mt-5">
          <span>Alamat Tempat Tinggal</span>
          <input type="text" class="input input-bordered input-display" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $pelamar['alamat']; ?>" placeholder="cth. Jl. Wahid Khasim No.38, Limo, Depok, Jawa Barat" />
        </label>

        <label class="input-group input-group-vertical mt-5">
          <span>Tanggal Lahir</span>
          <input type="date" class="input input-bordered input-display" id="tl" name="tl" value="<?= (old('tl')) ? old('tl') : $pelamar['tl']; ?>" />
        </label>

        <label class="input-group input-group-vertical mt-5">
          <span>Gender</span>
          <div class="form-control">
            <label class="label cursor-pointer">
              <span class="bg-white">Laki-laki</span>
              <input type="radio" name="gender" class="radio checked:bg-primary" value="Laki-laki" checked />
            </label>
          </div>
          <div class="form-control">
            <label class="label cursor-pointer">
              <span class="bg-white">Perempuan</span>
              <input type="radio" name="gender" class="radio checked:bg-primary" value="Perempuan" />
            </label>
          </div>
        </label>

        <br><br>
        <label class="input-group input-group-vertical mt-5">
          <span>Asal Universitas</span>
          <input type="text" class="input input-bordered input-display <?= ($validation->hasError('univ')) ? 'is-invalid' : ''; ?>" id="univ" name="univ" value="<?= (old('univ')) ? old('univ') : $pelamar['univ']; ?>" />
        </label>
        <label class="label w-full hidden invalid:block">
          <span class="label-text-alt invalid:text-red-500"><?= $validation->getError('univ'); ?></span>
        </label>

        <label class="input-group input-group-vertical mt-5">
          <span>Program Studi</span>
          <input type="text" class="input input-bordered input-display <?= ($validation->hasError('prodi')) ? 'is-invalid' : ''; ?>" id="prodi" name="prodi" value="<?= (old('prodi')) ? old('prodi') : $pelamar['prodi']; ?>" />
        </label>
        <label class="label w-full hidden invalid:block">
          <span class="label-text-alt invalid:text-red-500"><?= $validation->getError('prodi'); ?></span>
        </label>

        <br><br>
        <p class="text-left text-xs">(Maksimal 5 Lisensi atau Sertifikasi)</p>
        <label class="input-group input-group-vertical mt-5">
          <div class="grid grid-cols-2 gap-x-4 w-full" id="inputLisAndSer">
            <span>Lisensi dan Sertifikasi</span>
            <span class="rounded-t-lg">ID Kredensial</span>
            <?php foreach ($lis_and_ser as $ls) : ?>
              <input type="text" class="hidden input-id" name="id[]" value="<?= $ls['id']; ?>">
              <input type="text" class="rounded-b-lg border-x-2 border-b-2 p-3 input-ls" id="ls" name="ls[]" value="<?= (old('ls')) ? old('ls') : $ls['ls']; ?>" placeholder="Masukkan sertifikasi" />
              <input type="text" class="rounded-b-lg border-x-2 border-b-2 p-3 input-id_kred" id="id_kred" name="id_kred[]" value="<?= (old('id_kred')) ? old('id_kred') : $ls['id_kred']; ?>" placeholder="Masukkan ID Kredensial" />
            <?php endforeach; ?>
          </div>
        </label>

        <div class="flex justify-center mt-3 gap-5 w-full">
          <button type="button" class="btn btn-outline btn-info basis-4/12" id="tambahLisAndSer">+ Tambah</button>
          <a href="<?= base_url(); ?>/Pelamar/hapusLisensiSertifikasi/<?= $lis_and_ser[count($lis_and_ser) - 1]['id']; ?>/<?= $pelamar['id']; ?>" class="btn btn-outline btn-error basis-4/12" id="hapusLisAndSer">- Hapus</a>
        </div>
        <button type="submit" class="btn btn-accent my-12 px-12">Simpan</button>
      </div>
    </form>
  </div>
</div>

<?= $this->endSection(); ?>