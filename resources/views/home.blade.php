@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section class="hero-intro">
        <div class="hero-container">
            <h1>Hello, I'm oddTiwi</h1>
            <p>Audiovisual editor and content creator. This is where you'll find my latest work, key projects, and
                collaborations. Welcome.</p>
        </div>
    </section>

    <section id="portfolio" class="videos">
        <h2>Latest Works</h2>
        <div class="video-grid">
            @forelse($latestVideos as $video)
                <div class="video-card">
                    <a href="{{ route('videos.show', $video->id) }}" class="video-preview">
                        <iframe src="{{ $video->vimeo_url }}&muted=1&background=1&autoplay=0" frameborder="0" allowfullscreen
                            class="video-iframe" data-vimeo-id="{{ $video->id }}"></iframe>
                        <div class="video-overlay">
                            <span class="play-icon">▶</span>
                            <h3>{{ $video->title }}</h3>
                            <p class="video-meta">Actors: {{ $video->actors->pluck('name')->join(', ') }}</p>
                            <p class="video-meta">Categories: {{ $video->categories->pluck('name')->join(', ') }}</p>
                        </div>
                    </a>
                </div>
            @empty
                <p>No recent videos available.</p>
            @endforelse
        </div>
    </section>

    <section class="videos">
        <h2>Favorites</h2>
        <div class="video-grid">
            @forelse($favoriteVideos as $video)
                <div class="video-card">
                    <a href="{{ route('videos.show', $video->id) }}" class="video-preview">
                        <iframe src="{{ $video->vimeo_url }}&muted=1&background=1&autoplay=0" frameborder="0"
                            allowfullscreen class="video-iframe" data-vimeo-id="{{ $video->id }}"></iframe>
                        <div class="video-overlay">
                            <span class="play-icon">▶</span>
                            <h3>{{ $video->title }}</h3>
                            <p class="video-meta">Actors: {{ $video->actors->pluck('name')->join(', ') }}</p>
                            <p class="video-meta">Categories: {{ $video->categories->pluck('name')->join(', ') }}</p>
                        </div>
                    </a>
                </div>
            @empty
                <p>No favorite videos available.</p>
            @endforelse
        </div>
    </section>

    <div class="featured-video">
        <div class="video-container">
            <h2 class="featured-title">Featured Personal Project</h2>
            <p class="featured-desc">
                This clip is a fully original edit, recorded in high resolution (1920×1650) and designed to showcase my
                visual style.
            </p>
            <video class="featured-video-player" autoplay loop muted playsinline>
                <source src="{{ asset('video/featured.mp4') }}" type="video/mp4">
                Your browser does not support this video.
            </video>
        </div>
    </div>

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

    <section class="testimonials">
        <h2>What People Say About My Work</h2>
        <div class="testimonial-card">
            <p>"Working with oddTiwi was incredible: they approached the project with professionalism and creativity."</p>
            <span>- Angel Velasco</span>
        </div>
    </section>

    <section class="cta-contact">
        <div class="cta-container">
            <h2>Do you have a project in mind?</h2>
            <p>I'm always open to new ideas and collaborations. If you’re looking for a unique and thoughtful approach to
                video editing, let’s connect.</p>
            <a href="{{ url('/contact') }}" class="btn-cta">Get in Touch</a>
        </div>

    </section>

    <script>
        document.querySelectorAll('.video-preview').forEach(preview => {
            const iframe = preview.querySelector('.video-iframe');

            preview.addEventListener('mouseenter', () => {
                const baseSrc = iframe.getAttribute('src').replace('autoplay=1', 'autoplay=0');
                iframe.src = baseSrc.replace('autoplay=0', 'autoplay=1');
            });

            preview.addEventListener('mouseleave', () => {
                const baseSrc = iframe.getAttribute('src').replace('autoplay=1', 'autoplay=0');
                iframe.src = baseSrc;
            });
        });
    </script>

@endsection
