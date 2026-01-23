@extends('layout')

@section('title', 'Projects // System Log')

@section('content')
<style>
    .projects-header {
        margin-bottom: 3rem;
        text-align: center;
        position: relative;
    }
    
    .projects-header h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .projects-header::after {
        content: "";
        display: block;
        width: 100px;
        height: 4px;
        background: var(--accent-purple);
        margin: 0 auto;
        box-shadow: 0 0 10px var(--accent-purple);
    }

    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .project-card {
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        border-color: var(--accent-cyan);
    }

    .image-placeholder {
        width: 100%;
        height: 200px;
        background: #1a202c;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        cursor: pointer;
        overflow: hidden;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .image-placeholder:hover .overlay {
        opacity: 1;
    }

    .project-info {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .project-title {
        color: var(--text-main);
        font-size: 1.2rem;
        margin-bottom: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .project-desc {
        color: var(--text-muted);
        font-size: 0.95rem;
        line-height: 1.6;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Decorative Corner */
    .project-card::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 20px;
        height: 20px;
        background: linear-gradient(45deg, transparent 50%, var(--accent-cyan) 50%);
        opacity: 0.5;
        z-index: 10;
    }
</style>

<div class="projects-header">
    <h1>Project Archives</h1>
</div>

<div class="projects-grid">
    <!-- Project 1 -->
    <article class="project-card">
        <div class="image-placeholder" aria-label="Upload image for Anime Website" role="img">
            <img src="{{ asset('images/projects/anime-website.png') }}"
         alt="Anime Website Screenshot"
         class="project-image">
            <div class="overlay">
            </div>
        </div>
        <div class="project-info">
            <h3 class="project-title">My First Web Project (Anime Website)</h3>
            <p class="project-desc">Exploration of web fundamentals through an immersive anime-themed portal. Features character galleries and episode guides.</p>
        </div>
    </article>

    <!-- Project 2 -->
    <article class="project-card">
        <div class="image-placeholder" aria-label="Upload image for PixRPG" role="img">
            <<img src="{{ asset('images/projects/pixrpg.png') }}"
         alt="PixRPG Screenshot"
         class="project-image">
            <div class="overlay">
            </div>
        </div>
        <div class="project-info">
            <h3 class="project-title">My Mobile RPG App (PixRPG)</h3>
            <p class="project-desc">A retro-style mobile RPG adventure. Built with mobile-first principles, featuring turn-based combat and pixel art aesthetics.</p>
        </div>
    </article>

    <!-- Project 3 -->
    <article class="project-card">
        <div class="image-placeholder" aria-label="Upload image for LKX Filter App" role="img">
            <img src="{{ asset('images/projects/lkx.png') }}"
         alt="LKX Filter App Screenshot"
         class="project-image">
            <div class="overlay">

            </div>
        </div>
        <div class="project-info">
            <h3 class="project-title">My First Flutter Project (LKX)</h3>
            <p class="project-desc">Real-time image processing application providing custom aesthetic filters. Focuses on performance and intuitive user interface.</p>
        </div>
    </article>
</div>
@endsection