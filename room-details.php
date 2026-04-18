<?php
require_once __DIR__ . '/data/rooms.php';

$type = isset($_GET['type']) ? $_GET['type'] : 'royale';
if (!array_key_exists($type, $roomsData)) {
    $type = array_key_first($roomsData);
}
$room = $roomsData[$type];

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
    src="<?= htmlspecialchars($room['gallery'][0]['url']) ?>"
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
        <span class="details-room-price">
          From <strong><?= htmlspecialchars($room['price']) ?></strong> / night
        </span>
        <span class="details-hero-divider">·</span>
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
          <i class="ph ph-bounding-box stat-icon"></i>
          <span class="stat-label">Size</span>
          <span class="stat-value"><?= htmlspecialchars($room['size']) ?></span>
        </div>
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

      <!-- Room Amenities -->
      <div class="amenities-container">
        <div class="amenities-header reveal">
          <span class="amenities-eyebrow">PREMIUM FACILITIES</span>
          <h3 class="amenities-title">Room Amenities</h3>
        </div>
        <div class="amenities-grid">
          <?php foreach ($room['roomAmenities'] as $amenity): ?>
          <?= renderAmenity($amenity) ?>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Hotel Amenities -->
      <div class="amenities-container">
        <div class="amenities-header reveal">
          <span class="amenities-eyebrow">HOTEL SERVICES</span>
          <h3 class="amenities-title">Hotel Amenities</h3>
        </div>
        <div class="amenities-grid">
          <?php foreach ($room['hotelAmenities'] as $amenity): ?>
          <?= renderAmenity($amenity) ?>
          <?php endforeach; ?>
        </div>
      </div>

    </div>

    <!-- Right: booking sidebar -->
    <aside class="details-sidebar">
      <div class="booking-card reveal">
        <p class="booking-room-name"><?= htmlspecialchars($room['name']) ?></p>
        <div class="booking-price-block">
          <span class="booking-from">From</span>
          <div class="booking-price"><?= htmlspecialchars($room['price']) ?></div>
          <span class="booking-per-night">per night</span>
        </div>
        <div class="booking-divider"></div>
        <div class="booking-meta">
          <div class="booking-meta-item">
            <i class="ph ph-bounding-box"></i>
            <span><?= htmlspecialchars($room['size']) ?></span>
          </div>
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
        <a href="https://wa.me/919957173362" target="_blank" rel="noopener" class="btn-book-large">
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


<!-- ═══════════════════════ GALLERY ═══════════════════════ -->
<section class="details-gallery">
  <div class="container">
    <div class="gallery-header-new reveal">
      <span class="eyebrow">VISUAL EXPERIENCE</span>
      <h2 class="section-title">Room &amp; Hotel Gallery</h2>
    </div>
    <div class="gallery-grid-new">
      <?php foreach ($room['gallery'] as $idx => $img): ?>
      <div class="gallery-item-new reveal" data-index="<?= $idx ?>">
        <img
          src="<?= htmlspecialchars($img['url']) ?>"
          alt="<?= htmlspecialchars($img['title']) ?>"
          loading="lazy"
        />
        <div class="gallery-label"><?= htmlspecialchars($img['title']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- Pass gallery data to JS for lightbox -->
<script>
  window.roomGallery = <?= json_encode($room['gallery'], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/lightbox.php'; ?>
<script src="./js/script.js"></script>
</body>
</html>
