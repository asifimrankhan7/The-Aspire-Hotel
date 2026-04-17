// ── Generic Slider System ──
class SimpleSlider {
  constructor(el, options = {}) {
    this.el = el;
    this.track = el.querySelector(".slider-track");
    this.slides = Array.from(el.querySelectorAll(".slider-slide"));
    this.dotsContainer = el.querySelector(".slider-dots");

    // Look for arrows inside OR in the immediate parent (for layering fixes)
    this.btnPrev =
      el.querySelector(".slider-arrow.prev") ||
      el.parentElement.querySelector(".slider-arrow.prev");
    this.btnNext =
      el.querySelector(".slider-arrow.next") ||
      el.parentElement.querySelector(".slider-arrow.next");

    if (!this.track || this.slides.length === 0) return;

    this.currentIndex = 0;
    this.type = el.getAttribute("data-slider"); // 'hero' or 'room-collection'
    this.autoPlayDelay =
      options.delay || (this.type === "hero" ? 6000 : 0);
    this.intervalId = null;

    this.init();
  }

  init() {
    if (this.slides.length <= 1) return;

    // Create dots if container exists
    if (this.dotsContainer) {
      this.slides.forEach((_, i) => {
        const dot = document.createElement("button");
        dot.classList.add("slider-dot");
        if (i === 0) dot.classList.add("active");
        dot.addEventListener("click", () => this.goTo(i));
        this.dotsContainer.appendChild(dot);
      });
      this.dots = Array.from(
        this.dotsContainer.querySelectorAll(".slider-dot"),
      );
    }

    // Events
    if (this.btnPrev)
      this.btnPrev.addEventListener("click", () => this.prev());
    if (this.btnNext)
      this.btnNext.addEventListener("click", () => this.next());

    // Auto play
    if (this.autoPlayDelay > 0) {
      this.startAutoPlay();
      this.el.addEventListener("mouseenter", () => this.stopAutoPlay());
      this.el.addEventListener("mouseleave", () => this.startAutoPlay());
    }

    // Touch support
    let startX = 0;
    this.el.addEventListener(
      "touchstart",
      (e) => (startX = e.touches[0].clientX),
      { passive: true },
    );
    this.el.addEventListener(
      "touchend",
      (e) => {
        const endX = e.changedTouches[0].clientX;
        if (startX - endX > 50) this.next();
        if (endX - startX > 50) this.prev();
      },
      { passive: true },
    );
  }

  goTo(index) {
    this.currentIndex = (index + this.slides.length) % this.slides.length;
    this.track.style.transform = `translateX(-${
      this.currentIndex * 100
    }%)`;

    // Update dots
    if (this.dots) {
      this.dots.forEach((dot, i) => {
        dot.classList.toggle("active", i === this.currentIndex);
      });
    }
  }

  next() {
    this.goTo(this.currentIndex + 1);
  }
  prev() {
    this.goTo(this.currentIndex - 1);
  }

  startAutoPlay() {
    this.intervalId = setInterval(() => this.next(), this.autoPlayDelay);
  }

  stopAutoPlay() {
    clearInterval(this.intervalId);
  }
}

