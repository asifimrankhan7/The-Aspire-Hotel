<?php
$pageTitle = 'Terms & Conditions – The Aspire Hotel';
$pageDescription = 'Read the Terms and Conditions of The Aspire Hotel, including our reservation policies, cancellation rules, and guidelines.';
?>
<!doctype html>
<html lang="en">
<head>
  <?php require_once __DIR__ . '/includes/head.php'; ?>
</head>
<body>

<?php
$navPage  = 'terms';
$navClass = 'scrolled';
require_once __DIR__ . '/includes/nav.php';
?>

<!-- ═══════════════════════ HERO ═══════════════════════ -->
<section class="details-hero">
  <img src="./assets/images/Gallery.jpeg" alt="Terms & Conditions" class="details-hero-img" style="filter: brightness(0.3);" />
  <div class="details-hero-overlay">
    <div class="details-hero-inner">
      <a href="./index.php" class="details-breadcrumb">
        <i class="ph ph-arrow-left"></i> The Aspire Hotel
      </a>
      <h1 class="details-room-name">Terms &amp; Conditions</h1>
      <div class="details-hero-meta">
        <span class="details-room-view">POLICIES & GUIDELINES</span>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════ CONTENT ═══════════════════════ -->
<main class="terms-main">
  <div class="container">
    <div class="terms-content reveal">
      <h2>1. Introduction</h2>
      <p>Welcome to The Aspire Hotel. By making a reservation or using our website, you agree to be bound by these Terms and Conditions. Please read them carefully.</p>
      
      <h2>2. Booking & Reservation</h2>
      <p>All reservations are subject to availability. The Aspire Hotel reserves the right to refuse a booking without providing any reason. Guests must be at least 18 years of age to book a room. Valid government-issued ID is required at check-in.</p>

      <h2>3. Check-In & Check-Out</h2>
      <ul>
        <li><strong>Check-in Time:</strong> 12:00 PM (Noon)</li>
        <li><strong>Check-out Time:</strong> 11:00 AM</li>
      </ul>
      <p>Early check-in and late check-out are subject to availability and may incur additional charges.</p>

      <h2>4. Cancellation & Refund Policy</h2>
      <p>Cancellations must be made at least 48 hours prior to the scheduled arrival date to avoid a one-night cancellation fee. Promotional or non-refundable rates are not eligible for cancellations or modifications.</p>

      <h2>5. Guest Behavior & Hotel Property</h2>
      <p>Guests are expected to conduct themselves in a respectable manner. Any damage to hotel property caused by the guest will be billed to the guest's account. Smoking is strictly prohibited in rooms and is only permitted in designated smoking zones.</p>

      <h2>6. Privacy & Data</h2>
      <p>We respect your privacy and are committed to protecting your personal data. Your information is collected solely for processing bookings and providing our services in accordance with our Privacy Policy.</p>

      <h2>7. Modifications</h2>
      <p>The Aspire Hotel reserves the right to modify these Terms & Conditions at any time. Any changes will be updated on this page.</p>

      <h2>8. Contact Information</h2>
      <p>If you have any questions about these Terms & Conditions, please contact us at:</p>
      <p>
        <strong>The Aspire Hotel</strong><br>
        Silver Aspire Tower, MD Shah Rd, Paltan Bazaar, Guwahati, Assam 781008<br>
        Phone: +91 91819 12340<br>
        Email: theaspirehotel@gmail.com
      </p>
    </div>
  </div>
</main>

<style>
  .terms-main {
    padding: 100px 0;
    background: var(--base);
  }
  .terms-content {
    max-width: 900px;
    margin: 0 auto;
    background: var(--surface);
    padding: 60px;
    border-radius: var(--radius-lg);
    border: 1px solid var(--glass-border);
    box-shadow: var(--shadow-sm);
  }
  .terms-content h2 {
    font-family: var(--font-serif);
    font-size: 24px;
    color: var(--ink);
    margin-top: 40px;
    margin-bottom: 15px;
  }
  .terms-content h2:first-child {
    margin-top: 0;
  }
  .terms-content p, .terms-content ul {
    font-size: 16px;
    line-height: 1.8;
    color: var(--text-muted);
    margin-bottom: 20px;
  }
  .terms-content ul {
    padding-left: 20px;
  }
  .terms-content li {
    margin-bottom: 10px;
  }
  .terms-content strong {
    color: var(--text-main);
    font-weight: 600;
  }
  
  @media (max-width: 768px) {
    .terms-content {
      padding: 40px 20px;
    }
    .terms-content h2 {
      font-size: 22px;
    }
  }
</style>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/lightbox.php'; ?>
<script src="./js/script.js"></script>
</body>
</html>
