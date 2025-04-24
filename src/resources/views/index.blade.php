<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>FashionablyLate - Contact</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <div class="contact-container">
        <h1 class="title">FashionablyLate</h1>
        <h2 class="subtitle">Contact</h2>

        <form action="/confirm" method="POST" class="contact-form">
            @csrf

            <div class="form-group double">
                <label>お名前 <span class="required">※</span></label>
                <div class="form-right">
                    <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
                    <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
                </div>
            </div>
            <div class="form__error">
                @error('last_name') {{ $message }} @enderror
                @error('first_name') {{ $message }} @enderror
            </div>

            <div class="form-group gender-form">

                <label>性別 <span class="required">※</span></label>
                <div class="gender-options">
                    <div>
                        <input type="radio" name="gender" value="1"
                            {{ old('gender', '1') == '1' ? 'checked' : '' }}> 男性
                    </div>
                    <div>
                        <input type="radio" name="gender" value="2"
                            {{ old('gender') == '2' ? 'checked' : '' }}> 女性
                    </div>
                    <div>
                        <input type="radio" name="gender" value="3"
                            {{ old('gender') == '3' ? 'checked' : '' }}> その他
                    </div>
                </div>
            </div>
            <div class="form__error">@error('gender') {{ $message }} @enderror</div>

            <div class="form-group">
                <label>メールアドレス <span class="required">※</span></label>
                <div class="form-right">

                    <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}">
                </div>

            </div>
            <div class="form__error">@error('email') {{ $message }} @enderror</div>

            <div class="form-group triple">
                <label>電話番号 <span class="required">※</span></label>
                <div class="form-right">

                    <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}">
                    <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
                    <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
                </div>
            </div>
            <div class="form__error">
                @error('tel1') {{ $message }} @enderror
            </div>

            <div class="form-group">
                <label>住所 <span class="required">※</span></label>
                <div class="form-right">

                    <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                </div>
            </div>
            <div class="form__error">@error('address') {{ $message }} @enderror</div>

            <div class="form-group">
                <label>建物名</label>
                <div class="form-right">
                    <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
            </div>

            <div class="form-group">
                <label>お問い合わせの種類 <span class="required">※</span></label>
                <div class="form-right">
                    <select name="category_id" class="form-group-contents">
                        <option value="">選択してください</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form__error">@error('category_id') {{ $message }} @enderror</div>

            <div class="form-group">
                <label>お問い合わせ内容 <span class="required">※</span></label>
                <div class="form-right">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>
            </div>
            <div class="form__error">@error('detail') {{ $message }} @enderror</div>

            <div class="form-submit">
                <button type="submit">確認画面</button>
            </div>
        </form>
    </div>
</body>

</html>