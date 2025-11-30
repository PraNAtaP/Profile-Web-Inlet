<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="<?= BASEURL; ?>/img/LOGO-icon.png" />
  <link rel="shortcut icon" href="<?= BASEURL; ?>/img/LOGO-icon.png" />
  <title><?= $data['judul']; ?></title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/public.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">
      <img src="<?= BASEURL; ?>/img/LOGO.png" alt="Logo" class="logo-image" />
    </div>

    <ul class="nav-menu">
      <li><a href="<?= BASEURL; ?>">Home</a></li>
      <li><a href="<?= BASEURL; ?>#news">Our News</a></li>
      <li><a href="<?= BASEURL; ?>#team">Our Team</a></li>
      <li><a href="<?= BASEURL; ?>#research">Research</a></li>
      <li><a href="<?= BASEURL; ?>#gallery">Gallery</a></li>
      <li><a href="<?= BASEURL; ?>#contacts">Contacts</a></li>
    </ul>
  </nav>