<!doctype html>
<html lang="en">
<head>
<?php
$pageTitle       = 'Contact Us – The Aspire Hotel';
$pageDescription = 'Get in touch with The Aspire Hotel. Book your stay, inquire about our services, or reach out for any questions. We are here to help you.';
require_once __DIR__ . '/includes/head.php';
?>
<style>
/* ════════════════════════════════════════════════════════
   CONTACT PAGE SPECIFIC STYLES
════════════════════════════════════════════════════════ */

/* ── Hero Section ── */
.contact-hero {
  min-height: 60vh;
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  padding-top: 120px;
  padding-bottom: 60px;
  background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0a0a0a 100%);
}

.contact-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 30% 50%, rgba(201, 169, 98, 0.08) 0%, transparent 50%),
              radial-gradient(ellipse at 70% 80%, rgba(201, 169, 98, 0.05) 0%, transparent 40%);
  pointer-events: none;
}

.contact-hero-content {
  position: relative;
  z-index: var(--z-raised);
  text-align: center;
  color: var(--ink-inv);
  max-width: 800px;
  padding: 0 var(--container-px);
  animation: fadeUp 1.4s var(--ease-out) both;
}

.contact-hero-title {
  font-family: var(--font-serif);
  font-size: clamp(36px, 6vw, 72px);
  font-weight: 400;
  color: var(--ink-inv);
  letter-spacing: clamp(4px, 1vw, 8px);
  text-transform: uppercase;
  line-height: 1.1;
  margin-bottom: var(--space-6);
}

.contact-hero-subtitle {
  color: var(--white-a70);
  font-size: clamp(14px, 1.5vw, 18px);
  font-weight: 300;
  letter-spacing: 0.5px;
  max-width: 520px;
  margin: 0 auto var(--space-10);
  line-height: 1.7;
}

/* ── Contact Info Bar ── */
.contact-info-bar {
  background: var(--ink-inv);
  padding: var(--space-10) var(--container-px);
  border-bottom: 1px solid var(--glass-border);
}

.contact-info-grid {
  max-width: 1400px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: var(--space-8);
}

.contact-info-item {
  display: flex;
  align-items: flex-start;
  gap: var(--space-5);
  padding: var(--space-6);
  border: 1px solid var(--glass-border);
  border-radius: var(--radius-md);
  transition: border-color var(--t-base) var(--ease-smooth),
              transform var(--t-base) var(--ease-smooth),
              box-shadow var(--t-base) var(--ease-smooth);
}

.contact-info-item:hover {
  border-color: var(--gold);
  transform: translateY(-2px);
  box-shadow: var(--shadow-gold-sm);
}

.contact-info-icon {
  width: 48px;
  height: 48px;
  background: var(--gold-muted);
  border-radius: var(--radius-full);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  color: var(--gold);
  font-size: 22px;
  transition: background var(--t-base), color var(--t-base);
}

.contact-info-item:hover .contact-info-icon {
  background: var(--gold);
  color: var(--ink-inv);
}

.contact-info-content h3 {
  font-family: var(--font-serif);
  font-size: 18px;
  font-weight: 500;
  color: var(--ink);
  margin-bottom: var(--space-2);
}

.contact-info-content p,
.contact-info-content a {
  font-size: 14px;
  color: var(--text-muted);
  line-height: 1.6;
  text-decoration: none;
  transition: color var(--t-base);
}

.contact-info-content a:hover {
  color: var(--gold);
}

/* ── Main Contact Section ── */
.contact-main {
  background: var(--base);
  padding: var(--section-padding) var(--container-px);
}

.contact-grid {
  max-width: 1400px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1.2fr;
  gap: 80px;
  align-items: start;
}

/* ── Contact Form ── */
.contact-form-wrapper {
  background: var(--ink-inv);
  border: 1px solid var(--glass-border);
  border-radius: var(--radius-lg);
  padding: 48px;
  box-shadow: var(--shadow-sm);
}

.contact-form-header {
  margin-bottom: var(--space-10);
}

.contact-form-header h2 {
  font-family: var(--font-serif);
  font-size: var(--h3);
  font-weight: 400;
  color: var(--ink);
  margin-bottom: var(--space-4);
}

.contact-form-header p {
  font-size: 14px;
  color: var(--text-muted);
  line-height: 1.6;
}

.contact-form {
  display: flex;
  flex-direction: column;
  gap: var(--space-6);
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: var(--space-2);
}

.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-6);
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
  border-radius: var(--radius-sm);
  font-family: var(--font-sans);
  font-size: 15px;
  color: var(--text-main);
  background: var(--ink-inv);
  transition: border-color var(--t-base), box-shadow var(--t-base);
  outline: none;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
  border-color: var(--gold);
  box-shadow: 0 0 0 3px var(--gold-muted);
}

.form-group input::placeholder,
.form-group textarea::placeholder {
  color: var(--text-muted);
  opacity: 0.6;
}

