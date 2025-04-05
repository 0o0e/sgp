@extends('layouts.app')

@section('title', 'Fanart Gallery')

@section('content')
<style>
    .gallery-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .gallery-title {
        font-family: 'Cinzel', serif;
        font-size: 2.5rem;
        color: var(--accent-color);
        margin-bottom: 1rem;
        text-shadow: 0 0 10px rgba(193, 125, 89, 0.3);
    }

    .gallery-subtitle {
        color: var(--text-color);
        opacity: 0.8;
        font-size: 1.2rem;
    }

    .gallery-filters {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .filter-btn {
        padding: 0.5rem 1.5rem;
        background-color: var(--card-background);
        border: 1px solid var(--accent-color);
        border-radius: 20px;
        color: var(--text-color);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-btn.active {
        background-color: var(--accent-color);
        color: var(--text-color);
    }

    .filter-btn:hover {
        background-color: var(--accent-color);
        color: var(--text-color);
    }

    .gallery-grid {
        column-count: 3;
        column-gap: 1.5rem;
        padding: 0 1.5rem;
    }

    @media (max-width: 1200px) {
        .gallery-grid {
            column-count: 2;
        }
    }

    @media (max-width: 768px) {
        .gallery-grid {
            column-count: 1;
        }
    }

    .gallery-item {
        break-inside: avoid;
        margin-bottom: 1.5rem;
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        background-color: var(--card-background);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
    }

    .gallery-item:hover {
        transform: translateY(-5px);
    }

    .gallery-image {
        width: 100%;
        display: block;
        cursor: pointer;
    }

    .gallery-info {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1rem;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
        color: var(--text-color);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-item:hover .gallery-info {
        opacity: 1;
    }

    .gallery-title {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: var(--accent-color);
    }

    .gallery-artist {
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .gallery-character {
        font-size: 0.9rem;
        opacity: 0.8;
        margin-top: 0.3rem;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.9);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }

    .modal.active {
        display: flex;
    }

    .modal-content {
        max-width: 90%;
        max-height: 90vh;
        position: relative;
    }

    .modal-image {
        max-width: 100%;
        max-height: 90vh;
        object-fit: contain;
    }

    .modal-info {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1rem;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
        color: var(--text-color);
    }

    .modal-title {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        color: var(--accent-color);
    }

    .modal-artist {
        font-size: 1rem;
        opacity: 0.8;
    }

    .modal-description {
        margin-top: 1rem;
        opacity: 0.8;
    }

    .modal-close {
        position: absolute;
        top: 1rem;
        right: 1rem;
        color: var(--text-color);
        font-size: 2rem;
        cursor: pointer;
    }

    .submit-fanart-btn {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: var(--accent-color);
        color: var(--text-color);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .submit-fanart-btn:hover {
        transform: translateY(-5px);
        background-color: #a86a4a;
    }
</style>

<div class="gallery-header">
    <h1 class="gallery-title">Fanart Gallery</h1>
    <p class="gallery-subtitle">Explore the artistic interpretations of the Soul Guardian world</p>
</div>

<div class="gallery-filters">
    <button class="filter-btn active" data-filter="all">All</button>
    <button class="filter-btn" data-filter="guardian">Guardians</button>
    <button class="filter-btn" data-filter="child">Children</button>
</div>

<div class="gallery-grid">
    @foreach($fanart as $art)
    <div class="gallery-item" data-type="{{ $art->character->type }}">
        <img src="{{ asset('storage/' . $art->image_path) }}" alt="{{ $art->title }}" class="gallery-image" 
             data-image="{{ asset('storage/' . $art->image_path) }}" 
             data-title="{{ $art->title }}" 
             data-artist="{{ $art->artist_name }}" 
             data-description="{{ $art->description }}" 
             data-character="{{ $art->character->name }}">
        <div class="gallery-info">
            <h3 class="gallery-title">{{ $art->title }}</h3>
            <div class="gallery-artist">by {{ $art->artist_name }}</div>
            <div class="gallery-character">{{ $art->character->name }}</div>
        </div>
    </div>
    @endforeach
</div>

<a href="{{ route('fanart.create') }}" class="submit-fanart-btn">+</a>

<div class="modal" id="imageModal">
    <span class="modal-close">&times;</span>
    <div class="modal-content">
        <img src="" alt="" class="modal-image">
        <div class="modal-info">
            <h2 class="modal-title"></h2>
            <div class="modal-artist"></div>
            <div class="modal-description"></div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('imageModal');
    const modalImage = modal.querySelector('.modal-image');
    const modalTitle = modal.querySelector('.modal-title');
    const modalArtist = modal.querySelector('.modal-artist');
    const modalDescription = modal.querySelector('.modal-description');
    const closeBtn = modal.querySelector('.modal-close');
    const galleryImages = document.querySelectorAll('.gallery-image');
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    // Filter functionality
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const filter = btn.dataset.filter;
            
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            galleryItems.forEach(item => {
                if (filter === 'all' || item.dataset.type === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Modal functionality
    galleryImages.forEach(img => {
        img.addEventListener('click', () => {
            modalImage.src = img.dataset.image;
            modalImage.alt = img.dataset.title;
            modalTitle.textContent = img.dataset.title;
            modalArtist.textContent = `by ${img.dataset.artist}`;
            modalDescription.textContent = img.dataset.description;
            modal.classList.add('active');
        });
    });

    closeBtn.addEventListener('click', () => {
        modal.classList.remove('active');
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.remove('active');
        }
    });
});
</script>
@endsection 