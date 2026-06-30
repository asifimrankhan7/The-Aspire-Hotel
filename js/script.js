document.addEventListener('DOMContentLoaded', () => {
  const nav = document.getElementById('main-nav');

  // ── Reveal Animations ──
  window.revealObserver = new IntersectionObserver(
    (entries) => entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); }),
    { threshold: 0.12 }
  );
  document.querySelectorAll('.reveal').forEach(el => window.revealObserver.observe(el));

  // ── Embla Carousels ──
  document.querySelectorAll('.collection-slider').forEach(wrapper => {
    const embla = EmblaCarousel(wrapper, { loop: true, dragFree: false, duration: 12 });
    const prev  = wrapper.querySelector('.slider-arrow.prev');
    const next  = wrapper.querySelector('.slider-arrow.next');
    if (prev) prev.addEventListener('click', () => embla.scrollPrev());
    if (next) next.addEventListener('click', () => embla.scrollNext());
  });

  // ── Scroll: Nav + Back-to-Top ──
  let isScrolled = false;
  let isBttVisible = false;
  const backToTopBtn = document.getElementById('back-to-top');

  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    const shouldScroll = scrollY > 60;
    const shouldBttVisible = scrollY > 400;

    if (nav && shouldScroll !== isScrolled) {
      isScrolled = shouldScroll;
      nav.classList.toggle('scrolled', isScrolled);
    }

    if (shouldBttVisible !== isBttVisible) {
      isBttVisible = shouldBttVisible;
      if (backToTopBtn) backToTopBtn.classList.toggle('visible', isBttVisible);
    }
  }, { passive: true });

  if (backToTopBtn) {
    backToTopBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
  }

  // ── Lightbox ──
  const lightbox        = document.getElementById('lightbox');
  const lightboxImg     = document.getElementById('lightbox-img');
  const lightboxCaption = document.getElementById('lightbox-caption');
  const lightboxClose   = document.querySelector('.lightbox-close');
  const lightboxPrev    = document.querySelector('.lightbox-prev');
  const lightboxNext    = document.querySelector('.lightbox-next');

  // Gallery data: injected by PHP on room-details.php, or derived from DOM on index.php
  let activeGallery = window.roomGallery || [];
  let lightBoxIndex = 0;

  const openLightbox = (index, gallery) => {
    if (gallery) activeGallery = gallery;
    lightBoxIndex = index;
    if (!activeGallery.length) return;
    lightboxImg.src              = activeGallery[lightBoxIndex].url;
    lightboxCaption.textContent  = activeGallery[lightBoxIndex].title;
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
  };

  const closeLightbox = () => {
    lightbox.classList.remove('active');
    document.body.style.overflow = '';
  };

  const showNext = () => {
    lightBoxIndex = (lightBoxIndex + 1) % activeGallery.length;
    lightboxImg.src             = activeGallery[lightBoxIndex].url;
    lightboxCaption.textContent = activeGallery[lightBoxIndex].title;
  };

  const showPrev = () => {
    lightBoxIndex = (lightBoxIndex - 1 + activeGallery.length) % activeGallery.length;
    lightboxImg.src             = activeGallery[lightBoxIndex].url;
    lightboxCaption.textContent = activeGallery[lightBoxIndex].title;
  };

  // ── Room Gallery Lightbox ──
  const roomGallerySwiper = document.querySelector('.room-gallery-swiper');
  if (roomGallerySwiper) {
    roomGallerySwiper.addEventListener('click', e => {
      const slide = e.target.closest('.room-gallery-slide');
      if (slide) openLightbox(parseInt(slide.dataset.index), window.roomGallery);
    });

    new Swiper('.room-gallery-swiper', {
      slidesPerView: 1,
      spaceBetween: 20,
      loop: true,
      grabCursor: true,
      pagination: {
        el: '.room-gallery-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.room-gallery-swiper .swiper-button-next',
        prevEl: '.room-gallery-swiper .swiper-button-prev',
      },
      breakpoints: {
        640: { slidesPerView: 1.2, spaceBetween: 24 },
        768: { slidesPerView: 1.5, spaceBetween: 28 },
        1024: { slidesPerView: 1.8, spaceBetween: 30 }
      }
    });
  }

  // Full gallery page grid
  const pageGallery = document.querySelector('.gallery-grid-page');
  if (pageGallery) {
    pageGallery.addEventListener('click', e => {
      const item = e.target.closest('.gallery-grid-item');
      if (item) openLightbox(parseInt(item.dataset.index), window.roomGallery);
    });
  }

  if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
  if (lightboxNext)  lightboxNext.addEventListener('click',  showNext);
  if (lightboxPrev)  lightboxPrev.addEventListener('click',  showPrev);
  if (lightbox)      lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });

  // ── Mobile Menu ──
  const hamburger   = document.getElementById('nav-hamburger');
  const mobileMenu  = document.getElementById('mobile-menu');
  const menuOverlay = document.getElementById('mobile-menu-overlay');
  const menuClose   = document.getElementById('mobile-menu-close');

  if (hamburger && mobileMenu && menuOverlay && menuClose) {
    const openMenu  = () => { mobileMenu.classList.add('open'); menuOverlay.classList.add('open'); document.body.style.overflow = 'hidden'; };
    const closeMenu = () => { mobileMenu.classList.remove('open'); menuOverlay.classList.remove('open'); document.body.style.overflow = ''; };

    hamburger.addEventListener('click', openMenu);
    menuClose.addEventListener('click', closeMenu);
    menuOverlay.addEventListener('click', closeMenu);
    
    // Updated listener for mobile links: don't close if it has subnav or is a toggle
    document.querySelectorAll('.mobile-nav-links a').forEach(a => {
      a.addEventListener('click', () => {
        closeMenu();
      });
    });

    // Mobile Subnav Toggle
    document.querySelectorAll('.subnav-toggle').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        const parent = btn.closest('.has-subnav');
        parent.classList.toggle('open');
      });
    });
  }



  // ── SwiperJS: Gallery ──
  if (document.querySelector('.gallery-swiper')) {
    new Swiper('.gallery-swiper', {
      slidesPerView: 1.15,
      spaceBetween: 24,
      loop: true,
      centeredSlides: true,
      grabCursor: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      pagination: {
        el: '.gallery-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        640: { slidesPerView: 1.5, spaceBetween: 24 },
        768: { slidesPerView: 2.2, spaceBetween: 28 },
        1024: { slidesPerView: 2.8, spaceBetween: 30 }
      }
    });
  }
});
