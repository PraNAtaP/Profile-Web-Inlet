<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ILET</title>

  <!-- Favicon -->
  <link rel="icon" href="assets/img/LOGO-icon.png" type="image/x-icon" />

  <!-- CSS -->
  <link rel="stylesheet" href="css/index.css" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo-container">
      <img src="assets/img/LOGO.png" alt="Logo" class="logo-image" />
    </div>
    <ul class="nav-menu">
      <li><a href="#home">Home</a></li>
      <li><a href="#news">Our News</a></li>
      <li><a href="#team">Our Team</a></li>
      <li><a href="#research">Research</a></li>
      <li><a href="#contacts">Contacts</a></li>
    </ul>
  </nav>

  <!-- Hero Section -->
  <section class="hero" id="home">
    <div class="hero-content">
      <h1 class="hero-title">LETRiG</h1>
      <p class="hero-subtitle">Learning Engineering and Theory of Computation Research Group</p>
      <p class="hero-description">Politeknik Negeri Malang</p>
    </div>
  </section>

  <!-- Cards Section -->
  <div class="cards-container">
    <div class="glass-container">
      <!-- Card 1: News -->
      <div class="card" onclick="window.location.href='#news';">
        <div class="card-icon">
          <i class="fas fa-newspaper"></i>
        </div>
        <h3>News</h3>
      </div>
      <!-- Card 2: Our Team -->
      <div class="card" onclick="window.location.href='#team';">
        <div class="card-icon">
          <i class="fas fa-users"></i>
        </div>
        <h3>Our Team</h3>
      </div>
      <!-- Card 3: Research -->
      <div class="card" onclick="window.location.href='#research';">
        <div class="card-icon">
          <i class="fas fa-lightbulb"></i>
        </div>
        <h3>Research</h3>
      </div>
      <!-- Card 4: Contacts -->
      <div class="card" onclick="window.location.href='#contacts';">
        <div class="card-icon">
          <i class="fas fa-envelope"></i>
        </div>
        <h3>Contact Us</h3>
      </div>
    </div>
  </div>

  <!-- About Section -->
  <section class="about-section" id="about">
    <h2 class="section-title">About Us</h2>
    <div class="about-content">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </section>
