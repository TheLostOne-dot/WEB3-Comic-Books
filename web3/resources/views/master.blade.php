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
<ul>
    <li><a href="/">Home</a> </li>
    <li><a href="/shop">Shop</a> </li>
    <li><a href="/contact">Contact Us</a> </li>
    <li><a href="/about">About us</a> </li>
    <li><a href="/overview">Overview</a> </li>
</ul>
</nav>
<div class="main">
@yield ('content')
</div>
<footer>
    <p>As of right now the footer is empty</p>
</footer>
</body>
</html>

