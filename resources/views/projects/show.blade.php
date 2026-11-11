@extends('layouts.app')

@section('content')

@php
    $hasImage = fn ($path) => $path && file_exists(public_path('images/'.$path));
    $assetV = fn ($relativePath) => asset($relativePath).'?v='.filemtime(public_path($relativePath));
    // Sentence case buat label "Back to ..." (cuma huruf depan yang kapital), tapi tetep
    // jaga "iOS" ke-stylized dengan benar, gak ikut kelindes jadi "Ios".
    $sentenceCase = fn (string $name) => str_ireplace('ios', 'iOS', ucfirst(strtolower($name)));
    $slides = $project->images->filter(fn ($image) => $hasImage($image->image_path))->values();
    // Baca rasio asli foto pertama, biar frame HP/square-nya persis ngikutin rasio fotonya sendiri.
    $slideRatio = null;
    if ($slides->isNotEmpty()) {
        $size = @getimagesize(public_path('images/'.$slides->first()->image_path));
        $slideRatio = $size ? $size[0].' / '.$size[1] : null;
    }
@endphp

<div class="detail-header">
    <h1 class="detail-title">{{ $project->title }}</h1>
    <a href="/projects/{{ $category->slug }}" class="back-link">
        <i class='bx bx-left-arrow-alt'></i> Back to {{ $sentenceCase($category->name) }}
    </a>
</div>

<div class="project-detail is-{{ $mediaType }}">
    <div class="project-detail-media">
        <div class="scroll-row project-media" data-scroll-amount="1">
            <div class="project-slides" data-scroll-row @if ($slideRatio) style="--slide-ratio: {{ $slideRatio }}" @endif>
                @forelse ($slides as $slide)
                    <div class="project-slide" style="--slide-bg: url('{{ $assetV('images/'.$slide->image_path) }}')">
                        <img src="{{ $assetV('images/'.$slide->image_path) }}" alt="{{ $project->title }} - {{ $loop->iteration }}" loading="lazy">
                    </div>
                @empty
                    <div class="project-slide img-placeholder"></div>
                @endforelse
            </div>
            @if ($slides->count() > 1)
                <button type="button" class="scroll-btn inset dir-left" data-scroll-dir="left" aria-label="Previous" hidden>
                    <i class='bx bx-chevron-left'></i>
                </button>
                <button type="button" class="scroll-btn inset dir-right" data-scroll-dir="right" aria-label="Next">
                    <i class='bx bx-chevron-right'></i>
                </button>
            @endif
        </div>

        <div class="link-buttons">
            @if ($project->primary_link_url)
                <a href="{{ $project->primary_link_url }}" target="_blank">{{ $sentenceCase($project->primary_link_label) }} <i class='bx bx-link-external'></i></a>
            @endif
            @if ($project->secondary_link_url)
                <a href="{{ $project->secondary_link_url }}" target="_blank">{{ $sentenceCase($project->secondary_link_label) }} <i class='bx bx-link-external'></i></a>
            @endif
        </div>
    </div>

    <div class="project-detail-info">
        @if ($project->submitted_to_name)
            <p class="submitted-to">
                Submitted to
                <a href="{{ $project->submitted_to_url }}" target="_blank">{{ $project->submitted_to_name }}</a>
            </p>
        @endif

        @if ($mediaType === 'square')
            {{-- Curriculum Maker (curriculum/book) pakai susunan poin sendiri --}}
            @if ($project->description)
                <h2 class="detail-subheading">The story behind it</h2>
                <p class="section-desc">{{ $project->description }}</p>
            @endif

            @if ($project->about_app)
                <h2 class="detail-subheading">About the book</h2>
                <p class="section-desc">{{ $project->about_app }}</p>
            @endif

            @if ($project->who_its_for)
                <h2 class="detail-subheading">Who It's For &amp; What Students Will Learn</h2>
                <p class="section-desc">{{ $project->who_its_for }}</p>
            @endif

            @if (! empty($project->features))
                <h2 class="detail-subheading">What's Inside</h2>
                <ul class="feature-list">
                    @foreach ($project->features as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            @endif

            @if ($project->my_role)
                <h2 class="detail-subheading">My Role</h2>
                <p class="section-desc">{{ $project->my_role }}</p>
            @endif

            @if ($project->impact)
                <h2 class="detail-subheading">Impact</h2>
                <p class="section-desc">{{ $project->impact }}</p>
            @endif
        @else
            @if ($project->description)
                <h2 class="detail-subheading">Background</h2>
                <p class="section-desc">{{ $project->description }}</p>
            @endif

            @if ($project->about_app)
                <h2 class="detail-subheading">About {{ $mediaType === 'web' ? 'Web' : 'App' }}</h2>
                <p class="section-desc">{{ $project->about_app }}</p>
            @endif

            @if (! empty($project->features))
                <h2 class="detail-subheading">Features</h2>
                <ul class="feature-list">
                    @foreach ($project->features as $feature)
                        <li>{{ $feature }}</li>
                    @endforeach
                </ul>
            @endif

            @if ($project->technologies->isNotEmpty())
                <h2 class="detail-subheading">Tech Stack</h2>
                <div class="tag-list">
                    @foreach ($project->technologies as $tech)
                        <span>{{ $tech->name }}</span>
                    @endforeach
                </div>
            @endif

            @if ($project->my_role)
                <h2 class="detail-subheading">My Role</h2>
                <p class="section-desc">{{ $project->my_role }}</p>
            @endif

            @if ($project->impact)
                <h2 class="detail-subheading">Impact</h2>
                <p class="section-desc">{{ $project->impact }}</p>
            @endif
        @endif
    </div>
</div>

@endsection
