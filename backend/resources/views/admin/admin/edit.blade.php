@extends('layouts.admin')

@section('title', 'Admin Edit')

@section('contents')
    <form action="{{ route('admin.admin.update', $admin->id) }}" method="POST">
        @csrf

        <div>
            <label for="name">氏名</label>
            <input type="text" name="name" value="{{ old('name', $admin->name) }}">
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="text" name="email" value="{{ old('email', $admin->email) }}">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" name="password">
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="password_confirmation">パスワード(確認)</label>
            <input type="password" name="password_confirmation">
        </div>

        <div>
            <input type="submit" value="編集する">
        </div>
        <div>
            <a href="{{ route('admin.admin.index') }}">
                <button type="button">戻る</button>
            </a>
        </div>
    </form>
@endsection
