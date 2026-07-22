<!doctype html>
<html lang="en">
<head>
  <?php
  $pageTitle = 'Tour Packages & Offers – The Aspire Hotel';
  $pageDescription = 'Explore our curated tour packages and exclusive offers at The Aspire Hotel. Discover the beauty of North-East India with our customized travel experiences.';
  require_once __DIR__ . '/includes/head.php';
  ?>
</head>
<body>

<?php
$navPage  = 'offers';
$navClass = 'scrolled';
require_once __DIR__ . '/includes/nav.php';
?>

<!-- ═══════════════════════ OFFERS HERO ═══════════════════════ -->
<section class="details-hero">
  <img
    src="./assets/images/tour_kaziranga.png"
    alt="Tour Packages and Offers"
    class="details-hero-img"
  />
  <div class="details-hero-overlay">
    <div class="details-hero-inner">
      <a href="./index.php" class="details-breadcrumb">
        <i class="ph ph-arrow-left"></i> The Aspire Hotel
      </a>
      <h1 class="details-room-name">Tour Packages &amp; Offers</h1>
      <div class="details-hero-meta">
        <span class="details-room-view">EXPLORE THE NORTH-EAST</span>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ OFFERS CONTENT ═══════════════════════ -->
<main class="details-main">
  <div class="container">
    <div class="details-intro reveal" style="text-align: center; max-width: 800px; margin: 0 auto 60px;">
      <span class="eyebrow">CURATED EXPERIENCES</span>
      <h2 class="details-heading">Discover the beauty of the North-East.</h2>
      <p class="details-desc">
        The Aspire Hotel offers exclusively customized packages to explore the most popular 
        tourist destinations across the North-East states. From spiritual journeys to wildlife 
        adventures, we ensure every trip is memorable and comfortable.
      </p>
    </div>

    <?php
    $offers = [
      [
        'badge' => 'Guwahati',
        'title' => 'Guwahati City Tour',
        'desc'  => 'A comprehensive day tour of Guwahati city including the State Zoo, Umananda Island, Ropeway, Acooland, Bashistha Ashram, Assam State Museum, Nehru Park, and Srimanta Shankardeva Kalakshetra. Enjoy local shopping at the famous Fancy Bazar.',
        'image' => './assets/images/tour_guwahati.png'
      ],
      [
        'badge' => 'Spiritual',
        'title' => 'Kamakhya Devi Darshan',
        'desc'  => 'A sacred and serene visit to the Kamakhya Devi Temple. Experience the spiritual essence of the temple and enjoy a breathtaking city view from the Hilltop.',
        'image' => './assets/images/tour_kamakhya.png'
      ],
      [
        'badge' => 'Wildlife',
        'title' => 'Kaziranga Tour Package',
        'desc'  => 'A thrilling journey to Kaziranga National Park, a UNESCO World Heritage site. Home to the world-famous Great One-Horned Rhinoceros, Kaziranga offers an unparalleled wildlife experience.',
        'image' => './assets/images/tour_kaziranga_tiger.png'
      ],
      [
        'badge' => 'Wildlife',
        'title' => 'Pobitora Sanctuary Tour',
        'desc'  => 'Visit the Pobitora Wildlife Sanctuary, known for having the highest density of Indian Rhinoceros in the world. A perfect short trip for wildlife enthusiasts.',
        'image' => './assets/images/tour_pobitora.png'
      ],
      [
        'badge' => 'Nature',
        'title' => 'Meghalaya Escapade',
        'desc'  => 'Customized tour packages to Shillong (the Scotland of the East), Cherrapunjee, Dawki, and Mawlynnong (the cleanest village in Asia), including the iconic Living Root Bridge.',
        'image' => './assets/images/tour_meghalaya.png'
      ],
      [
        'badge' => 'Adventure',
        'title' => 'Arunachal Pradesh Tour',
        'desc'  => 'Explore the "Land of the Dawn-Lit Mountains". Journey through Shergaon, Dirang, Bhalukpong, Tawang, and the high-altitude Bumla Pass with local sightseeing.',
        'image' => './assets/images/tour_arunachal.png'
      ],
      [
        'badge' => 'International',
        'title' => 'Bhutan Border Tour',
        'desc'  => 'A day visit to Samdrup Jhonkar in Bhutan. Experience the unique culture and savor authentic local Bhutanese cuisine like Thukpa and Ema Datshi.',
        'image' => './assets/images/Bhutan Tour.jpeg'
      ]
    ];
    ?>

    <div class="offers-detailed-grid">
      <?php foreach ($offers as $offer): ?>
      <div class="offer-detail-card reveal">
        <div class="offer-detail-image">
          <img src="<?= $offer['image'] ?>" alt="<?= htmlspecialchars($offer['title']) ?>" loading="lazy">
          <span class="offer-detail-badge"><?= htmlspecialchars($offer['badge']) ?></span>
        </div>
        <div class="offer-detail-info">
          <h3 class="offer-detail-title"><?= htmlspecialchars($offer['title']) ?></h3>
          <p class="offer-detail-desc"><?= htmlspecialchars($offer['desc']) ?></p>
          <a href="https://wa.me/919181912340" target="_blank" rel="noopener" class="btn-lara-read">
            ENQUIRE NOW &nbsp;→
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<style>
.offers-detailed-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
  gap: 40px;
  max-width: 1400px;
  margin: 0 auto;
}
.offer-detail-card {
  background: var(--surface);
  border: 1px solid var(--glass-border);
  border-radius: var(--radius-lg);
  overflow: hidden;
  transition: transform var(--t-base), box-shadow var(--t-base);
}
.offer-detail-card:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-md);
}
.offer-detail-image {
  height: 250px;
  position: relative;
  overflow: hidden;
}
.offer-detail-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.offer-detail-badge {
  position: absolute;
  top: 20px;
  left: 20px;
  background: var(--gold);
  color: white;
  padding: 6px 12px;
  font-size: 10px;
  letter-spacing: 2px;
  text-transform: uppercase;
  font-weight: 600;
  border-radius: var(--radius-xs);
}
.offer-detail-info {
  padding: 30px;
}
.offer-detail-title {
  font-family: var(--font-serif);
  font-size: 24px;
  margin-bottom: 15px;
  color: var(--ink);
}
.offer-detail-desc {
  font-size: 15px;
  line-height: 1.7;
  color: var(--text-muted);
  margin-bottom: 25px;
}
@media (max-width: 768px) {
  .offers-detailed-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/lightbox.php'; ?>
<script src="./js/script.js"></script>
</body>
</html>
