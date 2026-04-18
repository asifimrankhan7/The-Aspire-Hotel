<?php
// Usage: include with $pageTitle and $pageDescription set before including
$pageTitle       = $pageTitle       ?? 'The Aspire Hotel – Guwahati';
$pageDescription = $pageDescription ?? 'The Aspire Hotel, located in the heart of Guwahati. Luxurious, modern and comfortable rooms. Best prices and memorable stay awaits you.';
?>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?= htmlspecialchars($pageTitle) ?></title>
<meta name="description" content="<?= htmlspecialchars($pageDescription) ?>" />
<link rel="stylesheet" href="./css/style.css" />
<!-- Phosphor Icons -->
<script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
<!-- Embla Carousel CDN -->
<script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
