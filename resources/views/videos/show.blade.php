@extends('layouts.app')

{{-- Definimos el título de la página usando el título del video --}}
@section('title', $video->title)

@section('content')
    <section class="video-detail">
        {{-- Contenedor para el reproductor de video con ratio 16:9 para responsive --}}
        <div class="video-player" style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
            <iframe src="{{ $video->vimeo_url }}?title=0&byline=0&portrait=0&muted=0" frameborder="0" allowfullscreen
                style="position:absolute; top:0; left:0; width:100%; height:100%;">
            </iframe>
        </div>

        <div class="video-info">
            {{-- Sección de categorías: películas o series relacionadas con el video --}}
            <div class="video-categories">
                <h2>Movies or series in the video</h2>
                <div class="tmdb-grid">
                    {{-- Iteramos por cada categoría asociada al video --}}
                    @foreach ($video->categories as $category)
                        @php
                            // Obtenemos los datos detallados desde TMDb para esta categoría
                            $tmdb = $category->getTmdbData();
                        @endphp

                        {{-- Si hay datos de TMDb, mostramos póster, título y resumen --}}
                        @if ($tmdb)
                            <div class="tmdb-card">
                                {{-- Mostrar imagen del póster si está disponible --}}
                                @if (!empty($tmdb['poster_path']))
                                    <img src="https://image.tmdb.org/t/p/w300{{ $tmdb['poster_path'] }}"
                                        alt="{{ $tmdb['title'] ?? $tmdb['name'] }}" class="tmdb-poster">
                                @endif
                                {{-- Mostrar título o nombre --}}
                                <h3>{{ $tmdb['title'] ?? $tmdb['name'] }}</h3>
                                {{-- Mostrar descripción limitada a 150 caracteres --}}
                                <p>{{ Str::limit($tmdb['overview'], 150) }}</p>
                            </div>
                        @else
                            {{-- Si no hay datos TMDb, mostrar solo el nombre de la categoría --}}
                            <div class="category-tag">{{ $category->name }}</div>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- Sección de actores --}}
            <div class="video-actors">
                <h2>Actors</h2>
                {{-- Mostramos los nombres de los actores separados por comas --}}
                <p>{{ $video->actors->pluck('name')->implode(', ') }}</p>
            </div>

            {{-- Botón para volver a la lista de videos del usuario --}}
            <div class="video-actions">
                <a href="{{ url('/my-videos') }}" class="btn">Back to My Videos</a>
            </div>
        </div>
    </section>
@endsection
