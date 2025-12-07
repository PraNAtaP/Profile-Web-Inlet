document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute("href"));
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
      });
    }
  });
});

document.querySelectorAll(".card").forEach((card) => {
  card.addEventListener("click", function () {
    this.style.transform = "scale(0.95)";
    setTimeout(() => {
      this.style.transform = "";
    }, 200);
  });
});

const gallerySwiper = new Swiper(".myGallerySwiper", {
  loop: true,
  effect: "fade",
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

const cardSwiper = new Swiper(".myCardSwiper", {
  slidesPerView: 1,
  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next-card",
    prevEl: ".swiper-button-prev-card",
  },
  breakpoints: {
    640: { slidesPerView: 2 }, // Tablet Kecil
    768: { slidesPerView: 3 }, // Tablet
    1024: { slidesPerView: 4 }, // Desktop (Muncul 4, sisanya slide)
  },
});

var newsSwiper = new Swiper(".newsSwiper", {
  slidesPerView: 1,
  grid: {
    rows: 2,
    fill: "row",
  },
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    768: {
      slidesPerView: 2,
      grid: { rows: 2 },
    },
    1024: {
      slidesPerView: 3,
      grid: { rows: 2 },
    },
    1280: {
      slidesPerView: 4,
      grid: { rows: 2 },
    },
  },
});

// Config Research Swiper (2x2 GIANT & TIGHT)
var researchSwiper = new Swiper(".researchSwiper", {
  slidesPerView: 1, // HP: 1 Kartu Full
  grid: {
    rows: 2,
    fill: "row",
  },
  spaceBetween: 15, // JARAK RAPET (Sesuai Request)
  navigation: {
    nextEl: ".swiper-button-next-research",
    prevEl: ".swiper-button-prev-research",
  },
  breakpoints: {
    768: {
      slidesPerView: 2, // Tablet: 2 Kolom
      grid: { rows: 2 },
      spaceBetween: 15,
    },
    1024: {
      slidesPerView: 2, // Desktop: 2 Kolom (Biar LEBAR BANGET)
      grid: { rows: 2 },
      spaceBetween: 15, // Jarak pas
    },
  },
});
