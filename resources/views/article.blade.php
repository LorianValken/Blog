@extends('layouts.app')

@push('page-styles')
<style>
    :root {
        --primary: #2563eb;
        --primary-light: #3b82f6;
        --secondary: #7c3aed;
        --accent: #ec4899;
        --dark: #1e293b;
        --light: #f8fafc;
        --gray: #64748b;
    }

    article {
        background: var(--light);
        border-radius: 24px;
        padding: 4rem;
        margin-bottom: 4rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08),
                    0 4px 6px -4px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(8px);
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        font-family: 'Manrope', sans-serif;
    }

    article:hover {
        transform: translateY(-8px);
        box-shadow: 0 32px 64px -12px rgba(0, 0, 0, 0.14),
                    0 8px 12px -4px rgba(0, 0, 0, 0.05);
    }

    article::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--primary), var(--secondary), var(--accent));
        background-size: 300% 300%;
        animation: gradientBG 8s ease infinite;
    }

    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .fw-bolder {
        font-weight: 800 !important;
        font-size: 3.5rem;
        line-height: 1.1;
        color: var(--dark);
        margin-bottom: 2rem;
        position: relative;
        padding-bottom: 1.5rem;
        font-family: 'Playfair Display', serif;
    }

    .fw-bolder::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 120px;
        height: 6px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        border-radius: 3px;
        transition: width 0.4s ease;
    }

    .fw-bolder:hover::after {
        width: 180px;
    }

    .text-muted {
        color: var(--gray) !important;
        font-size: 1rem;
        display: flex;
        align-items: center;
        margin-bottom: 2.5rem;
        gap: 12px;
    }

    .post-item-tag {
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        padding: 10px 20px;
        margin-right: 12px;
        margin-bottom: 12px;
        border-radius: 100px;
        font-size: 0.9rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        color: white;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.9), rgba(124, 58, 237, 0.9));
        box-shadow: 0 4px 20px rgba(37, 99, 235, 0.2),
                    inset 0 1px 1px rgba(255, 255, 255, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .post-item-tag:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 8px 30px rgba(37, 99, 235, 0.3),
                    inset 0 1px 1px rgba(255, 255, 255, 0.4);
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15),
                    0 8px 16px rgba(0, 0, 0, 0.08);
        transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .img-fluid:hover {
        transform: scale(1.02);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2),
                    0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .fs-5 {
        font-size: 1.2rem !important;
        line-height: 1.9;
        color: var(--dark);
        margin-bottom: 2rem;
    }

    section.mb-5 p.fs-5:first-of-type::first-letter {
        float: left;
        font-size: 6rem;
        line-height: 0.8;
        padding-top: 0.8rem;
        padding-right: 1rem;
        padding-left: 0;
        font-weight: 900;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-family: 'Playfair Display', serif;
        margin-right: 0.8rem;
    }

    @media (max-width: 768px) {
        article {
            padding: 2rem;
            border-radius: 16px;
        }
        
        .fw-bolder {
            font-size: 2.2rem;
        }
    }
</style>
@endpush

@section('content')
<div class="row position-relative">
    <div class="col-lg-8">
        <article>
            <header class="mb-4">
                <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                <div class="text-muted fst-italic mb-2">
                    <span>Posted on {{ $post->created_at->format('F j, Y') }}</span>
                    <span>•</span>
                    <span>by {{ $post->users->name ?? 'Unknown Author' }}</span>
                </div>
                <div class="tags-container">
                    @foreach($post->tags as $tag)
                        <a class="post-item-tag" href="{{route('home', ['tag_id' => $tag->id])}}">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            </header>
            
            <figure class="mb-4">
                <img class="img-fluid rounded" src="{{ $post->image }}" alt="{{ $post->title }}">
            </figure>
            
            <section class="mb-5">
                <p class="fs-5 mb-4">
                    {{ $post->content }}
                </p>
            </section>
        </article>
    </div>
    
    <div class="col-lg-4">
        @include('components.search-form')
        @include('components.tag')
    </div>
</div>
@endsection