<!DOCTYPE html>
<html lang="en" data-theme="light" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daisyui@2.31.0/dist/full.css" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="overflow-x-hidden">

  <div class="navbar bg-base-100 py-3 top-0 fixed z-10">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </label>
        <ul tabindex="0" class="navbar-options menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          <li><a href="" class="opt">Dashboard</a></li>
          <li><a class="opt active">Magang</a></li>
          <li><a class="opt">Part-Time</a></li>
          <li><a class="opt">Volunteer</a></li>
        </ul>
      </div>
      <a href="/LandingPage" class="btn btn-ghost normal-case text-2xl md:ml-5">Loma.</a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="navbar-options menu menu-horizontal p-0">
        <li><a href="" class="opt">Dashboard</a></li>
        <li><a class="opt active">Magang</a></li>
        <li><a class="opt">Part-Time</a></li>
        <li><a class="opt">Volunteer</a></li>
      </ul>
    </div>
    <div class="navbar-end mr-5 px-2">
      <button class="btn btn-ghost btn-circle mr-2">
        <div class="indicator">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <span class="badge badge-xs badge-primary indicator-item"></span>
        </div>
      </button>
      <div class="dropdown dropdown-end">
        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
          <div class="w-10 rounded-full">
            <img src="https://placeimg.com/80/80/people" />
          </div>
        </label>
        <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          <li>
            <a class="justify-between">
              Profile
              <span class="badge hidden">New</span>
            </a>
          </li>
          <li><a href="/logout">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>

  <?= $this->renderSection('content'); ?>

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