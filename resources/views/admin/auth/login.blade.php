<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <style>
      :root {
        --ink: #0f2237;
        --deep: #143b66;
        --deep-2: #0d2844;
        --gold: #d5b36a;
        --mist: rgba(255,255,255,.72);
        --panel: rgba(9, 22, 36, .76);
        --line: rgba(255,255,255,.14);
      }
      * { box-sizing: border-box; }
      body {
        margin: 0;
        min-height: 100vh;
        font-family: 'Manrope', sans-serif;
        color: #fff;
        background:
          radial-gradient(circle at top left, rgba(213,179,106,.28), transparent 28%),
          radial-gradient(circle at bottom right, rgba(76, 155, 255, .16), transparent 24%),
          linear-gradient(135deg, #071421 0%, #0d2844 45%, #143b66 100%);
        display: grid;
        place-items: center;
        padding: 12px;
        overflow: hidden;
        position: relative;
      }
      body::before,
      body::after {
        content: '';
        position: fixed;
        inset: auto;
        pointer-events: none;
        border-radius: 50%;
        z-index: 0;
        filter: blur(10px);
      }
      body::before {
        width: 440px;
        height: 440px;
        left: -110px;
        top: -120px;
        background: radial-gradient(circle, rgba(213,179,106,.34) 0%, rgba(213,179,106,.12) 48%, transparent 72%);
        animation: driftGlowLarge 14s ease-in-out infinite;
      }
      body::after {
        width: 360px;
        height: 360px;
        right: -80px;
        bottom: -80px;
        background: radial-gradient(circle, rgba(77,161,255,.2) 0%, rgba(77,161,255,.08) 46%, transparent 74%);
        animation: driftGlowLarge 16s ease-in-out infinite reverse;
      }
      .auth-shell {
        width: min(1120px, 100%);
        min-height: min(700px, calc(100vh - 24px));
        max-height: calc(100vh - 24px);
        border: 1px solid var(--line);
        border-radius: 32px;
        overflow: hidden;
        display: grid;
        grid-template-columns: 1.08fr .92fr;
        background: rgba(255,255,255,.05);
        backdrop-filter: blur(16px);
        box-shadow: 0 30px 80px rgba(0,0,0,.35);
        position: relative;
        z-index: 1;
      }
      .auth-showcase {
        padding: 30px 34px;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background:
          linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.01)),
          linear-gradient(160deg, rgba(12, 31, 51, .35), rgba(20,59,102,.12));
      }
      .auth-showcase::before {
        content: '';
        position: absolute;
        width: 420px;
        height: 420px;
        right: -120px;
        top: -110px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(213,179,106,.4) 0%, rgba(213,179,106,.14) 48%, transparent 72%);
        filter: blur(2px);
        animation: driftGlow 8s ease-in-out infinite;
      }
      .auth-showcase::after {
        content: '';
        position: absolute;
        inset: 28px;
        border: 1px solid rgba(213,179,106,.2);
        border-radius: 24px;
        pointer-events: none;
        animation: framePulse 7s ease-in-out infinite;
      }
      .showcase-inner {
        width: min(450px, 100%);
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 2;
      }
      .showcase-logo {
        width: clamp(82px, 8vw, 104px);
        height: auto;
        margin: 0 auto 12px;
        object-fit: contain;
        filter: drop-shadow(0 12px 28px rgba(0,0,0,.22));
        animation: logoFloat 6s ease-in-out infinite;
      }
      .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        letter-spacing: .24em;
        text-transform: uppercase;
        font-size: .74rem;
        color: var(--gold);
      }
      .eyebrow::before {
        content: '';
        width: 42px;
        height: 1px;
        background: currentColor;
      }
      h1 {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2.1rem, 3vw, 3.1rem);
        line-height: .98;
        margin: 14px 0 10px;
        max-width: none;
        animation: riseIn .9s ease-out both;
      }
      .lede {
        max-width: 48ch;
        color: var(--mist);
        line-height: 1.52;
        font-size: .89rem;
        animation: riseIn 1.1s ease-out both;
        margin-inline: auto;
      }
      .feature-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
        margin-top: 18px;
        width: 100%;
        position: relative;
        z-index: 1;
        text-align: left;
      }
      .feature-card {
        padding: 11px 12px;
        border-radius: 16px;
        background: linear-gradient(180deg, rgba(255,255,255,.09), rgba(255,255,255,.04));
        border: 1px solid rgba(255,255,255,.12);
        box-shadow: inset 0 1px 0 rgba(255,255,255,.08), 0 18px 30px rgba(3, 10, 18, .16);
        animation: cardFloat 6.5s ease-in-out infinite;
      }
      .feature-card:nth-child(2) { animation-delay: .4s; }
      .feature-card:nth-child(3) { animation-delay: .8s; }
      .feature-card:nth-child(4) { animation-delay: 1.2s; }
      .feature-card strong { display:block; margin-bottom: 4px; font-size: .92rem; }
      .feature-card span { color: var(--mist); font-size: .8rem; line-height: 1.42; }
      .showcase-orbit {
        position: absolute;
        inset: auto 18px 24px auto;
        width: 190px;
        height: 190px;
        pointer-events: none;
        opacity: 1;
        mix-blend-mode: screen;
      }
      .showcase-orbit::before,
      .showcase-orbit::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 50%;
        border: 1px solid rgba(255,255,255,.08);
      }
      .showcase-orbit::before {
        border-color: rgba(255,255,255,.16);
        animation: slowSpin 14s linear infinite;
      }
      .showcase-orbit::after {
        inset: 22px;
        border-color: rgba(213,179,106,.36);
        animation: slowSpinReverse 18s linear infinite;
      }
      .showcase-node {
        position: absolute;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: linear-gradient(135deg, #f0d59d 0%, #d5b36a 100%);
        box-shadow: 0 0 32px rgba(213,179,106,.65);
      }
      .showcase-node.node-1 {
        top: 24px;
        left: 48px;
        animation: nodePulse 4.8s ease-in-out infinite;
      }
      .showcase-node.node-2 {
        right: 22px;
        top: 92px;
        width: 12px;
        height: 12px;
        animation: nodePulse 5.6s ease-in-out infinite .6s;
      }
      .showcase-node.node-3 {
        left: 78px;
        bottom: 20px;
        width: 13px;
        height: 13px;
        background: linear-gradient(135deg, rgba(255,255,255,.95) 0%, rgba(213,179,106,.9) 100%);
        animation: nodePulse 5.1s ease-in-out infinite 1s;
      }
      .showcase-lines {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 104px;
        pointer-events: none;
        background:
          linear-gradient(90deg, transparent 0%, rgba(255,255,255,.07) 50%, transparent 100%) bottom 46px left 0 / 100% 1px no-repeat,
          linear-gradient(90deg, transparent 0%, rgba(213,179,106,.18) 50%, transparent 100%) bottom 0 left 0 / 100% 1px no-repeat;
        mask-image: linear-gradient(180deg, transparent 0%, rgba(0,0,0,.8) 35%, rgba(0,0,0,1) 100%);
        opacity: 1;
      }
      .showcase-lines::before,
      .showcase-lines::after {
        content: '';
        position: absolute;
        inset: auto auto 0 12%;
        width: 1px;
        height: 140px;
        background: linear-gradient(180deg, transparent 0%, rgba(255,255,255,.05) 20%, rgba(213,179,106,.28) 100%);
      }
      .showcase-lines::after {
        left: 68%;
        height: 110px;
      }
      .auth-panel {
        background: var(--panel);
        padding: 28px 28px;
        display: flex;
        align-items: center;
      }
      .auth-card { width: 100%; max-width: 430px; margin: 0 auto; }
      .brand-mark {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        background: linear-gradient(145deg, rgba(213,179,106,.24), rgba(255,255,255,.08));
        border: 1px solid rgba(213,179,106,.26);
        margin-bottom: 12px;
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.25rem;
        color: var(--gold);
        animation: riseIn .75s ease-out both;
      }
      .auth-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.8rem;
        margin: 0 0 6px;
      }
      .auth-subtitle { color: var(--mist); margin: 0 0 14px; line-height: 1.5; font-size: .88rem; }
      .status, .error {
        border-radius: 16px;
        padding: 10px 12px;
        margin-bottom: 10px;
        font-size: .84rem;
      }
      .status { background: rgba(110, 197, 145, .14); border: 1px solid rgba(110, 197, 145, .3); }
      .error { background: rgba(215, 95, 95, .15); border: 1px solid rgba(215,95,95,.32); }
      .field { margin-bottom: 10px; }
      label {
        display:block;
        margin-bottom: 5px;
        color: rgba(255,255,255,.88);
        font-size: .84rem;
      }
      input {
        width: 100%;
        border: 1px solid rgba(255,255,255,.12);
        background: rgba(255,255,255,.07);
        color: #fff;
        border-radius: 16px;
        padding: 12px 14px;
        outline: none;
      }
      input::placeholder { color: rgba(255,255,255,.42); }
      input:focus {
        border-color: rgba(213,179,106,.55);
        box-shadow: 0 0 0 4px rgba(213,179,106,.12);
      }
      .meta-row {
        display:flex;
        justify-content: space-between;
        align-items:center;
        gap: 12px;
        margin: 4px 0 12px;
        color: var(--mist);
        font-size: .82rem;
      }
      .meta-row a, .inline-link, .auth-footer a {
        color: var(--gold);
        text-decoration: none;
      }
      .submit-btn {
        width: 100%;
        border: 0;
        border-radius: 18px;
        padding: 12px 14px;
        color: #0e1f31;
        background: linear-gradient(135deg, #f0d59d 0%, #d5b36a 100%);
        font-weight: 700;
        font-size: .9rem;
        cursor: pointer;
        box-shadow: 0 16px 34px rgba(213,179,106,.22);
        transition: transform .3s ease, box-shadow .3s ease, filter .3s ease;
      }
      .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 38px rgba(213,179,106,.28);
        filter: saturate(1.05);
      }
      .auth-footer {
        margin-top: 12px;
        color: var(--mist);
        font-size: .8rem;
        text-align: center;
      }
      .checkbox { display:flex; align-items:center; gap:10px; }
      .checkbox input { width: auto; padding: 0; }
      @keyframes riseIn {
        from {
          opacity: 0;
          transform: translateY(18px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
      @keyframes logoFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
      }
      @keyframes cardFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-6px); }
      }
      @keyframes driftGlow {
        0%, 100% { transform: translate3d(0, 0, 0) scale(1); }
        50% { transform: translate3d(-26px, 24px, 0) scale(1.12); }
      }
      @keyframes driftGlowLarge {
        0%, 100% { transform: translate3d(0, 0, 0) scale(1); opacity: .9; }
        50% { transform: translate3d(28px, 24px, 0) scale(1.15); opacity: 1; }
      }
      @keyframes slowSpin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
      }
      @keyframes slowSpinReverse {
        from { transform: rotate(360deg); }
        to { transform: rotate(0deg); }
      }
      @keyframes nodePulse {
        0%, 100% { transform: scale(1); opacity: .82; }
        50% { transform: scale(1.55); opacity: 1; }
      }
      @keyframes framePulse {
        0%, 100% { border-color: rgba(213,179,106,.16); box-shadow: inset 0 0 0 rgba(213,179,106,0); }
        50% { border-color: rgba(213,179,106,.32); box-shadow: inset 0 0 36px rgba(213,179,106,.04); }
      }
      @media (max-width: 960px) {
        .auth-shell {
          grid-template-columns: 1fr;
          min-height: min(100dvh - 24px, 780px);
          max-height: calc(100dvh - 24px);
        }
        .auth-showcase {
          min-height: 240px;
          padding: 22px 18px 78px;
        }
        .auth-shell {
          border-radius: 26px;
        }
        body {
          overflow: hidden;
          padding: 12px;
        }
        .showcase-inner {
          width: 100%;
        }
        h1 {
          font-size: clamp(1.7rem, 7vw, 2.3rem);
          margin: 10px 0 8px;
        }
        .lede {
          font-size: .8rem;
          max-width: 34ch;
        }
        .feature-grid {
          grid-template-columns: repeat(2, minmax(0, 1fr));
          gap: 8px;
          margin-top: 14px;
        }
        .showcase-logo {
          width: 66px;
          margin-bottom: 8px;
        }
        .showcase-orbit {
          width: 138px;
          height: 138px;
          right: -18px;
          bottom: 2px;
        }
        .showcase-lines {
          height: 68px;
        }
        .auth-panel {
          padding: 18px 16px 20px;
        }
        .auth-card {
          max-width: none;
        }
        .auth-title {
          font-size: 1.55rem;
        }
        .auth-subtitle {
          margin-bottom: 10px;
          font-size: .82rem;
        }
        .status, .error {
          padding: 9px 10px;
          margin-bottom: 8px;
          font-size: .78rem;
        }
        .field {
          margin-bottom: 8px;
        }
        label {
          font-size: .8rem;
        }
        input {
          padding: 11px 12px;
          border-radius: 14px;
        }
        .meta-row {
          margin: 2px 0 10px;
          font-size: .78rem;
        }
        .submit-btn {
          padding: 11px 12px;
          font-size: .84rem;
        }
        .auth-footer {
          margin-top: 10px;
          font-size: .76rem;
        }
      }
      @media (max-height: 820px) {
        .auth-showcase {
          padding: 24px 28px;
        }
        .auth-panel {
          padding: 22px 24px;
        }
        .feature-grid {
          gap: 8px;
          margin-top: 14px;
        }
        .showcase-orbit {
          width: 160px;
          height: 160px;
        }
        .showcase-lines {
          opacity: .8;
        }
        .showcase-logo {
          width: 74px;
          margin-bottom: 8px;
        }
        h1 {
          font-size: clamp(1.9rem, 2.8vw, 2.6rem);
          margin: 10px 0 8px;
        }
        .lede {
          font-size: .82rem;
        }
        .feature-card {
          padding: 10px 11px;
        }
        .auth-title {
          font-size: 1.65rem;
        }
      }
    </style>
  </head>
  <body>
    <div class="auth-shell">
      <section class="auth-showcase">
        <div class="showcase-inner">
          <img class="showcase-logo" src="{{ asset('BREVITY_logo.png') }}" alt="Brevity Anderson Logo" />
          <span class="eyebrow">Brevity Anderson CMS</span>
          <h1>Elegant control for<br />a premium brand.</h1>
          <p class="lede">Manage pages, homepage sections, media, and site settings from one secure space designed to feel as refined as the public-facing experience.</p>
          <div class="feature-grid">
            <div class="feature-card"><strong>Pages</strong><span>Edit live site content while preserving the frontend design.</span></div>
            <div class="feature-card"><strong>Sections</strong><span>Refine homepage storytelling and structured content blocks.</span></div>
            <div class="feature-card"><strong>Media</strong><span>Manage imagery, uploads, and brand assets from one place.</span></div>
            <div class="feature-card"><strong>Settings</strong><span>Keep contact details, identity, and global site content aligned.</span></div>
          </div>
        </div>
        <div class="showcase-orbit" aria-hidden="true">
          <span class="showcase-node node-1"></span>
          <span class="showcase-node node-2"></span>
          <span class="showcase-node node-3"></span>
        </div>
        <div class="showcase-lines" aria-hidden="true"></div>
      </section>

      <section class="auth-panel">
        <div class="auth-card">
          <div class="brand-mark">BA</div>
          <h2 class="auth-title">Welcome back</h2>
          <p class="auth-subtitle">Sign in to the admin panel to manage your CMS content and site experience.</p>

          @if (session('status'))
            <div class="status">{{ session('status') }}</div>
          @endif

          @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
          @endif

          <form method="POST" action="{{ route('admin.login.store') }}">
            @csrf
            <div class="field">
              <label for="email">Email address</label>
              <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="info@brevityanderson.com" required />
            </div>
            <div class="field">
              <label for="password">Password</label>
              <input id="password" type="password" name="password" placeholder="Enter your password" required />
            </div>
            <div class="meta-row">
              <label class="checkbox" for="remember">
                <input type="checkbox" name="remember" id="remember" />
                <span>Remember me</span>
              </label>
              <a href="{{ route('admin.password.request') }}">Forgot password?</a>
            </div>
            <button class="submit-btn" type="submit">Enter Admin Panel</button>
          </form>

          <div class="auth-footer">
            Need help accessing the dashboard? <a href="mailto:{{ config('mail.from.address', 'hello@example.com') }}">Contact support</a>
          </div>
        </div>
      </section>
    </div>
  </body>
</html>

