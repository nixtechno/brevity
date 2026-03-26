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
        font-family: "Open Sans", sans-serif;
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
        margin-bottom: 16px;
      }

      .about-content p {
        color: var(--text-color);
        margin-bottom: 16px;
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
        padding: 62px 0;
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
        min-height: 320px;
        display: flex;
        align-items: center;
        padding: 42px 36px;
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.48);
        overflow: visible;
      }

      .strategic-frame::before,
      .strategic-frame::after {
        content: "";
        position: absolute;
        height: 4px;
        background: rgba(255, 255, 255, 0.9);
      }

      .strategic-frame::before {
        top: -18px;
        left: -18px;
        width: 74%;
      }

      .strategic-frame::after {
        right: -18px;
        bottom: -18px;
        width: 74%;
      }

      .strategic-frame-bend {
        position: absolute;
        width: 4px;
        height: 20px;
        background: rgba(255, 255, 255, 0.9);
      }

      .strategic-frame-bend-top {
        left: -18px;
        top: -18px;
      }

      .strategic-frame-bend-bottom {
        right: -18px;
        bottom: -18px;
      }

      .strategic-content {
        position: relative;
        z-index: 2;
        max-width: 330px;
        padding-left: 2px;
      }

      .strategic-kicker {
        display: block;
        color: rgba(255, 255, 255, 0.92);
        letter-spacing: 8px;
        text-transform: uppercase;
        font-size: 0.82rem;
        margin-bottom: 16px;
      }

      .strategic-title {
        margin: 0;
        color: var(--white);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        line-height: 1.02;
        font-size: clamp(2.6rem, 4.5vw, 3.8rem);
      }

      .strategic-title strong {
        display: block;
        margin-top: 12px;
        color: #4ea3ff;
        font-weight: 800;
      }

      .strategic-copy {
        position: relative;
        padding-left: 30px;
      }

      .strategic-copy::before {
        content: "";
        position: absolute;
        left: 0;
        top: 8px;
        bottom: 8px;
        width: 3px;
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
        letter-spacing: 1.8px;
        line-height: 1.55;
        font-size: 1.02rem;
        font-family: "Open Sans", sans-serif;
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
      .upcoming-events-section {
        position: relative;
        overflow: hidden;
        background:
          radial-gradient(circle at 12% 18%, rgba(65, 196, 224, 0.16) 0%, rgba(65, 196, 224, 0) 30%),
          radial-gradient(circle at 88% 20%, rgba(78, 163, 255, 0.16) 0%, rgba(78, 163, 255, 0) 26%),
          linear-gradient(135deg, #0f2743 0%, #143b66 52%, #0a1d33 100%);
      }

      .upcoming-events-section::before,
      .upcoming-events-section::after {
        content: "";
        position: absolute;
        inset: 0;
        pointer-events: none;
      }

      .upcoming-events-section::before {
        background:
          linear-gradient(90deg, rgba(255, 255, 255, 0.04) 1px, transparent 1px),
          linear-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px);
        background-size: 120px 120px;
        mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.3), transparent 85%);
        animation: upcomingGridDrift 20s linear infinite;
      }

      .upcoming-events-section::after {
        background: radial-gradient(circle at center, rgba(115, 195, 255, 0.18) 0%, rgba(115, 195, 255, 0) 58%);
        transform: translate3d(16%, -10%, 0) scale(1.15);
        opacity: 0.7;
        animation: upcomingAmbientGlow 14s ease-in-out infinite;
      }

      .upcoming-events-motion {
        position: absolute;
        inset: 0;
        z-index: 0;
        overflow: hidden;
        pointer-events: none;
      }

      .upcoming-events-beam,
      .upcoming-events-ribbon,
      .upcoming-events-orbit {
        position: absolute;
        pointer-events: none;
      }

      .upcoming-events-beam {
        top: -35%;
        bottom: -35%;
        width: 34%;
        background: linear-gradient(180deg, rgba(115, 195, 255, 0.28), rgba(115, 195, 255, 0));
        filter: blur(14px);
        opacity: 0.42;
        transform: rotate(16deg);
      }

      .upcoming-events-beam-1 {
        left: -4%;
        animation: upcomingBeamSweepA 12s ease-in-out infinite;
      }

      .upcoming-events-beam-2 {
        right: 8%;
        width: 26%;
        opacity: 0.32;
        animation: upcomingBeamSweepB 15s ease-in-out infinite;
      }

      .upcoming-events-ribbon {
        left: -12%;
        right: -12%;
        height: 2px;
        background: linear-gradient(90deg, rgba(115, 195, 255, 0), rgba(115, 195, 255, 0.88), rgba(255, 255, 255, 0), rgba(115, 195, 255, 0));
        box-shadow: 0 0 20px rgba(115, 195, 255, 0.2);
        opacity: 0.78;
      }

      .upcoming-events-ribbon-1 {
        top: 32%;
        animation: upcomingRibbonSweepA 8s ease-in-out infinite;
      }

      .upcoming-events-ribbon-2 {
        top: 68%;
        animation: upcomingRibbonSweepB 9.5s ease-in-out infinite;
      }

      .upcoming-events-orbit {
        width: 420px;
        height: 420px;
        border-radius: 50%;
        border: 1px solid rgba(115, 195, 255, 0.14);
        box-shadow: inset 0 0 0 28px rgba(255, 255, 255, 0.02), 0 0 80px rgba(115, 195, 255, 0.08);
        right: -90px;
        bottom: -180px;
        animation: upcomingOrbitRotate 18s linear infinite;
      }

      .upcoming-events-section .section-label {
        color: rgba(255, 255, 255, 0.72);
      }

      .upcoming-events-section .section-title {
        color: var(--white);
      }

      .upcoming-events-section .section-description {
        color: rgba(255, 255, 255, 0.74);
      }

      .upcoming-events-section .container {
        position: relative;
        z-index: 1;
      }

      .event-card {
        position: relative;
        height: 100%;
        padding: 14px;
        border-radius: 28px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.06) 100%);
        border: 1px solid rgba(255, 255, 255, 0.12);
        box-shadow: 0 18px 60px rgba(4, 12, 24, 0.22);
        backdrop-filter: blur(10px);
        transition: var(--transition-smooth);
        overflow: hidden;
        animation: upcomingCardFloat 7s ease-in-out infinite;
      }

      .upcoming-events-section .col-md-6:nth-child(2) .event-card {
        animation-delay: 0.6s;
      }

      .upcoming-events-section .col-md-6:nth-child(3) .event-card {
        animation-delay: 1.2s;
      }

      .upcoming-events-section .col-md-6:nth-child(4) .event-card {
        animation-delay: 1.8s;
      }

      .event-card::before {
        content: "";
        position: absolute;
        inset: -35% auto -35% -18%;
        width: 42%;
        background: linear-gradient(120deg, rgba(255, 255, 255, 0), rgba(143, 223, 255, 0.22), rgba(255, 255, 255, 0));
        transform: rotate(18deg);
        filter: blur(6px);
        opacity: 0.7;
        animation: upcomingCardShimmer 9s ease-in-out infinite;
      }

      .event-card:hover {
        transform: translateY(-10px) scale(1.01);
        border-color: rgba(78, 163, 255, 0.28);
        box-shadow: 0 24px 72px rgba(4, 12, 24, 0.3);
      }

      .event-card-media {
        display: block;
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        background: rgba(7, 22, 39, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.08);
      }

      .event-card-media::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(5, 13, 24, 0.24));
        pointer-events: none;
      }

      .event-card-media img {
        width: 100%;
        aspect-ratio: 16 / 10;
        object-fit: cover;
        display: block;
        transition: transform 0.8s ease;
      }

      .event-card:hover .event-card-media img {
        transform: scale(1.06);
      }

      .event-card-body {
        position: relative;
        z-index: 1;
        padding: 18px 6px 4px;
      }

      .event-card-topline {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 12px;
      }

      .event-card-badge {
        display: inline-flex;
        align-items: center;
        min-height: 32px;
        padding: 7px 12px;
        border-radius: 999px;
        color: var(--white);
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.12);
        font-family: "Open Sans", sans-serif;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 1.4px;
        text-transform: uppercase;
      }

      .event-card-code {
        margin: 0;
        color: #8ad9ff;
        font-family: "Open Sans", sans-serif;
        font-size: clamp(2rem, 4vw, 2.7rem);
        font-weight: 800;
        line-height: 0.95;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        text-shadow: 0 0 22px rgba(138, 217, 255, 0.2);
        animation: upcomingCodePulse 5.8s ease-in-out infinite;
      }

      .event-card-name {
        display: block;
        margin-top: 8px;
        margin-bottom: 14px;
        color: rgba(255, 255, 255, 0.78);
        font-size: 0.9rem;
        line-height: 1.5;
      }

      .event-card-meta {
        display: grid;
        gap: 10px;
        margin-bottom: 14px;
      }

      .event-meta-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: rgba(255, 255, 255, 0.88);
        font-size: 0.9rem;
        line-height: 1.5;
      }

      .event-meta-item i {
        color: #8ad9ff;
        font-size: 0.95rem;
      }

      .event-card-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #8ad9ff;
        font-family: "Open Sans", sans-serif;
        font-size: 0.9rem;
        font-weight: 700;
      }

      .event-card-link:hover {
        color: var(--white);
      }

      @keyframes upcomingGridDrift {
        0% { transform: translate3d(0, 0, 0); }
        100% { transform: translate3d(-60px, 30px, 0); }
      }

      @keyframes upcomingAmbientGlow {
        0%, 100% { transform: translate3d(16%, -10%, 0) scale(1.1); opacity: 0.52; }
        50% { transform: translate3d(-8%, 6%, 0) scale(1.28); opacity: 0.88; }
      }

      @keyframes upcomingBeamSweepA {
        0%, 100% { transform: translate3d(-6%, 0, 0) rotate(16deg); opacity: 0.26; }
        50% { transform: translate3d(28%, 0, 0) rotate(12deg); opacity: 0.52; }
      }

      @keyframes upcomingBeamSweepB {
        0%, 100% { transform: translate3d(8%, 0, 0) rotate(-16deg); opacity: 0.24; }
        50% { transform: translate3d(-26%, 0, 0) rotate(-10deg); opacity: 0.48; }
      }

      @keyframes upcomingRibbonSweepA {
        0%, 100% { transform: translate3d(-8%, 0, 0) scaleX(0.92); opacity: 0.52; }
        50% { transform: translate3d(8%, 0, 0) scaleX(1.04); opacity: 0.95; }
      }

      @keyframes upcomingRibbonSweepB {
        0%, 100% { transform: translate3d(10%, 0, 0) scaleX(0.9); opacity: 0.48; }
        50% { transform: translate3d(-10%, 0, 0) scaleX(1.05); opacity: 0.9; }
      }

      @keyframes upcomingOrbitRotate {
        0% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(180deg) scale(1.04); }
        100% { transform: rotate(360deg) scale(1); }
      }

      @keyframes upcomingCardFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-6px); }
      }

      @keyframes upcomingCardShimmer {
        0%, 100% { transform: translate3d(-120%, 0, 0) rotate(18deg); opacity: 0; }
        18% { opacity: 0; }
        42% { opacity: 0.75; }
        58% { transform: translate3d(260%, 0, 0) rotate(18deg); opacity: 0; }
      }

      @keyframes upcomingCodePulse {
        0%, 100% { text-shadow: 0 0 18px rgba(138, 217, 255, 0.14); opacity: 0.88; }
        50% { text-shadow: 0 0 32px rgba(138, 217, 255, 0.32); opacity: 1; }
      }

      .service-card {
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.98) 0%, rgba(248, 251, 253, 1) 100%);
        border-radius: 22px;
        padding: 40px 32px;
        text-align: left;
        transition: var(--transition-smooth);
        border: 1px solid rgba(20, 59, 102, 0.08);
        height: 100%;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 45px rgba(20, 59, 102, 0.06);
      }

      .service-card::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(65, 196, 224, 0.12), transparent 35%, transparent 70%, rgba(20, 59, 102, 0.04));
        opacity: 0;
        transition: opacity 0.35s ease;
        pointer-events: none;
      }

      .service-card::after {
        content: "";
        position: absolute;
        top: 0;
        left: 32px;
        right: 32px;
        height: 3px;
        background: linear-gradient(90deg, var(--accent-cyan), rgba(65, 196, 224, 0.15));
        transform: scaleX(0.35);
        transform-origin: left;
        transition: transform 0.35s ease;
      }

      .service-card:hover::before {
        opacity: 1;
      }

      .service-card:hover::after {
        transform: scaleX(1);
      }

      .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 24px 56px rgba(20, 59, 102, 0.12);
        border-color: rgba(65, 196, 224, 0.18);
      }

      .service-card-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 28px;
      }

      .service-card-kicker {
        display: inline-flex;
        align-items: center;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(20, 59, 102, 0.05);
        border: 1px solid rgba(20, 59, 102, 0.08);
        color: var(--primary-navy);
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 1.8px;
        text-transform: uppercase;
      }

      .service-card-index {
        font-family: "Open Sans", sans-serif;
        font-size: 2.9rem;
        line-height: 0.9;
        color: rgba(20, 59, 102, 0.12);
      }

      .service-card h4 {
        font-size: 1.2rem;
        color: var(--primary-navy);
        margin-bottom: 15px;
      }

      .service-card p {
        color: var(--medium-gray);
        font-size: 0.95rem;
        line-height: 1.8;
        margin-bottom: 22px;
      }

      .service-link {
        color: var(--accent-cyan);
        font-family: "Open Sans", sans-serif;
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
        position: relative;
        height: 100%;
        padding: 32px 28px 28px;
        border-radius: 24px;
        background: linear-gradient(
          180deg,
          rgba(255, 255, 255, 0.12) 0%,
          rgba(255, 255, 255, 0.04) 100%
        );
        border: 1px solid rgba(255, 255, 255, 0.14);
        backdrop-filter: blur(18px);
        box-shadow: 0 22px 55px rgba(0, 0, 0, 0.22);
        overflow: hidden;
        transition: transform 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
      }

      .feature-box::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
          135deg,
          rgba(255, 255, 255, 0.16),
          transparent 38%,
          transparent 62%,
          rgba(65, 196, 224, 0.12)
        );
        opacity: 0.55;
        pointer-events: none;
      }

      .feature-box::after {
        content: "";
        position: absolute;
        inset: auto 24px 0;
        height: 1px;
        background: linear-gradient(
          90deg,
          rgba(255, 255, 255, 0),
          rgba(65, 196, 224, 0.55),
          rgba(255, 255, 255, 0)
        );
        transform: scaleX(0.55);
        transform-origin: center;
        transition: transform 0.35s ease;
      }

      .feature-box:hover {
        transform: translateY(-10px);
        border-color: rgba(65, 196, 224, 0.6);
        box-shadow: 0 30px 70px rgba(0, 0, 0, 0.28);
      }

      .feature-box:hover::after {
        transform: scaleX(1);
      }

      .feature-box-surface {
        position: relative;
        z-index: 1;
        height: 100%;
        display: flex;
        flex-direction: column;
      }

      .feature-box-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 24px;
      }

      .feature-box-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.12);
        color: rgba(255, 255, 255, 0.88);
        font-size: 0.72rem;
        letter-spacing: 1.8px;
        text-transform: uppercase;
      }

      .feature-box-index {
        font-family: "Open Sans", sans-serif;
        font-size: 2.6rem;
        line-height: 1;
        color: rgba(255, 255, 255, 0.14);
      }

      .feature-box h4 {
        color: var(--white);
        font-size: 1.24rem;
        margin-bottom: 14px;
      }

      .feature-box p {
        color: rgba(255, 255, 255, 0.74);
        font-size: 0.96rem;
        line-height: 1.75;
        margin: 0;
      }

      .feature-box-arrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: auto;
        padding-top: 24px;
        color: rgba(255, 255, 255, 0.82);
        font-size: 0.8rem;
        letter-spacing: 1.7px;
        text-transform: uppercase;
      }

      .feature-box-arrow i {
        font-size: 0.95rem;
        transform: translateX(0);
        transition: transform 0.35s ease;
      }

      .feature-box:hover .feature-box-arrow i {
        transform: translateX(5px);
      }

      /* CTA Section */
      .cta-section {
        background:
          radial-gradient(circle at 18% 18%, rgba(255, 255, 255, 0.2), transparent 24%),
          radial-gradient(circle at 82% 24%, rgba(255, 255, 255, 0.14), transparent 20%),
          linear-gradient(135deg, #14b8d4 0%, #0f5f78 52%, #082c3a 100%);
        padding: 100px 0;
        position: relative;
        overflow: hidden;
        isolation: isolate;
      }

      .cta-section::before {
        content: "";
        position: absolute;
        inset: -12% 42% -12% -10%;
        background: radial-gradient(
          circle at center,
          rgba(255, 255, 255, 0.34) 0%,
          rgba(255, 255, 255, 0.12) 22%,
          rgba(255, 255, 255, 0) 58%
        );
        filter: blur(10px);
        opacity: 0.55;
        animation: ctaAurora 16s ease-in-out infinite alternate;
        pointer-events: none;
      }

      .cta-section::after {
        content: "";
        position: absolute;
        inset: auto -12% -38% 48%;
        width: 420px;
        height: 420px;
        border-radius: 50%;
        background: radial-gradient(
          circle at 50% 50%,
          rgba(255, 255, 255, 0.18),
          rgba(255, 255, 255, 0.03) 46%,
          transparent 62%
        );
        border: 1px solid rgba(255, 255, 255, 0.14);
        box-shadow:
          0 0 0 22px rgba(255, 255, 255, 0.04),
          0 0 0 70px rgba(255, 255, 255, 0.025);
        animation: ctaOrbitalPulse 12s ease-in-out infinite;
        pointer-events: none;
      }

      .cta-content {
        position: relative;
        z-index: 2;
        text-align: center;
      }

      .cta-graphics {
        position: absolute;
        inset: 0;
        z-index: 1;
        pointer-events: none;
      }

      .cta-grid {
        position: absolute;
        inset: 12% 6%;
        background-image:
          linear-gradient(rgba(255, 255, 255, 0.07) 1px, transparent 1px),
          linear-gradient(90deg, rgba(255, 255, 255, 0.07) 1px, transparent 1px);
        background-size: 70px 70px;
        mask-image: radial-gradient(circle at center, black 35%, transparent 82%);
        opacity: 0.3;
        transform: perspective(1200px) rotateX(66deg) scale(1.15);
        transform-origin: center bottom;
      }

      .cta-beam {
        position: absolute;
        top: -24%;
        left: 8%;
        width: 38%;
        height: 160%;
        background: linear-gradient(
          180deg,
          rgba(255, 255, 255, 0.28),
          rgba(255, 255, 255, 0)
        );
        opacity: 0.28;
        filter: blur(1px);
        transform: rotate(24deg);
        animation: ctaBeamFloat 14s ease-in-out infinite;
      }

      .cta-ring {
        position: absolute;
        top: 50%;
        right: 10%;
        width: 340px;
        height: 340px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.26);
        transform: translateY(-50%);
        opacity: 0.42;
        animation: ctaRingRotate 22s linear infinite;
      }

      .cta-ring::before,
      .cta-ring::after {
        content: "";
        position: absolute;
        inset: 16px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.18);
      }

      .cta-ring::after {
        inset: 54px;
        border-color: rgba(255, 255, 255, 0.12);
      }

      .cta-ring-dot {
        position: absolute;
        top: 28px;
        left: 50%;
        width: 12px;
        height: 12px;
        margin-left: -6px;
        border-radius: 50%;
        background: var(--white);
        box-shadow: 0 0 18px rgba(255, 255, 255, 0.65);
      }

      .cta-ring-secondary {
        width: 220px;
        height: 220px;
        top: 24%;
        right: auto;
        left: 9%;
        opacity: 0.18;
        animation-direction: reverse;
        animation-duration: 18s;
      }

      .cta-ring-secondary .cta-ring-dot {
        top: auto;
        bottom: 26px;
        background: rgba(255, 255, 255, 0.85);
      }

      .cta-content h2 {
        font-size: 2.5rem;
        color: var(--white);
        margin-bottom: 16px;
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
        font-family: "Open Sans", sans-serif;
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

      @keyframes ctaAurora {
        0% {
          transform: translate3d(-2%, -1%, 0) scale(1);
        }
        100% {
          transform: translate3d(4%, 3%, 0) scale(1.08);
        }
      }

      @keyframes ctaOrbitalPulse {
        0%,
        100% {
          transform: scale(1) rotate(0deg);
          opacity: 0.85;
        }
        50% {
          transform: scale(1.08) rotate(6deg);
          opacity: 1;
        }
      }

      @keyframes ctaBeamFloat {
        0%,
        100% {
          transform: rotate(24deg) translateX(0);
          opacity: 0.2;
        }
        50% {
          transform: rotate(18deg) translateX(30px);
          opacity: 0.34;
        }
      }

      @keyframes ctaRingRotate {
        from {
          transform: translateY(-50%) rotate(0deg);
        }
        to {
          transform: translateY(-50%) rotate(360deg);
        }
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

        .cta-section::after {
          width: 300px;
          height: 300px;
          inset: auto -16% -28% auto;
        }

        .cta-ring {
          width: 260px;
          height: 260px;
          right: -2%;
        }

        .cta-ring-secondary {
          width: 170px;
          height: 170px;
          left: 2%;
        }

        .strategic-frame {
          min-height: 250px;
          padding: 34px 24px;
        }

        .strategic-frame::before,
        .strategic-frame::after {
          width: 68%;
          height: 3px;
        }

        .strategic-kicker {
          letter-spacing: 5px;
          margin-bottom: 14px;
        }

        .strategic-title {
          font-size: clamp(2.2rem, 9vw, 3rem);
        }

        .strategic-copy p {
          font-size: 0.95rem;
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

        .cta-grid,
        .cta-ring-secondary {
          display: none;
        }

        .cta-beam {
          left: -8%;
          width: 58%;
        }

        .cta-ring {
          width: 220px;
          height: 220px;
          right: -12%;
          opacity: 0.28;
        }

        .cta-section::after {
          width: 240px;
          height: 240px;
          right: -18%;
          bottom: -18%;
        }

        .strategic-frame {
          min-height: 220px;
          padding: 24px 18px;
        }

        .strategic-frame::before,
        .strategic-frame::after {
          width: 64%;
          height: 3px;
        }

        .strategic-frame-bend {
          height: 14px;
        }

        .strategic-frame-bend-top {
          left: -14px;
          top: -14px;
        }

        .strategic-frame-bend-bottom {
          right: -14px;
          bottom: -14px;
        }

        .strategic-kicker {
          letter-spacing: 5px;
          margin-bottom: 14px;
        }

        .strategic-title {
          font-size: clamp(2.2rem, 9vw, 3rem);
        }

        .strategic-copy p {
          font-size: 0.95rem;
          letter-spacing: 1.6px;
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
            @media (prefers-reduced-motion: reduce) {
        .cta-section::before,
        .cta-section::after,
        .cta-beam,
        .cta-ring,
        .upcoming-events-section::before,
        .upcoming-events-section::after,
        .upcoming-events-beam,
        .upcoming-events-ribbon,
        .upcoming-events-orbit,
        .event-card,
        .event-card::before,
        .event-card-code {
          animation: none;
        }
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
          <div class="col-lg-6">
            <div class="strategic-frame">
              <span class="strategic-frame-bend strategic-frame-bend-top" aria-hidden="true"></span>
              <span class="strategic-frame-bend strategic-frame-bend-bottom" aria-hidden="true"></span>
              <div class="strategic-content">
                <span class="strategic-kicker">Strategic</span>
                <h3 class="strategic-title">Trade <strong>Advisory</strong></h3>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
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
              <div class="service-card-header">
                <span class="service-card-kicker">Physical Events</span>
                <span class="service-card-index">01</span>
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
              <div class="service-card-header">
                <span class="service-card-kicker">Digital Formats</span>
                <span class="service-card-index">02</span>
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
              <div class="service-card-header">
                <span class="service-card-kicker">Executive Access</span>
                <span class="service-card-index">03</span>
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
         UPCOMING EVENTS SECTION
         ============================================ -->
    <section class="section-padding upcoming-events-section">
      <div class="upcoming-events-motion" aria-hidden="true">
        <span class="upcoming-events-beam upcoming-events-beam-1"></span>
        <span class="upcoming-events-beam upcoming-events-beam-2"></span>
        <span class="upcoming-events-ribbon upcoming-events-ribbon-1"></span>
        <span class="upcoming-events-ribbon upcoming-events-ribbon-2"></span>
        <span class="upcoming-events-orbit"></span>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="section-header" data-aos="fade-up">
              <span class="section-label">Upcoming Events</span>
              <h2 class="section-title">Global Upcoming Events. Strategic Conversations.</h2>
              <p class="section-description">
                A curated look at standout platforms shaping technology, gas,
                and energy conversations across priority markets.
              </p>
            </div>
          </div>
        </div>
        <div class="row g-4 align-items-stretch">
          <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">
            <article class="event-card">
              <a class="event-card-media" href="https://digitalnigeria.gov.ng/" target="_blank" rel="noopener noreferrer" aria-label="Visit Digital Nigeria 2026 website">
                <img src="{{ asset('img/upcoming/Digital_Nigeria_Website.png') }}" alt="Digital Nigeria website preview" loading="lazy" />
              </a>
              <div class="event-card-body">
                <div class="event-card-topline">
                  <span class="event-card-badge">Abuja</span>
                </div>
                <h4 class="event-card-code">DNICE</h4>
                <span class="event-card-name">Digital Nigeria 2026</span>
                <div class="event-card-meta">
                  <div class="event-meta-item"><i class="bi bi-calendar-event"></i><span>Aug 11 - 13, 2026</span></div>
                  <div class="event-meta-item"><i class="bi bi-geo-alt"></i><span>Abuja, Nigeria</span></div>
                </div>
                <a class="event-card-link" href="https://digitalnigeria.gov.ng/" target="_blank" rel="noopener noreferrer">Visit Website <i class="bi bi-arrow-up-right"></i></a>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="180">
            <article class="event-card">
              <a class="event-card-media" href="https://africaenergyinvestmentsummit.com/" target="_blank" rel="noopener noreferrer" aria-label="Visit Africa Energy Investment Summit website">
                <img src="{{ asset('img/upcoming/AEIS_Website.png') }}" alt="Africa Energy Investment Summit website preview" loading="lazy" />
              </a>
              <div class="event-card-body">
                <div class="event-card-topline">
                  <span class="event-card-badge">New York</span>
                </div>
                <h4 class="event-card-code">AEIS</h4>
                <span class="event-card-name">African Energy Investment Summit</span>
                <div class="event-card-meta">
                  <div class="event-meta-item"><i class="bi bi-calendar-event"></i><span>Sep 25 - 27, 2026</span></div>
                  <div class="event-meta-item"><i class="bi bi-geo-alt"></i><span>New York, USA</span></div>
                </div>
                <a class="event-card-link" href="https://africaenergyinvestmentsummit.com/" target="_blank" rel="noopener noreferrer">Visit Website <i class="bi bi-arrow-up-right"></i></a>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="260">
            <article class="event-card">
              <a class="event-card-media" href="https://nlcgaconference.com/" target="_blank" rel="noopener noreferrer" aria-label="Visit NLCGA conference website">
                <img src="{{ asset('img/upcoming/NLCGA_Website.png') }}" alt="NLCGA website preview" loading="lazy" />
              </a>
              <div class="event-card-body">
                <div class="event-card-topline">
                  <span class="event-card-badge">Lagos</span>
                </div>
                <h4 class="event-card-code">NLCGA</h4>
                <span class="event-card-name">NLCGA Conference 2026</span>
                <div class="event-card-meta">
                  <div class="event-meta-item"><i class="bi bi-calendar-event"></i><span>November 2026</span></div>
                  <div class="event-meta-item"><i class="bi bi-geo-alt"></i><span>Lagos, Nigeria</span></div>
                </div>
                <a class="event-card-link" href="https://nlcgaconference.com/" target="_blank" rel="noopener noreferrer">Visit Website <i class="bi bi-arrow-up-right"></i></a>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="340">
            <article class="event-card">
              <a class="event-card-media" href="https://nigeriaenergysummit.com/" target="_blank" rel="noopener noreferrer" aria-label="Visit Nigeria International Energy Summit website">
                <img src="{{ asset('img/upcoming/NIES_Website.png') }}" alt="Nigeria International Energy Summit website preview" loading="lazy" />
              </a>
              <div class="event-card-body">
                <div class="event-card-topline">
                  <span class="event-card-badge">Abuja</span>
                </div>
                <h4 class="event-card-code">NIES</h4>
                <span class="event-card-name">Nigeria International Energy Summit</span>
                <div class="event-card-meta">
                  <div class="event-meta-item"><i class="bi bi-calendar-event"></i><span>March 15 - 16, 2027</span></div>
                  <div class="event-meta-item"><i class="bi bi-geo-alt"></i><span>Abuja, Nigeria</span></div>
                </div>
                <a class="event-card-link" href="https://nigeriaenergysummit.com/" target="_blank" rel="noopener noreferrer">Visit Website <i class="bi bi-arrow-up-right"></i></a>
              </div>
            </article>
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
              <div class="feature-box-surface">
                <div class="feature-box-meta">
                  <span class="feature-box-pill">Track Record</span>
                  <span class="feature-box-index">01</span>
                </div>
                <h4>Proven Excellence</h4>
                <p>
                  Over 15 years of delivering exceptional results for global
                  clients across multiple industries and continents.
                </p>
                <div class="feature-box-arrow">
                  <span>Trusted execution</span>
                  <i class="bi bi-arrow-up-right"></i>
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <div class="feature-box">
              <div class="feature-box-surface">
                <div class="feature-box-meta">
                  <span class="feature-box-pill">Specialists</span>
                  <span class="feature-box-index">02</span>
                </div>
                <h4>Expert Team</h4>
                <p>
                  Seasoned professionals with deep industry knowledge and hands-on
                  experience in international trade.
                </p>
                <div class="feature-box-arrow">
                  <span>Senior insight</span>
                  <i class="bi bi-arrow-up-right"></i>
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <div class="feature-box">
              <div class="feature-box-surface">
                <div class="feature-box-meta">
                  <span class="feature-box-pill">Strategy Design</span>
                  <span class="feature-box-index">03</span>
                </div>
                <h4>Innovative Solutions</h4>
                <p>
                  Tailored strategies that address unique challenges and unlock
                  new opportunities in global markets.
                </p>
                <div class="feature-box-arrow">
                  <span>Built for growth</span>
                  <i class="bi bi-arrow-up-right"></i>
                </div>
              </div>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <div class="feature-box">
              <div class="feature-box-surface">
                <div class="feature-box-meta">
                  <span class="feature-box-pill">Client Value</span>
                  <span class="feature-box-index">04</span>
                </div>
                <h4>Lasting Partnerships</h4>
                <p>
                  Building relationships founded on trust, collaboration, and
                  measurable impact for our clients.
                </p>
                <div class="feature-box-arrow">
                  <span>Long-term impact</span>
                  <i class="bi bi-arrow-up-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================
         CTA SECTION
         ============================================ -->
    <section class="cta-section">
      <div class="cta-graphics" aria-hidden="true">
        <span class="cta-grid"></span>
        <span class="cta-beam"></span>
        <span class="cta-ring">
          <span class="cta-ring-dot"></span>
        </span>
        <span class="cta-ring cta-ring-secondary">
          <span class="cta-ring-dot"></span>
        </span>
      </div>
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








































































