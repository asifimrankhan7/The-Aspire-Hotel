<?php
require_once __DIR__ . '/data/rooms.php';

$type = isset($_GET['type']) ? $_GET['type'] : 'standard-double';
if (!array_key_exists($type, $roomsData)) {
    $type = array_key_first($roomsData);
}
$room = $roomsData[$type];

$roomHeroImages = [
    'standard-double' => './assets/images/Standard Double Room.jpeg',
    'standard-twin'   => './assets/images/Standard Twin Room.jpeg',
    'deluxe-double'   => './assets/images/Deluxe Double Room.jpeg',
    'deluxe-family'   => './assets/images/Deluxe Family Room.jpeg',
    'royale-deluxe'   => './assets/images/Royale Deluxe Room.jpeg',
    'royale-family'   => './assets/images/Royale Family Room.jpeg',
];
$heroImage = $roomHeroImages[$type] ?? $room['gallery'][0]['url'];

$pageTitle       = htmlspecialchars($room['name']) . ' – The Aspire Hotel';
$pageDescription = htmlspecialchars($room['description']);

function renderAmenity(array $amenity): string {
    $icon = htmlspecialchars($amenity['icon']);
    $name = htmlspecialchars($amenity['name']);
    return <<<HTML
    <div class="amenity-item reveal">
      <div class="amenity-icon"><i class="ph ph-{$icon}"></i></div>
      <span class="amenity-name">{$name}</span>
    </div>
    HTML;
}

?>
<!doctype html>
<html lang="en">
<head>
<?php require_once __DIR__ . '/includes/head.php'; ?>
</head>
<body>
  

<?php
$navPage  = 'details';
$navClass = 'scrolled';
require_once __DIR__ . '/includes/nav.php';
?>


<!-- ═══════════════════════ HERO ═══════════════════════ -->
<section class="details-hero">
  <img
    src="<?= htmlspecialchars($heroImage) ?>"
    alt="<?= htmlspecialchars($room['name']) ?>"
    class="details-hero-img"
  />
  <div class="details-hero-overlay">
    <div class="details-hero-inner">
      <a href="./index.php#rooms" class="details-breadcrumb">
        <i class="ph ph-arrow-left"></i> The Aspire Hotel
      </a>
      <h1 class="details-room-name"><?= htmlspecialchars($room['name']) ?></h1>
      <div class="details-hero-meta">
        <span class="details-room-view"><?= htmlspecialchars($room['view']) ?></span>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════════════════ MAIN CONTENT ═══════════════════════ -->
<main class="details-main">
  <div class="details-grid">

    <!-- Left: content -->
    <div class="details-content">

      <div class="details-intro reveal">
        <span class="amenities-eyebrow">ABOUT THE ROOM</span>
        <h2 class="details-heading">Luxury and comfort<br />redefined.</h2>
        <p class="details-desc"><?= htmlspecialchars($room['description']) ?></p>
      </div>

      <!-- Stats -->
      <div class="details-stats reveal">
        <div class="stat-box">
          <i class="ph ph-bed stat-icon"></i>
          <span class="stat-label">Beds</span>
          <span class="stat-value"><?= htmlspecialchars($room['beds']) ?></span>
        </div>
        <div class="stat-box">
          <i class="ph ph-users stat-icon"></i>
          <span class="stat-label">Guests</span>
          <span class="stat-value"><?= htmlspecialchars($room['guests']) ?></span>
        </div>
        <div class="stat-box">
          <i class="ph ph-mountains stat-icon"></i>
          <span class="stat-label">View</span>
          <span class="stat-value"><?= htmlspecialchars($room['view']) ?></span>
        </div>
      </div>

      <!-- Merged Amenities -->
      <div class="amenities-container">
        <div class="amenities-header reveal">
          <span class="amenities-eyebrow">SERVICES & FACILITIES</span>
          <h3 class="amenities-title">Room &amp; Hotel Amenities</h3>
        </div>
        <div class="amenities-grid">
          <?php 
          $allAmenities = array_merge($room['hotelAmenities'], $room['roomAmenities']);
          foreach ($allAmenities as $amenity): 
          ?>
          <?= renderAmenity($amenity) ?>
          <?php endforeach; ?>
        </div>
      </div>

    </div>

    <!-- Right: booking sidebar -->
    <aside class="details-sidebar">
      <div class="booking-card reveal">
        <p class="booking-room-name"><?= htmlspecialchars($room['name']) ?></p>
        <div class="booking-price"><?= htmlspecialchars($room['price']) ?></div>
        <div class="booking-divider"></div>
        <div class="booking-meta">
          <div class="booking-meta-item">
            <i class="ph ph-bed"></i>
            <span><?= htmlspecialchars($room['beds']) ?></span>
          </div>
          <div class="booking-meta-item">
            <i class="ph ph-users"></i>
            <span><?= htmlspecialchars($room['guests']) ?></span>
          </div>
        </div>
        <div class="booking-divider"></div>
        <a href="https://wa.me/919181912340?text=<?= urlencode("Hi, I would like to book a " . $room['name'] . " at The Aspire Hotel.") ?>" target="_blank" rel="noopener" class="btn-book-large">
          <i class="ph ph-whatsapp-logo"></i>
          BOOK VIA WHATSAPP
        </a>
        <p class="booking-note">
          <i class="ph ph-shield-check"></i>
          Best price guaranteed on direct bookings
        </p>
      </div>
    </aside>

  </div>
</main>

<!-- ═══════════════════════ ROOM GALLERY ═══════════════════════ -->
<section class="room-gallery-section">
  <div class="container">
    <div class="section-header reveal">
      <span class="eyebrow">GALLERY</span>
      <h2 class="section-title"><?= htmlspecialchars($room['name']) ?> Photos</h2>
    </div>
    <div class="swiper room-gallery-swiper reveal">
      <div class="swiper-wrapper">
        <?php foreach ($room['gallery'] as $i => $img): ?>
        <div class="swiper-slide room-gallery-slide" data-index="<?= $i ?>">
          <img src="<?= htmlspecialchars($img['url']) ?>" alt="<?= htmlspecialchars(!empty($img['title']) ? $img['title'] : $room['name']) ?>" loading="lazy" />
        </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination room-gallery-pagination"></div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/lightbox.php'; ?>


<script>
window.roomGallery = <?= json_encode(array_map(function($img) {
    return ['url' => $img['url'], 'title' => $img['title']];
}, $room['gallery'])) ?>;
</script>
<script src="./js/script.js"></script>
</body>
</html>
