<?php
// Usage: include with $pageTitle and $pageDescription set before including
$pageTitle       = $pageTitle       ?? 'The Aspire Hotel – Guwahati';
$pageDescription = $pageDescription ?? 'The Aspire Hotel, located in the heart of Guwahati. Luxurious, modern and comfortable rooms. Best prices and memorable stay awaits you.';
?>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?= htmlspecialchars($pageTitle) ?></title>
<meta name="description" content="<?= htmlspecialchars($pageDescription) ?>" />
<link rel="icon" type="image/png" href="./assets/images/LOGO1.png" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Outfit:wght@200;300;400;500;700&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="./css/style.css" />
<!-- Phosphor Icons -->
<script src="https://unpkg.com/@phosphor-icons/web@2.1.1" defer></script>
<!-- Embla Carousel CDN -->
<script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js" defer></script>
<!-- SwiperJS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
