@section('header')
<div class="header-img">
    <h1 class="header-title">
        <a href="{{ url('/user/home') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </h1>
    @guest('user')
    <nav class="header-nav">
        <ul class="header-flex">
            <li><a href="{{ route('user.login') }}">{{ __('ログイン') }}</a></li>
            <li>
            @if (Route::has('user.register'))
                    <a href="{{ route('user.register') }}">{{ __('会員登録') }}</a>
            @endif
            </li>
            <li><a href="#">ラーメン検索</a></li>
            <li><a href="#">RAMENUMASHIについて</a></li>
            <li><a href="#">ラーメン店主様ご利用の場合</a></li>
        </ul>
    </nav>
    @else
    <nav class="header-nav">
        <ul class="header-flex">
            <li><a href="#">ラーメン検索</a></li>
            <li><a href="#">RAMENUMASHIについて</a></li>
            <li><a href="#">ラーメン店主様ご利用の場合</a></li>
            <li>
            <a href="{{ route('user.logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('ログアウト') }}
            </a>
            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
            </li>
        </ul>
    </nav>
</div>
<div class="user-name">
    {{ Auth::user()->user_name }}
</div>
@endguest
@endsection