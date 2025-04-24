<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>
            <a href="{{ route('login') }}" class="header__login">login</a>
        </div>
    </header>

    <main class="register-main">
        <h2 class="register-title">Register</h2>

        <div class="register-card">
            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf

                <div class="form-group">
                    <label>お名前</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="例：山田　太郎">
                    @error('name')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>メールアドレス</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com">
                    @error('email')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>パスワード</label>
                    <input type="password" name="password" placeholder="例：coachtech1106">
                    @error('password')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="register-button">登録</button>
            </form>
        </div>
    </main>
</body>

</html>