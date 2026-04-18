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
   CONTACT PAGE — EDITORIAL LAYOUT
════════════════════════════════════════════════════════ */

/* ── Hero ── */
.contact-hero {
  min-height: 50vh;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 140px var(--container-px) 80px;
  background: #0a0a0a;
}

.contact-hero-content {
  position: relative;
  z-index: 1;
}

.contact-hero .eyebrow {
  margin-bottom: 24px;
  color: var(--gold);
}

.contact-hero h1 {
  font-family: var(--font-serif);
  font-size: clamp(48px, 8vw, 80px);
  font-weight: 400;
  color: var(--ink-inv);
  letter-spacing: 2px;
  text-transform: uppercase;
  margin-bottom: 20px;
}

.contact-hero p {
  font-size: 18px;
  color: var(--white-a70);
  font-weight: 300;
  max-width: 500px;
  margin: 0 auto;
}

/* ── Contact Section ── */
.contact-section {
  padding: 0;
  background: var(--base);
}

.contact-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 600px;
}

/* Left Side - Visual */
.contact-visual {
  position: relative;
  background: linear-gradient(135deg, #1a1a1a 0%, #0a0a0a 100%);
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 80px;
  color: var(--ink-inv);
}

.contact-visual::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 70% 30%, rgba(201, 169, 98, 0.15) 0%, transparent 50%);
}

.contact-visual-content {
  position: relative;
  z-index: 1;
}

.contact-visual h2 {
  font-family: var(--font-serif);
  font-size: 36px;
  font-weight: 400;
  margin-bottom: 40px;
  line-height: 1.3;
}

.contact-detail {
  display: flex;
  gap: 20px;
  margin-bottom: 32px;
  align-items: flex-start;
}

.contact-detail-icon {
  width: 48px;
  height: 48px;
  background: rgba(201, 169, 98, 0.1);
  border: 1px solid rgba(201, 169, 98, 0.3);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.contact-detail-icon .ph {
  font-size: 22px;
  color: var(--gold);
}

.contact-detail-text h4 {
  font-family: var(--font-sans);
  font-size: 12px;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--gold);
  margin-bottom: 8px;
  font-weight: 600;
}

.contact-detail-text p,
.contact-detail-text a {
  font-size: 16px;
  color: var(--white-a70);
  line-height: 1.6;
  text-decoration: none;
  transition: color 0.3s;
}

.contact-detail-text a:hover {
  color: var(--gold);
}

/* Right Side - Form */
.contact-form-area {
  background: var(--ink-inv);
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 80px;
}

.contact-form-area h3 {
  font-family: var(--font-serif);
  font-size: 28px;
  font-weight: 400;
  color: var(--ink);
  margin-bottom: 40px;
}

