<!doctype html>
<html lang="en">
<head>
  <?php
  $pageTitle = 'Gallery – The Aspire Hotel';
  $pageDescription = 'Explore our complete photo gallery showcasing the luxurious rooms, facilities, and experiences at The Aspire Hotel, Guwahati.';
  require_once __DIR__ . '/includes/head.php';
  ?>
</head>
<body>

<?php
$navPage  = 'gallery';
$navClass = 'scrolled';
require_once __DIR__ . '/includes/nav.php';
?>

<?php
$galleryImages = [
    ['src' => 'Slider1.jpeg', 'title' => ''],
];
$galleryNumbers = array_merge([0], range(1, 10), range(12, 22));
foreach ($galleryNumbers as $n) {
  $src = $n === 0 ? 'Gallery.jpeg' : "Gallery{$n}.jpeg";
  $galleryImages[] = ['src' => $src, 'title' => ''];
}

$jsGallery = [];
foreach ($galleryImages as $img) {
  $jsGallery[] = [
    'url' => './assets/images/' . $img['src'],
    'title' => $img['title'],
  ];
}
?>

<!-- ═══════════════════════ GALLERY HERO ═══════════════════════ -->
<section class="details-hero">
  <img
    src="./assets/images/Slider1.jpeg"
    alt="Gallery"
    class="details-hero-img"
  />
  <div class="details-hero-overlay">
    <div class="details-hero-inner">
      <a href="./index.php" class="details-breadcrumb">
        <i class="ph ph-arrow-left"></i> The Aspire Hotel
      </a>
      <h1 class="details-room-name">Our Gallery</h1>
      <div class="details-hero-meta">
        <span class="details-room-view">DISCOVER THE ASPIRE HOTEL</span>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ GALLERY GRID ═══════════════════════ -->
<main class="details-main">
  <div class="gallery-page-container">

    <div class="gallery-page-intro reveal">
      <span class="eyebrow">EXPLORE OUR WORLD</span>
      <h2 class="details-heading">Moments that define<br />The Aspire experience.</h2>
    </div>

    <div class="gallery-grid-page" id="galleryGrid">
      <?php foreach ($galleryImages as $i => $img): ?>
        <div class="gallery-grid-item" data-index="<?= $i ?>">
          <img src="./assets/images/<?= htmlspecialchars($img['src']) ?>" alt="<?= htmlspecialchars($img['title']) ?>" loading="lazy" />
          <div class="gallery-grid-item-overlay">
            <span><?= htmlspecialchars($img['title']) ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/lightbox.php'; ?>
<script>window.roomGallery = <?= json_encode($jsGallery) ?>;</script>
<script src="./js/script.js"></script>
</body>
</html>
