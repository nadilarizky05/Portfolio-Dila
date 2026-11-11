@extends('layouts.app')

@section('content')

@php
    $hasImage = fn ($path) => $path && file_exists(public_path('images/'.$path));
    $assetV = fn ($relativePath) => asset($relativePath).'?v='.filemtime(public_path($relativePath));
@endphp

<section class="home-hero">
    <div class="home-hero-top">
        <div class="home-hero-text">
            <h1>{{ $name }}</h1>
            <h2 class="role">
                I'm a <span class="typewriter" id="typewriter" data-roles="{{ implode('|', $roles) }}"></span>
            </h2>
            <p>{{ $intro }}</p>

            <div class="hero-actions">
                <a href="{{ $cvUrl }}" target="_blank" class="btn">Download CV</a>
                <div class="social-icons">
                    <a href="https://www.linkedin.com/in/nadila-rizky/" target="_blank"><i class='bx bxl-linkedin'></i></a>
                    <a href="https://instagram.com/nadilaarizky_" target="_blank"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-medium'></i></a>
                    <a href="https://github.com/nadilarizky05/" target="_blank"><i class='bx bxl-github'></i></a>
                </div>
            </div>

            <div class="stats-row">
                @foreach ($stats as $stat)
                    <div class="stat-item">
                        <h3>{{ $stat['value'] }}</h3>
                        <p>{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        @if (count($heroPhotos) > 0)
            <div class="home-hero-photo scroll-row" data-scroll-amount="1">
                <div class="hero-photo-track" data-scroll-row>
                    @foreach ($heroPhotos as $photo)
                        @if ($hasImage($photo))
                            <img src="{{ $assetV('images/'.$photo) }}" alt="{{ $name }}" class="hero-photo-item">
                        @else
                            <div class="hero-photo-item img-placeholder"></div>
                        @endif
                    @endforeach
                </div>
                @if (count($heroPhotos) > 1)
                    <button type="button" class="scroll-btn inset dir-left" data-scroll-dir="left" aria-label="Scroll left" hidden>
                        <i class='bx bx-chevron-left'></i>
                    </button>
                    <button type="button" class="scroll-btn inset dir-right" data-scroll-dir="right" aria-label="Scroll right">
                        <i class='bx bx-chevron-right'></i>
                    </button>
                @endif
            </div>
        @endif
    </div>

    <div class="tech-marquee">
        <div class="tech-marquee-track">
            @foreach ([1, 2] as $pass)
                @foreach ($techStack as $tech)
                    <div class="tech-item">
                        <i class='bx {{ $tech['icon'] }}'></i>
                        <span>{{ $tech['label'] }}</span>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</section>

@endsection