.contact-form {
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.form-group.full {
  grid-column: 1 / -1;
}

.form-group label {
  font-size: 11px;
  letter-spacing: 2px;
  text-transform: uppercase;
  font-weight: 600;
  color: var(--text-muted);
}

.form-group input,
.form-group select,
.form-group textarea {
  padding: 16px 0;
  border: none;
  border-bottom: 1px solid var(--glass-border);
  font-family: var(--font-sans);
  font-size: 16px;
  color: var(--text-main);
  background: transparent;
  transition: border-color 0.3s;
  outline: none;
  border-radius: 0;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
  border-bottom-color: var(--gold);
}

.form-group textarea {
  min-height: 100px;
  resize: vertical;
}

.contact-form .btn-primary {
  margin-top: 16px;
  align-self: flex-start;
  padding: 18px 48px;
}

/* ── Map Section ── */
.contact-map-section {
  padding: var(--section-padding) 0;
  background: var(--surface);
}

.contact-map-header {
  text-align: center;
  margin-bottom: 48px;
  padding: 0 var(--container-px);
}

.contact-map-header .eyebrow {
  margin-bottom: 16px;
}

.contact-map-header h2 {
  font-family: var(--font-serif);
  font-size: var(--h3);
  font-weight: 400;
  color: var(--ink);
}

.contact-map-container {
  height: 450px;
}

.contact-map-container iframe {
  width: 100%;
  height: 100%;
  border: none;
  display: block;
  filter: grayscale(30%);
}

/* ── Responsive ── */
@media (max-width: 1100px) {
  .contact-split {
    grid-template-columns: 1fr;
  }
  
  .contact-visual,
  .contact-form-area {
    padding: 60px 40px;
  }
  
  .contact-visual {
    min-height: auto;
  }
}

@media (max-width: 600px) {
  .contact-hero {
    padding: 120px 24px 60px;
  }
  
  .contact-hero h1 {
    font-size: 36px;
  }
  
  .form-row {
    grid-template-columns: 1fr;
  }
  
  .contact-visual,
  .contact-form-area {
    padding: 40px 24px;
  }
  
  .contact-visual h2 {
    font-size: 28px;
  }
  
  .contact-form .btn-primary {
    width: 100%;
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
  <div class="contact-hero-content reveal">
    <span class="eyebrow">CONTACT US</span>
    <h1>Get In Touch</h1>
    <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
  </div>
</section>

<!-- ═══════════════════════ CONTACT SPLIT ═══════════════════════ -->
<section class="contact-section">
  <div class="contact-split">
    
    <!-- Left: Visual/Info -->
    <div class="contact-visual">
      <div class="contact-visual-content reveal">
        <h2>Let's start a conversation</h2>
        
        <div class="contact-detail">
          <div class="contact-detail-icon">
            <i class="ph ph-map-pin"></i>
          </div>
          <div class="contact-detail-text">
            <h4>Visit Us</h4>
            <p>123 Luxury Avenue, City Center<br>Guwahati, Assam 781001</p>
          </div>
        </div>
        
        <div class="contact-detail">
          <div class="contact-detail-icon">
            <i class="ph ph-phone"></i>
          </div>
          <div class="contact-detail-text">
            <h4>Call Us</h4>
            <p><a href="tel:+911234567890">+91 1234 567 890</a></p>
          </div>
        </div>
        
        <div class="contact-detail">
          <div class="contact-detail-icon">
            <i class="ph ph-envelope"></i>
          </div>
          <div class="contact-detail-text">
            <h4>Email Us</h4>
            <p><a href="mailto:booking@theaspirehotel.com">booking@theaspirehotel.com</a></p>
          </div>
        </div>
        
        <div class="contact-detail">
          <div class="contact-detail-icon">
            <i class="ph ph-clock"></i>
          </div>
          <div class="contact-detail-text">
            <h4>Front Desk</h4>
            <p>Open 24 Hours</p>
          </div>
        </div>
        
      </div>
    </div>
    
    <!-- Right: Form -->
    <div class="contact-form-area">
      <div class="reveal">
        <h3>Send a Message</h3>
        
        <form class="contact-form" method="post" action="#">
          <div class="form-row">
            <div class="form-group">
              <label for="firstName">First Name</label>
              <input type="text" id="firstName" name="firstName" placeholder="John" required>
            </div>
            <div class="form-group">
              <label for="lastName">Last Name</label>
              <input type="text" id="lastName" name="lastName" placeholder="Doe" required>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="john@example.com" required>
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" id="phone" name="phone" placeholder="+91 98765 43210">
            </div>
          </div>
          
          <div class="form-group full">
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
          
          <div class="form-group full">
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Tell us what you need..." required></textarea>
          </div>
          
          <button type="submit" class="btn-primary">SEND MESSAGE →</button>
        </form>
      </div>
    </div>
    
  </div>
</section>

<!-- ═══════════════════════ MAP ═══════════════════════ -->
<section class="contact-map-section">
  <div class="contact-map-header reveal">
    <span class="eyebrow">FIND US</span>
    <h2>Our Location</h2>
  </div>
  <div class="contact-map-container">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57408.42095597567!2d91.7086485!3d26.1445169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a5948b879f007%3A0x6f5f3e3a069a6a7b!2sGuwahati%2C%20Assam!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"
      allowfullscreen="" 
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/lightbox.php'; ?>
<script src="./js/script.js"></script>
</body>
</html>
