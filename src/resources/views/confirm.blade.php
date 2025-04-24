<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>FashionablyLate - Confirm</title>
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
</head>

<body>
    <div class="confirm-container">
        <h1 class="title">FashionablyLate</h1>
        <h2 class="subtitle">Confirm</h2>

        <form action="/contacts" method="POST">
            @csrf
            <table class="confirm-table">
                <tr>
                    <th>お名前</th>
                    <td>{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        @if ($contact['gender'] == 1)
                        男性
                        @elseif ($contact['gender'] == 2)
                        女性
                        @else
                        その他
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $contact['email'] }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ $contact['tel1'] }}{{ $contact['tel2'] }}{{ $contact['tel3'] }}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ $contact['address'] }}</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{ $contact['building'] }}</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{ $categoryName }}</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{ $contact['detail'] }}</td>
                </tr>
            </table>

            {{-- hiddenで送信データ保持 --}}
            @foreach ($contact as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach

            <div class="button-area">
                <button type="submit" name="action" value="submit">送信</button>
                <button type="submit" name="action" value="back">修正</button>
            </div>
        </form>
    </div>
</body>

</html>