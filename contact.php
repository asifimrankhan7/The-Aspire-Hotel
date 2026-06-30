<!doctype html>
<html lang="en">

<head>
  <?php
  $pageTitle = 'Contact Us – The Aspire Hotel';
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
      grid-template-columns: 1.6fr 1fr;
      min-height: 550px;
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

    /* Right Side - Map */
    .contact-map-side {
      position: relative;
      width: 100%;
      height: 100%;
      min-height: 500px;
    }

    .contact-map-side iframe {
      width: 100%;
      height: 100%;
      border: none;
      display: block;
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
  $navPage = 'contact';
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
              <p>Silver Aspire Tower, MD Shah Rd, Paltan Bazaar<br>Guwahati, Assam 781008</p>
            </div>
          </div>

          <div class="contact-detail">
            <div class="contact-detail-icon">
              <i class="ph ph-phone"></i>
            </div>
            <div class="contact-detail-text">
              <h4>Call Us</h4>
              <p>
                <a href="tel:+919181912340">+91 91819 12340</a>
              </p>
              <p style="margin-top:4px;">
                <a href="tel:+916001232340">+91 60012 32340</a>
                <span style="font-weight:400;opacity:0.6;font-size:0.85em"> (Reception)</span>
              </p>
            </div>
          </div>

          <div class="contact-detail">
            <div class="contact-detail-icon">
              <i class="ph ph-envelope"></i>
            </div>
            <div class="contact-detail-text">
              <h4>Email Us</h4>
              <p><a href="mailto:theaspirehotel@gmail.com">theaspirehotel@gmail.com</a></p>
            </div>
          </div>

          <div class="contact-detail">
            <div class="contact-detail-icon">
              <i class="ph ph-whatsapp-logo"></i>
            </div>
            <div class="contact-detail-text">
              <h4>WhatsApp</h4>
              <p>
                <a href="https://wa.me/919181912340">+91 91819 12340</a>
              </p>
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

      <!-- Right: Map -->
      <div class="contact-map-side">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d895.1356168762234!2d91.7480495558197!3d26.179026275262952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a5b006f16fd55%3A0xc63afee5430b1a1b!2sThe%20Aspire%20Hotel!5e0!3m2!1sen!2sin!4v1782796244575!5m2!1sen!2sin"
          allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>

    </div>
  </section>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
  <?php require_once __DIR__ . '/includes/lightbox.php'; ?>
  <script src="./js/script.js"></script>
</body>

</html>