<!DOCTYPE html>
<html lang="en" data-theme="light" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loma | Lowongan mahasiswa</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="navbar bg-base-100 py-3 top-0 fixed z-10">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </label>
        <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          <li><a href="#tentang">Tentang</a></li>
          <li tabindex="0">
            <a class="justify-between">
              Lowongan
              <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
              </svg>
            </a>
            <ul class="p-2 bg-base-100">
              <li><a href="<?= base_url(); ?>/magang">Magang</a></li>
              <li><a href="<?= base_url(); ?>/Parttime/index">Part-Time</a></li>
              <li><a href="<?= base_url(); ?>/Volunteer/index">Volunteer</a></li>
            </ul>
          </li>
          <li><a href="#kontak-kami">Kontak Kami</a></li>
        </ul>
      </div>
      <a class="btn btn-ghost normal-case text-2xl md:ml-5">Loma.</a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal p-0">
        <li><a href="#tentang">Tentang</a></li>
        <li tabindex="0">
          <a>
            Lowongan
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
              <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
            </svg>
          </a>
          <ul class="p-2 px-5 bg-base-100">
            <li><a href="<?= base_url(); ?>/magang">Magang</a></li>
            <li><a href="<?= base_url(); ?>/Parttime/index">Part-Time</a></li>
            <li><a href="<?= base_url(); ?>/Volunteer/index">Volunteer</a></li>
          </ul>
        </li>
        <li><a href="#kontak-kami">Kontak Kami</a></li>
      </ul>
    </div>
    <div class="navbar-end">
      <a href="<?= base_url(); ?>/Auth/register" class="btn btn-ghost">Daftar</a>
      <a href="<?= base_url(); ?>/Auth/login" class="btn btn-primary mx-5 hover:bg-primary-focus">Masuk</a>
    </div>
  </div>

  <div class="hero min-h-screen bg-base-200 mt-12">
    <div class="hero-content text-center">
      <div class="max-w-4xl">
        <h1 class="text-5xl font-bold leading-normal">Jadilah Mahasiswa Berpengalaman<br>Temukan Aksi & Petualanganmu<br>Di Sini</h1>
        <p class="py-6">Kejar Impianmu Dengan Bangun Karier<br>Sejak Bangku Kuliah</p>
        <a href="<?= base_url(); ?>/Auth/login" class="btn btn-primary px-10">Mulai</a>
      </div>
    </div>
  </div>

  <div class="hero min-h-screen bg-base-200" id="tentang">
    <div class="hero-content flex-col lg:flex-row">
      <img src="<?= base_url(); ?>/img/landing_page/about.jpg" class="max-w-sm rounded-lg shadow-2xl" />
      <div>
        <h1 class="text-5xl font-bold">Loma.</h1>
        <p class="py-6 text-justify">Loma atau Lowongan Mahasiswa merupakan sebuah website penyedia lowongan khusus untuk mahasiswa aktif di seluruh Indonesia. Loma menyediakan kesempatan alternatif bagi mahasiswa untuk mencari pengalaman dan petualangan.</p>
        <p class="py-3 text-justify">Mulai dari magang di tempat impian, Part-time untuk menambah uang jajan, hingga volunteer untuk saling merasakan. Loma selalu menyediakan alternatif untukmu.</p>
      </div>
    </div>
  </div>

  <div class="hero min-h-screen bg-base-200" id="kontak-kami">
    <div class="hero-content flex-col lg:flex-row lg:min-w-full">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Kontak Kami</h1>
        <p class="py-6">Apabila kamu memiliki masalah, silahkan kontak kami.<br>Masukan, kritik, dan saran dari kamu sangat berarti bagi kami.<br><br>Salam hangat,<br>(Tim Loma.)</p>
      </div>
      <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <div class="card-body">
          <div class="form-control">
            <label class="label">
              <span class="label-text">Nama</span>
            </label>
            <input type="text" placeholder="nama" class="input input-bordered" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="email" placeholder="email" class="input input-bordered" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Pesan</span>
            </label>
            <textarea class="textarea textarea-bordered" placeholder="pesan"></textarea>
          </div>
          <div class="form-control">
            <label class="label cursor-pointer">
              <span class="label-text">Buat salinan pesan untuk saya</span>
              <input type="checkbox" checked="checked" class="checkbox" />
            </label>
          </div>
          <div class="form-control mt-6">
            <button class="btn btn-primary">Kirim</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer items-center p-4 bg-neutral text-neutral-content">
    <div class="items-center grid-flow-col">
      <a href="#">
        <h1 class="text-xl font-bold">Loma.</h1>
      </a>
      <p clas>Copyright © 2022 - All right reserved</p>
    </div>
    <div class="grid-flow-col gap-6 md:place-self-center md:justify-self-end">
      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
          <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
        </svg>
      </a>
      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
          <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
        </svg></a>
      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
          <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
        </svg></a>
    </div>
  </footer>
</body>

</html>