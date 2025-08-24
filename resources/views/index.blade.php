@extends('layouts.app')

@section('title')

@push('page-styles')
<style>
    /* Tech Background Styles */
    body {
        background-color: #0a192f;
        color: #fff;
        position: relative;
        overflow-x: hidden;
        min-height: 100vh;
    }

    .tech-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        overflow: hidden;
    }

    .tech-circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(100, 255, 218, 0.1);
        box-shadow: 0 0 20px rgba(100, 255, 218, 0.2);
        animation: float 15s infinite ease-in-out;
    }

    .tech-line {
        position: absolute;
        background: linear-gradient(90deg, rgba(100, 255, 218, 0.3), transparent);
        height: 1px;
        animation: scan 8s infinite linear;
    }

    .tech-grid {
        position: absolute;
        width: 100%;
        height: 100%;
        background-image: 
            linear-gradient(rgba(100, 255, 218, 0.1) 1px, transparent 1px),
            linear-gradient(90deg, rgba(100, 255, 218, 0.1) 1px, transparent 1px);
        background-size: 40px 40px;
        opacity: 0.3;
    }

    @keyframes float {
        0%, 100% { transform: translate(0, 0); }
        25% { transform: translate(20px, 20px); }
        50% { transform: translate(-20px, 10px); }
        75% { transform: translate(10px, -20px); }
    }

    @keyframes scan {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100vw); }
    }

    /* Content Styles */
    .card {
        background-color: rgba(255, 255, 255, 0.95);
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        height: 100%;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(100, 255, 218, 0.3);
    }

    .post-frame-image {
        height: 250px;
        width: 100%;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
    }

    .btn-primary {
        background-color: #0066ff;
        border-color: #0066ff;
        box-shadow: 0 0 10px rgba(0, 102, 255, 0.5);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .post-frame-image {
            height: 180px;
        }
    }
</style>
@endpush

@push('page-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const techBackground = document.querySelector('.tech-background');
        
        // Add floating circles
        for (let i = 0; i < 5; i++) {
            const circle = document.createElement('div');
            circle.className = 'tech-circle';
            const size = Math.random() * 100 + 50;
            const posX = Math.random() * 100;
            const posY = Math.random() * 100;
            const delay = Math.random() * 10;
            
            circle.style.width = `${size}px`;
            circle.style.height = `${size}px`;
            circle.style.left = `${posX}%`;
            circle.style.top = `${posY}%`;
            circle.style.animationDelay = `${delay}s`;
            circle.style.opacity = Math.random() * 0.3 + 0.1;
            
            techBackground.appendChild(circle);
        }
        
        // Add scanning lines
        for (let i = 0; i < 3; i++) {
            const line = document.createElement('div');
            line.className = 'tech-line';
            const width = Math.random() * 300 + 100;
            const top = Math.random() * 100;
            const delay = Math.random() * 8;
            
            line.style.width = `${width}px`;
            line.style.top = `${top}%`;
            line.style.animationDelay = `${delay}s`;
            
            techBackground.appendChild(line);
        }
    });
</script>
@endpush

@section('content')
<div class="row">
    <!-- Blog entries-->
    <div class="col-lg-8">
        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            @if($posts->count())
                @foreach($posts as $post)
                <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                    <!-- Blog post-->
                    <div class="card h-100">
                        <a href="{{route('article', ['id' => $post->id])}}">
                            <img class="card-img-top post-frame-image" src="{{$post->image}}" alt="{{$post->title}}"/>
                        </a>
                        <div class="card-body d-flex flex-column">
                            <div class="small text-muted" style="margin-bottom: 13px;">{{ $post->created_at->format('F j, Y') }}</div>
                            <h2 class="card-title h4">{{$post->title}}</h2>
                            <p class="card-text">
                                {{ Str::limit($post->content, 150) }}
                            </p>
                            <div class="mt-auto">
                                <a class="btn btn-primary" href="{{route('article', ['id' => $post->id])}}">Read more →</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="card text-center p-5">
                        <h1>No posts found</h1>
                        <a class="btn btn-primary" href="{{ url('/') }}">Return to Home</a>
                    </div>
                </div>
            @endif
        </div>
        <!-- Pagination-->
        @if($posts->count())
        <div class="pagination-wrapper mt-4">
            {{ $posts->links() }}
        </div>
        @endif
    </div>
    <!-- Side widgets-->
    <div class="col-lg-4">
        <!-- Search widget-->
        @include('components.search-form')
        <!-- Tags widget-->
        @include('components.tag')
    </div>
</div>
<!-- Tech Animation Background -->
    <div class="tech-background">
        <div class="tech-grid"></div>
        <div class="tech-circle" style="width: 300px; height: 300px; top: -50px; left: -50px;"></div>
        <div class="tech-circle" style="width: 150px; height: 150px; bottom: 100px; right: 100px;"></div>
        <div class="tech-line" style="width: 200px; top: 30%; left: 0;"></div>
        <div class="tech-line" style="width: 300px; top: 70%; left: 0; animation-delay: 2s;"></div>
    </div>
@endsection