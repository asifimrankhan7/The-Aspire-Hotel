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

<!-- ═══════════════════════ HERO ═══════════════════════ -->
<section class="hero" id="home">
  <video class="hero-video" autoplay muted loop playsinline>
    <source src="./assets/videos/Vidio-BG.mp4" type="video/mp4" />
  </video>
  <div class="hero-overlay"></div>

  <div class="hero-content">
    <div class="hero-stars">★★★★★</div>
    <h1 class="hero-title">THE ASPIRE HOTEL</h1>
    <div class="hero-divider"></div>
    <p class="hero-sub">
      Located in the heart of the city, this luxurious, modern hotel offers
      top-notch amenities for a perfect stay.
    </p>
    <a href="#rooms" class="hero-explore" id="hero-explore-btn">EXPLORE ROOMS &nbsp;→</a>
  </div>

  <div class="hero-bottom-bar">
    <div class="hero-op-info">
      <div class="since-box">SINCE 1970 — 56 YEARS OF EXCELLENCE</div>
      <a href="#about" class="story-link">OUR STORY &nbsp;→</a>
    </div>
  </div>
</section>


<!-- ═══════════════════════ FEATURES ═══════════════════════ -->
<section class="features-row" id="features">
  <div class="features-grid">
    <?php
    $features = [
      ['icon' => 'ph-map-pin',    'num' => '01', 'title' => 'Heart of the City',           'text' => "Ideally situated for easy access to landmarks, dining, and business centres."],
      ['icon' => 'ph-sparkle',    'num' => '02', 'title' => 'Luxurious & Modern',           'text' => 'Elegantly appointed spaces blending contemporary design with timeless comfort.'],
      ['icon' => 'ph-hand-heart', 'num' => '03', 'title' => 'Atithi Devo Bhava',           'text' => 'Warm, personalised hospitality that treats every guest as an honoured visitor.'],
      ['icon' => 'ph-tag',        'num' => '04', 'title' => 'Best Price Guarantee',        'text' => 'Exceptional value with exclusive rates for direct bookings, always.'],
      ['icon' => 'ph-buildings',  'num' => '05', 'title' => 'Corporate & Business',        'text' => 'Tailored packages, meeting facilities, and swift check-in for professionals.'],
    ];
    foreach ($features as $f): ?>
    <div class="feature-item reveal">
      <span class="feature-num"><?= $f['num'] ?></span>
      <div class="feature-icon"><i class="ph <?= $f['icon'] ?>"></i></div>
      <h3 class="feature-title"><?= htmlspecialchars($f['title']) ?></h3>
      <p class="feature-text"><?= htmlspecialchars($f['text']) ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>


<!-- ═══════════════════════ WELCOME / ABOUT ═══════════════════════ -->
<section class="welcome-section" id="about">
  <div class="welcome-container">

    <div class="welcome-visuals reveal">
      <div class="img-stagger-1">
        <img src="./assets/images/about_1.png" alt="Lobby interior" />
      </div>
      <div class="img-stagger-2">
        <img src="./assets/images/about_2.png" alt="Luxury room" />
        <div class="img-accent"></div>
      </div>
    </div>

    <div class="welcome-content reveal">
      <span class="eyebrow">WELCOME TO THE ASPIRE</span>
      <h2 class="welcome-title">Luxury hotel in the<br />heart of the city.</h2>
      <p class="description">
        The Aspire Hotel, located in the heart of Guwahati, Assam, offers
        modern, luxurious rooms. Enjoy premium facilities, perfect for
        relaxation and indulgence. Our friendly staff ensures a seamless,
        personalised experience with stunning city views. Discover true
        luxury and hospitality at The Aspire.
      </p>
      <a href="#explore" class="btn-lara-read">DISCOVER MORE &nbsp;→</a>
    </div>

  </div>

  <!-- RATINGS STRIP -->
  <div class="ratings-row reveal">
    <div class="ratings-container">

      <div class="rating-item">
        <div class="rating-logo">B.</div>
        <div class="rating-info">
          <div class="rating-val">4.9<span class="rating-sep">/</span>5 <span class="stars">★</span> <span class="quality">Excellent</span></div>
          <div class="rating-count">3.5K Reviews on Booking</div>
        </div>
      </div>

      <div class="rating-divider"></div>

      <div class="rating-item">
        <div class="rating-logo brand-agoda">a</div>
        <div class="rating-info">
          <div class="rating-val">5<span class="rating-sep">/</span>5 <span class="stars">★</span> <span class="quality">Excellent</span></div>
          <div class="rating-count">4.1K Reviews on Agoda</div>
        </div>
      </div>

      <div class="rating-divider"></div>

      <div class="rating-item">
        <div class="rating-logo brand-trip">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 .5C5.649.5.5 5.649.5 12c0 6.351 5.149 11.5 11.5 11.5s11.5-5.149 11.5-11.5C23.5 5.649 18.351.5 12 .5zM9 16c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2zm6 0c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2z" />
          </svg>
        </div>
        <div class="rating-info">
          <div class="rating-val">4.8<span class="rating-sep">/</span>5 <span class="stars">★</span> <span class="quality">Very Good</span></div>
          <div class="rating-count">2.4K Reviews on Tripadvisor</div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ═══════════════════════ ROOMS COLLECTION ═══════════════════════ -->
