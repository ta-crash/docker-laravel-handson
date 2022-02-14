<header id="header">
    @if (session('admin'))
        こんにちは、{{ session('admin')->name }}さん <a href="{{ route('admin.login.logout') }}">ログアウト</a>
    @else
        こんにちは、ゲストさん <a href="{{ route('admin.login.index') }}">ログイン</a> <a href="{{ route('admin.admin.create') }}">新規登録</a>
    @endif
</header>