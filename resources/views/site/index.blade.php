<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ data_get($page, 'meta_description', '') }}" />
    <meta
      name="keywords"
      content="conferences and exhibitions, virtual and hybrid events, strategic high-level meetings, event production, oil and gas, energy, executive events"
    />
    <title>{{ data_get($page, 'meta_title', data_get($page, 'title', data_get($settings, 'site_name', 'Brevity Anderson'))) }}</title>

    <!-- Bootstrap 5 CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Open+Sans:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />

    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

    <style>
      /* ============================================
           HOME PAGE SPECIFIC STYLES
           ============================================ */

      /* Hero Section */
      .hero-section {
        --navbar-height: 90px;
        min-height: 100vh;
        min-height: calc(100vh + var(--navbar-height));
        background: var(--primary-navy);
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        margin-top: calc(-1 * var(--navbar-height));
        padding-top: calc(80px + var(--navbar-height));
        isolation: isolate;
      }

      .hero-bg-video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        min-width: 100%;
        min-height: 100%;
        object-fit: cover;
        object-position: center;
        z-index: 0;
      }

      .hero-section::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
          135deg,
          rgba(20, 59, 102, 0.88) 0%,
          rgba(13, 40, 68, 0.84) 100%
        );
        z-index: 1;
      }

      .hero-section::before {
        content: "";
        display: none;
      }

      .hero-content {
        position: relative;
        z-index: 3;
        padding-top: 80px;
      }

      .hero-section .container {
        position: relative;
        z-index: 3;
      }

      .hero-badge {
        display: inline-block;
        background: rgba(65, 196, 224, 0.15);
        border: 1px solid var(--accent-cyan);
        color: var(--accent-cyan);
        padding: 10px 25px;
        border-radius: 30px;
        font-family: var(--font-heading);
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom: 30px;
      }

      .hero-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--white);
        margin-bottom: 25px;
        line-height: 1.2;
        max-width: 24ch;
        min-height: 2.4em;
      }

      .hero-title span {
        color: var(--accent-cyan);
      }

      .hero-description {
        font-size: 1.15rem;
        color: rgba(255, 255, 255, 0.85);
        max-width: 650px;
        margin-bottom: 40px;
        line-height: 1.8;
        min-height: 5.4em;
      }

      .hero-buttons .btn {
        margin-right: 15px;
        margin-bottom: 15px;
      }

      .hero-stats {
        margin-top: 80px;
        padding-top: 40px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
      }

      .stat-item h3 {
        font-size: 2.8rem;
        font-weight: 700;
        color: var(--accent-cyan);
        margin-bottom: 5px;
      }

      .stat-item p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 2px;
      }

      .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        animation: bounce 2s infinite;
        z-index: 3;
      }

      .scroll-indicator a {
        color: var(--accent-cyan);
        font-size: 1.5rem;
      }

      .hero-text-fade {
        opacity: 0;
        transition: opacity 0.45s ease;
      }

      @keyframes bounce {
        0%,
        20%,
        50%,
        80%,
        100% {
          transform: translateX(-50%) translateY(0);
        }
        40% {
          transform: translateX(-50%) translateY(-10px);
        }
        60% {
          transform: translateX(-50%) translateY(-5px);
        }
      }

      /* About Preview Section */
      .about-preview-section {
        position: relative;
        background: var(--off-white);
        overflow: hidden;
      }

      .about-preview-section::before {
        content: "";
        position: absolute;
        right: -40px;
        bottom: -20px;
        width: 280px;
        height: 280px;
        background: url("{{ data_get($settings, 'logo_path', asset('BREVITY_logo.png')) }}") center/contain no-repeat;
        opacity: 0.05;
        filter: grayscale(100%);
        pointer-events: none;
        animation: aboutWatermarkFloat 8s ease-in-out infinite;
      }

      .about-preview-section .container {
        position: relative;
        z-index: 1;
      }

      .about-image-wrapper {
        position: relative;
      }

      .about-image {
        border-radius: 10px;
        box-shadow: 0 20px 50px rgba(20, 59, 102, 0.15);
      }

      .about-experience {
        position: absolute;
        bottom: -30px;
        right: -20px;
        background: var(--primary-navy);
        color: var(--white);
        padding: 30px 40px;
        border-radius: 10px;
        text-align: center;
        border-left: 4px solid var(--accent-cyan);
      }

      .about-experience h4 {
        font-size: 3rem;
        font-weight: 700;
        color: var(--accent-cyan);
        margin-bottom: 5px;
      }

      .about-experience p {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin: 0;
        color: rgba(255, 255, 255, 0.8);
      }

      .about-content h3 {
        font-size: 2.2rem;
        color: var(--primary-navy);
        margin-bottom: 20px;
      }

      .about-content p {
        color: var(--text-color);
        margin-bottom: 20px;
      }

      @keyframes aboutWatermarkFloat {
        0%,
        100% {
          transform: translate3d(0, 0, 0) rotate(0deg);
        }
        50% {
          transform: translate3d(-12px, -14px, 0) rotate(-4deg);
        }
      }

      /* Strategic Advisory Section */
      .strategic-advisory-section {
        position: relative;
        padding: 80px 0;
        background:
          radial-gradient(
            circle at 15% 20%,
            rgba(65, 196, 224, 0.22) 0%,
            rgba(65, 196, 224, 0.02) 42%
          ),
          linear-gradient(
            135deg,
            var(--primary-navy) 0%,
            var(--secondary-navy) 50%,
            var(--dark-navy) 100%
          );
        overflow: hidden;
      }

      .strategic-advisory-section::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
          120deg,
          rgba(20, 59, 102, 0.72) 0%,
          rgba(26, 74, 122, 0.56) 48%,
          rgba(13, 40, 68, 0.72) 100%
        );
      }

      .strategic-layout {
        position: relative;
        z-index: 2;
      }

      .strategic-frame {
        position: relative;
        border: 2px solid rgba(255, 255, 255, 0.55);
        min-height: 320px;
        display: flex;
        align-items: center;
        padding: 44px 38px;
        background: linear-gradient(
          160deg,
          rgba(20, 59, 102, 0.68) 0%,
          rgba(26, 74, 122, 0.5) 100%
        );
      }

      .strategic-frame::before {
        content: "";
        position: absolute;
        top: -16px;
        left: -16px;
        right: 44px;
        height: 16px;
        border-top: 4px solid rgba(255, 255, 255, 0.86);
        border-left: 4px solid rgba(255, 255, 255, 0.86);
      }

      .strategic-frame::after {
        content: "";
        position: absolute;
        bottom: -16px;
        right: -16px;
        left: 44px;
        height: 16px;
        border-bottom: 4px solid rgba(255, 255, 255, 0.86);
        border-right: 4px solid rgba(255, 255, 255, 0.86);
      }

      .strategic-kicker {
        display: block;
        color: rgba(255, 255, 255, 0.9);
        letter-spacing: 6px;
        text-transform: uppercase;
        font-size: 0.85rem;
        margin-bottom: 14px;
      }

      .strategic-title {
        margin: 0;
        color: var(--white);
        text-transform: uppercase;
        letter-spacing: 1px;
        line-height: 1.1;
        font-size: clamp(1.65rem, 3vw, 2.7rem);
      }

      .strategic-title strong {
        display: block;
        margin-top: 10px;
        color: #4ea3ff;
        font-weight: 800;
      }

      .strategic-copy {
        position: relative;
        padding-left: 34px;
      }

      .strategic-copy::before {
        content: "";
        position: absolute;
        left: 0;
        top: 8px;
        bottom: 8px;
        width: 2px;
        background: linear-gradient(
          180deg,
          rgba(65, 196, 224, 0.08) 0%,
          rgba(65, 196, 224, 0.9) 46%,
          rgba(65, 196, 224, 0.08) 100%
        );
      }

      .strategic-copy p {
        margin: 0;
        color: rgba(255, 255, 255, 0.95);
        text-transform: uppercase;
        letter-spacing: 2.2px;
        line-height: 1.55;
        font-size: 1.12rem;
        font-family: var(--font-heading);
        font-weight: 700;
      }

      .strategic-copy p + p {
        margin-top: 24px;
      }

      .feature-list {
        list-style: none;
        padding: 0;
        margin: 30px 0;
      }

      .feature-list li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
      }

      .feature-list i {
        color: var(--accent-cyan);
        font-size: 1.2rem;
        margin-right: 15px;
        margin-top: 3px;
      }

      /* Services Preview Section */
      .services-preview-section {
        background: var(--white);
      }

      .service-card {
        background: var(--white);
        border-radius: 12px;
        padding: 40px 30px;
        text-align: center;
        transition: var(--transition-smooth);
        border: 1px solid var(--light-gray);
        height: 100%;
        position: relative;
        overflow: hidden;
      }

      .service-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(
          90deg,
          var(--accent-cyan),
          var(--accent-cyan-light)
        );
        transform: scaleX(0);
        transition: var(--transition-smooth);
      }

      .service-card:hover::before {
        transform: scaleX(1);
      }

      .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(20, 59, 102, 0.12);
        border-color: transparent;
      }

      .service-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(
          135deg,
          rgba(65, 196, 224, 0.1) 0%,
          rgba(89, 196, 192, 0.1) 100%
        );
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        transition: var(--transition-smooth);
      }

      .service-card:hover .service-icon {
        background: linear-gradient(
          135deg,
          var(--accent-cyan) 0%,
          var(--accent-cyan-light) 100%
        );
      }

      .service-icon i {
        font-size: 2rem;
        color: var(--accent-cyan);
        transition: var(--transition-smooth);
      }

      .service-card:hover .service-icon i {
        color: var(--white);
      }

      .service-card h4 {
        font-size: 1.2rem;
        color: var(--primary-navy);
        margin-bottom: 15px;
      }

      .service-card p {
        color: var(--medium-gray);
        font-size: 0.95rem;
        margin-bottom: 20px;
      }

      .service-link {
        color: var(--accent-cyan);
        font-family: var(--font-heading);
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
      }

      .service-link:hover {
        color: var(--primary-navy);
      }

      .service-link i {
        margin-left: 5px;
        transition: var(--transition-smooth);
      }

      .service-link:hover i {
        margin-left: 10px;
      }

      /* Clientele Section */
      .clientele-section {
        background:
          linear-gradient(
            180deg,
            rgba(248, 250, 252, 0.96) 0%,
            rgba(255, 255, 255, 1) 100%
          );
        overflow: hidden;
      }

      .clientele-intro {
        max-width: 760px;
        margin-left: auto;
        margin-right: auto;
      }

      .clientele-rail {
        position: relative;
        margin-top: 20px;
      }

      .clientele-rail::before,
      .clientele-rail::after {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        width: min(10vw, 110px);
        z-index: 2;
        pointer-events: none;
      }

      .clientele-rail::before {
        left: 0;
        background: linear-gradient(
          90deg,
          rgba(248, 250, 252, 1) 0%,
          rgba(248, 250, 252, 0) 100%
        );
      }

      .clientele-rail::after {
        right: 0;
        background: linear-gradient(
          270deg,
          rgba(255, 255, 255, 1) 0%,
          rgba(255, 255, 255, 0) 100%
        );
      }

      .clientele-track {
        display: flex;
        gap: 24px;
        width: max-content;
        animation: clientLogoScroll 46s linear infinite;
      }

      .clientele-rail:hover .clientele-track {
        animation-play-state: paused;
      }

      .client-logo-card {
        width: 200px;
        min-width: 200px;
        height: 120px;
        padding: 24px;
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.92);
        border: 1px solid rgba(20, 59, 102, 0.08);
        box-shadow: 0 18px 35px rgba(20, 59, 102, 0.08);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease,
          border-color 0.3s ease;
      }

      .client-logo-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 22px 45px rgba(20, 59, 102, 0.14);
        border-color: rgba(65, 196, 224, 0.35);
      }

      .client-logo-card img {
        max-width: 100%;
        max-height: 64px;
        width: auto;
        height: auto;
        object-fit: contain;
        filter: none;
        opacity: 1;
        transition: opacity 0.3s ease, transform 0.35s ease;
      }

      .client-logo-card:hover img {
        opacity: 1;
        transform: scale(1.16);
      }

      @keyframes clientLogoScroll {
        from {
          transform: translateX(0);
        }
        to {
          transform: translateX(calc(-50% - 12px));
        }
      }

      /* Why Choose Section */
      .why-choose-section {
        background: linear-gradient(
          135deg,
          var(--primary-navy) 0%,
          var(--dark-navy) 100%
        );
        position: relative;
        overflow: hidden;
      }

      .why-choose-section::before {
        content: "";
        position: absolute;
        top: -50%;
        right: -20%;
        width: 600px;
        height: 600px;
        background: radial-gradient(
          circle,
          rgba(65, 196, 224, 0.1) 0%,
          transparent 70%
        );
        border-radius: 50%;
      }

      .feature-box {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 40px 30px;
        transition: var(--transition-smooth);
        height: 100%;
      }

      .feature-box:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-5px);
        border-color: var(--accent-cyan);
      }

      .feature-box-icon {
        width: 65px;
        height: 65px;
        background: var(--accent-cyan);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
      }

      .feature-box-icon i {
        font-size: 1.6rem;
        color: var(--white);
      }

      .feature-box h4 {
        color: var(--white);
        font-size: 1.2rem;
        margin-bottom: 15px;
      }

      .feature-box p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.95rem;
        margin: 0;
      }

      /* CTA Section */
      .cta-section {
        background: linear-gradient(
          135deg,
          var(--accent-cyan) 0%,
          var(--accent-cyan-dark) 100%
        );
        padding: 100px 0;
        position: relative;
        overflow: hidden;
      }

      .cta-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      }

      .cta-content {
        position: relative;
        z-index: 1;
        text-align: center;
      }

      .cta-content h2 {
        font-size: 2.5rem;
        color: var(--white);
        margin-bottom: 20px;
      }

      .cta-content p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto 30px;
      }

      .cta-btn {
        background: var(--white);
        color: var(--primary-navy);
        font-family: var(--font-heading);
        font-weight: 600;
        padding: 16px 40px;
        border-radius: 4px;
        transition: var(--transition-smooth);
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 0.85rem;
        display: inline-block;
      }

      .cta-btn:hover {
        background: var(--primary-navy);
        color: var(--white);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      }

      /* Responsive */
      @media (max-width: 991.98px) {
        .hero-title {
          font-size: 2.4rem;
          max-width: 100%;
          min-height: auto;
        }

        .hero-stats {
          margin-top: 50px;
        }

        .stat-item h3 {
          font-size: 2.2rem;
        }

        .about-experience {
          position: relative;
          bottom: 0;
          right: 0;
          margin-top: 20px;
        }

        .about-preview-section::before {
          width: 220px;
          height: 220px;
          right: -30px;
          bottom: 10px;
        }

        .cta-content h2 {
          font-size: 2rem;
        }

        .strategic-frame {
          min-height: 270px;
          padding: 34px 28px;
        }

        .strategic-copy {
          margin-top: 36px;
          padding-left: 22px;
        }

        .strategic-copy p {
          font-size: 1rem;
          letter-spacing: 1.6px;
        }

        .client-logo-card {
          width: 180px;
          min-width: 180px;
        }
      }

      @media (max-width: 767.98px) {
        .hero-section {
          min-height: auto;
          padding-top: calc(40px + var(--navbar-height));
          padding-bottom: 40px;
        }

        .hero-content {
          padding-top: 30px;
        }

        .hero-title {
          font-size: 1.95rem;
        }

        .hero-description {
          font-size: 1rem;
          min-height: auto;
        }

        .hero-buttons .btn {
          display: block;
          width: 100%;
          max-width: none;
          margin-right: 0;
        }

        .stat-item {
          margin-bottom: 25px;
        }

        .about-content h3 {
          font-size: 1.8rem;
        }

        .about-preview-section::before {
          width: 160px;
          height: 160px;
          right: -20px;
          bottom: 20px;
        }

        .cta-content h2 {
          font-size: 1.7rem;
        }

        .strategic-frame {
          min-height: 220px;
          padding: 26px 20px;
        }

        .strategic-frame::before,
        .strategic-frame::after {
          display: none;
        }

        .strategic-kicker {
          letter-spacing: 4px;
        }

        .strategic-copy p {
          font-size: 0.9rem;
          letter-spacing: 1px;
          line-height: 1.6;
        }

        .service-card {
          padding: 30px 22px;
        }

        .clientele-track {
          gap: 16px;
          animation-duration: 34s;
        }

        .client-logo-card {
          width: 150px;
          min-width: 150px;
          height: 100px;
          padding: 18px;
        }

        .client-logo-card img {
          max-height: 52px;
        }
      }
    </style>
  </head>
  <body>
    <!-- ============================================
         NAVIGATION
         ============================================ -->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ data_get($settings, 'logo_path', asset('BREVITY_logo.png')) }}" alt="Brevity Anderson Logo" />
          <span class="navbar-brand-text">Brevity<span>Anderson</span></span>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('services') }}">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('clientele') }}">Clientele</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- ============================================
         HERO SECTION
         ============================================ -->
    <section class="hero-section" id="home">
      <video
        class="hero-bg-video"
        autoplay
        muted
        loop
        playsinline
        preload="metadata"
        aria-hidden="true"
      >
        <source src="{{ asset('video/herovid.mp4') }}" type="video/mp4" />
      </video>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-10">
            <div class="hero-content" data-aos="fade-up">
              <span class="hero-badge">World-Class Trade Advisory</span>
              <h1 class="hero-title">
                Empowering Global <span>Businesses</span> Across Markets
              </h1>
              <p class="hero-description">
                Brevity Anderson is a premier trade advisory firm dedicated to
                helping businesses and governments navigate the complexities of
                global markets with confidence, clarity, and strategic
                excellence.
              </p>
              <div class="hero-buttons">
                <a href="{{ route('services') }}" class="btn btn-primary-custom"
                  >Explore Our Services</a
                >
                <a href="{{ route('contact') }}" class="btn btn-outline-custom"
                  >Get in Touch</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="row hero-stats" data-aos="fade-up" data-aos-delay="200">
          <div class="col-6 col-md-3">
            <div class="stat-item text-center">
              <h3 class="counter" data-target="15">0</h3>
              <p>Years Experience</p>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="stat-item text-center">
              <h3 class="counter" data-target="500">0</h3>
              <p>Projects Completed</p>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="stat-item text-center">
              <h3 class="counter" data-target="50">0</h3>
              <p>Global Partners</p>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="stat-item text-center">
              <h3 class="counter" data-target="5">0</h3>
              <p>Continents Covered</p>
            </div>
          </div>
        </div>
      </div>
      <div class="scroll-indicator">
        <a href="#about"><i class="bi bi-chevron-down"></i></a>
      </div>
    </section>

    <!-- ============================================
         ABOUT PREVIEW SECTION
         ============================================ -->
    <section class="section-padding about-preview-section" id="about">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="about-image-wrapper" data-aos="fade-right">
              <img
                src="{{ asset('img/about.jpg') }}"
                alt="Brevity Anderson Team"
                class="about-image img-fluid"
              />
              <div
                class="about-experience"
                data-aos="fade-up"
                data-aos-delay="300"
              >
                <h4>15+</h4>
                <p>Years of Excellence</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 ps-lg-5">
            <div class="about-content" data-aos="fade-left">
              <span class="section-label">About Us</span>
              <h3>Welcome to Brevity Anderson</h3>
              <p>
                Brevity Anderson is a world-class trade advisory firm dedicated
                to empowering global businesses to navigate the complexities of
                global markets with confidence and clarity. We also work with
                governments at the highest levels to promote trade and inward
                investment. Our team of seasoned experts combine deep industry
                knowledge, strategic insight, and hands-on experience to deliver
                tailored solutions that drive growth, minimise risk, and unlock
                new opportunities across borders. Our particular expertise in
                the Oil, Gas and Energy space has positioned us as a strategic
                partner for governments, multinational organisations and some of
                the leading brands globally.
              </p>
              <p>
                From trade compliance and regulatory strategy to market entry
                and supply chain optimization, we provide end-to-end advisory
                services that position our clients for sustainable success in an
                increasingly interconnected economy. With a proven track record
                of excellence and innovation, Brevity Anderson has evolved into
                one of the most trusted names in this space.
              </p>
              <p>
                Our conference and events division is at the forefront of what
                we do, gathering world leaders, industry experts and helping to
                generate the connections that get the biggest deals over the
                line.
              </p>
              <a href="{{ route('about') }}" class="btn btn-primary-custom mt-3"
                >Learn More About Us</a
              >
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================
         STRATEGIC ADVISORY SECTION
         ============================================ -->
    <section class="section-padding strategic-advisory-section">
      <div class="container strategic-layout">
        <div class="row align-items-center g-5">
          <div class="col-lg-6" data-aos="fade-right">
            <div class="strategic-frame">
              <div>
                <span class="strategic-kicker">Strategic</span>
                <h3 class="strategic-title">Trade <strong>Advisory</strong></h3>
              </div>
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-left">
            <div class="strategic-copy">
              <p>
                Expanding into new markets comes with both opportunities and
                complexities, and that is where we make the difference for
                private companies of every size.
              </p>
              <p>
                Governments can trust our advisory work in promoting trade and
                facilitating inward investment.
              </p>
              <p>
                Our event production team is made up of some of the best hands
                in the industry, and we look forward to taking your event to the
                next level.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================
         SERVICES PREVIEW SECTION
         ============================================ -->
    <section class="section-padding services-preview-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="section-header" data-aos="fade-up">
              <span class="section-label">Our Services</span>
              <h2 class="section-title">Event Services Crafted for Impact</h2>
              <p class="section-description">
                We deliver premium event experiences across physical, digital,
                and executive environments with the precision, polish, and
                strategic depth global audiences expect.
              </p>
            </div>
          </div>
        </div>
        <div class="row g-4">
          <div
            class="col-md-6 col-lg-4"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="service-card">
              <div class="service-icon">
                <i class="bi bi-easel2"></i>
              </div>
              <h4>Conferences &amp; Exhibitions</h4>
              <p>
                We create compelling conferences and exhibition platforms that
                bring together industry leaders, partners, and audiences in
                high-value live environments.
              </p>
              <a href="{{ route('services') }}" class="service-link"
                >Learn More <i class="bi bi-arrow-right"></i
              ></a>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-4"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <div class="service-card">
              <div class="service-icon">
                <i class="bi bi-broadcast"></i>
              </div>
              <h4>Virtual and Hybrid Events</h4>
              <p>
                From digital broadcasts to hybrid experiences, we design
                seamless event journeys that connect in-room and remote
                audiences without compromise.
              </p>
              <a href="{{ route('services') }}" class="service-link"
                >Learn More <i class="bi bi-arrow-right"></i
              ></a>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-4"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <div class="service-card">
              <div class="service-icon">
                <i class="bi bi-people-fill"></i>
              </div>
              <h4>Strategic High-Level Meetings</h4>
              <p>
                We coordinate executive-level meetings and high-stakes
                engagements with the discretion, structure, and detail they
                demand.
              </p>
              <a href="{{ route('services') }}" class="service-link"
                >Learn More <i class="bi bi-arrow-right"></i
              ></a>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-12 text-center" data-aos="fade-up">
            <a href="{{ route('services') }}" class="btn btn-navy">View All Services</a>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================
         OUR CLIENTELE SECTION
         ============================================ -->
    <section class="section-padding clientele-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-lg-8 mx-auto">
            <div class="section-header mb-0" data-aos="fade-up">
              <span class="section-label">Our Clientele</span>
              <h2 class="section-title">Trusted by Governments and Global Brands</h2>
              <p class="section-description clientele-intro">
                We are proud to support public institutions, multinational
                companies, and industry leaders with trade advisory, strategic
                events, and market-facing solutions.
              </p>
            </div>
          </div>
        </div>
        <div class="clientele-rail" data-aos="fade-up" data-aos-delay="150">
          <div class="clientele-track" aria-label="Client logo carousel">
            <div class="client-logo-card"><img src="{{ asset('img/clientele/apple-logo.png') }}" alt="Apple logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/APPO-logo_200x200.jpg') }}" alt="APPO logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/CBWN-LOGO_200x200.png') }}" alt="CBWN logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/chevron1_200x200.png') }}" alt="Chevron logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/Coat-of-arms_200x200.png') }}" alt="Coat of arms logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/cordros.png') }}" alt="Cordros logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/Dangote_200x200.png') }}" alt="Dangote logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/DIT2.png') }}" alt="Department for International Trade logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/DPR_200x200.png') }}" alt="DPR logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/eni1_200x200.jpg') }}" alt="Eni logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/exonmobil_200x200.png') }}" alt="ExxonMobil logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/GIZ.jpg') }}" alt="GIZ logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/huawei.png') }}" alt="Huawei logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/icrc.png') }}" alt="ICRC logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/lekoil_200x200.jpg') }}" alt="Lekoil logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/Logo_USTDA_color_200X200.png') }}" alt="USTDA logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/NCDMB_V1_200x200.jpg') }}" alt="NCDMB logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/nlcga.png') }}" alt="NLCGA logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/NLNG.png') }}" alt="NLNG logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/nmdpra.png') }}" alt="NMDPRA logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/NNPC-LOGO.png') }}" alt="NNPC logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/nuprc.png') }}" alt="NUPRC logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/oilgas-freezone1_200x200.png') }}" alt="Oil and Gas Free Zones Authority logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/Ondo.png') }}" alt="Ondo State logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/opec-logo_200x200.jpg') }}" alt="OPEC logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/ovh_200x200.png') }}" alt="OVH Energy logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/shell_200x200.png') }}" alt="Shell logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/technoil.png') }}" alt="Techno Oil logo" loading="lazy" /></div>
            <div class="client-logo-card"><img src="{{ asset('img/clientele/Total-Energies.png') }}" alt="TotalEnergies logo" loading="lazy" /></div>

            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/apple-logo.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/APPO-logo_200x200.jpg') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/CBWN-LOGO_200x200.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/chevron1_200x200.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/Coat-of-arms_200x200.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/cordros.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/Dangote_200x200.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/DIT2.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/DPR_200x200.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/eni1_200x200.jpg') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/exonmobil_200x200.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/GIZ.jpg') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/huawei.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/icrc.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/lekoil_200x200.jpg') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/Logo_USTDA_color_200X200.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/NCDMB_V1_200x200.jpg') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/nlcga.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/NLNG.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/nmdpra.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/NNPC-LOGO.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/nuprc.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/oilgas-freezone1_200x200.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/Ondo.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/opec-logo_200x200.jpg') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/ovh_200x200.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/shell_200x200.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/technoil.png') }}" alt="" loading="lazy" /></div>
            <div class="client-logo-card" aria-hidden="true"><img src="{{ asset('img/clientele/Total-Energies.png') }}" alt="" loading="lazy" /></div>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('clientele') }}" class="btn btn-outline-custom">View Full Clientele</a>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================
         WHY CHOOSE US SECTION
         ============================================ -->
    <section class="section-padding why-choose-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="section-header" data-aos="fade-up">
              <span class="section-label">Why Choose Us</span>
              <h2 class="section-title section-title-white">
                What Sets Us Apart
              </h2>
              <p
                class="section-description"
                style="color: rgba(255, 255, 255, 0.7)"
              >
                Our clients are at the heart of everything we do. Every solution
                we design is driven by their goals, challenges, and aspirations.
              </p>
            </div>
          </div>
        </div>
        <div class="row g-4">
          <div
            class="col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="feature-box">
              <div class="feature-box-icon">
                <i class="bi bi-award"></i>
              </div>
              <h4>Proven Excellence</h4>
              <p>
                Over 15 years of delivering exceptional results for global
                clients across multiple industries and continents.
              </p>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <div class="feature-box">
              <div class="feature-box-icon">
                <i class="bi bi-people"></i>
              </div>
              <h4>Expert Team</h4>
              <p>
                Seasoned professionals with deep industry knowledge and hands-on
                experience in international trade.
              </p>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <div class="feature-box">
              <div class="feature-box-icon">
                <i class="bi bi-lightbulb"></i>
              </div>
              <h4>Innovative Solutions</h4>
              <p>
                Tailored strategies that address unique challenges and unlock
                new opportunities in global markets.
              </p>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <div class="feature-box">
              <div class="feature-box-icon">
                <i class="bi bi-diagram-3"></i>
              </div>
              <h4>Lasting Partnerships</h4>
              <p>
                Building relationships founded on trust, collaboration, and
                measurable impact for our clients.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================
         CTA SECTION
         ============================================ -->
    <section class="cta-section">
      <div class="container">
        <div class="cta-content" data-aos="zoom-in">
          <h2>Ready to Expand Your Global Reach?</h2>
          <p>
            Let's discuss how Brevity Anderson can help you achieve your
            strategic objectives in international markets.
          </p>
          <a href="{{ route('contact') }}" class="cta-btn">Start a Conversation</a>
        </div>
      </div>
    </section>

    <!-- ============================================
         FOOTER
         ============================================ -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="footer-widget">
              <div class="footer-logo">
                <img src="{{ data_get($settings, 'logo_path', asset('BREVITY_logo.png')) }}" alt="Brevity Anderson Logo" />
                <span class="footer-logo-text"
                  >Brevity<span>Anderson</span></span
                >
              </div>
              <p>
                A world-class trade advisory firm dedicated to empowering global
                businesses to navigate international markets with confidence and
                clarity.
              </p>
              <div class="footer-social">
                <a href="#" aria-label="LinkedIn"
                  ><i class="bi bi-linkedin"></i
                ></a>
                <a href="#" aria-label="Twitter"
                  ><i class="bi bi-twitter-x"></i
                ></a>
                <a href="#" aria-label="Facebook"
                  ><i class="bi bi-facebook"></i
                ></a>
                <a href="#" aria-label="Instagram"
                  ><i class="bi bi-instagram"></i
                ></a>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
            <div class="footer-widget">
              <h4>Quick Links</h4>
              <ul class="footer-links">
                <li>
                  <a href="{{ route('home') }}"
                    ><i class="bi bi-chevron-right"></i> Home</a
                  >
                </li>
                <li>
                  <a href="{{ route('about') }}"
                    ><i class="bi bi-chevron-right"></i> About Us</a
                  >
                </li>
                <li>
                  <a href="{{ route('services') }}"
                    ><i class="bi bi-chevron-right"></i> Services</a
                  >
                </li>
                <li>
                  <a href="{{ route('clientele') }}"
                    ><i class="bi bi-chevron-right"></i> Clientele</a
                  >
                </li>
                <li>
                  <a href="{{ route('contact') }}"
                    ><i class="bi bi-chevron-right"></i> Contact</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <div class="footer-widget">
              <h4>Our Services</h4>
              <ul class="footer-links">
                <li>
                  <a href="{{ route('services') }}"
                    ><i class="bi bi-chevron-right"></i> Conferences &
                    Exhibitions</a
                  >
                </li>
                <li>
                  <a href="{{ route('services') }}"
                    ><i class="bi bi-chevron-right"></i> Virtual and Hybrid
                    Events</a
                  >
                </li>
                <li>
                  <a href="{{ route('services') }}"
                    ><i class="bi bi-chevron-right"></i> Strategic High-Level
                    Meetings</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="footer-widget">
              <h4>Contact Info</h4>
              <ul class="footer-contact">
                <li>
                  <i class="bi bi-geo-alt"></i>
                  <span
                    >15 Stratton Street, Mayfair<br />London, W1J 8LQ, UK</span
                  >
                </li>
                <li>
                  <i class="bi bi-telephone"></i>
                  <span>+44 203 890 8574</span>
                </li>
                <li>
                  <i class="bi bi-envelope"></i>
                  <span>info@brevityanderson.com</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <p>
            Copyright 2026 - All Rights Reserved |
            <a href="{{ route('home') }}">Brevity Anderson</a> |
            <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
          </p>
        </div>
      </div>
    </footer>

    <!-- ============================================
         BACK TO TOP BUTTON
         ============================================ -->
    <div class="back-to-top" id="backToTop">
      <i class="bi bi-arrow-up"></i>
    </div>

    <!-- ============================================
         SCRIPTS
         ============================================ -->
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @include('site.partials.cms-bootstrap')
    @include('site.partials.cms-home')

    

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
      // Initialize AOS
      AOS.init({
        duration: 800,
        easing: "ease-out-cubic",
        once: true,
        offset: 100,
      });

      // Navbar scroll effect
      const navbar = document.getElementById("mainNav");
      window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
          navbar.classList.add("scrolled");
        } else {
          navbar.classList.remove("scrolled");
        }
      });

      // Back to top button
      const backToTop = document.getElementById("backToTop");
      window.addEventListener("scroll", () => {
        if (window.scrollY > 500) {
          backToTop.classList.add("show");
        } else {
          backToTop.classList.remove("show");
        }
      });

      backToTop.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
      });

      // Counter animation
      const counters = document.querySelectorAll(".counter");
      const speed = 200;

      const animateCounters = () => {
        counters.forEach((counter) => {
          const target = +counter.getAttribute("data-target");
          const count = +counter.innerText;
          const inc = target / speed;

          if (count < target) {
            counter.innerText = Math.ceil(count + inc);
            setTimeout(animateCounters, 20);
          } else {
            counter.innerText = target;
          }
        });
      };

      const counterSection = document.querySelector(".hero-stats");
      let counterTriggered = false;

      const counterObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting && !counterTriggered) {
              animateCounters();
              counterTriggered = true;
            }
          });
        },
        { threshold: 0.5 },
      );

      counterObserver.observe(counterSection);

      // Hero text carousel
      const heroBadge = document.querySelector(".hero-badge");
      const heroTitle = document.querySelector(".hero-title");
      const heroDescription = document.querySelector(".hero-description");
      const heroSlides = window.heroSlides && window.heroSlides.length ? window.heroSlides : [
        {
          badge: "World-Class Trade Advisory",
          title: "Empowering Global <span>Businesses</span> Across Markets",
          description:
            "Brevity Anderson is a premier trade advisory firm dedicated to helping businesses and governments navigate the complexities of global markets with confidence, clarity, and strategic excellence.",
        },
        {
          badge: "Strategic Investment Promotion",
          title:
            "Connecting Nations with <span>High-Value</span> Opportunities",
          description:
            "We partner with governments, investors, and institutions to design market-entry strategies, unlock capital flows, and accelerate sustainable cross-border growth.",
        },
        {
          badge: "Energy And Events Expertise",
          title:
            "Delivering Impact Across <span>Oil, Gas</span> and Global Forums",
          description:
            "From sector-specific trade missions to world-class event production, our team creates platforms that strengthen partnerships, de-risk expansion, and drive measurable outcomes.",
        },
      ];

      if (heroBadge && heroTitle && heroDescription) {
        let slideIndex = 0;
        const prefersReducedMotion = window.matchMedia(
          "(prefers-reduced-motion: reduce)",
        ).matches;

        const applyHeroSlide = (index) => {
          heroBadge.textContent = heroSlides[index].badge;
          heroTitle.innerHTML = heroSlides[index].title;
          heroDescription.textContent = heroSlides[index].description;
        };

        if (!prefersReducedMotion) {
          setInterval(() => {
            heroBadge.classList.add("hero-text-fade");
            heroTitle.classList.add("hero-text-fade");
            heroDescription.classList.add("hero-text-fade");

            setTimeout(() => {
              slideIndex = (slideIndex + 1) % heroSlides.length;
              applyHeroSlide(slideIndex);
              heroBadge.classList.remove("hero-text-fade");
              heroTitle.classList.remove("hero-text-fade");
              heroDescription.classList.remove("hero-text-fade");
            }, 450);
          }, 4500);
        }
      }
    </script>
  </body>
</html>






