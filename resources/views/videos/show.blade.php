@extends('layouts.app')

@section('title', $video->title)

@section('content')
    <section class="video-detail">
        <div class="video-player" style="position:relative; padding-bottom:56.25%; height:0; overflow:hidden;">
            <iframe
                src="{{ $video->vimeo_url }}?title=0&byline=0&portrait=0&muted=0" 
                frameborder="0" allowfullscreen
                style="position:absolute; top:0; left:0; width:100%; height:100%;">
            </iframe>
        </div>

        <div class="video-info">
            <div class="video-categories">
                <h2>Movies or series in the video</h2>
                <div class="tmdb-grid">
                    @foreach ($video->categories as $category)
                        @php
                            $tmdb = $category->getTmdbData();
                        @endphp

                        @if ($tmdb)
                            <div class="tmdb-card">
                                @if (!empty($tmdb['poster_path']))
                                    <img src="https://image.tmdb.org/t/p/w300{{ $tmdb['poster_path'] }}"
                                        alt="{{ $tmdb['title'] ?? $tmdb['name'] }}" class="tmdb-poster">
                                @endif
                                <h3>{{ $tmdb['title'] ?? $tmdb['name'] }}</h3>
                                <p>{{ Str::limit($tmdb['overview'], 150) }}</p>
                            </div>
                        @else
                            <div class="category-tag">{{ $category->name }}</div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="video-actors">
                <h2>Actors</h2>
                <p>{{ $video->actors->pluck('name')->implode(', ') }}</p>
            </div>

            <div class="video-actions">
                <a href="{{ url('/my-videos') }}" class="btn">Back to My Videos</a>
            </div>
        </div>
    </section>
@endsection