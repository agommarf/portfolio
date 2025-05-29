@extends('layouts.app')

@section('title', 'Mis Videos')

@section('content')

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ url('/my-videos') }}">
        <div class="filter-container">
            <div class="filter-group">
                <label for="search_movie">Buscar por Película o Serie:</label>
                <input type="text" id="search_movie" name="search_movie" placeholder="Buscar por Película o Serie"
                    value="{{ request('search_movie') }}" autocomplete="off">
                <ul id="movieSuggestions" class="autocomplete-results"></ul>
            </div>

            <div class="filter-group">
                <label for="search_actor">Buscar por Actor:</label>
                <input type="text" id="search_actor" name="search_actor" placeholder="Buscar por Actor"
                    value="{{ request('search_actor') }}" autocomplete="off">
                <ul id="actorSuggestions" class="autocomplete-results"></ul>
            </div>

            <div class="filter-group">
                <label for="search_type">Filtrar por Tipo (Edit o Meme):</label>
                <select id="search_type" name="search_type">
                    <option value="">Todos</option>
                    <option value="Edit" {{ request('search_type') == 'Edit' ? 'selected' : '' }}>Edit</option>
                    <option value="Meme" {{ request('search_type') == 'Meme' ? 'selected' : '' }}>Meme</option>
                </select>
            </div>
        </div>

        <button type="submit">Filtrar</button>
    </form>

    <!-- Mostrar los videos filtrados -->
    <section id="portfolio" class="videos">
        <h2>Mis Creaciones</h2>
        <div class="video-grid">
            @if ($videos->isEmpty())
                <p>No se encontraron videos.</p>
            @else
                @foreach ($videos as $video)
                    @if (!empty($video->vimeo_url))
                        <div class="video-card">
                            <a href="{{ route('videos.show', $video) }}" class="video-preview">
                                <iframe src="{{ $video->vimeo_url }}&muted=1&background=1&autoplay=0" frameborder="0"
                                    allowfullscreen class="video-iframe" data-vimeo-id="{{ $video->id }}"></iframe>
                                <div class="video-overlay">
                                    <span class="play-icon">▶</span>
                                    <h3>{{ $video->title }}</h3>
                                    <p class="video-meta">Actores: {{ $video->actors->pluck('name')->join(', ') }}</p>
                                    <p class="video-meta">Categorías: {{ $video->categories->pluck('name')->join(', ') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </section>

    <!-- Script para controlar la reproducción al hacer hover -->
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

        function setupAutocomplete(inputId, url, resultId) {
            const input = document.getElementById(inputId);
            const resultBox = document.getElementById(resultId);

            input.addEventListener('input', () => {
                const query = input.value;
                if (query.length < 2) {
                    resultBox.innerHTML = '';
                    return;
                }

                fetch(`${url}?q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        resultBox.innerHTML = data.map(item =>
                            `<li onclick="selectSuggestion('${inputId}', '${resultId}', '${item}')">${item}</li>`
                        ).join('');
                    });
            });
        }

        function selectSuggestion(inputId, resultId, value) {
            document.getElementById(inputId).value = value;
            document.getElementById(resultId).innerHTML = '';
        }

        setupAutocomplete('search_actor', '/search/actors', 'actorSuggestions');
        setupAutocomplete('search_movie', '/search/categories', 'movieSuggestions');
    </script>

@endsection
