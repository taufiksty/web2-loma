<?= $this->extend('layout/pelamar/template_profil'); ?>

<?= $this->section('content'); ?>

<div class="container mt-24 mx-9">
  <div class="grid w-auto" style="grid-template-columns: 20% 5% 60%;">
    <div class="h-full place-items-start">
      <ul class="menu card rounded-box bg-base-300 md:w-56 fixed">
        <li><a href="/Pelamar/index">Profil</a></li>
        <li><a href="#" class="active">Histori</a></li>
      </ul>
    </div>
    <div class="divider divider-horizontal"></div>
    <div class="flex flex-wrap mb-11">
      <div class="card card-compact w-96 bg-base-100 shadow-xl px-14">
        <figure><img src="/img/lowongan/logo1.png" alt="Logo" /></figure>
        <div class="card-body">
          <h2 class="text-3xl font-bold">PT Sampoerna</h2>
          <h2 class="text-2xl font-semibold">Magang</h2>
          <p>Social Media Strategist</p>
          <h2 class="text-2xl font-semibold">Tanggal Kirim</h2>
          <p>12 Mei 2021</p>
          <h2 class="text-2xl font-semibold">Deadline Lamaran</h2>
          <p>15 Mei 2021</p>
          <div class="card-actions justify-end">
            <a class="btn btn-primary">Detail</a>
          </div>
        </div>
      </div> 
      <div class="card card-compact w-96 bg-base-100 shadow-xl px-14">
        <figure><img src="https://placeimg.com/400/225/arch" alt="Shoes" /></figure>
        <div class="card-body">
          <h2 class="text-3xl font-bold"></h2>
          <h2 class="text-2xl font-semibold">Magang</h2>
          <p></p>
          <h2 class="text-2xl font-semibold">Tanggal Kirim</h2>
          <p></p>
          <h2 class="text-2xl font-semibold">Deadline Lamaran</h2>
          <p></p>
          <div class="card-actions justify-end">
            <a class="btn btn-primary">Detail</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>


<?= $this->endSection(); ?>