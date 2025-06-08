<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Definición de la codificación de caracteres -->
    <meta charset="UTF-8">
    <!-- Título dinámico que se rellena con el contenido de la sección 'title' en las vistas Blade -->
    <title>@yield('title')</title>
    <!-- Enlace a la hoja de estilos CSS principal ubicada en public/css/style.css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Enlace a fuentes de Google Fonts: Quintessential y varias variantes de Inter -->
    <link
        href="https://fonts.googleapis.com/css2?family=Quintessential&family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Enlace a Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <!-- Contenedor con fondo para el header -->
    <div class="header-background">
        <header class="header-wrapper">
            <nav>
                <div class="header-top">
                    <!-- Iconos sociales: Twitter (X) e Instagram -->
                    <div class="social-icons">
                        <a href="https://twitter.com/oddtiwi" target="_blank" rel="noopener noreferrer" aria-label="X">
                            <i class="fab fa-twitter" style="font-size:2rem;"></i>
                        </a>
                        <a href="https://instagram.com/oddtiwi_" target="_blank" rel="noopener noreferrer"
                            aria-label="Instagram">
                            <i class="fab fa-instagram" style="font-size:2rem;"></i>
                        </a>
                    </div>
                    <!-- Logo o nombre del sitio enlazado a la página principal -->
                    <a style="text-decoration: none; color: #f0f0f0" href="{{ url('/') }}">
                        <h1>oddTiwi</h1>
                    </a>
                    <!-- Botón para acceder al formulario de contacto -->
                    <div class="contact-button">
                        <a href="{{ url('/contact') }}" class="btn">Contact Me</a>
                    </div>
                </div>
                <!-- Menú principal de navegación -->
                <div class="main-nav">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/my-videos') }}">Videos</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                        <li><a href="{{ route('ideas.index') }}">Ideas</a></li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>

    <!-- Aquí se insertará el contenido específico de cada vista -->
    @yield('content')

    <!-- Pie de página -->
    <footer>
        <p>© 2025 oddTiwi. All rights reserved.</p>
        <!-- Enlaces a páginas legales -->
        <div class="social-links">
            <a href="{{ route('terms') }}">Terms</a> |
            <a href="{{ route('privacy') }}">Privacy Policy</a> |
            <a href="{{ route('cookie') }}">Cookie Policy</a>
        </div>
    </footer>
</body>

</html>
