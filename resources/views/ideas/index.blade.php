@extends('layouts.app')

@section('title', 'Video Ideas')

@section('content')
    <section class="video-detail">
        <div class="video-info">

            {{-- Mostrar mensajes flash de éxito o error --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            {{-- Título principal --}}
            <div class="video-categories">
                <h2>Video Proposals</h2>

                {{-- Formulario para proponer una idea --}}
                <form method="POST" action="{{ route('ideas.store') }}" class="contact-form" style="margin-bottom: 2rem;">
                    @csrf

                    {{-- Campo para el título de la idea --}}
                    <div class="form-group">
                        <label for="title">Idea Title</label>
                        <input type="text" id="title" name="title"
                            placeholder="Eg: The Master edit with Nick Cave music" value="{{ old('title') }}" required>
                        {{-- Mostrar error de validación para el título --}}
                        @error('title')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Campo para la descripción de la idea (opcional) --}}
                    <div class="form-group">
                        <label for="description">Description (optional)</label>
                        <textarea id="description" name="description" rows="4" placeholder="Explain your idea a bit if you want...">{{ old('description') }}</textarea>
                        {{-- Mostrar error de validación para la descripción --}}
                        @error('description')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Botón para enviar la propuesta --}}
                    <button type="submit" class="submit-btn">Propose Idea</button>
                </form>
            </div>

            {{-- Listado de ideas existentes --}}
            <div class="idea-list">
                @forelse ($ideas as $idea)
                    <div class="idea-item">
                        {{-- Mostrar título --}}
                        <h3>{{ $idea->title }}</h3>
                        {{-- Mostrar descripción limitada a 150 caracteres --}}
                        <p>{{ \Illuminate\Support\Str::limit($idea->description ?? '', 150) }}</p>

                        {{-- Formulario para votar por la idea --}}
                        <form method="POST" action="{{ route('ideas.vote', $idea->id) }}" style="margin-top: 1rem;">
                            @csrf
                            <button type="submit" class="btn">👍 Vote ({{ $idea->votes }})</button>
                        </form>
                    </div>
                @empty
                    {{-- Mensaje si no hay ideas --}}
                    <p>There are no ideas yet. Be the first to propose one.</p>
                @endforelse
            </div>

            {{-- Botón para volver a la página principal --}}
            <div class="video-actions" style="margin-top: 2rem;">
                <a href="{{ url('/') }}" class="btn">Back to Home</a>
            </div>
        </div>
    </section>
@endsection
