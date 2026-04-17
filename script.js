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
    // Map existing icon names to Phosphor equivalents
    const mapping = {
      'wifi': 'wifi-high',
      'tv': 'television',
      'coffee': 'coffee',
      'thermometer': 'thermometer-hot',
      'sparkles': 'sparkle',
      'check-circle': 'check-circle',
      'utensils': 'fork-knife',
      'droplet': 'drop',
      'heart': 'heart',
      'shield': 'shield',
      'user-check': 'user-check',
      'truck': 'truck',
      'activity': 'activity',
      'briefcase': 'briefcase',
      'archive': 'archive',
      'key': 'key',
      'volume-x': 'speaker-simple-x',
      'volume-2': 'speaker-high',
      'feather': 'feather',
      'battery-charging': 'battery-charging',
      'users': 'users',
      'bell': 'bell',
      'layout': 'layout',
      'glass-water': 'glass-water',
      'shield-check': 'shield-check',
      'sun': 'sun',
      'map': 'map-trifold',
      'map-pin': 'map-pin'
    };

    const phIcon = mapping[iconName] || iconName;
    return `<i class="ph ph-${phIcon}"></i>`;
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
