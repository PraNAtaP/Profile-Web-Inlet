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

var swiper = new Swiper(".myCardSwiper", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  grabCursor: true,
  centeredSlides: false,
  navigation: {
    nextEl: ".swiper-button-next-card",
    prevEl: ".swiper-button-prev-card",
  },
  breakpoints: {
    576: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 25,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 30,
    },
    1280: {
      slidesPerView: 5,
      spaceBetween: 30,
    },
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

var swiperResearch = new Swiper(".researchSwiper", {
  slidesPerView: 1,
  grid: {
    rows: 2,
    fill: "row",
  },
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-next-research",
    prevEl: ".swiper-button-prev-research",
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
      grid: {
        rows: 2,
        fill: "row",
      },
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 3,
      grid: {
        rows: 2,
        fill: "row",
      },
      spaceBetween: 30,
    },
  },
});

var gallerySwiper = new Swiper(".myGallerySwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

var productSwiper = new Swiper(".productSwiper", {
  slidesPerView: 1,
  grid: {
    rows: 2,
    fill: "row",
  },
  spaceBetween: 30,
  watchOverflow: true,
  navigation: {
    nextEl: ".swiper-button-next-product",
    prevEl: ".swiper-button-prev-product",
  },
  breakpoints: {
    768: {
      slidesPerView: 1,
      grid: {
        rows: 2,
        fill: "row",
      },
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 2,
      grid: {
        rows: 2,
        fill: "row",
      },
      spaceBetween: 30,
    },
  },
});
