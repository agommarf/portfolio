@extends('layouts.app')

@section('title', 'Mis Videos')

@section('content')
    <section class="videos">
        <div class="hero">
            <h1>Mis Videos</h1>
            <p>Aquí podrás ver algunos de mis videos y ediciones más destacados.</p>
        </div>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="{{ url('/my-videos') }}">
            <div class="filter-container">
                <div class="filter-group">
                    <label for="search_movie">Buscar por Película o Serie:</label>
                    <input type="text" id="search_movie" name="search_movie" placeholder="Buscar por Película o Serie" value="{{ request('search_movie') }}">
                </div>

                <div class="filter-group">
                    <label for="search_actor">Buscar por Actor:</label>
                    <input type="text" id="search_actor" name="search_actor" placeholder="Buscar por Actor" value="{{ request('search_actor') }}">
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
        @if($videos->isEmpty())
            <p>No se encontraron videos.</p>
        @else
            <div class="video-list">
                @foreach($videos as $video)
                    <div class="video-item">
                        <h3>{{ $video->title }}</h3>
                        <p>{{ $video->description }}</p>
                        <p><strong>Actores:</strong> 
                            @foreach($video->actors as $actor)
                                {{ $actor->name }}@if(!$loop->last), @endif
                            @endforeach
                        </p>
                        <p><strong>Categoría:</strong> 
                            @foreach($video->categories as $category)
                                {{ $category->name }}@if(!$loop->last), @endif
                            @endforeach
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
