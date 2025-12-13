<section class="hero" id="home">
  <div class="hero-content">
    <h1>INFORMATION AND LEARNING<br />ENGINEERING TECHNOLOGY</h1>
    <p class="hero-subtitle">Find amazing Learning application tailored for you.</p>
    <p class="hero-description">Handy connects you with amazing Learning Engineering professionals.</p>
  </div>
</section>
<div class="cards-container">
  <div class="glass-container">
    <a href="#news" class="card">
      <div class="card-icon"><i class="fas fa-newspaper"></i></div>
      <h3>News</h3>
    </a>
    <a href="#team" class="card">
      <div class="card-icon"><i class="fas fa-users"></i></div>
      <h3>Our Team</h3>
    </a>
    <a href="#research" class="card">
      <div class="card-icon"><i class="fas fa-lightbulb"></i></div>
      <h3>Research</h3>
    </a>
    <a href="#contacts" class="card">
      <div class="card-icon"><i class="fas fa-envelope"></i></div>
      <h3>Contact Us</h3>
    </a>
  </div>
</div>

<section class="our-news" id="news">
  <h2 class="section-title">Our News</h2>
  <p class="section-subtitle">Read the recent blog posts about our work</p>
  <div style="position: relative;">
    <div class="swiper newsSwiper">
      <div class="swiper-wrapper">
        <?php if (isset($data['berita']) && !empty($data['berita'])) : ?>
          <?php foreach ($data['berita'] as $brt) : ?>
            <div class="swiper-slide">
              <div class="news-card">
                <img src="<?= BASEURL; ?>/img/berita/<?= htmlspecialchars($brt['gambar']); ?>" alt="<?= htmlspecialchars($brt['judul']); ?>" />
                <div class="news-content">
                  <h3>
                    <a href="<?= BASEURL; ?>/home/detail/<?= $brt['id_berita']; ?>" class="news-title-link">
                      <?= htmlspecialchars($brt['judul']); ?>
                    </a>
                  </h3>
                  <p><?= htmlspecialchars(substr(strip_tags($brt['isi']), 0, 50)); ?>...</p>
                  <a href="<?= BASEURL; ?>/home/detail/<?= $brt['id_berita']; ?>" class="news-link">
                    <i class="fas fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="swiper-slide">
            <p style="color: white; text-align: center; width: 100%;">Belum ada berita.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>
<section class="our-team" id="team">
  <h2 class="section-title">Our Team</h2>
  <div class="team-box-container">
    <div class="swiper myCardSwiper">
      <div class="swiper-wrapper">
        <?php if (isset($data['anggota']) && !empty($data['anggota'])) : ?>
          <?php foreach ($data['anggota'] as $a) : ?>
            <div class="swiper-slide">
              <div class="team-card">
                <div class="card-header-blue"></div>
                <div class="team-image">
                  <img src="<?= BASEURL; ?>/img/anggota/<?= !empty($a['foto']) ? htmlspecialchars($a['foto']) : 'default.png'; ?>" alt="<?= htmlspecialchars($a['nama']); ?>" />
                </div>
                <h3><?= htmlspecialchars($a['nama']); ?></h3>
                <p><?= htmlspecialchars($a['jabatan']); ?></p>
                <p><?= htmlspecialchars($a['email']); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <p style="text-align: center; color: white; width: 100%;">Belum ada anggota tim.</p>
        <?php endif; ?>
      </div>
    </div>
    <div class="swiper-button-prev-card">
    </div>
    <div class="swiper-button-next-card">
    </div>
  </div>
</section>
<section class="research-activities" id="research">
  <h2 class="section-title" style="color: #ffffffff;">Recorded Research Activities</h2>
  <p class="section-subtitle">Click on the card to watch our Recorded Research Activities</p>
  <div style="position: relative;">
    <div class="swiper researchSwiper">
      <div class="swiper-wrapper">
        <?php if (isset($data['riset']) && !empty($data['riset'])) : ?>
          <?php foreach ($data['riset'] as $riset) : ?>
            <div class="swiper-slide">
              <div class="research-card">
                <div class="research-image">
                  <img src="<?= BASEURL; ?>/img/riset/<?= htmlspecialchars($riset['file_dokumen']); ?>" alt="<?= htmlspecialchars($riset['judul_riset']); ?>" />
                </div>
                <div class="research-content">
                  <h3><?= htmlspecialchars($riset['judul_riset']); ?></h3>
                  <div class="researcher-name">
                    <i class="fas fa-user-circle"></i>
                    <?= htmlspecialchars($riset['peneliti']); ?>
                  </div>
                  <p><?= htmlspecialchars(substr(strip_tags($riset['deskripsi']), 0, 150)); ?>...</p>
                  <a href="<?= BASEURL; ?>/home/detail_riset/<?= $riset['id_riset']; ?>" class="research-btn">
                    <i class="fas fa-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="swiper-slide">
            <p style="text-align: center; width: 100%; color: #333;">Belum ada riset.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="swiper-button-prev-research"><i class="fas fa-chevron-left"></i></div>
    <div class="swiper-button-next-research"><i class="fas fa-chevron-right"></i></div>
  </div>
</section>
<section class="gallery-section" id="gallery">
  <h2 class="section-title">Watch Our Gallery</h2>
  <div class="gallery-card-container">
    <div class="swiper myGallerySwiper">
      <div class="swiper-wrapper">
        <?php if (isset($data['galeri']) && !empty($data['galeri'])): ?>
          <?php foreach ($data['galeri'] as $g): ?>
            <div class="swiper-slide">
              <div class="gallery-image-wrapper">
                <img src="<?= BASEURL; ?>/img/galeri/<?= htmlspecialchars($g['foto']); ?>" alt="<?= htmlspecialchars($g['judul']); ?>" />
                <div class="gallery-overlay">
                  <h3><?= htmlspecialchars($g['judul']); ?></h3>
                  <p><?= date('d F Y'); ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="swiper-slide">
            <div class="gallery-image-wrapper" style="background: #eee; display:flex; align-items:center; justify-content:center;">
              <p style="color:#666;">Tidak ada foto galeri.</p>
            </div>
          </div>
        <?php endif; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <a href="<?= BASEURL; ?>/home/detail_galeri/" class="btn-detail-gallery">
      Detail Gallery <i class="fas fa-arrow-right"></i>
    </a>
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
            <p><?= htmlspecialchars($p['deskripsi']); ?></p>
            <a href="<?= htmlspecialchars($p['link']); ?>" target="_blank" class="btn-lihat">Try Now</a>
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
        <input type="institution" name="institution" placeholder="Institution/Organization" required />
        <textarea name="pesan" placeholder="Pesan..." rows="5" required></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>
    <div class="contact-info">
      <div class="info-item"><i class="fas fa-phone"></i><span>(0341) 404424</span></div>
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