.form-group textarea {
  min-height: 140px;
  resize: vertical;
}

.contact-form .btn-primary {
  width: 100%;
  padding: 18px 32px;
  font-size: 12px;
  letter-spacing: 3px;
  margin-top: var(--space-4);
}

/* ── Contact Sidebar ── */
.contact-sidebar {
  display: flex;
  flex-direction: column;
  gap: var(--space-10);
}

.contact-sidebar-block {
  background: var(--ink-inv);
  border: 1px solid var(--glass-border);
  border-radius: var(--radius-lg);
  padding: 40px;
  box-shadow: var(--shadow-sm);
}

.contact-sidebar-block h3 {
  font-family: var(--font-serif);
  font-size: 24px;
  font-weight: 400;
  color: var(--ink);
  margin-bottom: var(--space-6);
  display: flex;
  align-items: center;
  gap: var(--space-3);
}

.contact-sidebar-block h3 .ph {
  color: var(--gold);
  font-size: 28px;
}

.quick-contact-list {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: var(--space-5);
}

.quick-contact-list li {
  display: flex;
  align-items: center;
  gap: var(--space-4);
  font-size: 15px;
  color: var(--text-muted);
}

.quick-contact-list li .ph {
  color: var(--gold);
  font-size: 20px;
  flex-shrink: 0;
}

.quick-contact-list li a {
  color: var(--text-main);
  text-decoration: none;
  font-weight: 500;
  transition: color var(--t-base);
}

.quick-contact-list li a:hover {
  color: var(--gold);
}

/* Social Links */
.contact-social {
  display: flex;
  gap: var(--space-4);
  margin-top: var(--space-6);
}

.contact-social a {
  width: 44px;
  height: 44px;
  border: 1px solid var(--glass-border);
  border-radius: var(--radius-full);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--text-muted);
  text-decoration: none;
  font-size: 14px;
  font-weight: 600;
  transition: border-color var(--t-base), 
              color var(--t-base), 
              background var(--t-base),
              transform var(--t-base);
}

.contact-social a:hover {
  border-color: var(--gold);
  color: var(--gold);
  background: var(--gold-muted);
  transform: translateY(-2px);
}

/* Operating Hours */
.operating-hours {
  list-style: none;
  display: flex;
  flex-direction: column;
  gap: var(--space-4);
}

.operating-hours li {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: var(--space-4) 0;
  border-bottom: 1px solid var(--glass-border);
  font-size: 14px;
}

.operating-hours li:last-child {
  border-bottom: none;
}

.operating-hours .day {
  color: var(--text-main);
  font-weight: 500;
}

.operating-hours .time {
  color: var(--gold);
  font-weight: 600;
}

/* ── Map Section ── */
.contact-map-section {
  padding: var(--section-padding) var(--container-px);
  background: var(--surface);
}

/* ── Responsive ── */
@media (max-width: 1100px) {
  .contact-grid {
    grid-template-columns: 1fr;
    gap: 60px;
  }
  
  .contact-form-wrapper {
    padding: 36px;
  }
}

