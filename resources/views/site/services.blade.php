<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ data_get($page, 'meta_description', '') }}" />
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
      /* Services Page Specific Styles */
      .services-intro-section {
        background: var(--off-white);
      }

      .services-offer-section {
        position: relative;
        background:
          radial-gradient(
            circle at 12% 20%,
            rgba(65, 196, 224, 0.18),
            transparent 26%
          ),
          radial-gradient(
            circle at 88% 18%,
            rgba(78, 163, 255, 0.14),
            transparent 24%
          ),
          linear-gradient(180deg, #ffffff 0%, #f7fafc 100%);
        overflow: hidden;
      }

      .services-offer-section::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
          linear-gradient(90deg, rgba(20, 59, 102, 0.03) 1px, transparent 1px),
          linear-gradient(rgba(20, 59, 102, 0.03) 1px, transparent 1px);
        background-size: 88px 88px;
        opacity: 0.3;
      }

      .services-offer-shell {
        position: relative;
        z-index: 1;
        margin-top: 0;
      }

      .offer-row {
        display: grid;
        grid-template-columns: minmax(0, 1.08fr) minmax(320px, 0.92fr);
        gap: 56px;
        align-items: stretch;
        padding: 42px 0;
        position: relative;
      }

      .offer-row > * {
        min-height: 100%;
      }

      .offer-row + .offer-row {
        border-top: 1px solid rgba(20, 59, 102, 0.08);
      }

      .offer-row:nth-child(even) .offer-content {
        order: 2;
      }

      .offer-row:nth-child(even) .offer-visual {
        order: 1;
      }

      .offer-index {
        display: inline-flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
        color: var(--primary-navy);
        font-family: var(--font-heading);
        font-size: 0.82rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2.8px;
      }

      .offer-index::before {
        content: "";
        width: 54px;
        height: 2px;
        background: linear-gradient(
          90deg,
          var(--accent-cyan),
          rgba(65, 196, 224, 0.12)
        );
      }

      .offer-content h3 {
        font-size: clamp(1.8rem, 3vw, 2.75rem);
        color: var(--primary-navy);
        margin-bottom: 18px;
        line-height: 1.1;
      }

        .offer-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

      .offer-content p {
        color: var(--text-color);
        line-height: 1.9;
        margin-bottom: 22px;
        max-width: 60ch;
      }

      .offer-list {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        padding: 0;
        margin: 0 0 26px;
        list-style: none;
      }

      .offer-list li {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 18px;
        border-radius: 999px;
        background: rgba(20, 59, 102, 0.05);
        color: var(--primary-navy);
        font-size: 0.9rem;
        font-family: var(--font-heading);
        letter-spacing: 0.2px;
      }

      .offer-list li i {
        color: var(--accent-cyan);
      }

      .offer-visual {
        position: relative;
        min-height: 100%;
        overflow: visible;
      }

      .offer-visual::before {
        content: "";
        position: absolute;
        inset: 8% 10%;
        border-radius: 50%;
        border: 1px solid rgba(65, 196, 224, 0.18);
        background: radial-gradient(
          circle,
          rgba(65, 196, 224, 0.08),
          transparent 62%
        );
        animation: offerSpin 14s linear infinite;
        opacity: 0.75;
      }

      .offer-visual::after {
        content: "";
        position: absolute;
        inset: 18% 18%;
        border-radius: 50%;
        border: 1px dashed rgba(78, 163, 255, 0.22);
        animation: offerSpin 18s linear infinite reverse;
      }

      .offer-visual-inner {
        position: absolute;
        inset: 0;
        padding: 18px 6px 18px 34px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        z-index: 1;
      }

      .offer-icon-wrap {
        position: relative;
        width: 96px;
        height: 96px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: linear-gradient(
          145deg,
          rgba(20, 59, 102, 0.96),
          rgba(26, 74, 122, 0.9)
        );
        box-shadow:
          0 0 0 16px rgba(65, 196, 224, 0.05),
          0 18px 34px rgba(20, 59, 102, 0.18);
        animation: offerPulse 5s ease-in-out infinite;
      }

      .offer-icon-wrap i {
        font-size: 2.4rem;
        color: var(--accent-cyan);
      }

      .offer-beam {
        position: absolute;
        top: 48px;
        right: 6%;
        width: 62%;
        height: 2px;
        background: linear-gradient(
          90deg,
          rgba(65, 196, 224, 0),
          rgba(65, 196, 224, 0.86),
          rgba(65, 196, 224, 0)
        );
        animation: offerSweep 4.8s ease-in-out infinite;
        opacity: 0.9;
      }

      .offer-signal {
        position: absolute;
        border-radius: 50%;
        border: 1px solid rgba(65, 196, 224, 0.26);
        animation: offerFloat 7s ease-in-out infinite;
      }

      .offer-signal.signal-one {
        width: 124px;
        height: 124px;
        right: 34px;
        top: 18px;
      }

      .offer-signal.signal-two {
        width: 74px;
        height: 74px;
        left: 70px;
        bottom: 92px;
        animation-delay: 0.6s;
      }

      .offer-signal.signal-three {
        width: 18px;
        height: 18px;
        right: 122px;
        bottom: 72px;
        background: var(--accent-cyan);
        box-shadow: 0 0 0 10px rgba(65, 196, 224, 0.12);
        border: none;
        animation-delay: 1.1s;
      }

      .offer-visual-copy span {
        display: block;
        color: rgba(20, 59, 102, 0.55);
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 0.78rem;
        margin-bottom: 10px;
      }

      .offer-visual-copy strong {
        display: block;
        font-size: clamp(1.35rem, 2vw, 1.9rem);
        line-height: 1.2;
        color: var(--primary-navy);
        max-width: 18ch;
      }

      .offer-metrics {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        padding: 0;
        margin: 0;
        list-style: none;
      }

      .offer-metrics li {
        padding: 10px 14px;
        border-radius: 999px;
        background: rgba(20, 59, 102, 0.05);
        color: var(--primary-navy);
        font-family: var(--font-heading);
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1.3px;
      }

      .offer-photo-shell {
        position: relative;
        width: 100%;
        max-width: 520px;
        min-height: 420px;
        margin-left: auto;
      }

      .offer-row:nth-child(even) .offer-photo-shell {
        margin-left: 0;
        margin-right: auto;
      }

      .offer-photo {
        position: absolute;
        inset: 10px 10px 10px 10px;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 26px 55px rgba(20, 59, 102, 0.18);
      }

      .offer-photo::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
          180deg,
          rgba(13, 40, 68, 0.06) 0%,
          rgba(13, 40, 68, 0.46) 100%
        );
      }

      .offer-photo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        background: #fff;
        display: block;
        transition: transform 0.8s ease;
      }

      .offer-visual:hover .offer-photo img {
        transform: scale(1.08);
      }

      .offer-motion-ring,
      .offer-motion-dash {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
      }

      .offer-motion-ring {
        border: 1px solid rgba(65, 196, 224, 0.24);
        animation: offerFloat 7s ease-in-out infinite;
      }

      .offer-motion-ring.ring-a {
        width: 150px;
        height: 150px;
        top: -12px;
        right: -4px;
      }

      .offer-motion-ring.ring-b {
        width: 94px;
        height: 94px;
        bottom: 18px;
        left: -6px;
        animation-delay: 0.6s;
      }

      .offer-motion-dash {
        width: 190px;
        height: 190px;
        border: 1px dashed rgba(78, 163, 255, 0.24);
        top: -10px;
        left: -22px;
        animation: offerSpin 16s linear infinite reverse;
      }

      .offer-motion-dot {
        position: absolute;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: var(--accent-cyan);
        box-shadow: 0 0 0 10px rgba(65, 196, 224, 0.12);
        right: 42px;
        bottom: 26px;
        animation: offerFloat 5.5s ease-in-out infinite;
        animation-delay: 1s;
      }

      @keyframes offerSpin {
        from {
          transform: rotate(0deg);
        }
        to {
          transform: rotate(360deg);
        }
      }

      @keyframes offerPulse {
        0%,
        100% {
          transform: translateY(0);
          box-shadow: 0 0 0 16px rgba(255, 255, 255, 0.03);
        }
        50% {
          transform: translateY(-8px);
          box-shadow: 0 0 0 24px rgba(255, 255, 255, 0.02);
        }
      }

      @keyframes offerSweep {
        0%,
        100% {
          transform: translateX(0);
          opacity: 0.45;
        }
        50% {
          transform: translateX(-18px);
          opacity: 1;
        }
      }

      @keyframes offerFloat {
        0%,
        100% {
          transform: translateY(0);
        }
        50% {
          transform: translateY(-10px);
        }
      }

      /* Process Section */
      .process-section {
        background: linear-gradient(
          135deg,
          var(--primary-navy) 0%,
          var(--dark-navy) 100%
        );
        position: relative;
        overflow: hidden;
      }

      .process-section::before {
        content: "";
        position: absolute;
        top: -50%;
        left: -20%;
        width: 600px;
        height: 600px;
        background: radial-gradient(
          circle,
          rgba(65, 196, 224, 0.1) 0%,
          transparent 70%
        );
        border-radius: 50%;
      }

      .process-section::after {
        content: "";
        position: absolute;
        inset: 0;
        background:
          linear-gradient(
            90deg,
            rgba(255, 255, 255, 0.03) 1px,
            transparent 1px
          ),
          linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        background-size: 90px 90px;
        opacity: 0.22;
        pointer-events: none;
      }

      .process-step {
        text-align: center;
        position: relative;
        padding: 30px 20px;
        transition: transform 0.35s ease;
      }

      .process-step:hover {
        transform: translateY(-8px);
      }

      .process-step-number {
        position: relative;
        width: 70px;
        height: 70px;
        background: var(--accent-cyan);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-family: var(--font-heading);
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--white);
        box-shadow:
          0 0 0 0 rgba(65, 196, 224, 0.28),
          0 18px 30px rgba(65, 196, 224, 0.18);
        animation: processPulse 3.8s ease-in-out infinite;
      }

      .process-step-number::before {
        content: "";
        position: absolute;
        inset: -12px;
        border-radius: 50%;
        border: 1px solid rgba(65, 196, 224, 0.22);
        animation: processRing 3.8s ease-in-out infinite;
      }

      .process-step h4 {
        color: var(--white);
        font-size: 1.2rem;
        margin-bottom: 15px;
        transition: color 0.3s ease;
      }

      .process-step p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.95rem;
        margin: 0;
        transition: color 0.3s ease;
      }

      .process-step:hover h4 {
        color: var(--accent-cyan);
      }

      .process-step:hover p {
        color: rgba(255, 255, 255, 0.88);
      }

      .process-connector {
        position: absolute;
        top: 65px;
        right: -50%;
        width: 100%;
        height: 2px;
        background: rgba(65, 196, 224, 0.3);
        overflow: hidden;
      }

      .process-connector::after {
        content: "";
        position: absolute;
        top: 0;
        left: -35%;
        width: 35%;
        height: 100%;
        background: linear-gradient(
          90deg,
          rgba(65, 196, 224, 0),
          rgba(65, 196, 224, 0.95),
          rgba(65, 196, 224, 0)
        );
        animation: processFlow 2.8s linear infinite;
      }

      .process-step:nth-child(2) .process-step-number,
      .process-step:nth-child(2) .process-step-number::before,
      .process-step:nth-child(2) .process-connector::after {
        animation-delay: 0.25s;
      }

      .process-step:nth-child(3) .process-step-number,
      .process-step:nth-child(3) .process-step-number::before,
      .process-step:nth-child(3) .process-connector::after {
        animation-delay: 0.5s;
      }

      .process-step:nth-child(4) .process-step-number,
      .process-step:nth-child(4) .process-step-number::before {
        animation-delay: 0.75s;
      }

      @keyframes processPulse {
        0%,
        100% {
          transform: translateY(0);
          box-shadow:
            0 0 0 0 rgba(65, 196, 224, 0.2),
            0 18px 30px rgba(65, 196, 224, 0.18);
        }
        50% {
          transform: translateY(-6px);
          box-shadow:
            0 0 0 12px rgba(65, 196, 224, 0.02),
            0 24px 38px rgba(65, 196, 224, 0.24);
        }
      }

      @keyframes processRing {
        0%,
        100% {
          opacity: 0.35;
          transform: scale(1);
        }
        50% {
          opacity: 0.8;
          transform: scale(1.08);
        }
      }

      @keyframes processFlow {
        from {
          left: -35%;
        }
        to {
          left: 100%;
        }
      }

      @media (max-width: 991.98px) {
        .process-connector {
          display: none;
        }
      }

      /* Industries Section */
      .industries-section {
        background: var(--white);
      }

      .industry-card {
        background: var(--off-white);
        border-radius: 12px;
        padding: 35px 30px;
        text-align: center;
        transition: var(--transition-smooth);
        border: 1px solid var(--light-gray);
        height: 100%;
      }

      .industry-card:hover {
        background: var(--primary-navy);
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(20, 59, 102, 0.2);
      }

      .industry-icon {
        width: 70px;
        height: 70px;
        background: rgba(65, 196, 224, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        transition: var(--transition-smooth);
      }

      .industry-card:hover .industry-icon {
        background: var(--accent-cyan);
      }

      .industry-icon i {
        font-size: 1.8rem;
        color: var(--accent-cyan);
        transition: var(--transition-smooth);
      }

      .industry-card:hover .industry-icon i {
        color: var(--white);
      }

      .industry-card h4 {
        font-size: 1.2rem;
        color: var(--primary-navy);
        margin-bottom: 10px;
        transition: var(--transition-smooth);
      }

      .industry-card:hover h4 {
        color: var(--white);
      }

      .industry-card p {
        color: var(--medium-gray);
        font-size: 0.9rem;
        margin: 0;
        transition: var(--transition-smooth);
      }

      .industry-card:hover p {
        color: rgba(255, 255, 255, 0.7);
      }

      /* Why Choose Us Section */
      .services-why-section {
        position: relative;
        background:
          radial-gradient(
            circle at 14% 16%,
            rgba(65, 196, 224, 0.18),
            transparent 24%
          ),
          linear-gradient(135deg, #f7fafc 0%, #ffffff 100%);
        overflow: hidden;
      }

      .services-why-section::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
          linear-gradient(90deg, rgba(20, 59, 102, 0.03) 1px, transparent 1px),
          linear-gradient(rgba(20, 59, 102, 0.03) 1px, transparent 1px);
        background-size: 88px 88px;
        opacity: 0.26;
      }

      .services-why-shell {
        position: relative;
        z-index: 1;
      }

      .services-why-shell > [class*="col-"] {
        display: flex;
      }

      .services-why-copy {
        padding-right: 28px;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }

      .services-why-copy .section-header {
        margin-bottom: 26px;
      }

      .services-why-copy .section-description {
        max-width: none;
        margin-left: 0;
      }

      .services-why-points {
        list-style: none;
        padding: 0;
        margin: 0;
      }

      .services-why-points li {
        position: relative;
        padding-left: 34px;
        color: var(--text-color);
        line-height: 1.9;
        font-size: 1rem;
      }

      .services-why-points li + li {
        margin-top: 22px;
      }

      .services-why-points li::before {
        content: "";
        position: absolute;
        left: 0;
        top: 11px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: var(--accent-cyan);
        box-shadow: 0 0 0 10px rgba(65, 196, 224, 0.12);
      }

      .services-why-visual {
        position: relative;
        width: 100%;
        min-height: 100%;
        padding: 24px 0 24px 24px;
      }

      .services-why-image-wrap {
        position: relative;
        min-height: 100%;
        height: 100%;
        border-radius: 32px;
        overflow: hidden;
        box-shadow: 0 28px 60px rgba(20, 59, 102, 0.18);
      }

      .services-why-image-wrap::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
          180deg,
          rgba(20, 59, 102, 0.08) 0%,
          rgba(13, 40, 68, 0.5) 100%
        );
        z-index: 1;
      }

      .services-why-image-wrap img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        background: #fff;
        display: block;
        transition: transform 0.8s ease;
      }

      .services-why-visual:hover .services-why-image-wrap img {
        transform: scale(1.08);
      }

      .services-why-badge {
        position: absolute;
        left: 0;
        bottom: 0;
        z-index: 2;
        transform: translate(-8%, 14%);
        max-width: 250px;
        padding: 24px 26px;
        border-radius: 0 24px 24px 24px;
        background: rgba(255, 255, 255, 0.94);
        color: var(--primary-navy);
        box-shadow: 0 22px 50px rgba(20, 59, 102, 0.18);
        animation: whyFloat 5.2s ease-in-out infinite;
      }

      .services-why-badge span {
        display: block;
        margin-bottom: 10px;
        color: var(--accent-cyan-dark);
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 0.76rem;
        font-family: var(--font-heading);
        font-weight: 700;
      }

      .services-why-badge strong {
        display: block;
        line-height: 1.6;
        font-size: 1rem;
      }

      .services-why-ring,
      .services-why-orbit {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
      }

      .services-why-ring {
        width: 134px;
        height: 134px;
        top: 0;
        right: -12px;
        border: 1px solid rgba(65, 196, 224, 0.22);
        animation: offerFloat 7s ease-in-out infinite;
      }

      .services-why-orbit {
        width: 88px;
        height: 88px;
        right: 44px;
        bottom: 48px;
        border: 1px dashed rgba(78, 163, 255, 0.22);
        animation: offerSpin 16s linear infinite reverse;
      }

      @keyframes whyFloat {
        0%,
        100% {
          transform: translate(-8%, 14%);
        }
        50% {
          transform: translate(-8%, 6%);
        }
      }

      /* Event Gallery Section */
      .services-gallery-section {
        position: relative;
        background:
          radial-gradient(
            circle at top left,
            rgba(65, 196, 224, 0.2),
            transparent 24%
          ),
          radial-gradient(
            circle at 90% 18%,
            rgba(20, 59, 102, 0.12),
            transparent 28%
          ),
          linear-gradient(
            135deg,
            #061a2f 0%,
            #0b2744 48%,
            #f6f9fc 48.2%,
            #ffffff 100%
          );
        overflow: hidden;
      }

      .services-gallery-section::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
          linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
          linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 92px 92px;
        opacity: 0.24;
        pointer-events: none;
      }

      .services-gallery-shell {
        position: relative;
        z-index: 1;
      }

      .services-gallery-shell .section-header {
        margin-bottom: 38px;
      }

      .services-gallery-shell .section-label,
      .services-gallery-shell .section-title,
      .services-gallery-shell .section-description {
        color: var(--white);
      }

      .services-gallery-shell .section-description {
        max-width: 60ch;
        opacity: 0.82;
      }

      .services-gallery-grid {
        display: grid;
        grid-template-columns: minmax(0, 0.92fr) minmax(0, 1.08fr);
        gap: 28px;
        align-items: start;
      }

      .gallery-spotlight-card {
        position: sticky;
        top: 120px;
        padding: 34px;
        border-radius: 30px;
        overflow: hidden;
        background:
          linear-gradient(
            180deg,
            rgba(255, 255, 255, 0.12),
            rgba(255, 255, 255, 0.03)
          ),
          rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.12);
        box-shadow: 0 30px 70px rgba(5, 17, 31, 0.3);
        backdrop-filter: blur(14px);
      }

      .gallery-spotlight-card::before {
        content: "";
        position: absolute;
        inset: -22% auto auto -12%;
        width: 240px;
        height: 240px;
        border-radius: 50%;
        background: radial-gradient(
          circle,
          rgba(65, 196, 224, 0.32) 0%,
          rgba(65, 196, 224, 0) 72%
        );
      }

      .gallery-spotlight-card::after {
        content: "";
        position: absolute;
        right: -60px;
        bottom: -60px;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.12);
      }

      .gallery-spotlight-inner {
        position: relative;
        z-index: 1;
      }

      .gallery-spotlight-tag {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 16px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.12);
        color: rgba(255, 255, 255, 0.8);
        font-family: var(--font-heading);
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
      }

      .gallery-spotlight-card h3 {
        margin: 24px 0 14px;
        color: var(--white);
        font-size: clamp(2rem, 4vw, 3.1rem);
        line-height: 1.02;
      }

      .gallery-spotlight-card p {
        max-width: 42ch;
        color: rgba(255, 255, 255, 0.82);
        line-height: 1.9;
        margin-bottom: 28px;
      }

      .gallery-spotlight-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 28px;
        padding: 0;
        list-style: none;
      }

      .gallery-spotlight-meta li {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 16px;
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.08);
        color: var(--white);
        font-size: 0.92rem;
      }

      .gallery-spotlight-meta i {
        color: var(--accent-cyan);
      }

      .gallery-spotlight-link {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 16px 22px;
        border-radius: 18px;
        background: linear-gradient(135deg, #41c4e0 0%, #5ad5ef 100%);
        color: var(--primary-navy);
        font-family: var(--font-heading);
        font-size: 0.82rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.7px;
        transition: transform 0.35s ease, box-shadow 0.35s ease;
      }

      .gallery-spotlight-link:hover {
        color: var(--primary-navy);
        transform: translateY(-3px);
        box-shadow: 0 18px 36px rgba(65, 196, 224, 0.26);
      }

      .gallery-tab-cluster {
        display: grid;
        gap: 18px;
      }

      .gallery-event-tab {
        position: relative;
        display: grid;
        grid-template-columns: 126px minmax(0, 1fr) auto;
        gap: 20px;
        align-items: center;
        padding: 18px;
        border-radius: 26px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.96);
        border: 1px solid rgba(20, 59, 102, 0.08);
        box-shadow: 0 22px 50px rgba(10, 31, 51, 0.08);
        transition:
          transform 0.45s ease,
          box-shadow 0.45s ease,
          border-color 0.45s ease;
      }

      .gallery-event-tab::before {
        content: "";
        position: absolute;
        inset: 0 auto 0 0;
        width: 5px;
        background: linear-gradient(
          180deg,
          rgba(65, 196, 224, 0.16),
          rgba(20, 59, 102, 0.92)
        );
        transition: width 0.35s ease;
      }

      .gallery-event-tab:hover,
      .gallery-event-tab:focus-visible {
        transform: translateY(-8px) scale(1.01);
        border-color: rgba(65, 196, 224, 0.28);
        box-shadow: 0 30px 70px rgba(10, 31, 51, 0.16);
      }

      .gallery-event-tab:hover::before,
      .gallery-event-tab:focus-visible::before {
        width: 100%;
        opacity: 0.08;
      }

      .gallery-event-thumb {
        position: relative;
        aspect-ratio: 1 / 1;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 16px 32px rgba(20, 59, 102, 0.16);
      }

      .gallery-event-thumb::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
          180deg,
          rgba(255, 255, 255, 0) 0%,
          rgba(20, 59, 102, 0.16) 100%
        );
      }

      .gallery-event-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.55s ease;
      }

      .gallery-event-tab:hover .gallery-event-thumb img,
      .gallery-event-tab:focus-visible .gallery-event-thumb img {
        transform: scale(1.08);
      }

      .gallery-event-body {
        position: relative;
        z-index: 1;
      }

      .gallery-event-year {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 8px;
        color: var(--accent-cyan-dark);
        font-family: var(--font-heading);
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 1.6px;
        text-transform: uppercase;
      }

      .gallery-event-body h3 {
        margin: 0 0 6px;
        color: var(--primary-navy);
        font-size: clamp(1.2rem, 2vw, 1.55rem);
      }

      .gallery-event-body p {
        margin: 0;
        color: var(--medium-gray);
        line-height: 1.75;
        font-size: 0.96rem;
      }

      .gallery-event-arrow {
        position: relative;
        z-index: 1;
        width: 54px;
        height: 54px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        background: rgba(20, 59, 102, 0.06);
        color: var(--primary-navy);
        font-size: 1.2rem;
        transition: transform 0.35s ease, background 0.35s ease, color 0.35s ease;
      }

      .gallery-event-tab:hover .gallery-event-arrow,
      .gallery-event-tab:focus-visible .gallery-event-arrow {
        transform: translateX(4px);
        background: var(--primary-navy);
        color: var(--white);
      }

      /* CTA Section */
      .services-cta-section {
        background: var(--accent-cyan);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
      }

      .services-cta-section::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      }

      .services-cta-content {
        position: relative;
        z-index: 1;
        text-align: center;
      }

      .services-cta-content h2 {
        color: var(--white);
        font-size: 2.2rem;
        margin-bottom: 15px;
      }

      .services-cta-content p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto 30px;
      }

      .services-cta-btn {
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

      .services-cta-btn:hover {
        background: var(--primary-navy);
        color: var(--white);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      }

      @media (max-width: 991.98px) {
        .offer-row {
          grid-template-columns: 1fr;
          gap: 28px;
        }

        .offer-row:nth-child(even) .offer-content,
        .offer-row:nth-child(even) .offer-visual {
          order: initial;
        }

        .offer-content p {
          max-width: 100%;
        }

        .offer-visual,
        .offer-photo-shell {
          min-height: 320px;
        }

        .services-why-copy {
          padding-right: 0;
        }

        .services-why-shell > [class*="col-"] {
          display: block;
        }

        .services-why-visual {
          padding: 20px 0 0;
        }

        .services-why-image-wrap {
          min-height: 430px;
        }

        .services-why-badge {
          left: 22px;
          bottom: 18px;
          transform: none;
        }

        .services-gallery-grid {
          grid-template-columns: 1fr;
        }

        .gallery-spotlight-card {
          position: relative;
          top: auto;
        }
      }

      @media (max-width: 767.98px) {
        .offer-row {
          padding: 30px 0;
        }

        .offer-content {
          align-items: stretch;
        }

        .offer-visual {
          min-height: 280px;
        }

        .offer-photo-shell {
          max-width: 100%;
          min-height: 340px;
        }

        .offer-visual-inner {
          padding: 12px 0 12px 14px;
        }

        .offer-icon-wrap {
          width: 78px;
          height: 78px;
        }

        .offer-icon-wrap i {
          font-size: 2rem;
        }

        .offer-content h3 {
          font-size: 1.7rem;
        }

        .offer-list li {
          width: 100%;
          justify-content: flex-start;
        }

        .services-why-points li {
          padding-left: 28px;
          font-size: 0.98rem;
        }

        .services-why-image-wrap {
          min-height: 320px;
          border-radius: 24px;
        }

        .services-why-badge {
          position: relative;
          left: auto;
          bottom: auto;
          max-width: none;
          margin-top: 18px;
          border-radius: 22px;
          animation: none;
        }

        .services-cta-content h2 {
          font-size: 1.8rem;
        }

        .gallery-spotlight-card {
          padding: 26px;
        }

        .gallery-event-tab {
          grid-template-columns: 1fr;
          padding: 16px;
        }

        .gallery-event-thumb {
          aspect-ratio: 16 / 10;
        }

        .gallery-event-arrow {
          width: 48px;
          height: 48px;
        }
      }
    </style>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top scrolled" id="mainNav">
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
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('services') }}">Services</a>
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

    <!-- Page Header -->
    <header class="page-header">
      <div class="container">
        <div class="page-header-content" data-aos="fade-up">
          <h1 class="page-header-title">Our Services</h1>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Our Services
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </header>

    <!-- Services Intro Section -->
    <section class="section-padding services-intro-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="section-header" data-aos="fade-up">
              <span class="section-label">What We Offer</span>
              <h2 class="section-title">
                Event Experiences Designed for Impact
              </h2>
              <p class="section-description">
                Our service portfolio is focused on high-value event delivery
                across live, digital, and executive environments. Each offering
                is designed to create meaningful engagement, flawless execution,
                and measurable value.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Detail Section -->
    <section class="section-padding services-offer-section">
      <div class="container">
        <div class="services-offer-shell">
          <div class="offer-row">
            <div
              class="offer-content"
              data-aos="fade-right"
              data-aos-delay="100"
            >
              <span class="offer-index">01</span>
              <h3>Conferences &amp; Exhibitions</h3>
              <p>
                Through in-depth market research, our team identifies topics to
                write and produce a commercially viable industry conference
                programmes that offer networking and knowledge transfer
                opportunities for paying delegates, sponsors and speakers. From
                inception to delivery, our team works alongside our client’s
                internal teams to ensure the success of every event. With
                footprints on four continents and employing world-class talent,
                we have quickly become the partner of choice.
              </p>

              <a href="{{ route('contact') }}" class="btn btn-primary-custom"
                >Discuss Your Event</a
              >
            </div>
            <div class="offer-visual" data-aos="zoom-in" data-aos-delay="150">
              <div class="offer-photo-shell">
                <div class="offer-motion-ring ring-a"></div>
                <div class="offer-motion-ring ring-b"></div>
                <div class="offer-motion-dash"></div>
                <div class="offer-motion-dot"></div>
                <div class="offer-photo">
                  <img
                    src="{{ asset('img/CONFERENCES & EXHIBITIONS.png') }}"
                    alt="Conference audience and exhibition setting"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="offer-row">
            <div
              class="offer-content"
              data-aos="fade-left"
              data-aos-delay="100"
            >
              <span class="offer-index">02</span>
              <h3>Virtual and Hybrid Events</h3>
              <p>
                In this new and ever changing post pandemic world, virtual and
                hybrid events have come to stay. Working with our in-house
                technical team, we design and deliver virtual and hybrid events,
                streaming live across various platforms with the option of full
                platform administration and live interaction. This new ways of
                interaction and engagements, opens up businesses and
                organisations to a wider audience and using our interactive
                virtual platforms, we offer not just a visual platform but a
                more immersed and interactive networking experience for
                participants.
              </p>

              <a href="{{ route('contact') }}" class="btn btn-primary-custom"
                >Plan A Digital Event</a
              >
            </div>
            <div class="offer-visual" data-aos="zoom-in" data-aos-delay="150">
              <div class="offer-photo-shell">
                <div class="offer-motion-ring ring-a"></div>
                <div class="offer-motion-ring ring-b"></div>
                <div class="offer-motion-dash"></div>
                <div class="offer-motion-dot"></div>
                <div class="offer-photo">
                  <img
                    src="{{ asset('img/VIRTUAL AND HYBRID EVENTS.png') }}"
                    alt="Virtual and hybrid event production setup"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="offer-row">
            <div
              class="offer-content"
              data-aos="fade-right"
              data-aos-delay="100"
            >
              <span class="offer-index">03</span>
              <h3>Strategic High-Level Meetings</h3>
              <p>
                We organise high level policy meetings, bilateral meetings,
                international conferences for country governments, statutory
                meetings, colloquium or conclave. We do the balancing act for
                clients, so they can focus on their core business. We offer a
                door-to-door service that caters for a range of needs from
                logistics through to administration. Throughout the life circle
                of any project, we will ensure that our clients have a single
                point of contact; one who understands their unique requirements.
                Our team of resource personnel have distinguished expertise in
                areas of facilitation, speaker management, communication, event
                design and planning, including expert report writing.
              </p>

              <a href="{{ route('contact') }}" class="btn btn-primary-custom"
                >Schedule A Consultation</a
              >
            </div>
            <div class="offer-visual" data-aos="zoom-in" data-aos-delay="150">
              <div class="offer-photo-shell">
                <div class="offer-motion-ring ring-a"></div>
                <div class="offer-motion-ring ring-b"></div>
                <div class="offer-motion-dash"></div>
                <div class="offer-motion-dot"></div>
                <div class="offer-photo">
                  <img
                    src="{{ asset('img/STRATEGIC HIGH-LEVEL MEETINGS.png') }}"
                    alt="Strategic high-level meeting in session"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Process Section -->
    <section class="section-padding process-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="section-header" data-aos="fade-up">
              <span class="section-label">How We Work</span>
              <h2 class="section-title section-title-white">Our Process</h2>
              <p
                class="section-description"
                style="color: rgba(255, 255, 255, 0.7)"
              >
                A structured approach to delivering exceptional results for
                every client engagement.
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
            <div class="process-step">
              <div class="process-connector"></div>
              <div class="process-step-number">01</div>
              <h4>Discovery</h4>
              <p>
                We begin by understanding your goals, challenges, and unique
                requirements through in-depth consultation.
              </p>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <div class="process-step">
              <div class="process-connector"></div>
              <div class="process-step-number">02</div>
              <h4>Strategy</h4>
              <p>
                Our experts develop tailored solutions and strategic roadmaps
                aligned with your objectives.
              </p>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <div class="process-step">
              <div class="process-connector"></div>
              <div class="process-step-number">03</div>
              <h4>Execution</h4>
              <p>
                We implement solutions with precision, keeping you informed at
                every stage of the process.
              </p>
            </div>
          </div>
          <div
            class="col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <div class="process-step">
              <div class="process-step-number">04</div>
              <h4>Evaluation</h4>
              <p>
                We measure results against objectives and continuously optimize
                for ongoing success.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Industries Section -->
    <section class="section-padding industries-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="section-header" data-aos="fade-up">
              <span class="section-label">Industries We Serve</span>
              <h2 class="section-title">Sector Expertise</h2>
              <p class="section-description">
                Our deep industry knowledge spans multiple sectors, enabling us
                to provide specialized solutions for your specific needs.
              </p>
            </div>
          </div>
        </div>
        <div class="row g-4">
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="industry-card">
              <div class="industry-icon">
                <i class="bi bi-fuel-pump"></i>
              </div>
              <h4>Oil & Gas</h4>
              <p>Upstream to downstream</p>
            </div>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="150"
          >
            <div class="industry-card">
              <div class="industry-icon">
                <i class="bi bi-lightning"></i>
              </div>
              <h4>Energy</h4>
              <p>Traditional & renewable</p>
            </div>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <div class="industry-card">
              <div class="industry-icon">
                <i class="bi bi-bank"></i>
              </div>
              <h4>Finance</h4>
              <p>Banking & investment</p>
            </div>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="250"
          >
            <div class="industry-card">
              <div class="industry-icon">
                <i class="bi bi-building"></i>
              </div>
              <h4>Infrastructure</h4>
              <p>Development projects</p>
            </div>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <div class="industry-card">
              <div class="industry-icon">
                <i class="bi bi-truck"></i>
              </div>
              <h4>Logistics</h4>
              <p>Supply chain & transport</p>
            </div>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="350"
          >
            <div class="industry-card">
              <div class="industry-icon">
                <i class="bi bi-cpu"></i>
              </div>
              <h4>Technology</h4>
              <p>Digital solutions</p>
            </div>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <div class="industry-card">
              <div class="industry-icon">
                <i class="bi bi-heart-pulse"></i>
              </div>
              <h4>Healthcare</h4>
              <p>Medical & pharma</p>
            </div>
          </div>
          <div
            class="col-6 col-md-4 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="450"
          >
            <div class="industry-card">
              <div class="industry-icon">
                <i class="bi bi-shop"></i>
              </div>
              <h4>Retail</h4>
              <p>Consumer goods</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="section-padding services-why-section">
      <div class="container">
        <div class="row align-items-center g-5 services-why-shell">
          <div class="col-lg-6" data-aos="fade-right">
            <div class="services-why-copy">
              <div class="section-header text-start">
                <span class="section-label">Why Choose Us</span>
                <h2 class="section-title section-title-left">
                  Why Businesses Trust Brevity Anderson
                </h2>
                <p class="section-description">
                  Partnering with us means gaining a team that protects your
                  time, sharpens delivery, and drives better event outcomes from
                  planning through execution.
                </p>
              </div>
              <ul class="services-why-points">
                <li>
                  Outsourcing your event to us means you prioritise your
                  business’ resources to ensure their efficient use in
                  delivering on your core business.
                </li>
                <li>
                  Your event is professionally designed, planned and managed.
                  This mitigates risks and improves your chances of achieving
                  the desired output.
                </li>
                <li>
                  You benefit from our vast years of experience, buying power
                  and contact list.
                </li>
                <li>
                  Improve on productivity and quality of the event by staying on
                  schedule and keeping on top of financial and resource budgets.
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
            <div class="services-why-visual">
              <div class="services-why-ring"></div>
              <div class="services-why-orbit"></div>
              <div class="services-why-image-wrap">
                <img
                  src="{{ asset('img/why-choose-us.png') }}"
                  alt="Professionally managed event planning"
                />
              </div>
              <div class="services-why-badge">
                <span>Professional Delivery</span>
                <strong
                  >Better planning, tighter control, and stronger event outcomes
                  from start to finish.</strong
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Event Gallery Section -->
    <section class="section-padding services-gallery-section">
      <div class="container">
        <div class="services-gallery-shell">
          <div class="section-header text-start" data-aos="fade-up">
            <span class="section-label">Event Galleries</span>
            <h2 class="section-title section-title-left">
              Explore Our Event Archive Through a Curated Tab Experience
            </h2>
            <p class="section-description">
              Step into our signature events through a premium gallery gateway
              designed to feel editorial, immersive, and effortlessly
              navigable.
            </p>
          </div>
          <div class="services-gallery-grid">
            <div class="gallery-spotlight-card" data-aos="fade-right">
              <div class="gallery-spotlight-inner">
                <span class="gallery-spotlight-tag">
                  <i class="bi bi-stars"></i> Digital Archive Portal
                </span>
                <h3>Seven landmark events. One elevated gallery journey.</h3>
                <p>
                  From energy summits to executive workshops, each tab opens a
                  dedicated gallery destination so visitors can move directly
                  into the event story with zero friction.
                </p>
                <ul class="gallery-spotlight-meta">
                  <li><i class="bi bi-grid-1x2"></i> Tab-led navigation</li>
                  <li><i class="bi bi-image"></i> Visual event previews</li>
                  <li><i class="bi bi-box-arrow-up-right"></i> Direct gallery links</li>
                </ul>
                <a class="gallery-spotlight-link" href="{{ route('gallery') }}">
                  Enter the master gallery <i class="bi bi-arrow-up-right"></i>
                </a>
              </div>
            </div>
            <div class="gallery-tab-cluster">
              <a
                class="gallery-event-tab"
                href="{{ route('gallery') }}#nies-2025"
                data-aos="fade-up"
                data-aos-delay="50"
              >
                <div class="gallery-event-thumb">
                  <img
                    src="{{ asset('img/Gallery/NUPRC_3RD_Anniversary.jfif') }}"
                    alt="NIES 2025 event preview"
                  />
                </div>
                <div class="gallery-event-body">
                  <span class="gallery-event-year"
                    ><i class="bi bi-calendar3"></i> 2025 • Summit</span
                  >
                  <h3>NIES 2025</h3>
                  <p>
                    A forward-facing archive entry for the newest summit
                    moments and executive networking highlights.
                  </p>
                </div>
                <span class="gallery-event-arrow">
                  <i class="bi bi-arrow-up-right"></i>
                </span>
              </a>

              <a
                class="gallery-event-tab"
                href="{{ route('gallery') }}#nies-2024"
                data-aos="fade-up"
                data-aos-delay="100"
              >
                <div class="gallery-event-thumb">
                  <img
                    src="{{ asset('img/Gallery/NIES 2024.jpg') }}"
                    alt="NIES 2024 event preview"
                  />
                </div>
                <div class="gallery-event-body">
                  <span class="gallery-event-year"
                    ><i class="bi bi-calendar3"></i> 2024 • Summit</span
                  >
                  <h3>NIES 2024</h3>
                  <p>
                    Gallery moments from a flagship edition shaped by energy
                    leadership, dialogue, and high-level engagement.
                  </p>
                </div>
                <span class="gallery-event-arrow">
                  <i class="bi bi-arrow-up-right"></i>
                </span>
              </a>

              <a
                class="gallery-event-tab"
                href="{{ route('gallery') }}#grc-workshop-2024"
                data-aos="fade-up"
                data-aos-delay="150"
              >
                <div class="gallery-event-thumb">
                  <img
                    src="{{ asset('img/Gallery/GRC_Workshop_2024.jpg') }}"
                    alt="GRC Workshop 2024 event preview"
                  />
                </div>
                <div class="gallery-event-body">
                  <span class="gallery-event-year"
                    ><i class="bi bi-calendar3"></i> 2024 • Workshop</span
                  >
                  <h3>GRC WORKSHOP 2024</h3>
                  <p>
                    A focused collection capturing governance, risk, and
                    compliance conversations in a premium workshop setting.
                  </p>
                </div>
                <span class="gallery-event-arrow">
                  <i class="bi bi-arrow-up-right"></i>
                </span>
              </a>

              <a
                class="gallery-event-tab"
                href="{{ route('gallery') }}#nies-2023"
                data-aos="fade-up"
                data-aos-delay="200"
              >
                <div class="gallery-event-thumb">
                  <img
                    src="{{ asset('img/Gallery/NIES 2023.jpg') }}"
                    alt="NIES 2023 event preview"
                  />
                </div>
                <div class="gallery-event-body">
                  <span class="gallery-event-year"
                    ><i class="bi bi-calendar3"></i> 2023 • Summit</span
                  >
                  <h3>NIES 2023</h3>
                  <p>
                    An immersive look back at keynote stages, partnerships, and
                    the atmosphere that defined the 2023 edition.
                  </p>
                </div>
                <span class="gallery-event-arrow">
                  <i class="bi bi-arrow-up-right"></i>
                </span>
              </a>

              <a
                class="gallery-event-tab"
                href="{{ route('gallery') }}#nies-2022"
                data-aos="fade-up"
                data-aos-delay="250"
              >
                <div class="gallery-event-thumb">
                  <img
                    src="{{ asset('img/Gallery/NIES 2022.jpg') }}"
                    alt="NIES 2022 event preview"
                  />
                </div>
                <div class="gallery-event-body">
                  <span class="gallery-event-year"
                    ><i class="bi bi-calendar3"></i> 2022 • Summit</span
                  >
                  <h3>NIES 2022</h3>
                  <p>
                    Opening scenes, audience moments, and brand experiences from
                    one of the summit’s standout gatherings.
                  </p>
                </div>
                <span class="gallery-event-arrow">
                  <i class="bi bi-arrow-up-right"></i>
                </span>
              </a>

              <a
                class="gallery-event-tab"
                href="{{ route('gallery') }}#decade-of-gas"
                data-aos="fade-up"
                data-aos-delay="300"
              >
                <div class="gallery-event-thumb">
                  <img
                    src="{{ asset('img/Gallery/Decade_of_Gas.jpg') }}"
                    alt="Decade of Gas event preview"
                  />
                </div>
                <div class="gallery-event-body">
                  <span class="gallery-event-year"
                    ><i class="bi bi-calendar3"></i> Special Event</span
                  >
                  <h3>DECADE OF GAS</h3>
                  <p>
                    A dedicated portal into one of the most visually distinctive
                    energy-focused event experiences in the archive.
                  </p>
                </div>
                <span class="gallery-event-arrow">
                  <i class="bi bi-arrow-up-right"></i>
                </span>
              </a>

              <a
                class="gallery-event-tab"
                href="{{ route('gallery') }}#nips-2021"
                data-aos="fade-up"
                data-aos-delay="350"
              >
                <div class="gallery-event-thumb">
                  <img
                    src="{{ asset('img/Gallery/NIPS_2021.jpg') }}"
                    alt="NIPS 2021 event preview"
                  />
                </div>
                <div class="gallery-event-body">
                  <span class="gallery-event-year"
                    ><i class="bi bi-calendar3"></i> 2021 • Summit</span
                  >
                  <h3>NIPS 2021</h3>
                  <p>
                    An archive tab for petroleum summit visuals, stakeholder
                    interactions, and conference floor energy.
                  </p>
                </div>
                <span class="gallery-event-arrow">
                  <i class="bi bi-arrow-up-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="services-cta-section">
      <div class="container">
        <div class="services-cta-content" data-aos="zoom-in">
          <h2>Ready to Get Started?</h2>
          <p>
            We are ready and looking forward to receiving your brief. Let's
            discuss how we can help you achieve your goals.
          </p>
          <a href="{{ route('contact') }}" class="services-cta-btn">Contact Us Today</a>
        </div>
      </div>
    </section>

    <!-- Footer -->
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
                    ><i class="bi bi-chevron-right"></i> Conferences &amp;
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
                  <i class="bi bi-geo-alt"></i
                  ><span
                    >15 Stratton Street, Mayfair<br />London, W1J 8LQ, UK</span
                  >
                </li>
                <li>
                  <i class="bi bi-telephone"></i><span>+44 203 890 8574</span>
                </li>
                <li>
                  <i class="bi bi-envelope"></i
                  ><span>info@brevityanderson.com</span>
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

    <!-- Back to Top -->
    <div class="back-to-top" id="backToTop">
      <i class="bi bi-arrow-up"></i>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @include('site.partials.cms-bootstrap')

    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 800,
        easing: "ease-out-cubic",
        once: true,
        offset: 100,
      });

      const backToTop = document.getElementById("backToTop");
      window.addEventListener("scroll", () => {
        if (window.scrollY > 500) backToTop.classList.add("show");
        else backToTop.classList.remove("show");
      });
      backToTop.addEventListener("click", () =>
        window.scrollTo({ top: 0, behavior: "smooth" }),
      );
    </script>
  </body>
</html>







