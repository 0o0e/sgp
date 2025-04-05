@extends('layouts.app')

@section('title', 'Submit Fanart')

@section('content')
@include('layouts.form-styles')

<div class="form-container">
    <h1 class="section-title">Submit Fanart</h1>
    <p class="form-helper" style="text-align: center; margin-bottom: 2rem;">Share your artistic vision of the Soul Guardian world</p>

    @if ($errors->any())
        <div class="alert error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="fanart-form" action="/fanart" method="POST" enctype="multipart/form-data" id="fanartForm">
        @csrf

        <div class="form-section">
            <h2 class="section-title">Character Selection</h2>
            <div class="form-group">
                <label class="form-label required">Select Character</label>
                <div class="character-cards">
                    @foreach($characters as $character)
                    <div class="character-card" data-character-id="{{ $character->id }}">
                        <img src="{{ $character->real_form_image }}" alt="{{ $character->name }}" class="character-image">
                        <div class="character-info">
                            <div class="character-name">{{ $character->name }}</div>
                            <div class="character-type">
                                {{ ucfirst($character->type) }}
                                @if($character->type === 'guardian')
                                    - {{ ucfirst($character->guardian_type) }}
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <input type="hidden" name="character_id" id="character_id" value="{{ request('character') }}" required>
                <div class="form-helper">Click on a character to select them for your fanart</div>
            </div>
        </div>

        <div class="form-section">
            <h2 class="section-title">Fanart Details</h2>
            
            <div class="form-group">
                <label for="title" class="form-label required">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
                <div class="form-helper">Give your fanart a creative and descriptive title</div>
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-textarea"></textarea>
                <div class="form-helper">Share the story or inspiration behind your fanart</div>
            </div>

            <div class="form-group">
                <label for="artist_name" class="form-label required">Artist Name</label>
                <input type="text" id="artist_name" name="artist_name" class="form-control" required>
                <div class="form-helper">Enter your name or artist handle</div>
            </div>

            <div class="form-group">
                <label for="image" class="form-label required">Image</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                <div class="form-helper">Upload your fanart image (recommended size: 1200x1200px, max 5MB)</div>
                <div class="image-preview" id="imagePreview">
                    <img src="" alt="Preview">
                </div>
            </div>
        </div>

        <div class="form-footer">
            <button type="submit" class="btn">Submit Fanart</button>
            <a href="{{ route('fanart.index') }}" class="btn" style="background-color: var(--light-gray);">Cancel</a>
        </div>
    </form>
</div>

<style>
    .character-cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .character-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background-color: var(--white);
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 1px solid var(--medium-gray);
    }

    .character-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        border-color: var(--violet-blue);
    }

    .character-card.selected {
        background-color: rgba(126, 124, 217, 0.1);
        border-color: var(--violet-blue);
        box-shadow: 0 5px 15px rgba(126, 124, 217, 0.2);
    }

    .character-image {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--medium-gray);
        transition: all 0.3s ease;
    }

    .character-card.selected .character-image {
        border-color: var(--violet-blue);
    }

    .character-info {
        flex: 1;
    }

    .character-name {
        color: var(--violet-blue);
        font-weight: bold;
        margin-bottom: 0.3rem;
    }

    .character-type {
        color: var(--dark-gray);
        opacity: 0.8;
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .character-cards {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const characterCards = document.querySelectorAll('.character-card');
    const characterIdInput = document.getElementById('character_id');
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const previewImage = imagePreview.querySelector('img');
    const form = document.getElementById('fanartForm');

    // Set initial selected character if provided in URL
    const urlParams = new URLSearchParams(window.location.search);
    const initialCharacterId = urlParams.get('character');
    if (initialCharacterId) {
        const initialCard = document.querySelector(`.character-card[data-character-id="${initialCharacterId}"]`);
        if (initialCard) {
            initialCard.classList.add('selected');
            characterIdInput.value = initialCharacterId;
        }
    }

    characterCards.forEach(card => {
        card.addEventListener('click', function() {
            characterCards.forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            characterIdInput.value = this.dataset.characterId;
        });
    });

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            if (file.size > 5 * 1024 * 1024) { // 5MB limit
                alert('File size must be less than 5MB');
                this.value = '';
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                imagePreview.classList.add('active');
            }
            reader.readAsDataURL(file);
        }
    });

    form.addEventListener('submit', function(e) {
        const requiredFields = form.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('error');
                isValid = false;
            } else {
                field.classList.remove('error');
                field.classList.add('success');
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields');
        }
    });
});
</script>
@endsection 