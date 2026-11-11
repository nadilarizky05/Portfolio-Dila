@extends('layouts.app')

@section('content')

@php
    $hasImage = fn ($path) => $path && file_exists(public_path('images/'.$path));
    $assetV = fn ($relativePath) => asset($relativePath).'?v='.filemtime(public_path($relativePath));
    $youtubeId = function (string $url) {
        preg_match('/(?:youtu\.be\/|v=)([A-Za-z0-9_-]{6,})/', $url, $matches);
        return $matches[1] ?? null;
    };
@endphp

<h1 class="mentor-title">PROGRAMMING TEACHER</h1>

<h2 class="heading">Why Teacher?</h2>

<div class="why-teacher">
    <div class="why-teacher-photo">
        <img src="{{ $assetV('images/projects/teacher/teacher.png') }}" alt="Nadila Amelia">
    </div>
    <div class="why-teacher-text">
        @foreach ($whyTeacherParagraphs as $paragraph)
            <p>{!! $paragraph !!}</p>
        @endforeach
    </div>
</div>

<!-- <h2 class="heading">My Student Achievements</h2>
<p class="section-desc">{{ $achievementsIntro }}</p>

@if ($achievements->isEmpty())
    <p class="section-desc">No achievements yet.</p>
@else
    <div class="scroll-row ptm-scroll-row">
        @if ($achievements->count() > 3)
            <button type="button" class="scroll-btn dir-left" data-scroll-dir="left" aria-label="Scroll left" hidden>
                <i class='bx bx-chevron-left'></i>
            </button>
        @endif
        <div class="ptm-carousel" data-scroll-row>
            @foreach ($achievements as $achievement)
                <div class="ptm-item">
                    @if ($hasImage($achievement->image))
                        <img src="{{ $assetV('images/'.$achievement->image) }}" alt="{{ $achievement->title }}">
                    @else
                        <div class="img-placeholder" style="height: 160px;"></div>
                    @endif
                    <div class="body">
                        <h4>{{ $achievement->title }}</h4>
                        <p>{{ $achievement->description }}</p>
                        @if ($achievement->more_link && $achievement->more_link !== '#')
                            <a href="{{ $achievement->more_link }}" target="_blank" rel="noopener" class="card-link">More &gt;&gt;</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        @if ($achievements->count() > 3)
            <button type="button" class="scroll-btn dir-right" data-scroll-dir="right" aria-label="Scroll right">
                <i class='bx bx-chevron-right'></i>
            </button>
        @endif
    </div>
@endif -->

<h2 class="heading">PTM Documentations</h2>
<p class="section-desc">{{ $ptmIntro }}</p>

