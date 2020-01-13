<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Comic book shop</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/slideshow.css')}}" rel="stylesheet" type="text/css">
</head>
<body>

<nav>
    <div class="container">
        <ul>
        <li><a href="/">Home</a> </li>
        <li><a href="/contact">Contact Us</a> </li>
        <li><a href="/about">About us</a> </li>
            <li><a href="Guest/products">Products</a> </li>
            <li><a href="/users">Users</a> </li>
                @guest
        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                   @if (Route::has('register'))
            <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                @else
        <li>
            <a href="/profile/{{Auth::user()->id}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span></a>
                <li> <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                    </a>
                </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                </li>
                @endguest
        </ul>
    </div>

</nav>

<div class="main">
@yield ('content')
</div>
<footer>
    <p>As of right now the footer is empty</p>
</footer>
</body>
</html>




