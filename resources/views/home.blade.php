@extends('layouts.app')

{{-- Definimos el título de la página --}}
@section('title', 'Home')

@section('content')

    {{-- Sección de presentación principal con saludo e introducción --}}
    <section class="hero-intro">
        <div class="hero-container">
            <h1>Hello, I'm oddTiwi</h1>
            <p>Audiovisual editor and content creator. This is where you'll find my latest work, key projects, and
                collaborations. Welcome.</p>
        </div>
    </section>

    {{-- Sección que muestra los videos más recientes --}}
    <section id="portfolio" class="videos">
        <h2>Latest Works</h2>
        <div class="video-grid">
            {{-- Recorremos la colección $latestVideos --}}
            @forelse($latestVideos as $video)
                <div class="video-card">
                    {{-- Enlace a la página del video --}}
                    <a href="{{ route('videos.show', $video->id) }}" class="video-preview">
                        {{-- Video embebido con Vimeo, muted y autoplay desactivado --}}
                        <iframe src="{{ $video->vimeo_url }}&muted=1&background=1&autoplay=0" frameborder="0" allowfullscreen
                            class="video-iframe" data-vimeo-id="{{ $video->id }}"></iframe>
                        <div class="video-overlay">
                            {{-- Muestra hasta 3 actores separados por comas --}}
                            <p class="video-meta">Actors: {{ $video->actors->take(3)->pluck('name')->join(', ') }}</p>
                            {{-- Muestra hasta 3 categorías (películas o series) --}}
                            <p class="video-meta">Movies or Series:
                                {{ $video->categories->take(3)->pluck('name')->join(', ') }}</p>
                            {{-- Muestra la cantidad de vistas del video --}}
                            <p class="video-meta">
                                <small>Views: {{ $video->view_count }}</small>
                            </p>
                        </div>
                    </a>
                </div>
                {{-- Si no hay videos recientes, mostramos mensaje --}}
            @empty
                <p>No recent videos available.</p>
            @endforelse
        </div>
    </section>

    {{-- Sección de los videos más vistos (antes llamados favoritos) --}}
    <section class="videos">
        <h2>Most Viewed</h2>
        <div class="video-grid">
            {{-- Recorremos la colección $mostViewed --}}
            @forelse($mostViewed as $video)
                <div class="video-card">
                    <a href="{{ route('videos.show', $video->id) }}" class="video-preview">
                        {{-- Video Vimeo embebido similar a la sección anterior --}}
                        <iframe src="{{ $video->vimeo_url }}&muted=1&background=1&autoplay=0" frameborder="0"
                            allowfullscreen class="video-iframe" data-vimeo-id="{{ $video->id }}">
                        </iframe>
                        <div class="video-overlay">
                            <p class="video-meta">Actors: {{ $video->actors->take(3)->pluck('name')->join(', ') }}</p>
                            <p class="video-meta">Movies or Series:
                                {{ $video->categories->take(3)->pluck('name')->join(', ') }}</p>
                            <p class="video-meta">
                                <small>Views: {{ $video->view_count }}</small>
                            </p>
                        </div>
                    </a>
                </div>
                {{-- Si no hay videos populares, mostramos mensaje --}}
            @empty
                <p>There are no popular videos yet.</p>
            @endforelse
        </div>
    </section>

    {{-- Sección destacada con un proyecto personal presentado en video nativo --}}
    <div class="featured-video">
        <div class="video-container">
            <h2 class="featured-title">Featured Personal Project</h2>
            <p class="featured-desc">
                This clip is a fully original edit, recorded in high resolution (1920×1650) and designed to showcase my
                visual style.
            </p>
            {{-- Video HTML5 autoplay, en bucle, silenciado y para dispositivos móviles --}}
            <video class="featured-video-player" autoplay loop muted playsinline>
                <source src="{{ asset('video/featured.mp4') }}" type="video/mp4">
                Your browser does not support this video.
            </video>
        </div>
    </div>

    {{-- Sección de servicios ofrecidos --}}
    <section class="services">
        <h2>Services</h2>
        <div class="services-grid">
            <div class="service-card">
                <h3>Video Edits with Identity</h3>
                <p>Montages that go beyond aesthetics — storytelling through rhythm, emotion, and cultural references.</p>
            </div>
            <div class="service-card">
                <h3>Custom Meme Videos</h3>
                <p>Original, sharp, and emotionally charged memes built for engagement and resonance.</p>
            </div>
            <div class="service-card">
                <h3>Social-First Storytelling</h3>
                <p>Videos tailored for Instagram, TikTok, or X — crafted to hook, feel, and be rewatched.</p>
            </div>
        </div>
    </section>

    {{-- Sección de testimonios --}}
    <section class="testimonials">
        <h2>What People Say About My Work</h2>
        <div class="testimonial-card">
            <p>"Working with oddTiwi was incredible: they approached the project with professionalism and creativity."</p>
            <span>- Angel Velasco</span>
        </div>
    </section>

    {{-- Llamada a la acción para contactar --}}
    <section class="cta-contact">
        <div class="cta-container">
            <h2>Do you have a project in mind?</h2>
            <p>I'm always open to new ideas and collaborations. If you’re looking for a unique and thoughtful approach to
                video editing, let’s connect.</p>
            <a href="{{ url('/contact') }}" class="btn-cta">Get in Touch</a>
        </div>
    </section>

    {{-- Sección para donaciones --}}
    <section class="donation-section">
        <div class="donation-container">
            <h2 class="donation-title">Support My Work</h2>
            <p class="donation-text">
                If you enjoy my edits and memes, you can buy me a coffee!
            </p>
            {{-- Enlace externo a la página de donaciones --}}
            <a href="https://coff.ee/oddtiwi" target="_blank" rel="noopener noreferrer" class="donate-button">
                Buy Me a Coffee
            </a>
        </div>
    </section>

    {{-- Script para controlar el autoplay al pasar el mouse sobre el video --}}
    <script>
        document.querySelectorAll('.video-preview').forEach(preview => {
            const iframe = preview.querySelector('.video-iframe');

            preview.addEventListener('mouseenter', () => {
                // Cambia el src para activar autoplay cuando el mouse entra
                const baseSrc = iframe.getAttribute('src').replace('autoplay=1', 'autoplay=0');
                iframe.src = baseSrc.replace('autoplay=0', 'autoplay=1');
            });

            preview.addEventListener('mouseleave', () => {
                // Cambia el src para desactivar autoplay cuando el mouse sale
                const baseSrc = iframe.getAttribute('src').replace('autoplay=1', 'autoplay=0');
                iframe.src = baseSrc;
            });
        });
    </script>

@endsection