@if ($ptmDocumentations->isNotEmpty())
    <div class="scroll-row ptm-scroll-row">
        @if ($ptmDocumentations->count() > 3)
            <button type="button" class="scroll-btn dir-left" data-scroll-dir="left" aria-label="Scroll left" hidden>
                <i class='bx bx-chevron-left'></i>
            </button>
        @endif
        <div class="ptm-carousel" data-scroll-row>
            @foreach ($ptmDocumentations as $doc)
                <div class="ptm-item">
                    @if ($hasImage($doc->image))
                        <img src="{{ $assetV('images/'.$doc->image) }}" alt="{{ $doc->title }}">
                    @else
                        <div class="img-placeholder" style="height: 160px;"></div>
                    @endif
                    <div class="body">
                        <h4>{{ $doc->title }}</h4>
                        <p>{{ $doc->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($ptmDocumentations->count() > 3)
            <button type="button" class="scroll-btn dir-right" data-scroll-dir="right" aria-label="Scroll right">
                <i class='bx bx-chevron-right'></i>
            </button>
        @endif
    </div>
@endif

<h2 class="heading">Documentation Classes</h2>
<p class="section-desc">{{ $documentationIntro }}</p>

@if ($documentationPhotos->isEmpty())
    <p class="section-desc">No documentation photos yet.</p>
@else
    <div class="scroll-row photo-scroll-row" data-scroll-amount="1">
        @if ($documentationPhotos->count() > 8)
            <button type="button" class="scroll-btn dir-left" data-scroll-dir="left" aria-label="Scroll left" hidden>
                <i class='bx bx-chevron-left'></i>
            </button>
        @endif
        <div class="photo-grid" data-scroll-row>
            @foreach ($documentationPhotos as $photo)
                @if ($hasImage($photo->image_path))
                    <img src="{{ $assetV('images/'.$photo->image_path) }}" alt="Documentation class photo" class="photo-item">
                @else
                    <div class="photo-item img-placeholder"></div>
                @endif
            @endforeach
        </div>
        @if ($documentationPhotos->count() > 8)
            <button type="button" class="scroll-btn dir-right" data-scroll-dir="right" aria-label="Scroll right">
                <i class='bx bx-chevron-right'></i>
            </button>
        @endif
    </div>
@endif

<h2 class="heading">Student Presentations</h2>
<p class="section-desc">{{ $presentationIntro }}</p>

@if ($presentationVideos->isEmpty())
    <p class="section-desc">No student presentations yet.</p>
@else
    <div class="scroll-row photo-scroll-row" data-scroll-amount="1">
        @if ($presentationVideos->count() > 8)
            <button type="button" class="scroll-btn dir-left" data-scroll-dir="left" aria-label="Scroll left" hidden>
                <i class='bx bx-chevron-left'></i>
            </button>
        @endif
        <div class="photo-grid" data-scroll-row>
            @foreach ($presentationVideos as $video)
                @php $ytId = $youtubeId($video->youtube_url); @endphp
                <div class="video-card">
                    <a
                        href="{{ $ytId ? 'https://www.youtube.com/watch?v='.$ytId : $video->youtube_url }}"
                        target="_blank"
                        rel="noopener"
                        class="video-thumb"
                        @if ($ytId) style="background-image: url('https://img.youtube.com/vi/{{ $ytId }}/hqdefault.jpg')" @endif
                    >
                        <i class='bx bx-play-circle'></i>
                    </a>
                    <p class="video-title">{{ $video->title }}</p>
                </div>
            @endforeach
        </div>
        @if ($presentationVideos->count() > 8)
            <button type="button" class="scroll-btn dir-right" data-scroll-dir="right" aria-label="Scroll right">
                <i class='bx bx-chevron-right'></i>
            </button>
        @endif
    </div>
@endif

<h2 class="heading">Timedoor Academy Team (Branch Bali)</h2>
<p class="section-desc">{{ $teamIntro }}</p>

@if ($teamMembers->isNotEmpty())
    <div class="scroll-row ptm-scroll-row">
        @if ($teamMembers->count() > 3)
            <button type="button" class="scroll-btn dir-left" data-scroll-dir="left" aria-label="Scroll left" hidden>
                <i class='bx bx-chevron-left'></i>
            </button>
        @endif
        <div class="ptm-carousel" data-scroll-row>
            @foreach ($teamMembers as $member)
                <div class="ptm-item">
                    @if ($hasImage($member->image))
                        <img src="{{ $assetV('images/'.$member->image) }}" alt="{{ $member->title }}">
                    @else
                        <div class="img-placeholder" style="height: 160px;"></div>
                    @endif
                    <div class="body">
                        <h4>{{ $member->title }}</h4>
                        <p>{{ $member->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        @if ($teamMembers->count() > 3)
            <button type="button" class="scroll-btn dir-right" data-scroll-dir="right" aria-label="Scroll right">
                <i class='bx bx-chevron-right'></i>
            </button>
        @endif
    </div>
@endif

<h2 class="heading">What I Teach</h2>
<p class="section-desc">{{ $teachIntro }}</p>

@foreach ($pathways as $pathway)
    <details class="accordion-group">
        <summary>
            {{ $pathway->name }} ({{ $pathway->age_range }})
            <i class='bx bx-chevron-down chevron'></i>
        </summary>

        @foreach ($pathway->categories as $category)
            @if ($category->courses->isNotEmpty())
                <details class="pathway-category">
                    <summary>
                        {{ $category->name }}
                        <i class='bx bx-chevron-down chevron'></i>
                    </summary>
                    <div class="scroll-row">
                        @if ($category->courses->count() > 3)
                            <button type="button" class="scroll-btn on-light dir-left" data-scroll-dir="left" aria-label="Scroll left" hidden>
                                <i class='bx bx-chevron-left'></i>
                            </button>
                        @endif
                        <div class="course-scroll" data-scroll-row>
                            @foreach ($category->courses as $course)
                                <div class="course-item">
                                    @if ($hasImage($course->thumbnail))
                                        <img src="{{ $assetV('images/'.$course->thumbnail) }}" alt="{{ $course->title }}">
                                    @else
                                        <div class="img-placeholder" style="height: 120px;"></div>
                                    @endif
                                    <div class="body">
                                        <h5>{{ $course->title }}</h5>
                                        <p>{{ $course->description }}</p>
                                        @if ($course->platform_name)
                                            <span class="platform-tag">{{ $course->platform_name }} <i class='bx bx-link-external'></i></span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if ($category->courses->count() > 3)
                            <button type="button" class="scroll-btn on-light dir-right" data-scroll-dir="right" aria-label="Scroll right">
                                <i class='bx bx-chevron-right'></i>
                            </button>
                        @endif
                    </div>
                </details>
            @else
                <div class="pathway-collapsed">
                    {{ $category->name }}
                    <i class='bx bx-chevron-down'></i>
                </div>
            @endif
        @endforeach
    </details>
@endforeach

@endsection