@media (max-width: 768px) {
  .contact-hero {
    min-height: 50vh;
    padding-top: 100px;
  }
  
  .form-row {
    grid-template-columns: 1fr;
  }
  
  .contact-form-wrapper {
    padding: 28px;
  }
  
  .contact-sidebar-block {
    padding: 28px;
  }
  
  .contact-info-grid {
    grid-template-columns: 1fr;
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
    <div class="hero-stars">★★★★★</div>
    <h1 class="contact-hero-title">Get In Touch</h1>
    <div class="hero-divider"></div>
    <p class="contact-hero-subtitle">
      Whether you have a question about reservations, services, or anything else, 
      our team is ready to answer all your inquiries.
    </p>
  </div>
</section>

<!-- ═══════════════════════ CONTACT INFO BAR ═══════════════════════ -->
<section class="contact-info-bar">
  <div class="contact-info-grid">
    
    <div class="contact-info-item reveal">
      <div class="contact-info-icon">
        <i class="ph ph-map-pin"></i>
      </div>
      <div class="contact-info-content">
        <h3>Address</h3>
        <p>123 Luxury Avenue, City Center<br>Guwahati, Assam 781001, India</p>
      </div>
    </div>
    
    <div class="contact-info-item reveal">
      <div class="contact-info-icon">
        <i class="ph ph-phone"></i>
      </div>
      <div class="contact-info-content">
        <h3>Phone</h3>
        <p>
          <a href="tel:+911234567890">+91 1234 567 890</a><br>
          <a href="tel:+911234567891">+91 1234 567 891</a>
        </p>
      </div>
    </div>
    
    <div class="contact-info-item reveal">
      <div class="contact-info-icon">
        <i class="ph ph-envelope"></i>
      </div>
      <div class="contact-info-content">
        <h3>Email</h3>
        <p>
          <a href="mailto:booking@theaspirehotel.com">booking@theaspirehotel.com</a><br>
          <a href="mailto:info@theaspirehotel.com">info@theaspirehotel.com</a>
        </p>
      </div>
    </div>
    
    <div class="contact-info-item reveal">
      <div class="contact-info-icon">
        <i class="ph ph-clock"></i>
      </div>
      <div class="contact-info-content">
        <h3>Reception</h3>
        <p>Open 24 Hours<br>Always at your service</p>
      </div>
    </div>
    
  </div>
</section>

<!-- ═══════════════════════ CONTACT FORM & SIDEBAR ═══════════════════════ -->
<section class="contact-main">
  <div class="contact-grid">
    
    <!-- Contact Form -->
    <div class="contact-form-wrapper reveal">
      <div class="contact-form-header">
        <span class="eyebrow">SEND US A MESSAGE</span>
        <h2>Contact Form</h2>
        <p>Fill out the form below and we'll get back to you within 24 hours.</p>
      </div>
      
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
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="john@example.com" required>
          </div>
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="+91 98765 43210">
          </div>
        </div>
        
        <div class="form-group">
          <label for="subject">Subject</label>
          <select id="subject" name="subject" required>
            <option value="">Select a subject</option>
            <option value="reservation">Room Reservation</option>
            <option value="inquiry">General Inquiry</option>
            <option value="dining">Restaurant & Dining</option>
            <option value="events">Events & Meetings</option>
            <option value="spa">Spa & Wellness</option>
            <option value="feedback">Feedback</option>
            <option value="other">Other</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="message">Your Message</label>
          <textarea id="message" name="message" placeholder="Tell us how we can help you..." required></textarea>
        </div>
        
        <button type="submit" class="btn-primary">
          <i class="ph ph-paper-plane-right" style="margin-right: 8px;"></i>
          SEND MESSAGE
        </button>
      </form>
    </div>
    
    <!-- Sidebar -->
    <div class="contact-sidebar">
      
      <!-- Quick Contact -->
      <div class="contact-sidebar-block reveal">
        <h3><i class="ph ph-headset"></i> Quick Contact</h3>
        <ul class="quick-contact-list">
          <li>
            <i class="ph ph-phone-call"></i>
            <span>Reservations: <a href="tel:+911234567890">+91 1234 567 890</a></span>
          </li>
          <li>
            <i class="ph ph-whatsapp-logo"></i>
            <span>WhatsApp: <a href="https://wa.me/911234567890">+91 1234 567 890</a></span>
          </li>
          <li>
            <i class="ph ph-envelope-simple"></i>
            <span>Email: <a href="mailto:booking@theaspirehotel.com">booking@theaspirehotel.com</a></span>
          </li>
        </ul>
        
        <div class="contact-social">
          <a href="#" aria-label="Facebook">FB</a>
          <a href="#" aria-label="Instagram">IG</a>
          <a href="#" aria-label="Twitter">TW</a>
          <a href="#" aria-label="LinkedIn">LN</a>
        </div>
      </div>
      
      <!-- Operating Hours -->
      <div class="contact-sidebar-block reveal">
        <h3><i class="ph ph-clock"></i> Operating Hours</h3>
        <ul class="operating-hours">
          <li>
            <span class="day">Front Desk</span>
            <span class="time">24 Hours</span>
          </li>
          <li>
            <span class="day">Restaurant</span>
            <span class="time">7 AM – 11 PM</span>
          </li>
          <li>
            <span class="day">Spa & Wellness</span>
            <span class="time">9 AM – 9 PM</span>
          </li>
          <li>
            <span class="day">Fitness Center</span>
            <span class="time">6 AM – 10 PM</span>
          </li>
          <li>
            <span class="day">Business Center</span>
            <span class="time">24 Hours</span>
          </li>
          <li>
            <span class="day">Room Service</span>
            <span class="time">24 Hours</span>
          </li>
        </ul>
      </div>
      
    </div>
    
  </div>
</section>

<!-- ═══════════════════════ MAP ═══════════════════════ -->
<section class="contact-map-section">
  <div class="container">
    <div class="section-header reveal">
      <span class="eyebrow">VISIT US</span>
      <h2 class="section-title">Our Location</h2>
      <p class="section-sub">
        Conveniently located in the heart of Guwahati, easily accessible from the airport 
        (25 km) and railway station (5 km). Major attractions are just minutes away.
      </p>
    </div>
    <div class="map-container reveal">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57408.42095597567!2d91.7086485!3d26.1445169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a5948b879f007%3A0x6f5f3e3a069a6a7b!2sGuwahati%2C%20Assam!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"
        width="100%" height="450" style="border:0" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="The Aspire Hotel Location – Guwahati">
      </iframe>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/lightbox.php'; ?>
<script src="./js/script.js"></script>
</body>
</html>
