<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <style>
      body { margin:0; min-height:100vh; display:grid; place-items:center; padding:32px; font-family:'Manrope',sans-serif; color:#fff; background:radial-gradient(circle at top, rgba(213,179,106,.22), transparent 22%), linear-gradient(135deg, #071421 0%, #0d2844 50%, #143b66 100%); }
      .panel { width:min(560px,100%); background:rgba(10,24,38,.82); border:1px solid rgba(255,255,255,.12); border-radius:30px; padding:42px; box-shadow:0 24px 70px rgba(0,0,0,.34); }
      h1 { font-family:'Cormorant Garamond',serif; font-size:3rem; margin:0 0 10px; }
      p { color:rgba(255,255,255,.72); line-height:1.8; }
      .status,.error { border-radius:16px; padding:14px 16px; margin:18px 0; }
      .status { background:rgba(110,197,145,.14); border:1px solid rgba(110,197,145,.3); }
      .error { background:rgba(215,95,95,.15); border:1px solid rgba(215,95,95,.32); }
      label { display:block; margin:18px 0 8px; }
      input { width:100%; border:1px solid rgba(255,255,255,.12); background:rgba(255,255,255,.06); color:#fff; border-radius:16px; padding:16px 18px; }
      button { width:100%; margin-top:22px; border:0; border-radius:18px; padding:16px 18px; color:#0e1f31; background:linear-gradient(135deg, #f0d59d 0%, #d5b36a 100%); font-weight:700; cursor:pointer; }
      a { color:#d5b36a; text-decoration:none; }
      .footer { margin-top:18px; text-align:center; color:rgba(255,255,255,.72); }
    </style>
  </head>
  <body>
    <div class="panel">
      <h1>Reset access</h1>
      <p>Enter your admin email address and we will send you a password reset link. If your mail driver is still set to <code>log</code>, the link will appear in <code>storage/logs/laravel.log</code>.</p>

      @if (session('status'))
        <div class="status">{{ session('status') }}</div>
      @endif

      @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
      @endif

      <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf
        <label for="email">Email address</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required />
        <button type="submit">Send Reset Link</button>
      </form>

      <div class="footer">
        <a href="{{ route('admin.login') }}">Back to login</a>
      </div>
    </div>
  </body>
</html>