<section class="rooms-section" id="rooms">
  <div class="rooms-header reveal">
    <span class="eyebrow">EXQUISITE AND LUXURIOUS</span>
    <h2 class="section-title">Room &amp; Suite Collection</h2>
  </div>

  <div class="collection-slider embla reveal" id="rooms-slider">
    <div class="slider-track embla__container">

      <!-- Royale Family Room -->
      <div class="slider-slide embla__slide">
        <div class="room-card-large">
          <div class="room-info-pane">
            <div class="room-price-tag">
              <span class="price-label">From</span>
              <span class="price-val">₹4,500</span>
              <span class="price-unit">/ night</span>
            </div>
            <h3 class="room-name-large">Royale Family Room</h3>
            <p class="room-desc-large">Cozy and modern, this room offers essential amenities for a comfortable stay, perfect for couples or small families seeking relaxation in the city.</p>
            <div class="room-details-grid">
              <div class="detail-item"><i class="ph ph-bounding-box"></i><span>28 M² ROOM</span></div>
              <div class="detail-item"><i class="ph ph-bed"></i><span>1 KING BED</span></div>
              <div class="detail-item"><i class="ph ph-users"></i><span>2 ADULTS + 1 CHILD</span></div>
              <div class="detail-item"><i class="ph ph-map-trifold"></i><span>STREET VIEW</span></div>
              <div class="detail-item"><i class="ph ph-prohibit"></i><span>NON-SMOKING</span></div>
              <div class="detail-item"><i class="ph ph-coffee"></i><span>BREAKFAST INCLUDED</span></div>
            </div>
            <div class="room-actions-large">
              <a href="#contact" class="btn-book-now"><i class="ph ph-calendar-check"></i>BOOK NOW</a>
              <a href="./room-details.php?type=royale" class="btn-view-room">VIEW DETAILS &nbsp;→</a>
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
            <div class="room-price-tag">
              <span class="price-label">From</span>
              <span class="price-val">₹7,500</span>
              <span class="price-unit">/ night</span>
            </div>
            <h3 class="room-name-large">Premium Family Room</h3>
            <p class="room-desc-large">Experience elevated luxury with premium furnishings and breathtaking city panoramas. A refined blend of style, space, and comfort.</p>
            <div class="room-details-grid">
              <div class="detail-item"><i class="ph ph-bounding-box"></i><span>42 M² ROOM</span></div>
              <div class="detail-item"><i class="ph ph-bed"></i><span>1 KING BED</span></div>
              <div class="detail-item"><i class="ph ph-users"></i><span>2 ADULTS + 1 CHILD</span></div>
              <div class="detail-item"><i class="ph ph-city"></i><span>CITY VIEW</span></div>
              <div class="detail-item"><i class="ph ph-prohibit"></i><span>NON-SMOKING</span></div>
              <div class="detail-item"><i class="ph ph-coffee"></i><span>BREAKFAST INCLUDED</span></div>
            </div>
            <div class="room-actions-large">
              <a href="#contact" class="btn-book-now"><i class="ph ph-calendar-check"></i>BOOK NOW</a>
              <a href="./room-details.php?type=premium" class="btn-view-room">VIEW DETAILS &nbsp;→</a>
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
            <div class="room-price-tag">
              <span class="price-label">From</span>
              <span class="price-val">₹12,000</span>
              <span class="price-unit">/ night</span>
            </div>
            <h3 class="room-name-large">Deluxe Double Room</h3>
            <p class="room-desc-large">Our most exclusive accommodation, featuring a separate living area and unparalleled skyline views. The premier choice for the discerning traveller.</p>
            <div class="room-details-grid">
              <div class="detail-item"><i class="ph ph-bounding-box"></i><span>85 M² ROOM</span></div>
              <div class="detail-item"><i class="ph ph-bed"></i><span>2 KING BEDS</span></div>
              <div class="detail-item"><i class="ph ph-users"></i><span>4 ADULTS</span></div>
              <div class="detail-item"><i class="ph ph-city"></i><span>SKYLINE VIEW</span></div>
              <div class="detail-item"><i class="ph ph-prohibit"></i><span>NON-SMOKING</span></div>
              <div class="detail-item"><i class="ph ph-coffee"></i><span>BREAKFAST INCLUDED</span></div>
            </div>
            <div class="room-actions-large">
              <a href="#contact" class="btn-book-now"><i class="ph ph-calendar-check"></i>BOOK NOW</a>
              <a href="./room-details.php?type=deluxe" class="btn-view-room">VIEW DETAILS &nbsp;→</a>
            </div>
          </div>
          <div class="room-image-pane">
            <img src="./assets/images/room_suite_coll.png" alt="Deluxe Double Room" />
          </div>
        </div>
      </div>

    </div>

    <button class="slider-arrow prev" aria-label="Previous room">
      <i class="ph ph-arrow-left"></i>
    </button>
    <button class="slider-arrow next" aria-label="Next room">
      <i class="ph ph-arrow-right"></i>
    </button>
  </div>
