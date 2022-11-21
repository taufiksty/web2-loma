<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body class="overflow-x-hidden">
  <div class="navbar bg-base-100 mx-3 py-3">
    <a href="/LandingPage" class="btn btn-ghost normal-case text-xl">Loma.</a>
  </div>

  <div class="flex justify-center align-center">
    <div class="card w-full max-w-md shadow-2xl bg-base-100">
      <div class="card-body">
        <div class="text-center">
          <h1 class="text-4xl font-bold mb-6">Masuk</h1>
        </div>

        <?= view('Myth\Auth\Views\_message_block') ?>

        <form action="<?= url_to('login') ?>" method="post" class="user">
          <?= csrf_field() ?>

          <?php if ($config->validFields === ['email']) : ?>
            <div class="form-control mt-3">
              <label class="label" for="login">
                <span class="label-text">Email atau Username</span>
              </label>
              <input type="email" placeholder="email atau username" name="login" class="input input-bordered <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" />
              <div class="invalid-feedback text-sm text-red-500">
                <?= session('errors.login') ?>
              </div>
            </div>
          <?php else : ?>
            <div class="form-control mt-3">
              <label class="label" for="login">
                <span class="label-text">Email atau Username</span>
              </label>
              <input type="text" placeholder="email atau username" name="login" class="input input-bordered <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" />
              <div class="invalid-feedback text-sm text-red-500">
                <?= session('errors.login') ?>
              </div>
            </div>
          <?php endif; ?>

          <div class="form-control mt-3">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="password" name="password" placeholder="password" class="input input-bordered <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" />
            <div class="invalid-feedback text-sm text-red-500">
              <?= session('errors.password') ?>
            </div>
          </div>

          <a href="<?= base_url(); ?>/forgot" class="link link-hover text-2xs mt-5">Lupa password?</a>

          <?php if ($config->allowRemembering) : ?>
            <div class="form-control mt-5">
              <label class="label cursor-pointer">
                <span class="label-text">Ingat saya</span>
                <input type="checkbox" name="remember" class="checkbox" <?php if (old('remember')) : ?> checked <?php endif ?> />
              </label>
            </div>
          <?php endif; ?>

          <div class="form-control mt-6">
            <button type="submit" id="masuk" class="btn btn-outline btn-primary">Masuk</button>
          </div>

          <div class="w-full flex justify-center">
            <a href="<?= base_url(); ?>/register" class="link link-hover text-2xs mt-3">Belum memiliki akun?</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer id="footer" class="footer items-center p-4 bg-neutral text-neutral-content mt-20">
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