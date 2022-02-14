@extends('layouts.front')

@section('title', 'User Login')

@section('contents')
    <form action="{{ route('front.login.login') }}" method="POST">
        @csrf

        <div>
            <label for="email">メールアドレス</label>
            <input type="text" name="email" value="{{ old('email') }}">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
            @if (session('errorMessage'))
                <span>{{ session('errorMessage') }}</span>
            @endif 
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" name="password">
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input type="submit" value="ログイン">
        </div>
        <div>
            <a href="{{ route('front.user.index') }}">
                <button type="button">戻る</button>
            </a>
        </div>
    </form>
@endsection