</section>


<!-- ═══════════════════════ FACILITIES ═══════════════════════ -->
<section class="facilities-section" id="services">
  <div class="rooms-header reveal">
    <span class="eyebrow">FACILITIES AND SERVICES</span>
    <h2 class="section-title">Discover Our Services</h2>
  </div>

  <div class="collection-slider embla reveal" id="facilities-slider">
    <div class="slider-track embla__container">

      <!-- Spa -->
      <div class="slider-slide embla__slide">
        <div class="room-card-large">
          <div class="room-info-pane">
            <div class="room-price-tag">
              <span class="price-label">Open Daily</span>
              <span class="price-val">09 AM – 10 PM</span>
            </div>
            <h3 class="room-name-large">Spa &amp; Wellness</h3>
            <p class="room-desc-large">Indulge in signature treatments and therapeutic massages designed to rejuvenate your mind, body, and soul in a serene luxury environment.</p>
            <div class="room-details-grid">
              <div class="detail-item"><i class="ph ph-flower"></i><span>6 TREATMENT ROOMS</span></div>
              <div class="detail-item"><i class="ph ph-wind"></i><span>STEAM &amp; SAUNA</span></div>
              <div class="detail-item"><i class="ph ph-leaf"></i><span>ORGANIC PRODUCTS</span></div>
            </div>
            <div class="room-actions-large no-res">
              <a href="#contact" class="btn-view-room">EXPLORE SPA &nbsp;→</a>
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
            <div class="room-price-tag">
              <span class="price-label">Fine Dining</span>
              <span class="price-val">7 PM – 11 PM</span>
            </div>
            <h3 class="room-name-large">The Grand Restaurant</h3>
            <p class="room-desc-large">Savour curated global cuisines prepared by award-winning chefs. An intimate atmosphere for the most discerning palates in the city.</p>
            <div class="room-details-grid">
              <div class="detail-item"><i class="ph ph-fork-knife"></i><span>GLOBAL CUISINE</span></div>
              <div class="detail-item"><i class="ph ph-chair"></i><span>80 SEATS</span></div>
              <div class="detail-item"><i class="ph ph-door"></i><span>PRIVATE DINING</span></div>
            </div>
            <div class="room-actions-large no-res">
              <a href="#contact" class="btn-view-room">VIEW MENU &nbsp;→</a>
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
            <div class="room-price-tag">
              <span class="price-label">Rooftop Pool</span>
              <span class="price-val">06 AM – 08 PM</span>
            </div>
            <h3 class="room-name-large">Infinity Rooftop Pool</h3>
            <p class="room-desc-large">Experience breathtaking city views from our temperature-controlled rooftop pool. The perfect spot for twilight swimming and total relaxation.</p>
            <div class="room-details-grid">
              <div class="detail-item"><i class="ph ph-mountains"></i><span>SKYLINE VIEWS</span></div>
              <div class="detail-item"><i class="ph ph-thermometer-hot"></i><span>HEATED WATER</span></div>
              <div class="detail-item"><i class="ph ph-wine"></i><span>POOLSIDE BAR</span></div>
            </div>
            <div class="room-actions-large no-res">
              <a href="#contact" class="btn-view-room">RELAX BY THE POOL &nbsp;→</a>
            </div>
          </div>
          <div class="room-image-pane">
            <img src="./assets/images/facility_pool.png" alt="Infinity Pool" />
          </div>
        </div>
      </div>

    </div>

    <button class="slider-arrow prev" aria-label="Previous facility">
      <i class="ph ph-arrow-left"></i>
    </button>
    <button class="slider-arrow next" aria-label="Next facility">
      <i class="ph ph-arrow-right"></i>
    </button>
  </div>
