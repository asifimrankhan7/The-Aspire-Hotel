<!doctype html>
<html lang="en">
<head>
<?php
$pageTitle       = 'The Aspire Hotel – Guwahati';
$pageDescription = 'The Aspire Hotel, located in the heart of Guwahati. Luxurious, modern and comfortable rooms. Best prices and memorable stay awaits you.';
require_once __DIR__ . '/includes/head.php';
?>
</head>
<body>

<?php require_once __DIR__ . '/includes/nav.php'; ?>

<!-- HERO -->
<section class="hero" id="home">
  <video class="hero-video" autoplay muted loop playsinline>
    <source src="./assets/videos/Vidio-BG.mp4" type="video/mp4" />
  </video>
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <div class="hero-stars">★★★★★</div>
    <h1 class="hero-title">THE ASPIRE HOTEL</h1>
    <p class="hero-sub">
      Located in the heart of the city, this luxurious, modern hotel offers
      top-notch amenities for a perfect stay.
    </p>
    <a href="#rooms" class="hero-explore" id="hero-explore-btn">EXPLORE &nbsp;→</a>
  </div>
  <div class="hero-bottom-bar">
    <div class="hero-op-info">
      <div class="since-box">SINCE 1970 - 56 YEARS OF OPERATION</div>
      <a href="#about" class="story-link">THE ASPIRE STORY &nbsp;→</a>
    </div>
  </div>
</section>

<!-- FEATURES -->
<section class="features-row" id="features">
  <div class="features-grid">
    <?php
    $features = [
      ['icon' => 'ph-map-pin',     'title' => 'Located in the heart of the city',                      'text' => "Ideally located in the city's heart for easy access and convenience."],
      ['icon' => 'ph-user',        'title' => 'Luxurious, modern, and comfortable',                     'text' => 'Experience a luxurious, modern, and fully equipped space for comfort.'],
      ['icon' => 'ph-hand-heart',  'title' => 'Atithi Devo bhava - Friendly and welcoming staff',       'text' => 'Our friendly and welcoming staff ensure a delightful stay every time.'],
      ['icon' => 'ph-tag',         'title' => 'Best Prices and memorable stay',                         'text' => 'Enjoy unbeatable prices with fantastic offers tailored just for you.'],
      ['icon' => 'ph-buildings',   'title' => 'Corporate / Business stay tailored just for you',        'text' => 'Exclusive arrangements and facilities for our corporate and business travelers.'],
    ];
    foreach ($features as $f): ?>
    <div class="feature-item reveal">
      <div class="feature-icon"><i class="ph <?= $f['icon'] ?>"></i></div>
      <h3 class="feature-title"><?= htmlspecialchars($f['title']) ?></h3>
      <p class="feature-text"><?= htmlspecialchars($f['text']) ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- WELCOME / ABOUT -->
<section class="welcome-section" id="about">
  <div class="welcome-container">
    <div class="welcome-visuals reveal">
      <div class="img-stagger-1">
        <img src="./assets/images/about_1.png" alt="Luxury Room View 1" />
      </div>
      <div class="img-stagger-2">
        <img src="./assets/images/about_2.png" alt="Luxury Room View 2" />
      </div>
    </div>
    <div class="welcome-content reveal">
      <div class="content-header">
        <span class="eyebrow">WELCOME TO THE ASPIRE</span>
        <h2 class="title">Luxury hotel in the<br />heart of the city.</h2>
      </div>
      <p class="description">
        The Aspire Hotel, located in the heart of Guwahati, Assam, offers
        modern, luxurious rooms. Enjoy premium facilities, perfect for
        relaxation and indulgence. Our friendly staff ensures a seamless,
        personalized experience, with stunning city views. Discover true
        luxury and hospitality at The Aspire.
      </p>
      <a href="#explore" class="btn-lara-read">READ MORE &nbsp;→</a>
    </div>
  </div>

  <!-- RATINGS STRIP -->
  <div class="ratings-row reveal">
    <div class="ratings-container">
      <div class="rating-item">
        <div class="rating-logo">B.</div>
        <div class="rating-info">
          <div class="rating-val">4.9/5 <span class="stars">★</span> <span class="quality">Excellent</span></div>
          <div class="rating-count">3.5K Reviews on Booking</div>
        </div>
      </div>
      <div class="rating-item">
        <div class="rating-logo brand-agoda">a</div>
        <div class="rating-info">
          <div class="rating-val">5/5 <span class="stars">★</span> <span class="quality">Excellent</span></div>
          <div class="rating-count">4.1K Reviews on Agoda</div>
        </div>
      </div>
      <div class="rating-item">
        <div class="rating-logo brand-trip">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 .5C5.649.5.5 5.649.5 12c0 6.351 5.149 11.5 11.5 11.5s11.5-5.149 11.5-11.5C23.5 5.649 18.351.5 12 .5zM9 16c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2zm6 0c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2z" />
          </svg>
        </div>
        <div class="rating-info">
          <div class="rating-val">4.8/5 <span class="stars">★</span> <span class="quality">Good</span></div>
          <div class="rating-count">2.4K Reviews on Tripadvisor</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ROOMS COLLECTION -->
