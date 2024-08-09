<!doctype html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Kursus Online</title>
 <link href="<?= base_url(); ?>/bootstrap-5/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url(); ?>">Kursus Online Ardi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 d-flex">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?= base_url(); ?>">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/kursus">Kursus</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

 <main class="flex-fill">
  <?= $this->renderSection('content') ?>
 </main>

 <footer class="bg-body-tertiary py-3">
  <div class="container text-center">
   <p class="mb-0">&copy; <?= date('Y'); ?> by Fauzan. All Rights Reserved.</p>
  </div>
 </footer>

 <script src="<?= base_url(); ?>/bootstrap-5/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <script src="<?= base_url(); ?>/bootstrap-5/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
 <script src="<?= base_url(); ?>/bootstrap-5/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
