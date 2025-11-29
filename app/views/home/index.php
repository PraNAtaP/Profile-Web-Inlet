<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="../../../public/img/LOGO-icon.png" />
  <link rel="shortcut icon" href="../../../public/img/LOGO-icon.png" />
  <title>Information and Learning Engineering Technology</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="../../../public/css/index.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">
      <img src="../../../public/img/LOGO.png" alt="Logo" class="logo-image" />
    </div>

    <ul class="nav-menu">
      <li><a href="#">Home</a></li>
      <li><a href="#news">Our News</a></li>
      <li><a href="#team">Our Team</a></li>
      <li><a href="#research">Research</a></li>
      <li><a href="#gallery">Gallery</a></li>
      <li><a href="#contacts">Contacts</a></li>
    </ul>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1>INFORMATION AND LEARNING<br />ENGINEERING TECHNOLOGY</h1>
      <p class="hero-subtitle">
        Find amazing Learning application tailored for you.
      </p>
      <p class="hero-description">
        Handy connects you with amazing Learning Engineering professionals.
      </p>
    </div>
  </section>

  <!-- Cards Section -->
  <div class="cards-container">
    <div class="glass-container">
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-newspaper"></i>
        </div>
        <h3>News</h3>
      </div>
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-users"></i>
        </div>
        <h3>Our Team</h3>
      </div>
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-lightbulb"></i>
        </div>
        <h3>Research</h3>
      </div>
      <div class="card">
        <div class="card-icon">
          <i class="fas fa-envelope"></i>
        </div>
        <h3>Contact Us</h3>
      </div>
    </div>
  </div>

  <!-- Our News Section -->
  <section class="our-news" id="news">
    <h2 class="section-title">Our News</h2>
    <p class="section-subtitle">Read the recent blog posts about our work</p>
    <div class="news-grid">
      <?php if (isset($berita) && !empty($berita)) : ?>
        <?php foreach ($berita as $brt) : ?>
          <!-- News Card -->
          <div class="news-card">
            <img src="<?= BASEURL; ?>/img/berita/<?= htmlspecialchars($brt['video_embed']); ?>" alt="<?= htmlspecialchars($brt['judul']); ?>" />
            <div class="news-content">
              <h3><a href="<?= BASEURL; ?>/home/detail/<?= $brt['id_berita']; ?>" class="news-title-link"><?= htmlspecialchars($brt['judul']); ?></a></h3>
              <p><?= htmlspecialchars(substr(strip_tags($brt['isi']), 0, 100)); ?>...</p>
              <a href="<?= BASEURL; ?>/home/detail/<?= $brt['id_berita']; ?>" class="news-link">
                <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <p>Belum ada berita yang dipublikasikan.</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- Our Team Section -->
  <section class="our-team" id="team">
    <h2 class="section-title">Our Team</h2>
    <div class="team-carousel">
      <button class="carousel-btn prev-btn">
        <i class="fas fa-chevron-left"></i>
      </button>
      <div class="team-container">
        <?php if (isset($anggota) && !empty($anggota)) : ?>
          <?php foreach ($anggota as $a) : ?>
            <div class="team-card">
              <div class="team-image">
                <img src="<?= BASEURL; ?>/img/anggota/<?= !empty($a['foto']) ? htmlspecialchars($a['foto']) : 'default.png'; ?>" alt="<?= htmlspecialchars($a['nama']); ?>" />
              </div>
              <h3><?= htmlspecialchars($a['nama']); ?></h3>
              <p><?= htmlspecialchars($a['jabatan']); ?></p>
              <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <p style="text-align: center; width: 100%;">Belum ada anggota tim yang ditambahkan.</p>
        <?php endif; ?>
      </div>
      <button class="carousel-btn next-btn">
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>
  </section>

  <!-- Recorded Research Activities Section -->
  <style>
    .research-card .btn-detail {
        display: inline-block;
        margin-top: 15px;
        padding: 8px 15px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s;
    }
    .research-card .btn-detail:hover {
        background-color: #0056b3;
    }
  </style>
  <section class="research-activities" id="research">
    <h2 class="section-title">Recorded Research Activities</h2>
    <div class="research-grid">
      <?php if (isset($data['riset']) && !empty($data['riset'])) : ?>
        <?php foreach ($data['riset'] as $riset) : ?>
          <div class="research-card">
            <div class="research-image">
              <img src="<?= BASEURL; ?>/img/riset/<?= htmlspecialchars($riset['file_dokumen']); ?>" alt="<?= htmlspecialchars($riset['judul_riset']); ?>" />
            </div>
            <h3><?= htmlspecialchars($riset['judul_riset']); ?></h3>
            <p><strong>Peneliti:</strong> <?= htmlspecialchars($riset['peneliti']); ?></p>
            <p><?= htmlspecialchars(substr(strip_tags($riset['deskripsi']), 0, 120)); ?>...</p>
            <a href="<?= BASEURL; ?>/home/detail_riset/<?= $riset['id_riset']; ?>" class="btn-detail">Lihat Detail</a>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <p style="text-align: center; width: 100%;">Belum ada riset yang dipublikasikan.</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- Gallery Section -->
  <section class="gallery-section" id="gallery">
    <h2 class="section-title">Watch Our Gallery</h2>
    <div class="gallery-carousel">
      <button class="gallery-btn prev-gallery-btn">
        <i class="fas fa-chevron-left"></i>
      </button>
      <div class="gallery-container">
        <div class="gallery-slide">
          <img src="img/gallery1.jpg" alt="Gallery Image" />
          <p class="gallery-caption">Group Photo Session</p>
          <p class="gallery-date">27 September 2023</p>
        </div>
      </div>
      <button class="gallery-btn next-gallery-btn">
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>
    <div class="gallery-dots">
      <span class="dot active"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>
  </section>

  <!-- Media Partner Section -->
  <section class="media-partner">
    <h2 class="section-title">Media Partner</h2>
    <div class="partner-container">
      <div class="partner-logos">
        <img src="img/partner1.png" alt="Partner 1" />
        <img src="img/partner2.png" alt="Hummatech" />
        <img src="img/partner3.png" alt="ScaDS.AI" />
        <img src="img/partner4.png" alt="Partner 4" />
        <img src="img/partner5.png" alt="DFKI" />
      </div>
    </div>
  </section>

  <!-- Contacts Section -->
  <section class="contacts-section" id="contacts">
    <h2 class="section-title">Contacts</h2>
    <div class="contacts-container">
      <div class="contact-form">
        <h3>Get in Touch</h3>
        <p>One of our specialists will be in contact with you shortly.</p>
        <form>
          <input type="text" placeholder="Name" required />
          <input type="email" placeholder="Email" required />
          <textarea placeholder="Pesan..." rows="5" required></textarea>
          <button type="submit">Submit</button>
        </form>
      </div>
      <div class="contact-info">
        <div class="info-item">
          <i class="fas fa-phone"></i>
          <span>0 (800) 123 45 67</span>
        </div>
        <div class="info-item">
          <i class="fas fa-envelope"></i>
          <span>ilet@polinema.ac.id</span>
        </div>
        <div class="info-item">
          <i class="fas fa-map-marker-alt"></i>
          <span>Jalan...</span>
        </div>
        <div class="map-container">
          <img src="img/map.jpg" alt="Location Map" />
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <p>© Copyright 2025 LETRIG POLNEMA All Rights Reserved.</p>
  </footer>

  <script src="js/index.js"></script>
</body>

</html>