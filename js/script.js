document.addEventListener('DOMContentLoaded', () => {
  const nav = document.getElementById('main-nav');
  const revealTargets = document.querySelectorAll('.reveal');

  // ── Reveal Animations ──
  if ('IntersectionObserver' in window) {
    window.revealObserver = new IntersectionObserver(
      (entries) => entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          window.revealObserver.unobserve(entry.target);
        }
      }),
      {
        threshold: 0.01,
        rootMargin: '0px 0px -8% 0px',
      }
    );
    revealTargets.forEach((el) => {
      if (el.offsetHeight > (window.innerHeight * 1.2)) {
        el.classList.add('visible');
        return;
      }
      window.revealObserver.observe(el);
    });
  } else {
    revealTargets.forEach((el) => el.classList.add('visible'));
  }

  // ── Embla Carousels (Guarded) ──
  if (typeof EmblaCarousel !== 'undefined') {
    document.querySelectorAll('.collection-slider').forEach(wrapper => {
      try {
        const embla = EmblaCarousel(wrapper, { loop: true, dragFree: false, duration: 12 });
        const prev  = wrapper.querySelector('.slider-arrow.prev');
        const next  = wrapper.querySelector('.slider-arrow.next');
        if (prev) prev.addEventListener('click', () => embla.scrollPrev());
        if (next) next.addEventListener('click', () => embla.scrollNext());
      } catch (err) {
        console.warn('EmblaCarousel initialization warning:', err);
      }
    });
  }

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

  // Gallery data: injected by PHP on room-details.php / gallery.php
  let activeGallery = window.roomGallery || [];
  let lightBoxIndex = 0;

  const openLightbox = (index, gallery) => {
    if (gallery) activeGallery = gallery;
    lightBoxIndex = index;
    if (!activeGallery || !activeGallery.length) return;
    lightboxImg.src              = activeGallery[lightBoxIndex].url;
    lightboxCaption.textContent  = activeGallery[lightBoxIndex].title || '';
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
    if (lightboxClose) lightboxClose.focus();
  };

  const closeLightbox = () => {
    if (!lightbox) return;
    lightbox.classList.remove('active');
    document.body.style.overflow = '';
  };

  const showNext = () => {
    if (!activeGallery || !activeGallery.length) return;
    lightBoxIndex = (lightBoxIndex + 1) % activeGallery.length;
    lightboxImg.src             = activeGallery[lightBoxIndex].url;
    lightboxCaption.textContent = activeGallery[lightBoxIndex].title || '';
  };

  const showPrev = () => {
    if (!activeGallery || !activeGallery.length) return;
    lightBoxIndex = (lightBoxIndex - 1 + activeGallery.length) % activeGallery.length;
    lightboxImg.src             = activeGallery[lightBoxIndex].url;
    lightboxCaption.textContent = activeGallery[lightBoxIndex].title || '';
  };

  // ── Room Gallery Lightbox Trigger ──
  const roomGallerySwiper = document.querySelector('.room-gallery-swiper');
  if (roomGallerySwiper) {
    roomGallerySwiper.addEventListener('click', e => {
      const slide = e.target.closest('.room-gallery-slide');
      if (slide && slide.dataset.index !== undefined) {
        openLightbox(parseInt(slide.dataset.index, 10), window.roomGallery);
      }
    });
  }

  // Full gallery page grid
  const pageGallery = document.querySelector('.gallery-grid-page');
  if (pageGallery) {
    pageGallery.addEventListener('click', e => {
      const item = e.target.closest('.gallery-grid-item');
      if (item && item.dataset.index !== undefined) {
        openLightbox(parseInt(item.dataset.index, 10), window.roomGallery);
      }
    });
  }

  if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
  if (lightboxNext)  lightboxNext.addEventListener('click',  showNext);
  if (lightboxPrev)  lightboxPrev.addEventListener('click',  showPrev);
  if (lightbox)      lightbox.addEventListener('click', e => { if (e.target === lightbox) closeLightbox(); });

  // ── Mobile Menu Controls & ARIA Sync ──
  const hamburger   = document.getElementById('nav-hamburger');
  const mobileMenu  = document.getElementById('mobile-menu');
  const menuOverlay = document.getElementById('mobile-menu-overlay');
  const menuClose   = document.getElementById('mobile-menu-close');

  const openMenu = () => {
    if (!mobileMenu || !menuOverlay) return;
    mobileMenu.classList.add('open');
    menuOverlay.classList.add('open');
    if (hamburger) hamburger.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
    if (menuClose) menuClose.focus();
  };

  const closeMenu = () => {
    if (!mobileMenu || !menuOverlay) return;
    mobileMenu.classList.remove('open');
    menuOverlay.classList.remove('open');
    if (hamburger) hamburger.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  };

  if (hamburger && mobileMenu && menuOverlay && menuClose) {
    hamburger.addEventListener('click', openMenu);
    menuClose.addEventListener('click', closeMenu);
    menuOverlay.addEventListener('click', closeMenu);

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
        if (parent) {
          const isOpen = parent.classList.toggle('open');
          btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        }
      });
    });
  }

  // ── Global Keyboard Shortcuts ──
  document.addEventListener('keydown', (e) => {
    if (lightbox && lightbox.classList.contains('active')) {
      if (e.key === 'Escape') {
        closeLightbox();
      } else if (e.key === 'ArrowRight') {
        showNext();
      } else if (e.key === 'ArrowLeft') {
        showPrev();
      }
    } else if (mobileMenu && mobileMenu.classList.contains('open')) {
      if (e.key === 'Escape') {
        closeMenu();
      }
    }
  });

  // ── SwiperJS: Gallery (Guarded) ──
  if (typeof Swiper !== 'undefined') {
    const gallerySwiperEl = document.querySelector('.gallery-swiper');
    if (gallerySwiperEl) {
      const gallerySlideCount = gallerySwiperEl.querySelectorAll('.swiper-slide').length;
      new Swiper('.gallery-swiper', {
        slidesPerView: 1.15,
        spaceBetween: 24,
        loop: gallerySlideCount > 4,
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

    const roomGallerySwiperEl = document.querySelector('.room-gallery-swiper');
    if (roomGallerySwiperEl) {
      const roomGallerySlideCount = roomGallerySwiperEl.querySelectorAll('.swiper-slide').length;

      new Swiper('.room-gallery-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: roomGallerySlideCount > 4,
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
  }
});
