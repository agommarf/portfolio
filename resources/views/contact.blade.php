@extends('layouts.app')

@section('title','Contact')

@section('content')
  <section class="contact-page">
    <h2>Collaborate with me</h2>

    @if(session('success'))
      <div class="alert-success">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
      @csrf

      <div class="form-group">
        <label for="name">Your Name</label>
        <input
          type="text"
          id="name"
          name="name"
          value="{{ old('name') }}"
          placeholder="e.g. John Doe"
        >
        @error('name')
          <div class="form-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="email">Your Email</label>
        <input
          type="email"
          id="email"
          name="email"
          value="{{ old('email') }}"
          placeholder="e.g. mail@example.com"
        >
        @error('email')
          <div class="form-error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="message">Message</label>
        <textarea
          id="message"
          name="message"
          rows="6"
          placeholder="Write your proposal or question..."
        >{{ old('message') }}</textarea>
        @error('message')
          <div class="form-error">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="submit-btn">Send Message</button>
    </form>
  </section>
@endsection