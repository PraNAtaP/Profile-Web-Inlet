<section class="hero" id="home">
  <div class="hero-content">
    <h1>INFORMATION AND LEARNING<br />ENGINEERING TECHNOLOGY</h1>
    <p class="hero-subtitle">Find amazing Learning application tailored for you.</p>
    <p class="hero-description">Handy connects you with amazing Learning Engineering professionals.</p>
  </div>
</section>

<div class="cards-container">
  <div class="glass-container">
    <div class="card">
      <div class="card-icon"><i class="fas fa-newspaper"></i></div>
      <h3>News</h3>
    </div>
    <div class="card">
      <div class="card-icon"><i class="fas fa-users"></i></div>
      <h3>Our Team</h3>
    </div>
    <div class="card">
      <div class="card-icon"><i class="fas fa-lightbulb"></i></div>
      <h3>Research</h3>
    </div>
    <div class="card">
      <div class="card-icon"><i class="fas fa-envelope"></i></div>
      <h3>Contact Us</h3>
    </div>
  </div>
</div>

<section class="our-news" id="news">
  <h2 class="section-title">Our News</h2>
  <p class="section-subtitle">Read the recent blog posts about our work</p>
  <div class="news-grid">
    <?php if (isset($data['berita']) && !empty($data['berita'])) : ?>
      <?php foreach ($data['berita'] as $brt) : ?>
        <div class="news-card">
          <img src="<?= BASEURL; ?>/img/berita/<?= htmlspecialchars($brt['video_embed']); ?>" alt="<?= htmlspecialchars($brt['judul']); ?>" />
          <div class="news-content">
            <h3><a href="<?= BASEURL; ?>/home/detail/<?= $brt['id_berita']; ?>" class="news-title-link"><?= htmlspecialchars($brt['judul']); ?></a></h3>
            <p><?= htmlspecialchars(substr(strip_tags($brt['isi']), 0, 100)); ?>...</p>
            <a href="<?= BASEURL; ?>/home/detail/<?= $brt['id_berita']; ?>" class="news-link"><i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p>Belum ada berita yang dipublikasikan.</p>
    <?php endif; ?>
  </div>
</section>

<section class="our-team" id="team">
  <h2 class="section-title">Our Team</h2>
  <div class="team-carousel">
    <button class="carousel-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
    <div class="team-container">
      <?php if (isset($data['anggota']) && !empty($data['anggota'])) : ?>
        <?php foreach ($data['anggota'] as $a) : ?>
          <div class="team-card">
            <div class="team-image">
              <img src="<?= BASEURL; ?>/img/anggota/<?= !empty($a['foto']) ? htmlspecialchars($a['foto']) : 'default.png'; ?>" alt="<?= htmlspecialchars($a['nama']); ?>" />
            </div>
            <h3><?= htmlspecialchars($a['nama']); ?></h3>
            <p><?= htmlspecialchars($a['jabatan']); ?></p>
          </div>
        <?php endforeach; ?>
      <?php else : ?>
        <p style="text-align: center; width: 100%;">Belum ada anggota tim.</p>
      <?php endif; ?>
    </div>
    <button class="carousel-btn next-btn"><i class="fas fa-chevron-right"></i></button>
  </div>
</section>

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
          <p><?= htmlspecialchars(substr(strip_tags($riset['deskripsi']), 0, 100)); ?>...</p>
          <a href="<?= BASEURL; ?>/home/detail_riset/<?= $riset['id_riset']; ?>" class="btn-detail" style="display:inline-block; margin-top:10px; padding:5px 15px; background:#007bff; color:white; border-radius:5px; text-decoration:none;">Lihat Detail</a>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p style="text-align: center; width: 100%;">Belum ada riset.</p>
    <?php endif; ?>
  </div>
</section>

