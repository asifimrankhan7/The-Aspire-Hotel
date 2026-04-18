<!doctype html>
<html lang="en">
<head>
<?php
$pageTitle       = 'Contact Us – The Aspire Hotel';
$pageDescription = 'Get in touch with The Aspire Hotel. Book your stay or inquire about our services.';
require_once __DIR__ . '/includes/head.php';
?>
<style>
/* ════════════════════════════════════════════════════════
   CONTACT PAGE — CLEAN & MINIMAL
════════════════════════════════════════════════════════ */

/* ── Hero ── */
.contact-hero {
  min-height: 55vh;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 120px var(--container-px) 60px;
  background: #0a0a0a;
  overflow: hidden;
}

.contact-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 50%, rgba(201, 169, 98, 0.1) 0%, transparent 60%);
  pointer-events: none;
}

.contact-hero-content {
  position: relative;
  z-index: 1;
  max-width: 600px;
}

.contact-hero .eyebrow {
  margin-bottom: var(--space-6);
  color: var(--gold);
}

.contact-hero-title {
  font-family: var(--font-serif);
  font-size: clamp(40px, 6vw, 64px);
  font-weight: 400;
  color: var(--ink-inv);
  letter-spacing: 2px;
  text-transform: uppercase;
  margin-bottom: var(--space-5);
  line-height: 1.1;
}

.contact-hero-subtitle {
  font-size: 16px;
  color: var(--white-a70);
  line-height: 1.7;
  font-weight: 300;
}

/* ── Main Section ── */
.contact-section {
  padding: var(--section-padding) var(--container-px);
  background: var(--base);
}

.contact-container {
  max-width: 1200px;
  margin: 0 auto;
}

/* Two Column Layout */
.contact-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 80px;
  align-items: start;
}

/* Form */
.contact-form-wrapper {
  background: var(--ink-inv);
  border: 1px solid var(--glass-border);
  padding: 48px;
}

.contact-form {
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.form-group label {
  font-size: 11px;
  letter-spacing: 2px;
  text-transform: uppercase;
  font-weight: 600;
  color: var(--text-main);
}

.form-group input,
.form-group select,
.form-group textarea {
  padding: 16px 20px;
  border: 1px solid var(--glass-border);
  font-family: var(--font-sans);
  font-size: 15px;
  color: var(--text-main);
  background: var(--ink-inv);
  transition: border-color var(--t-base);
  outline: none;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
  border-color: var(--gold);
}

.form-group textarea {
  min-height: 120px;
  resize: vertical;
}

.contact-form .btn-primary {
  width: 100%;
  margin-top: 8px;
}

/* Info Side */
.contact-info {
  display: flex;
  flex-direction: column;
  gap: 40px;
}

.contact-info-block h3 {
  font-family: var(--font-serif);
  font-size: 22px;
  font-weight: 400;
  color: var(--ink);
  margin-bottom: 20px;
}

.contact-info-block p,
.contact-info-block a {
  font-size: 15px;
  color: var(--text-muted);
  line-height: 1.8;
  text-decoration: none;
  transition: color var(--t-base);
}

.contact-info-block a:hover {
  color: var(--gold);
}

.contact-divider {
  width: 40px;
  height: 1px;
  background: var(--gold);
  opacity: 0.5;
}

/* Simple social links */
.contact-social {
  display: flex;
  gap: 16px;
  margin-top: 8px;
}

.contact-social a {
  font-size: 12px;
  letter-spacing: 1px;
  color: var(--text-muted);
  text-decoration: none;
  transition: color var(--t-base);
}

.contact-social a:hover {
  color: var(--gold);
}

/* Map Section */
.contact-map {
  padding: var(--section-padding) var(--container-px);
  background: var(--surface);
}

.contact-map .container {
  max-width: 1200px;
  margin: 0 auto;
}

.contact-map .section-header {
  margin-bottom: 40px;
}

/* Responsive */
@media (max-width: 900px) {
  .contact-grid {
    grid-template-columns: 1fr;
    gap: 60px;
  }
  
  .contact-form-wrapper {
    padding: 32px;
  }
}

@media (max-width: 600px) {
  .contact-section {
    padding-top: 100px;
  }
  
  .contact-form-wrapper {
    padding: 24px;
  }
}
</style>
</head>
<body>

<?php 
$navPage = 'details';
require_once __DIR__ . '/includes/nav.php'; 
?>

<!-- ═══════════════════════ HERO ═══════════════════════ -->
<section class="contact-hero">
  <div class="contact-hero-content">
    <span class="eyebrow">CONTACT US</span>
    <h1 class="contact-hero-title">Get In Touch</h1>
    <p class="contact-hero-subtitle">
      Have a question about reservations or services? We're here to help.
    </p>
  </div>
</section>

<section class="contact-section">
  <div class="contact-container">
    
    <div class="contact-grid reveal">
      
      <!-- Form -->
      <div class="contact-form-wrapper reveal">
        <form class="contact-form" method="post" action="#">
          <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="John Doe" required>
          </div>
          
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="john@example.com" required>
          </div>
          
          <div class="form-group">
            <label for="subject">Subject</label>
            <select id="subject" name="subject" required>
              <option value="">Select a subject</option>
              <option value="reservation">Room Reservation</option>
              <option value="inquiry">General Inquiry</option>
              <option value="dining">Restaurant & Dining</option>
              <option value="events">Events & Meetings</option>
              <option value="feedback">Feedback</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="How can we help you?" required></textarea>
          </div>
          
          <button type="submit" class="btn-primary">SEND MESSAGE →</button>
        </form>
      </div>
      
      <!-- Info -->
      <div class="contact-info reveal">
        
        <div class="contact-info-block">
          <h3>Location</h3>
          <p>
            123 Luxury Avenue, City Center<br>
            Guwahati, Assam 781001<br>
            India
          </p>
        </div>
        
        <div class="contact-divider"></div>
        
        <div class="contact-info-block">
          <h3>Contact</h3>
          <p>
            <a href="tel:+911234567890">+91 1234 567 890</a><br>
            <a href="mailto:booking@theaspirehotel.com">booking@theaspirehotel.com</a>
          </p>
        </div>
        
        <div class="contact-divider"></div>
        
        <div class="contact-info-block">
          <h3>Hours</h3>
          <p>
            Front Desk: 24 Hours<br>
            Check-in: 2:00 PM<br>
            Check-out: 12:00 PM
          </p>
        </div>
        
        <div class="contact-social">
          <a href="#">Instagram</a>
          <a href="#">Facebook</a>
          <a href="#">Twitter</a>
        </div>
        
      </div>
      
    </div>
    
  </div>
</section>

<section class="contact-map">
  <div class="container">
    <div class="section-header reveal">
      <span class="eyebrow">FIND US</span>
      <h2 class="section-title">Our Location</h2>
    </div>
    <div class="map-container reveal">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57408.42095597567!2d91.7086485!3d26.1445169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a5948b879f007%3A0x6f5f3e3a069a6a7b!2sGuwahati%2C%20Assam!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"
        width="100%" height="400" style="border:0" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/lightbox.php'; ?>
<script src="./js/script.js"></script>
</body>
</html>
