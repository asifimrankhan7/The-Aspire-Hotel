// ── Generic Slider System ──
class SimpleSlider {
  constructor(el, options = {}) {
    this.el = el;
    this.track = el.querySelector('.slider-track');
    this.slides = Array.from(el.querySelectorAll('.slider-slide'));
    this.dotsContainer = el.querySelector('.slider-dots');
    this.btnPrev = el.querySelector('.slider-arrow.prev');
    this.btnNext = el.querySelector('.slider-arrow.next');

    if (!this.track || this.slides.length === 0) return;

    this.currentIndex = 0;
    this.type = el.getAttribute('data-slider'); // 'hero' or 'room-collection'
    this.autoPlayDelay = options.delay || (this.type === 'hero' ? 6000 : 0);
    this.intervalId = null;

    this.init();
  }

  init() {
    if (this.slides.length <= 1) return;

    // Create dots if container exists
    if (this.dotsContainer) {
      this.slides.forEach((_, i) => {
        const dot = document.createElement('button');
        dot.classList.add('slider-dot');
        if (i === 0) dot.classList.add('active');
        dot.addEventListener('click', () => this.goTo(i));
        this.dotsContainer.appendChild(dot);
      });
      this.dots = Array.from(this.dotsContainer.querySelectorAll('.slider-dot'));
    }

    // Events
    if (this.btnPrev) this.btnPrev.addEventListener('click', () => this.prev());
    if (this.btnNext) this.btnNext.addEventListener('click', () => this.next());

    // Auto play
    if (this.autoPlayDelay > 0) {
      this.startAutoPlay();
      this.el.addEventListener('mouseenter', () => this.stopAutoPlay());
      this.el.addEventListener('mouseleave', () => this.startAutoPlay());
    }

    // Touch support
    let startX = 0;
    this.el.addEventListener('touchstart', (e) => (startX = e.touches[0].clientX), { passive: true });
    this.el.addEventListener('touchend', (e) => {
      const endX = e.changedTouches[0].clientX;
      if (startX - endX > 50) this.next();
      if (endX - startX > 50) this.prev();
    }, { passive: true });
  }

  goTo(index) {
    this.currentIndex = (index + this.slides.length) % this.slides.length;
    this.track.style.transform = `translateX(-${this.currentIndex * 100}%)`;

    // Update dots
    if (this.dots) {
      this.dots.forEach((dot, i) => {
        dot.classList.toggle('active', i === this.currentIndex);
      });
    }
  }

  next() { this.goTo(this.currentIndex + 1); }
  prev() { this.goTo(this.currentIndex - 1); }

  startAutoPlay() {
    this.intervalId = setInterval(() => this.next(), this.autoPlayDelay);
  }

  stopAutoPlay() {
    clearInterval(this.intervalId);
  }
}

// ── Main Initialization ──
document.addEventListener('DOMContentLoaded', () => {
  const nav = document.getElementById('main-nav');
  const reveals = document.querySelectorAll('.reveal');

  // Reveal animations
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    },
    { threshold: 0.12 }
  );

  reveals.forEach((el) => observer.observe(el));

  // Sliders
  const sliderEls = document.querySelectorAll('[data-slider]');
  sliderEls.forEach((el) => new SimpleSlider(el));

  // Scroll logic
  window.addEventListener('scroll', () => {
    if (!nav) return;
    if (window.scrollY > 60) {
      nav.classList.add('scrolled');
    } else {
      nav.classList.remove('scrolled');
    }
  });

  // Mobile Menu
  const hamburger = document.getElementById('nav-hamburger');
  const mobileMenu = document.getElementById('mobile-menu');
  const menuOverlay = document.getElementById('mobile-menu-overlay');
  const menuClose = document.getElementById('mobile-menu-close');

  if (hamburger && mobileMenu && menuOverlay && menuClose) {
    const openMenu = () => {
      mobileMenu.classList.add('open');
      menuOverlay.classList.add('open');
      document.body.style.overflow = 'hidden';
    };

    const closeMenu = () => {
      mobileMenu.classList.remove('open');
      menuOverlay.classList.remove('open');
      document.body.style.overflow = '';
    };

    hamburger.addEventListener('click', openMenu);
    menuClose.addEventListener('click', closeMenu);
    menuOverlay.addEventListener('click', closeMenu);

    document.querySelectorAll('.mobile-nav-links a').forEach((link) => {
      link.addEventListener('click', closeMenu);
    });
  }
});