<section class="gallery-section" id="gallery">
  <h2 class="section-title">Watch Our Gallery</h2>
  <div class="gallery-carousel">
    <button class="gallery-btn prev-gallery-btn"><i class="fas fa-chevron-left"></i></button>
    <div class="gallery-container">
      <?php if (isset($data['galeri']) && !empty($data['galeri'])): ?>
        <?php foreach ($data['galeri'] as $g): ?>
          <div class="gallery-slide">
            <img src="<?= BASEURL; ?>/img/galeri/<?= htmlspecialchars($g['foto']); ?>" alt="<?= htmlspecialchars($g['judul']); ?>" />
            <p class="gallery-caption"><?= htmlspecialchars($g['judul']); ?></p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="gallery-slide">
          <p>Tidak ada foto.</p>
        </div>
      <?php endif; ?>
    </div>
    <button class="gallery-btn next-gallery-btn"><i class="fas fa-chevron-right"></i></button>
  </div>
  <div class="gallery-dots">
    <span class="dot active"></span><span class="dot"></span><span class="dot"></span>
  </div>
</section>

<section class="products-section" id="products">
  <h2 class="section-title">Our Products</h2>
  <p class="section-subtitle">Check out the innovative products from our lab.</p>
  <div class="products-grid">
    <?php if (isset($data['produk']) && !empty($data['produk'])) : ?>
      <?php foreach ($data['produk'] as $p) : ?>
        <div class="product-card">
          <img src="<?= BASEURL; ?>/img/produk/<?= htmlspecialchars($p['gambar']); ?>" alt="<?= htmlspecialchars($p['judul']); ?>">
          <div class="product-content">
            <h3><?= htmlspecialchars($p['judul']); ?></h3>
            <p><?= htmlspecialchars(substr(strip_tags($p['deskripsi']), 0, 80)); ?>...</p>
            <a href="<?= htmlspecialchars($p['link']); ?>" target="_blank" class="btn-lihat">Lihat Produk</a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <p style="text-align: center; width: 100%;">Belum ada produk.</p>
    <?php endif; ?>
  </div>
</section>

<section class="media-partner" id="partners">
  <h2 class="section-title">Media Partner</h2>
  <p class="section-subtitle">We are proud to collaborate with</p>

  <div class="partner-container">
    <div class="partner-logos">
      <?php if (isset($data['partner']) && !empty($data['partner'])) : ?>
        <?php foreach ($data['partner'] as $p) : ?>
          <a href="<?= htmlspecialchars($p['link']); ?>" target="_blank" class="partner-logo-item" title="<?= htmlspecialchars($p['nama']); ?>">
            <img src="<?= BASEURL; ?>/img/partner/<?= htmlspecialchars($p['logo']); ?>" alt="<?= htmlspecialchars($p['nama']); ?>">
          </a>
        <?php endforeach; ?>
      <?php else : ?>
        <p style="text-align: center; width: 100%;">Belum ada media partner.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="contacts-section" id="contacts">
  <h2 class="section-title">Contacts</h2>
  <div class="contacts-container">
    <div class="contact-form">
      <h3>Get in Touch</h3>
      <p>One of our specialists will be in contact with you shortly.</p>
      <form action="<?= BASEURL; ?>/home/kirim_kontak" method="post">
        <input type="text" name="nama" placeholder="Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <textarea name="pesan" placeholder="Pesan..." rows="5" required></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>
    <div class="contact-info">
      <div class="info-item"><i class="fas fa-phone"></i><span>0 (800) 123 45 67</span></div>
      <div class="info-item"><i class="fas fa-envelope"></i><span>ando@polinema.ac.id</span></div>
      <div class="info-item"><i class="fas fa-map-marker-alt"></i><span>Politeknik Negeri Malang</span></div>
      <div class="map-container">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.448906935932!2d112.61502431744384!3d-7.941602994276722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827687d272e7%3A0x789ce9a636cd3aa2!2sPoliteknik%20Negeri%20Malang!5e0!3m2!1sid!2sid!4v1678901234567!5m2!1sid!2sid"
          width="100%"
          height="100%"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</section>