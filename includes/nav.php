<?php
// $navPage: 'home' (default), 'details', or 'contact'
// 'home'    → anchor links on the same page
// 'details' → links pointing back to index.php
// 'contact' → links pointing to appropriate pages
$navPage  = $navPage  ?? 'home';
$navClass = $navClass ?? '';

$base = ($navPage === 'details' || $navPage === 'contact') ? './index.php' : '';
$contactLink = ($navPage === 'contact') ? './contact.php' : './contact.php';
?>
<!-- NAV -->
<nav id="main-nav"<?= $navClass ? ' class="' . $navClass . '"' : '' ?>>
  <a href="<?= $base ?>#home" class="nav-logo" id="nav-logo-link">
    <i class="ph ph-sketch-logo" style="font-size:28px;margin-right:10px"></i>
    The Aspire Hotel
  </a>
  <ul class="nav-links" id="nav-links">
    <li><a href="<?= $base ?>#home">Home</a></li>
    <li><a href="<?= $base ?>#rooms">Rooms</a></li>
    <li><a href="<?= $base ?>#explore">Explore</a></li>
    <li><a href="<?= $base ?>#news-offers">News &amp; Offers</a></li>
    <li><a href="<?= $base ?>#map">Map</a></li>
    <li><a href="./contact.php">Contact Us</a></li>
  </ul>
  <button class="nav-hamburger" id="nav-hamburger" aria-label="Open menu">
    <span></span><span></span><span></span>
  </button>
</nav>

<!-- MOBILE MENU DRAWER -->
<div class="mobile-menu" id="mobile-menu">
  <button class="mobile-menu-close" id="mobile-menu-close" aria-label="Close menu">✕</button>
  <ul class="mobile-nav-links">
    <li><a href="<?= $base ?>#home">Home</a></li>
    <li><a href="<?= $base ?>#rooms">Rooms</a></li>
    <li><a href="<?= $base ?>#explore">Explore</a></li>
    <li><a href="<?= $base ?>#news-offers">News &amp; Offers</a></li>
    <li><a href="<?= $base ?>#map">Map</a></li>
    <li><a href="./contact.php">Contact Us</a></li>
  </ul>
  <a href="<?= $base ?>#rooms" class="nav-btn" style="margin-top:40px;display:inline-block">Reservation</a>
</div>
<div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>
