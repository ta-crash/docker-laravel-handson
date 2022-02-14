<header id="header">
    @if (session('user'))
        こんにちは、{{ session('user')->display_name }}さん <a href="{{ route('front.login.logout') }}">ログアウト</a>
    @else
        こんにちは、ゲストさん <a href="{{ route('front.login.index') }}">ログイン</a> <a href="{{ route('front.user.create') }}">新規登録</a>
    @endif
</header>