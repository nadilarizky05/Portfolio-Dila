@extends('layouts.app')

@section('content')

@php
    $hasImage = fn ($path) => $path && file_exists(public_path('images/logos/'.$path));
    $hasPhoto = fn ($path) => $path && file_exists(public_path('images/'.$path));
    // Bubuhi ?v=<mtime file> biar browser langsung ambil versi terbaru begitu fotonya diganti,
    // bukan menyajikan versi lama dari cache walau nama filenya sama persis.
    $assetV = fn ($relativePath) => asset($relativePath).'?v='.filemtime(public_path($relativePath));
@endphp

<h2 class="heading">ABOUT <span>ME</span></h2>
@foreach ($aboutText as $paragraph)
    <p class="about-desc">{{ $paragraph }}</p>
@endforeach

<h2 class="heading">PROFESSIONAL <span>EXPERIENCE</span></h2>

<div class="resume-list">
    @foreach ($experiences as $experience)
        <div class="resume-item">
            <div class="resume-item-left">
                @if ($hasImage($experience->logo))
                    <img src="{{ $assetV('images/logos/'.$experience->logo) }}" alt="{{ $experience->company }}" class="company-logo">
                @else
                    <div class="company-logo img-placeholder"></div>
                @endif
                <div>
                    <h3>{{ $experience->title }}</h3>
                    <p class="company">{{ $experience->company }}</p>
                </div>
            </div>
            <p class="year">
                {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }}
                -
                {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Present' }}
            </p>
        </div>

        @foreach ($experience->children as $child)
            <div class="resume-item child">
                <div class="resume-item-left">
                    <div>
                        <h3>{{ $child->title }}</h3>
                        <p class="company">{{ $child->company }}</p>
                    </div>
                </div>
                <p class="year">
                    {{ \Carbon\Carbon::parse($child->start_date)->format('M Y') }}
                    -
                    {{ $child->end_date ? \Carbon\Carbon::parse($child->end_date)->format('M Y') : 'Present' }}
                </p>
            </div>
        @endforeach
    @endforeach
</div>

<h2 class="heading">EDUCATION</h2>

<div class="resume-list">
    @foreach ($educations as $education)
        <div class="resume-item">
            <div class="resume-item-left">
                @if ($hasImage($education->logo))
                    <img src="{{ $assetV('images/logos/'.$education->logo) }}" alt="{{ $education->institution }}" class="company-logo">
                @else
                    <div class="company-logo img-placeholder"></div>
                @endif
                <div>
                    <h3>{{ $education->degree }}</h3>
                    <p class="company">{{ $education->institution }}</p>
                </div>
            </div>
            <p class="year">
                {{ \Carbon\Carbon::parse($education->start_date)->format('M Y') }}
                -
                {{ $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('M Y') : 'Present' }}
            </p>
        </div>
    @endforeach
</div>

<h2 class="heading">ACHIEVEMENTS</h2>

<div class="scroll-row ptm-scroll-row">
        @if ($achievements->count() > 3)
            <button type="button" class="scroll-btn dir-left" data-scroll-dir="left" aria-label="Scroll left" hidden>
                <i class='bx bx-chevron-left'></i>
            </button>
        @endif
        <div class="ptm-carousel" data-scroll-row>
            @foreach ($achievements as $achievement)
                <div class="ptm-item">
                    @if ($hasPhoto($achievement->image))
                        <img src="{{ $assetV('images/'.$achievement->image) }}" alt="{{ $achievement->title }}">
                    @else
                        <div class="img-placeholder" style="height: 160px;"></div>
                    @endif
                    <div class="body">
                        <h4>{{ $achievement->title }}</h4>
                        <p>{{ $achievement->description }}</p>
                        @if ($achievement->link_url && $achievement->link_url !== '#')
                            <a href="{{ $achievement->link_url }}" target="_blank" rel="noopener" class="card-link">{{ $achievement->link_text ?: 'More >>' }}</a>
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
<!-- <ul class="simple-list">
    @foreach ($achievements as $achievement)
        <li>
            {{ $achievement->title }}
            @if ($achievement->description)
                &mdash; {{ $achievement->description }}
            @endif
            <span class="meta">({{ \Carbon\Carbon::parse($achievement->date)->format('F Y') }})</span>
        </li>
    @endforeach
</ul> -->

<h2 class="heading">PUBLICATIONS</h2>

<ul class="simple-list">
    @foreach ($publications as $publication)
        <li>
            {{ $publication->title }}
            <span class="meta">
                ({{ $publication->publisher }} &middot; {{ \Carbon\Carbon::parse($publication->published_at)->format('M j, Y') }})
            </span>
        </li>
    @endforeach
</ul>

<h2 class="heading">VOLUNTEERING</h2>

<div class="resume-list">
    @foreach ($volunteerings as $volunteering)
        <div class="resume-item">
            <div class="resume-item-left">
                @if ($hasImage($volunteering->logo))
                    <img src="{{ $assetV('images/logos/'.$volunteering->logo) }}" alt="{{ $volunteering->organization }}" class="company-logo">
                @else
                    <div class="company-logo img-placeholder"></div>
                @endif
                <div>
                    <h3>{{ $volunteering->role }}</h3>
                    <p class="company">{{ $volunteering->organization }}</p>
                </div>
            </div>
            <p class="year">
                {{ \Carbon\Carbon::parse($volunteering->start_date)->format('M Y') }}
                -
                {{ $volunteering->end_date ? \Carbon\Carbon::parse($volunteering->end_date)->format('M Y') : 'Present' }}
            </p>
        </div>
    @endforeach
</div>

@endsection