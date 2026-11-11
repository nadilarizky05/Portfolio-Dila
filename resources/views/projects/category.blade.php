@extends('layouts.app')

@section('content')

@php
    $hasImage = fn ($path) => $path && file_exists(public_path('images/'.$path));
    $assetV = fn ($relativePath) => asset($relativePath).'?v='.filemtime(public_path($relativePath));
    // Cover di list ikutin rasio asli fotonya sendiri (misal dropTo emang sengaja dibuat 1:1),
    // bukan dipaksa ke bentuk frame HP. Bentuk HP/bezel cuma dipakai di halaman detail (See More).
    $imageRatio = function ($path) {
        $size = @getimagesize(public_path('images/'.$path));
        return $size ? $size[0].' / '.$size[1] : null;
    };
@endphp

<h1 class="mentor-title">{{ strtoupper($category->name) }}</h1>

@if ($projects->isEmpty())
    <div class="empty-grid">
        <div class="placeholder"></div>
        <div class="placeholder"></div>
    </div>
@else
    <div class="project-grid is-{{ $mediaType }}">
        @foreach ($projects as $project)
            @php
                // Card di halaman list cuma nampilin 1 foto cover (gak ada carousel/chevron).
                // Galeri lengkap dengan chevron baru muncul di halaman detail (See More).
                $coverPath = $hasImage($project->cover_image)
                    ? $project->cover_image
                    : optional($project->images->first(fn ($image) => $hasImage($image->image_path)))->image_path;
                $ratio = $coverPath ? $imageRatio($coverPath) : null;
                // Kalau project punya cover_image sendiri (poster/artwork), foto itu full-bleed
                // ngisi lebar card (gak dipersempit ke ukuran bezel HP kayak screenshot biasa).
                $hasCustomCover = $hasImage($project->cover_image);
            @endphp
            <div class="project-card {{ $hasCustomCover ? 'has-cover' : '' }}">
                <div class="project-media">
                    <div class="project-slides" @if ($ratio) style="--slide-ratio: {{ $ratio }}" @endif>
                        @if ($coverPath)
                            <div class="project-slide" style="--slide-bg: url('{{ $assetV('images/'.$coverPath) }}')">
                                <img src="{{ $assetV('images/'.$coverPath) }}" alt="{{ $project->title }}" loading="lazy">
                            </div>
                        @else
                            <div class="project-slide img-placeholder"></div>
                        @endif
                    </div>
                </div>
                <div class="body">
                    <h3>{{ $project->title }}</h3>
                    <p>{{ $project->description }}</p>

                    <a href="/projects/{{ $category->slug }}/{{ $project->slug }}" class="see-more">
                        See More <i class='bx bx-right-arrow-alt'></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
