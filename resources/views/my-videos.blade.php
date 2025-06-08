@extends('layouts.app')

@section('title', 'Videos')

@section('content')

    <!-- Formulario de búsqueda con filtros para buscar videos por película/serie, actor y tipo (Edit o Meme) -->
    <form method="GET" action="{{ url('/my-videos') }}">
        <div class="filter-container">
            <!-- Campo para buscar por nombre de película o serie con autocompletado -->
            <div class="filter-group">
                <label for="search_movie">Search by Movie or Series:</label>
                <input type="text" id="search_movie" name="search_movie" placeholder="Search by Movie or Series:"
                    value="{{ request('search_movie') }}" autocomplete="off">
                <ul id="movieSuggestions" class="autocomplete-results"></ul>
            </div>

            <!-- Campo para buscar por actor con autocompletado -->
            <div class="filter-group">
                <label for="search_actor">Search by Actor:</label>
                <input type="text" id="search_actor" name="search_actor" placeholder="Search by Actor:"
                    value="{{ request('search_actor') }}" autocomplete="off">
                <ul id="actorSuggestions" class="autocomplete-results"></ul>
            </div>

            <!-- Selector para filtrar por tipo de video: Edit o Meme -->
            <div class="filter-group">
                <label for="search_type">Filter by Type (Edit or Meme):</label>
                <select id="search_type" name="search_type">
                    <option value="">All</option>
                    <option value="Edit" {{ request('search_type') == 'Edit' ? 'selected' : '' }}>Edit</option>
                    <option value="Meme" {{ request('search_type') == 'Meme' ? 'selected' : '' }}>Meme</option>
                </select>
            </div>
        </div>

        <!-- Botón para enviar la búsqueda -->
        <button type="submit">Search</button>
    </form>

    <!-- Sección que muestra los videos filtrados según los criterios de búsqueda -->
    <section id="portfolio" class="videos">
        <div class="video-grid">
            @if ($videos->isEmpty())
                <!-- Mensaje si no hay resultados -->
                <p>No se encontraron videos.</p>
            @else
                <!-- Iteración de los videos para mostrarlos -->
                @foreach ($videos as $video)
                    <!-- Mostrar solo videos que tengan URL válida de Vimeo -->
                    @if (!empty($video->vimeo_url))
                        <div class="video-card">
                            <a href="{{ route('videos.show', $video) }}" class="video-preview">
                                <!-- iframe para reproducir el video desde Vimeo, con autoplay desactivado inicialmente -->
                                <iframe src="{{ $video->vimeo_url }}&muted=1&background=1&autoplay=0" frameborder="0"
                                    allowfullscreen class="video-iframe" data-vimeo-id="{{ $video->id }}"></iframe>
                                <div class="video-overlay">
                                    <!-- Mostrar actores relacionados (máximo 3) -->
                                    <p class="video-meta">Actors: {{ $video->actors->take(3)->pluck('name')->join(', ') }}</p>
                                    <!-- Mostrar categorías (películas o series) relacionadas (máximo 3) -->
                                    <p class="video-meta">Movies or Series: {{ $video->categories->take(3)->pluck('name')->join(', ') }}</p>
                                    <!-- Mostrar número de visualizaciones -->
                                    <p class="video-meta">
                                        <small>Views: {{ $video->view_count }}</small>
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </section>

    <!-- Script para controlar la reproducción automática del video en el iframe al pasar el cursor -->
    <script>
        document.querySelectorAll('.video-preview').forEach(preview => {
            const iframe = preview.querySelector('.video-iframe');

            // Al poner el cursor encima, cambia el src para activar autoplay
            preview.addEventListener('mouseenter', () => {
                const baseSrc = iframe.getAttribute('src').replace('autoplay=1', 'autoplay=0');
                iframe.src = baseSrc.replace('autoplay=0', 'autoplay=1');
            });

            // Al quitar el cursor, vuelve a desactivar autoplay
            preview.addEventListener('mouseleave', () => {
                const baseSrc = iframe.getAttribute('src').replace('autoplay=1', 'autoplay=0');
                iframe.src = baseSrc;
            });
        });

        // Función que configura el autocompletado para los inputs de búsqueda
        function setupAutocomplete(inputId, url, resultId) {
            const input = document.getElementById(inputId);
            const resultBox = document.getElementById(resultId);

            input.addEventListener('input', () => {
                const query = input.value;
                // Solo buscar si el usuario ha escrito al menos 2 caracteres
                if (query.length < 2) {
                    resultBox.innerHTML = '';
                    return;
                }

                // Petición fetch para obtener sugerencias desde el backend
                fetch(`${url}?q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        // Mostrar las sugerencias como una lista clickeable
                        resultBox.innerHTML = data.map(item =>
                            `<li onclick="selectSuggestion('${inputId}', '${resultId}', '${item}')">${item}</li>`
                        ).join('');
                    });
            });
        }

        // Función que selecciona una sugerencia y la pone en el input, además limpia la lista de sugerencias
        function selectSuggestion(inputId, resultId, value) {
            document.getElementById(inputId).value = value;
            document.getElementById(resultId).innerHTML = '';
        }

        // Configurar autocompletado para actor y película/serie
        setupAutocomplete('search_actor', '/search/actors', 'actorSuggestions');
        setupAutocomplete('search_movie', '/search/categories', 'movieSuggestions');
    </script>

@endsection
