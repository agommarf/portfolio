@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section id="portfolio" class="videos">
        <h2>Latest works</h2>
        <div class="video-grid">
            @forelse($latestVideos as $video)
                <div class="video-card">
                    <a href="{{ route('videos.show', $video->id) }}" class="video-preview">
                        <iframe src="{{ $video->vimeo_url }}&muted=1&background=1&autoplay=0" frameborder="0" allowfullscreen
                            class="video-iframe" data-vimeo-id="{{ $video->id }}"></iframe>
                        <div class="video-overlay">
                            <span class="play-icon">▶</span>
                            <h3>{{ $video->title }}</h3>
                            <p class="video-meta">Actores: {{ $video->actors->pluck('name')->join(', ') }}</p>
                            <p class="video-meta">Categorías: {{ $video->categories->pluck('name')->join(', ') }}</p>
                        </div>
                    </a>
                </div>
            @empty
                <p>No hay videos recientes disponibles.</p>
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
                            <p class="video-meta">Actores: {{ $video->actors->pluck('name')->join(', ') }}</p>
                            <p class="video-meta">Categorías: {{ $video->categories->pluck('name')->join(', ') }}</p>
                        </div>
                    </a>
                </div>
            @empty
                <p>No hay videos favoritos disponibles.</p>
            @endforelse
        </div>
    </section>
    <div class="featured-video">
        <div class="video-container">
            <video class="featured-video-player" autoplay loop muted playsinline>
                <source src="video\featured.mp4" type="video/mp4" />
                Tu navegador no soporta este video.
            </video>
        </div>
    </div>

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