<section class="rooms" id="rooms">
  <div class="rooms-header reveal">
    <span class="eyebrow">EXQUISITE AND LUXURIOUS</span>
    <h2 class="title section-title">Room and suite collection</h2>
  </div>

  <div class="collection-slider embla reveal" id="rooms-slider">
    <div class="slider-track embla__container">

      <!-- Royale Family Room -->
      <div class="slider-slide embla__slide">
        <div class="room-card-large">
          <div class="room-info-pane">
            <div class="room-price-info">From: <span class="price-val">₹4,500</span> / NIGHT</div>
            <h3 class="room-name-large">Royale Family Room</h3>
            <p class="room-desc-large">Cozy and modern, this room offers essential amenities for a comfortable stay, perfect for solo travelers or couples seeking relaxation.</p>
            <div class="room-details-grid">
              <div class="detail-item"><i class="ph ph-bounding-box"></i><span>ROOM SIZE 28 M²</span></div>
              <div class="detail-item"><i class="ph ph-bed"></i><span>1 KING BED</span></div>
              <div class="detail-item"><i class="ph ph-users"></i><span>2 ADULTS - 1 CHILD</span></div>
              <div class="detail-item"><i class="ph ph-map-trifold"></i><span>STREET VIEW</span></div>
              <div class="detail-item"><i class="ph ph-prohibit"></i><span>SMOKING - NO</span></div>
              <div class="detail-item"><i class="ph ph-coffee"></i><span>BREAKFAST - YES</span></div>
            </div>
            <div class="room-actions-large">
              <a href="#contact" class="btn-book-now"><i class="ph ph-calendar-check" style="margin-right:8px"></i>BOOK NOW</a>
              <a href="./room-details.php?type=royale" class="btn-view-room">VIEW ROOM &nbsp;→</a>
            </div>
          </div>
          <div class="room-image-pane">
            <img src="./assets/images/room_standard_coll.png" alt="Royale Family Room" />
          </div>
        </div>
      </div>

      <!-- Premium Family Room -->
      <div class="slider-slide embla__slide">
        <div class="room-card-large">
          <div class="room-info-pane">
            <div class="room-price-info">From: <span class="price-val">₹7,500</span> / NIGHT</div>
            <h3 class="room-name-large">Premium Family Room</h3>
            <p class="room-desc-large">Experience enhanced luxury with premium furnishings and breathtaking city panoramas. A perfect blend of style and comfort.</p>
            <div class="room-details-grid">
              <div class="detail-item"><i class="ph ph-bounding-box"></i><span>ROOM SIZE 42 M²</span></div>
              <div class="detail-item"><i class="ph ph-bed"></i><span>1 KING BED</span></div>
              <div class="detail-item"><i class="ph ph-users"></i><span>2 ADULTS - 1 CHILD</span></div>
              <div class="detail-item"><i class="ph ph-city"></i><span>CITY VIEW</span></div>
              <div class="detail-item"><i class="ph ph-prohibit"></i><span>SMOKING - NO</span></div>
              <div class="detail-item"><i class="ph ph-coffee"></i><span>BREAKFAST - YES</span></div>
            </div>
            <div class="room-actions-large">
              <a href="#contact" class="btn-book-now">BOOK NOW</a>
              <a href="./room-details.php?type=premium" class="btn-view-room">VIEW ROOM &nbsp;→</a>
            </div>
          </div>
          <div class="room-image-pane">
            <img src="./assets/images/room_deluxe_coll.png" alt="Premium Family Room" />
          </div>
        </div>
      </div>

      <!-- Deluxe Double Room -->
      <div class="slider-slide embla__slide">
        <div class="room-card-large">
          <div class="room-info-pane">
            <div class="room-price-info">From: <span class="price-val">₹12,000</span> / NIGHT</div>
            <h3 class="room-name-large">Deluxe Double Room</h3>
            <p class="room-desc-large">Our most exclusive accommodation featuring a separate living area and unparalleled luxury amenities for the elite traveler.</p>
            <div class="room-details-grid">
              <div class="detail-item"><i class="ph ph-bounding-box"></i><span>ROOM SIZE 85 M²</span></div>
              <div class="detail-item"><i class="ph ph-bed"></i><span>2 KING BEDS</span></div>
              <div class="detail-item"><i class="ph ph-users"></i><span>4 ADULTS</span></div>
              <div class="detail-item"><i class="ph ph-city"></i><span>SKYLINE VIEW</span></div>
              <div class="detail-item"><i class="ph ph-prohibit"></i><span>SMOKING - NO</span></div>
              <div class="detail-item"><i class="ph ph-coffee"></i><span>BREAKFAST - YES</span></div>
            </div>
            <div class="room-actions-large">
              <a href="#contact" class="btn-book-now">BOOK NOW</a>
              <a href="./room-details.php?type=deluxe" class="btn-view-room">VIEW ROOM &nbsp;→</a>
            </div>
          </div>
          <div class="room-image-pane">
            <img src="./assets/images/room_suite_coll.png" alt="Deluxe Double Room" />
          </div>
        </div>
      </div>

    </div>
    <button class="slider-arrow prev" aria-label="Previous slide">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
    </button>
    <button class="slider-arrow next" aria-label="Next slide">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
    </button>
  </div>
