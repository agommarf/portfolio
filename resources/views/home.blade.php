@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <section class="hero">
        <h1>oddTiwi</h1>
        <p>Visual content creator: edits, memes, and short narratives.</p>
        <a href="#portfolio" class="btn">See my creations</a>
    </section>

    <section id="portfolio" class="videos">
        <h2>Latest works</h2>
        <div class="video-grid">
            <div class="video-card">
                <video src="{{ asset('videos/') }}" controls></video>
                <p>Video 1: </p>
            </div>
            <div class="video-card">
                <video src="{{ asset('videos/') }}" controls></video>
                <p>Video 2: </p>
            </div>
            <div class="video-card">
                <video src="{{ asset('videos/4') }}" controls></video>
                <p>Video 3: </p>
            </div>
        </div>
    </section>
@endsection
