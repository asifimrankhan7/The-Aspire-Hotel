<!doctype html>
<html lang="en">
<head>
  <?php
  $pageTitle = 'Dining – The Aspire Hotel';
  $pageDescription = 'Experience fine dining at The Aspire Hotel. From global cuisines to local delicacies, our chefs prepare every dish with passion and excellence.';
  require_once __DIR__ . '/includes/head.php';
  ?>
</head>
<body>

<?php
$navPage  = 'contact'; // Use 'contact' state to ensure links point back to index.php
$navClass = 'scrolled';
require_once __DIR__ . '/includes/nav.php';
?>

<!-- ═══════════════════════ DINING HERO ═══════════════════════ -->
<section class="details-hero">
  <img
    src="./assets/images/Rest Air.png"
    alt="The Grand Restaurant"
    class="details-hero-img"
  />
  <div class="details-hero-overlay">
    <div class="details-hero-inner">
      <a href="./index.php" class="details-breadcrumb">
        <i class="ph ph-arrow-left"></i> The Aspire Hotel
      </a>
      <h1 class="details-room-name">Rest Air </h1>
      <div class="details-hero-meta">
        <span class="details-room-view">A ROOFTOP RESTAURANT BY ASPIRE HOTEL.</span>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ DINING CONTENT ═══════════════════════ -->
<main class="details-main">
  <div class="details-grid" style="grid-template-columns: 1fr; max-width: 900px;">

    <!-- Left: Content -->
    <div class="details-content">
      <div class="details-intro reveal">
        <span class="amenities-eyebrow">CULINARY EXCELLENCE</span>
        <h2 class="details-heading">Savour the world<br />on your plate.</h2>
        <p class="details-desc">
          At The Aspire Hotel, we believe that dining is more than just 
          a meal—it's an experience. Our RestAir , Rooftop restaurant, 
          offers a curated selection of Chinese and Indian cuisines prepared 
          by our chefs. Whether you are looking for a romantic dinner, a business 
          lunch, or a family gathering, our intimate atmosphere and exceptional 
          service provide the perfect setting for every occasion. We also offer 
          boiled food, homestyle menu for our guests who wish for a less spicy 
          meal. Our room service will be happy to assist you for any customised 
          menu. Enjoy the cool evening breeze and panoramic city skyline at the 
          dedicated rooftop seating area.
        </p>
      </div>

      <!-- Dining Stats/Info -->
      <div class="details-stats reveal">
        <div class="stat-box">
          <i class="ph ph-clock stat-icon"></i>
          <span class="stat-label">Breakfast</span>
          <span class="stat-value">07:30 AM – 10:30 AM</span>
        </div>
        <div class="stat-box">
          <i class="ph ph-fork-knife stat-icon"></i>
          <span class="stat-label">Lunch</span>
          <span class="stat-value">12:30 PM – 03:00 PM</span>
        </div>
        <div class="stat-box"> 
          <i class="ph ph-moon stat-icon"></i>
          <span class="stat-label">Dinner</span>
          <span class="stat-value">08:00 PM – 11:00 PM</span>
        </div>
      </div>

      <!-- Menu Button -->
      <div class="reveal" style="margin-top: calc(-1 * var(--space-8));">
        <a href="./assets/menu/menu.pdf" target="_blank" class="btn-primary">
          <i class="ph ph-file-text" style="margin-right: 8px; font-size: 16px;"></i>
          VIEW OUR MENU
        </a>
      </div>
    </div>


  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/lightbox.php'; ?>
<script src="./js/script.js"></script>
</body>
</html>
