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

<!-- HERO -->
<section class="details-hero">
  <img
    src="<?= htmlspecialchars($room['gallery'][0]['url']) ?>"
    alt="<?= htmlspecialchars($room['name']) ?>"
    class="details-hero-img"
  />
  <div class="details-hero-overlay">
    <span class="details-room-price">
      Starting From <span><?= htmlspecialchars($room['price']) ?></span> / Night
    </span>
    <h1 class="details-room-name"><?= htmlspecialchars($room['name']) ?></h1>
  </div>
</section>

<!-- MAIN CONTENT -->
<main class="details-main">
  <div class="details-grid">

    <div class="details-content">
      <div class="reveal">
        <span class="amenities-eyebrow">ABOUT THE ROOM</span>
        <h2 class="title">Luxury and comfort redefined.</h2>
        <p class="details-desc"><?= htmlspecialchars($room['description']) ?></p>
      </div>

      <!-- Stats -->
      <div class="details-stats reveal">
        <div class="stat-box"><span class="label">Size</span><span class="value"><?= htmlspecialchars($room['size']) ?></span></div>
        <div class="stat-box"><span class="label">Beds</span><span class="value"><?= htmlspecialchars($room['beds']) ?></span></div>
        <div class="stat-box"><span class="label">Guests</span><span class="value"><?= htmlspecialchars($room['guests']) ?></span></div>
        <div class="stat-box"><span class="label">View</span><span class="value"><?= htmlspecialchars($room['view']) ?></span></div>
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

    <!-- Booking Sidebar -->
    <aside class="details-sidebar">
      <div class="booking-card reveal">
        <span class="booking-unit">From</span>
        <div class="booking-price"><?= htmlspecialchars($room['price']) ?></div>
        <span class="booking-unit">Per Night</span>
        <a href="https://wa.me/919957173362" target="_blank" class="btn-book-large">
          BOOK VIA WHATSAPP
        </a>
        <p class="booking-note">Best price guaranteed when booking directly.</p>
      </div>
    </aside>

  </div>
</main>

<!-- GALLERY -->
<section class="details-gallery reveal">
  <div class="gallery-header-new">
    <span class="section-eyebrow">VISUAL EXPERIENCE</span>
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