</section>

<!-- FACILITIES -->
<section class="rooms" id="services">
  <div class="rooms-header reveal">
    <span class="eyebrow">FACILITIES AND SERVICES</span>
    <h2 class="title section-title">Discover our services</h2>
  </div>

  <div class="collection-slider embla reveal" id="facilities-slider">
    <div class="slider-track embla__container">

      <!-- Spa -->
      <div class="slider-slide embla__slide">
        <div class="room-card-large">
          <div class="room-info-pane">
            <div class="room-price-info">OPEN DAILY: <span class="price-val">09 AM - 10 PM</span></div>
            <h3 class="room-name-large">Spa &amp; Wellness</h3>
            <p class="room-desc-large">Indulge in our signature treatments and therapeutic massages designed to rejuvenate your mind, body, and soul in a serene luxury environment.</p>
            <div class="room-details-grid">
              <div class="detail-item"><i class="ph ph-flower"></i><span>6 TREATMENT ROOMS</span></div>
              <div class="detail-item"><i class="ph ph-wind"></i><span>STEAM &amp; SAUNA</span></div>
              <div class="detail-item"><i class="ph ph-leaf"></i><span>ORGANIC PRODUCTS</span></div>
            </div>
            <div class="room-actions-large no-res">
              <a href="#" class="btn-view-room">EXPLORE SPA &nbsp;→</a>
            </div>
          </div>
          <div class="room-image-pane">
            <img src="./assets/images/facility_spa.png" alt="Spa & Wellness" />
          </div>
        </div>
      </div>

      <!-- Dining -->
      <div class="slider-slide embla__slide">
        <div class="room-card-large">
          <div class="room-info-pane">
            <div class="room-price-info">FINE DINING: <span class="price-val">7 PM - 11 PM</span></div>
            <h3 class="room-name-large">The Grand Restaurant</h3>
            <p class="room-desc-large">Taste curated global cuisines prepared by multi-award winning world-class chefs. An intimate atmosphere for the most discerning palates.</p>
            <div class="room-details-grid">
              <div class="detail-item"><i class="ph ph-fork-knife"></i><span>GLOBAL CUISINE</span></div>
              <div class="detail-item"><i class="ph ph-chair"></i><span>80 SEATING CAPACITY</span></div>
              <div class="detail-item"><i class="ph ph-door"></i><span>PRIVATE DINING</span></div>
            </div>
            <div class="room-actions-large no-res">
              <a href="#" class="btn-view-room">VIEW MENU &nbsp;→</a>
            </div>
          </div>
          <div class="room-image-pane">
            <img src="./assets/images/facility_dining.png" alt="Fine Dining" />
          </div>
        </div>
      </div>

      <!-- Pool -->
      <div class="slider-slide embla__slide">
        <div class="room-card-large">
          <div class="room-info-pane">
            <div class="room-price-info">ROOFTOP: <span class="price-val">06 AM - 08 PM</span></div>
            <h3 class="room-name-large">Infinity Rooftop Pool</h3>
            <p class="room-desc-large">Experience breathtaking city views from our temperature-controlled rooftop pool. The perfect spot for twilight swimming and relaxation.</p>
            <div class="room-details-grid">
              <div class="detail-item"><i class="ph ph-mountains"></i><span>SKYLINE VIEWS</span></div>
              <div class="detail-item"><i class="ph ph-thermometer-hot"></i><span>HEATED WATER</span></div>
              <div class="detail-item"><i class="ph ph-wine"></i><span>POOLSIDE BAR</span></div>
            </div>
            <div class="room-actions-large no-res">
              <a href="#" class="btn-view-room">RELAX BY POOL &nbsp;→</a>
            </div>
          </div>
          <div class="room-image-pane">
            <img src="./assets/images/facility_pool.png" alt="Infinity Pool" />
          </div>
        </div>
      </div>

    </div>
    <button class="slider-arrow prev" aria-label="Previous slide">
      <i class="ph ph-caret-left"></i>
    </button>
    <button class="slider-arrow next" aria-label="Next slide">
      <i class="ph ph-caret-right"></i>
    </button>
  </div>
