<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__logo">FashionablyLate</div>
            <a href="{{ route('register') }}" class="header__link">register</a>
        </div>
    </header>

    <main class="login-main">
        <h2 class="login-title">Login</h2>

        <div class="login-card">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <div class="form-group">
                    <label>メールアドレス</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
                    @error('email')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>パスワード</label>
                    <input type="password" name="password" placeholder="例: coachtech1106">
                    @error('password')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="login-button">ログイン</button>
            </form>
        </div>
    </main>
</body>

</html>