</section>


<!-- ═══════════════════════ GALLERY ═══════════════════════ -->
<section class="explore" id="explore">
  <div class="container">
    <div class="section-header reveal">
      <span class="eyebrow">DISCOVER MORE</span>
      <h2 class="section-title">Explore The Aspire Hotel</h2>
    </div>
    <div class="gallery-grid reveal">
      <div class="gallery-cell gallery-cell-large">
        <img src="./assets/images/lobby_gallery.png" alt="Grand Lobby" />
        <div class="gallery-label">Grand Lobby</div>
      </div>
      <div class="gallery-cell gallery-cell-tall">
        <img src="./assets/images/room_deluxe.png" alt="City Views" />
        <div class="gallery-label">City Views</div>
      </div>
      <div class="gallery-cell gallery-cell-wide">
        <img src="./assets/images/gallery_pool.png" alt="Infinity Pool" />
        <div class="gallery-label">Infinity Pool</div>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════════ NEWS & OFFERS ═══════════════════════ -->
<section class="news-offers" id="news-offers">
  <div class="container">
    <div class="section-header reveal">
      <span class="eyebrow">LATEST UPDATES</span>
      <h2 class="section-title">News &amp; Offers</h2>
    </div>
    <?php
    $offers = [
      ['badge' => 'Limited Time', 'title' => 'Early Bird Discount',   'desc' => 'Book 15 days in advance and save up to 20% on all room categories. A memorable stay at the best possible price.', 'link' => '#rooms', 'cta' => 'Book Now →'],
      ['badge' => 'Corporate',    'title' => 'Business Stay Package', 'desc' => 'Exclusive rates for corporate travellers including complimentary breakfast, high-speed Wi-Fi, and express check-in.', 'link' => '#rooms', 'cta' => 'Enquire →'],
      ['badge' => 'Weekend',      'title' => 'Weekend Getaway',       'desc' => 'Switch off and unwind. Special weekend packages with late checkout and complimentary room upgrades on availability.', 'link' => '#rooms', 'cta' => 'View Offer →'],
    ];
    ?>
    <div class="offers-grid reveal">
      <?php foreach ($offers as $i => $offer): ?>
      <div class="offer-card">
        <span class="offer-badge"><?= htmlspecialchars($offer['badge']) ?></span>
        <h3 class="offer-title"><?= htmlspecialchars($offer['title']) ?></h3>
        <p class="offer-desc"><?= htmlspecialchars($offer['desc']) ?></p>
        <a href="<?= $offer['link'] ?>" class="offer-link"><?= $offer['cta'] ?></a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════════════════ MAP ═══════════════════════ -->
<section class="map-section" id="map">
  <div class="container">
    <div class="section-header reveal">
      <span class="eyebrow">FIND US</span>
      <h2 class="section-title">Our Location</h2>
      <p class="section-sub">
        123 Luxury Avenue, City Center, Guwahati, Assam — easily accessible from the airport and major landmarks.
      </p>
    </div>
    <div class="map-container reveal">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57408.42095597567!2d91.7086485!3d26.1445169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a5948b879f007%3A0x6f5f3e3a069a6a7b!2sGuwahati%2C%20Assam!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"
        width="100%" height="450" style="border:0" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="The Aspire Hotel Location – Guwahati">
      </iframe>
    </div>
  </div>
</section>


<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/lightbox.php'; ?>
<script src="./js/script.js"></script>
</body>
</html>
