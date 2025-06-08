@extends('layouts.app')

{{-- Definimos el título de la página como "Contact" --}}
@section('title', 'Contact')

@section('content')
    <section class="contact-page">
        <h2>Collaborate with me</h2>

        {{-- Mostrar mensaje de éxito si la sesión tiene 'success' --}}
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Formulario de contacto que envía datos a la ruta 'contact.submit' con método POST --}}
        <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
            @csrf {{-- Token CSRF para proteger el formulario contra ataques --}}

            {{-- Campo para el nombre --}}
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" {{-- Mantiene el valor anterior en caso de error --}}
                    placeholder="e.g. John Doe">
                {{-- Mostrar mensaje de error para el campo 'name' si existe --}}
                @error('name')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Campo para el email --}}
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" {{-- Mantiene el valor anterior en caso de error --}}
                    placeholder="e.g. mail@example.com">
                {{-- Mostrar mensaje de error para el campo 'email' si existe --}}
                @error('email')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Campo para el mensaje --}}
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="6" placeholder="Write your proposal or question...">{{ old('message') }}</textarea> {{-- Mantiene el valor anterior en caso de error --}}
                {{-- Mostrar mensaje de error para el campo 'message' si existe --}}
                @error('message')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Botón para enviar el formulario --}}
            <button type="submit" class="submit-btn">Send Message</button>
        </form>
    </section>
@endsection
