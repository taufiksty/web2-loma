<?= $this->extend('layout/pelamar/template_profil'); ?>

<?= $this->section('content'); ?>

<div class="container mt-24 mx-9">
  <div class="grid w-auto" style="grid-template-columns: 20% 5% 60%;">
    <div class="h-full place-items-start">
      <ul class="menu card rounded-box bg-base-300 md:w-56 fixed">
        <li><a href="/Pelamar/index/<?= $pelamar['id_pelamar']; ?>" class="active hover:font-semibold">Profil</a></li>
      </ul>
    </div>
    <div class="divider divider-horizontal"></div>

    <form action="/Pelamar/editProfil/<?= $pelamar['id_pelamar']; ?>" method="POST" enctype="multipart/form-data">
      <?= csrf_field(); ?>

      <input type="hidden" name="fotoProfilOld" value="<?= $pelamar['foto_profil']; ?>">

      <div class="h-fit card rounded-box place-items-center w-full pb-5 overflow-y-auto">

        <?php if (!empty(session()->getFlashdata('message'))) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo session()->getFlashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

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
          <input type="number" class="input input-bordered input-display <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>" id="no_telp" name="no_telp" value="<?= (old('no_telp')) ? old('no_telp') : $pelamar['no_telp']; ?>" placeholder="cth. 08979320117" />
        </label>
        <label class="label w-full hidden invalid:block">
          <span class="label-text-alt invalid:text-red-500"><?= $validation->getError('no_telp'); ?></span>
        </label>

        <label class="input-group input-group-vertical mt-5">
          <span>Tempat, Tanggal Lahir</span>
          <input type="text" class="input input-bordered input-display" id="ttl" name="ttl" value="<?= (old('ttl')) ? old('ttl') : $pelamar['ttl']; ?>" placeholder="cth. Jakarta, 9 Juli 2002" />
        </label>

        <label class="input-group input-group-vertical mt-5">
          <span>Gender</span>
          <div class="form-control">
            <label class="label cursor-pointer">
              <span class="bg-white">Laki-laki</span>
              <input type="radio" name="gender" class="radio checked:bg-primary" value="Laki-laki"/>
            </label>
          </div>
          <div class="form-control">
            <label class="label cursor-pointer">
              <span class="bg-white">Perempuan</span>
              <input type="radio" name="gender" class="radio checked:bg-primary" value="Perempuan"/>
            </label>
          </div>
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