</section>

<!-- EXPLORE GALLERY -->
<section class="explore" id="explore">
  <div class="container">
    <div class="section-header reveal">
      <div class="section-eyebrow">Discover More</div>
      <h2 class="section-title">Explore The Aspire Hotel</h2>
    </div>
    <div class="gallery-grid reveal">
      <div class="gallery-cell gallery-cell-large" id="gallery-lobby">
        <img src="./assets/images/lobby_gallery.png" alt="Grand Lobby" />
        <div class="gallery-label">Grand Lobby</div>
      </div>
      <div class="gallery-cell gallery-cell-tall" id="gallery-views">
        <img src="./assets/images/room_deluxe.png" alt="City Views" />
        <div class="gallery-label">City Views</div>
      </div>
      <div class="gallery-cell gallery-cell-wide" id="gallery-pool">
        <img src="./assets/images/gallery_pool.png" alt="Infinity Pool" />
        <div class="gallery-label">Infinity Pool</div>
      </div>
    </div>
  </div>
</section>

<!-- NEWS & OFFERS -->
<section class="news-offers" id="news-offers">
  <div class="container">
    <div class="section-header reveal">
      <div class="section-eyebrow">Latest Updates</div>
      <h2 class="section-title">News &amp; Offers</h2>
    </div>
    <?php
    $offers = [
      ['badge' => 'Limited Time', 'title' => 'Early Bird Discount',   'desc' => 'Book 15 days in advance and get up to 20% off on all room categories. A memorable stay at the best price.', 'link' => '#rooms', 'cta' => 'Book Now →'],
      ['badge' => 'Corporate',    'title' => 'Business Stay Package', 'desc' => 'Exclusive rates for corporate travelers. Includes complimentary breakfast, high-speed Wi-Fi, and express check-in.', 'link' => '#rooms', 'cta' => 'Enquire →'],
      ['badge' => 'Weekend',      'title' => 'Weekend Getaway',       'desc' => 'Switch off and unwind. Special weekend packages with late checkout and complimentary room upgrades on availability.', 'link' => '#rooms', 'cta' => 'View Offer →'],
    ];
    ?>
    <div class="offers-grid reveal">
      <?php foreach ($offers as $i => $offer): ?>
      <div class="offer-card" id="offer-card-<?= $i + 1 ?>">
        <div class="offer-badge"><?= htmlspecialchars($offer['badge']) ?></div>
        <div class="offer-title"><?= htmlspecialchars($offer['title']) ?></div>
        <div class="offer-desc"><?= htmlspecialchars($offer['desc']) ?></div>
        <a href="<?= $offer['link'] ?>" class="offer-link"><?= $offer['cta'] ?></a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- MAP -->
<section class="map-section" id="map">
  <div class="container">
    <div class="section-header reveal">
      <div class="section-eyebrow">Find Us</div>
      <h2 class="section-title">Our Location</h2>
      <p class="section-sub reveal">
        Located in the heart of Guwahati, Assam — easily accessible from the airport and major landmarks.
      </p>
    </div>
    <div class="map-container reveal">
      <iframe id="hotel-map"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57408.42095597567!2d91.7086485!3d26.1445169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a5948b879f007%3A0x6f5f3e3a069a6a7b!2sGuwahati%2C%20Assam!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"
        width="100%" height="450" style="border:0" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="The Aspire Hotel Location - Guwahati">
      </iframe>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/lightbox.php'; ?>

<script src="./js/script.js"></script>
</body>
</html>
