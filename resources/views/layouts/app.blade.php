<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Quintessential&family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <div class="header-background">
        <header class="header-wrapper">
            <nav>
                <div class="header-top">
                    <div class="social-icons">
                        <a href="https://twitter.com/oddtiwi" target="_blank" rel="noopener noreferrer" aria-label="X">
                            <i class="fab fa-twitter" style="font-size:2rem;"></i>
                        </a>
                        <a href="https://instagram.com/oddtiwi_" target="_blank" rel="noopener noreferrer"
                            aria-label="Instagram">
                            <i class="fab fa-instagram" style="font-size:2rem;"></i>
                        </a>
                    </div>
                    <a style="text-decoration: none; color: #f0f0f0" href="{{ url('/') }}">
                        <h1>oddTiwi</h1>
                    </a>
                    <div class="contact-button">
                        <a href="{{ url('/contact') }}" class="btn">Contact Me</a>
                    </div>
                </div>
                <div class="main-nav">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/my-videos') }}">Videos</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>
    @yield('content')
    <footer>
        <p>© 2025 oddTiwi. All rights reserved.</p>
        <div class="social-links">
            <a href="{{ route('terms') }}">Terms</a> |
            <a href="{{ route('privacy') }}">Privacy Policy</a> |
            <a href="{{ route('cookie') }}">Cookie Policy</a>
        </div>
    </footer>
</body>

</html>