// ── Main Initialization ──
document.addEventListener("DOMContentLoaded", () => {
  const nav = document.getElementById("main-nav");
  const reveals = document.querySelectorAll(".reveal");

  // Reveal animations
  window.revealObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    },
    { threshold: 0.12 },
  );

  reveals.forEach((el) => window.revealObserver.observe(el));

  // Sliders
  const sliderEls = document.querySelectorAll("[data-slider]");
  sliderEls.forEach((el) => new SimpleSlider(el));

  // Scroll logic
  window.addEventListener("scroll", () => {
    if (!nav) return;
    if (window.scrollY > 60) {
      nav.classList.add("scrolled");
    } else {
      nav.classList.remove("scrolled");
    }

    // Back to top visibility
    const backToTopBtn = document.getElementById("back-to-top");
    if (backToTopBtn) {
      if (window.scrollY > 400) {
        backToTopBtn.classList.add("visible");
      } else {
        backToTopBtn.classList.remove("visible");
      }
    }
  });

  const backToTopBtn = document.getElementById("back-to-top");
  if (backToTopBtn) {
    backToTopBtn.addEventListener("click", () => {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });
  }

  // ── Section Navbar Tracking (Clone logic) ──
  const sectionTabs = document.querySelectorAll(".section-tab");

  if (sectionTabs.length > 0) {
    // Smooth Scroll on Click
    sectionTabs.forEach((tab) => {
      tab.addEventListener("click", (e) => {
        e.preventDefault();
        const targetId = tab.getAttribute("data-target");
        const targetEl = document.getElementById(targetId);
        if (targetEl) {
          const navHeight = document.getElementById("main-nav").offsetHeight;
          const sectionNavContainer = document.getElementById(
            "section-nav-container",
          );
          const currentSectionNavHeight = sectionNavContainer.offsetHeight;
          const totalOffset = navHeight + currentSectionNavHeight - 2;

          const elementPosition = targetEl.getBoundingClientRect().top;
          const offsetPosition =
            elementPosition + window.pageYOffset - totalOffset;

          window.scrollTo({
            top: offsetPosition,
            behavior: "smooth",
          });
        }
      });
    });

    // Intersection Observer for Active State
    const observerOptions = {
      root: null,
      rootMargin: "-20% 0px -70% 0px",
      threshold: 0,
    };

    const sectionObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const targetId = entry.target.id;
          sectionTabs.forEach((btn) => {
            if (btn.getAttribute("data-target") === targetId) {
              btn.classList.add("active");
            } else {
              btn.classList.remove("active");
            }
          });
        }
      });
    }, observerOptions);

    // Observe main sections
    ["home", "rooms", "services", "explore", "news-offers", "contact"].forEach(
      (id) => {
        const el = document.getElementById(id);
        if (el) sectionObserver.observe(el);
      },
    );
  }

  // ── Room Details Population ──
  const isDetailsPage = window.location.href.includes('room-details');
  let currentRoomData = null;

  if (isDetailsPage) {
    const params = new URLSearchParams(window.location.search);
    const roomType = params.get('type') || 'royale'; // Fallback to royale
    currentRoomData = window.roomsData ? window.roomsData[roomType] : null;

    if (!currentRoomData && window.roomsData) {
        // If the specific type is not found, try to find any available room
        const availableTypes = Object.keys(window.roomsData);
        if (availableTypes.length > 0) {
            currentRoomData = window.roomsData[availableTypes[0]];
        }
    }

    if (currentRoomData) {
      document.title = `${currentRoomData.name} – The Aspire Hotel`;
      
      // Basic Info
      const roomNameEl = document.querySelector('#room-name');
      const roomPriceValEl = document.querySelector('#room-price-val');
      const detailsHeroImgEl = document.querySelector('#details-hero-img');
      const detailsDescEl = document.querySelector('#details-desc');
      const bookingPriceEl = document.querySelector('#booking-price');

      if (roomNameEl) roomNameEl.textContent = currentRoomData.name;
      if (roomPriceValEl) roomPriceValEl.textContent = currentRoomData.price;
      if (detailsHeroImgEl) detailsHeroImgEl.src = currentRoomData.gallery[0].url;
      if (detailsDescEl) detailsDescEl.textContent = currentRoomData.description;
      if (bookingPriceEl) bookingPriceEl.textContent = currentRoomData.price;
      
      // Stats
      const statSizeEl = document.querySelector('#stat-size');
      const statBedsEl = document.querySelector('#stat-beds');
      const statGuestsEl = document.querySelector('#stat-guests');
      const statViewEl = document.querySelector('#stat-view');

      if (statSizeEl) statSizeEl.textContent = currentRoomData.size;
      if (statBedsEl) statBedsEl.textContent = currentRoomData.beds;
      if (statGuestsEl) statGuestsEl.textContent = currentRoomData.guests;
      if (statViewEl) statViewEl.textContent = currentRoomData.view;
    }
  }

  // Amenities Icon Helper
  const getIcon = (iconName) => {
    const icons = {
      wifi: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5 12.55a11 11 0 0114.08 0M1.42 9a16 16 0 0121.16 0M8.53 16.11a6 6 0 016.95 0M12 20h.01"/></svg>',
      tv: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="20" height="13" rx="2"/><path d="M12 20v2m-5 0h10M7 2l5 5 5-5"/></svg>',
      coffee: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8zM6 1v3M10 1v3M14 1v3"/></svg>',
      thermometer: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 4v10.54a4 4 0 11-4 0V4a2 2 0 114 0z"/></svg>',
      sparkles: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 3l1.91 5.82L20 10l-6.09 1.18L12 17l-1.91-5.82L4 10l6.09-1.18L12 3zM5 3l.75 2.25L8 6l-2.25.75L5 9l-.75-2.25L2 6l2.25-.75L5 3z"/></svg>',
      'check-circle': '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14M22 4L12 14.01l-3-3"/></svg>',
      utensils: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 002-2V2M7 2v20M21 15V2v0a5 5 0 00-5 5v6c0 1.1.9 2 2 2h3zM18 15v7"/></svg>',
      droplet: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22a7 7 0 007-7c0-2-1-3.9-3-5.5L12 2 8 9.5c-2 1.6-3 3.5-3 5.5a7 7 0 007 7z"/></svg>',
      heart: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>',
      shield: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
      'user-check': '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="8.5" cy="7" r="4"/><path d="M17 11l2 2 4-4"/></svg>',
      truck: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="1" y="3" width="15" height="13"/><path d="M16 8h4l3 3v5h-7V8zM5.5 21a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM17.5 21a2.5 2.5 0 100-5 2.5 2.5 0 000 5z"/></svg>',
      activity: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
      briefcase: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>',
      archive: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 8v13H3V8M1 3h22v5H1V3zM10 12h4"/></svg>',
      key: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 11-7.778 7.778 5.5 5.5 0 017.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3-3.5 3.5z"/></svg>',
      'volume-x': '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M11 5L6 9H2v6h4l5 4V5zM23 9l-6 6M17 9l6 6"/></svg>',
      'volume-2': '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M11 5L6 9H2v6h4l5 4V5zM19.07 4.93a10 10 0 010 14.14M15.54 8.46a5 5 0 010 7.07"/></svg>',
      feather: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.24 12.24a6 6 0 00-8.49-8.49L5 10.5V19h8.5l6.74-6.76zM16 8L2 22M17.5 15H9"/></svg>',
      'battery-charging': '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5 18H3a2 2 0 01-2-2V8a2 2 0 012-2h3.19M15 6h2a2 2 0 012 2v8a2 2 0 01-2 2h-3.19M23 13h-2M11 6l-4 6h6l-4 6"/></svg>',
      users: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>',
      bell: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0"/></svg>',
      layout: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>',
      'glass-water': '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M15.2 22H8.8a2 2 0 01-2-1.79L5 3h14l-1.81 17.21a2 2 0 01-2 1.79zM6 12h12"/></svg>',
      'shield-check': '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10zM9 12l2 2 4-4"/></svg>',
      sun: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>',
      map: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 6l7-3 8 3 7-3v15l-7 3-8-3-7 3V6zM8 3v15M16 6v15"/></svg>',
      'map-pin': '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>'
    };
    return icons[iconName] || '';
  };

  if (isDetailsPage && currentRoomData) {
    // Populate Amenities Grids
    const roomAmGrid = document.querySelector('#room-amenities-grid');
    if (roomAmGrid) {
      roomAmGrid.innerHTML = currentRoomData.roomAmenities.map(am => `
        <div class="amenity-item reveal">
          <div class="amenity-icon">${getIcon(am.icon)}</div>
          <span class="amenity-name">${am.name}</span>
        </div>
      `).join('');
      
      // Register new items with observer
      roomAmGrid.querySelectorAll('.reveal').forEach(el => window.revealObserver.observe(el));
    }

    const hotelAmGrid = document.querySelector('#hotel-amenities-grid');
    if (hotelAmGrid) {
      hotelAmGrid.innerHTML = currentRoomData.hotelAmenities.map(am => `
        <div class="amenity-item reveal">
          <div class="amenity-icon">${getIcon(am.icon)}</div>
          <span class="amenity-name">${am.name}</span>
        </div>
      `).join('');
      
      // Register new items with observer
      hotelAmGrid.querySelectorAll('.reveal').forEach(el => window.revealObserver.observe(el));
    }

    // Populate Gallery Grid
    const galleryGrid = document.querySelector('#gallery-grid');
    if (galleryGrid) {
      galleryGrid.innerHTML = currentRoomData.gallery.map((img, idx) => `
        <div class="gallery-item-new reveal" data-index="${idx}">
          <img src="${img.url}" alt="${img.title}" loading="lazy">
          <div class="gallery-label">${img.title}</div>
        </div>
      `).join('');
      
      // Register new items with observer
      galleryGrid.querySelectorAll('.reveal').forEach(el => window.revealObserver.observe(el));
    }
  }

  // ── LIGHTBOX LOGIC ──
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightbox-img');
  const lightboxCaption = document.getElementById('lightbox-caption');
  const lightboxClose = document.querySelector('.lightbox-close');
  const lightboxPrev = document.querySelector('.lightbox-prev');
  const lightboxNext = document.querySelector('.lightbox-next');
  
  let activeGallery = currentRoomData ? currentRoomData.gallery : [];
  let lightBoxIndex = 0;

  const openLightbox = (index, gallery) => {
    activeGallery = gallery || activeGallery;
    lightBoxIndex = index;
    if (activeGallery.length > 0) {
      lightboxImg.src = activeGallery[lightBoxIndex].url;
      lightboxCaption.textContent = activeGallery[lightBoxIndex].title;
      lightbox.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
  };

  const closeLightbox = () => {
    if (lightbox) lightbox.classList.remove('active');
    document.body.style.overflow = '';
  };

  const showNext = () => {
    lightBoxIndex = (lightBoxIndex + 1) % activeGallery.length;
    lightboxImg.src = activeGallery[lightBoxIndex].url;
    lightboxCaption.textContent = activeGallery[lightBoxIndex].title;
  };

  const showPrev = () => {
    lightBoxIndex = (lightBoxIndex - 1 + activeGallery.length) % activeGallery.length;
    lightboxImg.src = activeGallery[lightBoxIndex].url;
    lightboxCaption.textContent = activeGallery[lightBoxIndex].title;
  };

  // Event Listeners for Details Page Gallery
  const detailsGalleryGrid = document.querySelector('#gallery-grid');
  if (detailsGalleryGrid) {
    detailsGalleryGrid.addEventListener('click', (e) => {
      const item = e.target.closest('.gallery-item-new');
      if (item) {
        const idx = parseInt(item.getAttribute('data-index'));
        openLightbox(idx, currentRoomData.gallery);
      }
    });
  }

  if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
  if (lightboxNext) lightboxNext.addEventListener('click', showNext);
  if (lightboxPrev) lightboxPrev.addEventListener('click', showPrev);
  if (lightbox) {
    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox) closeLightbox();
    });
  }

  // ── QUICK GALLERY LOGIC (For Home Page) ──
  const quickButtons = document.querySelectorAll('.btn-quick-gallery');
  quickButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const roomType = btn.getAttribute('data-room');
      const roomData = window.roomsData ? window.roomsData[roomType] : null;
      if (roomData) {
        openLightbox(0, roomData.gallery);
      }
    });
  });

  // Mobile Menu
  const hamburger = document.getElementById("nav-hamburger");
  const mobileMenu = document.getElementById("mobile-menu");
  const menuOverlay = document.getElementById("mobile-menu-overlay");
  const menuClose = document.getElementById("mobile-menu-close");

  if (hamburger && mobileMenu && menuOverlay && menuClose) {
    const openMenu = () => {
      mobileMenu.classList.add("open");
      menuOverlay.classList.add("open");
      document.body.style.overflow = "hidden";
    };

    const closeMenu = () => {
      mobileMenu.classList.remove("open");
      menuOverlay.classList.remove("open");
      document.body.style.overflow = "";
    };

    hamburger.addEventListener("click", openMenu);
    menuClose.addEventListener("click", closeMenu);
    menuOverlay.addEventListener("click", closeMenu);

    document.querySelectorAll(".mobile-nav-links a").forEach((link) => {
      link.addEventListener("click", closeMenu);
    });
  }
});
