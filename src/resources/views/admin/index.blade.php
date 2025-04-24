@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="logout-area">
    <h1 class="admin__title">FashionablyLate</h1>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-button">logout</button>
    </form>
</div>


<div class="admin__content">
    <h2 class="admin__subtitle">Admin</h2>

    {{-- 検索フォーム：1行に横並び --}}
    <form action="{{ route('admin.search') }}" method="GET" class="admin__search-form">
        <div class="admin__search-row">
            <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
            <div class="selectWrap">
                <select name="gender" class="select-gender">
                    <option value="">性別</option>
                    <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                    <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                    <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
                </select>
            </div>
            <div class="selectWrap">
                <select name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->content }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="selectWrap">
                <input class="input-date" type="date" name="created_at" value="{{ request('created_at') }}" lang="ja">
            </div>

            <div class="admin__button-area">
                <button type="submit" class="btn-search">検索</button>
                <a href="{{ route('admin.index') }}" class="btn-reset">リセット</a>
            </div>
        </div>
    </form>

    <div class="admin__export-pagination">
        <form action="{{ route('admin.export') }}" method="GET" class="inline-form">
            <!-- 検索条件保持 -->
            <input type="hidden" name="keyword" value="{{ request('keyword') }}">
            <input type="hidden" name="gender" value="{{ request('gender') }}">
            <input type="hidden" name="category_id" value="{{ request('category_id') }}">
            <input type="hidden" name="created_at" value="{{ request('created_at') }}">

            <!-- エクスポート -->
            <button type="submit" class="btn-export">エクスポート</button>
        </form>
        <!-- ページネーション -->
        <ul class="custom-pagination">
            {{ $contacts->links('vendor.pagination.default') }}
        </ul>
    </div>

    <table class="admin__table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>
                    @if ($contact->gender == 1) 男性
                    @elseif ($contact->gender == 2) 女性
                    @else その他
                    @endif
                </td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content ?? 'なし' }}</td>
                <td><button class="btn-detail" data-id="{{ $contact->id }}">詳細</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- モーダル --}}
<div class="modal" id="detailModal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <div class="modal-body" id="modalBody">
            {{-- 詳細データがここにJSで入ります --}}
        </div>
        <form method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">削除</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/admin.js') }}"></script>
@endsection