<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
    <div class="header-top">
        <div class="social-icons">
            <a href="https://x.com/user" target="_blank">X</a>
            <a href="https://instagram.com/user" target="_blank">Instagram</a>
        </div>
        <h1>oddTiwi</h1>
        <div class="contact-button">
            <a href="{{ url('/contact') }}" class="btn">Contact Me</a>
        </div>
    </div>
    <div class="main-nav">
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/my-videos') }}">My Videos</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
    </div>
</nav>
    @yield('content')
    <footer>
        <p>© 2025 oddTiwi. All rights reserved.</p>
        <div class="social-links">
            <a href="https://vimeo.com/user" target="_blank">Vimeo</a>
            <a href="https://instagram.com/user" target="_blank">Instagram</a>
            <a href="mailto:your@email.com">Email</a>
        </div>
    </footer>
</body>
</html>