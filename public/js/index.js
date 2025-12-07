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

// 1. Config Gallery Slider (Slide Satu-satu)
const gallerySwiper = new Swiper('.myGallerySwiper', {
    loop: true,
    effect: 'fade', // Efek pudar biar elegan
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

// 2. Config Card Slider (Slide Banyak/Multi Item)
const cardSwiper = new Swiper('.myCardSwiper', {
    slidesPerView: 1, // Default HP
    spaceBetween: 20,
    navigation: {
        nextEl: '.swiper-button-next-card',
        prevEl: '.swiper-button-prev-card',
    },
    breakpoints: {
        640: { slidesPerView: 2 }, // Tablet Kecil
        768: { slidesPerView: 3 }, // Tablet
        1024: { slidesPerView: 4 }, // Desktop (Muncul 4, sisanya slide)
    },
});
