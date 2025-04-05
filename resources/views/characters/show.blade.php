@extends('layouts.app2')

@section('title', $character->name)

<style>
    body {
        margin: 0;
        padding: 0;
        background: #f9f9f9;
        font-family: sans-serif;
    }

    .character-page {
        width: 100%;
        margin: 0 auto;
    }

    .hero-section {
        width: 100%;
        height: 500px;
        position: relative;
        overflow: hidden;
    }

    .hero-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 0;
    }

    .hero-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        color: white;
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .character-name {
        font-size: 3.5rem;
        font-weight: bold;
        margin: 0;
    }

    .content-wrapper {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1.5rem;
    }

    .info-card,
    .backstory-content,
    .form-card {
        background: white;
        border-radius: 8px;
        padding: 2rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 2rem;
    }

    .info-grid,
    .children-grid,
    .image-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 1.5rem;
    }

    .btn {
        padding: 0.6rem 1.2rem;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        background: #4a90e2;
        color: white;
        transition: 0.2s;
    }

    .btn:hover {
        background: #357abd;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .child-image {
        width: 100%;
        height: 300px;
        overflow: hidden;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
    }

    .child-image img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
        position: relative;
        transition: transform 0.5s ease;
    }

    .form-image {
        width: 100%;
        height: 300px;
        overflow: hidden;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        margin-bottom: 1.5rem;
    }

    .form-image img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
    }

    .transformation-image {
        width: 100%;
        height: 300px;
        overflow: hidden;
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        margin-bottom: 1.5rem;
    }

    .transformation-image img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        object-fit: contain;
    }
</style>


@section('content')
<div class="character-page">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-overlay"></div>
        @if($character->image)
            <div class="hero-image" style="background-image: url('{{ asset('storage/' . $character->image) }}');"></div>
        @endif
        <div class="hero-content">
            <div class="content-wrapper">
                <h1 class="character-name">{{ $character->name }}</h1>
                <div class="character-type-badge {{ $character->type === 'guardian' ? 'guardian' : 'child' }}">
                    {{ ucfirst($character->type) }}
                </div>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="{{ route('characters.edit', $character) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('characters.index') }}" class="btn btn-secondary">Back to List</a>
        </div>

        <!-- Basic Information -->
        <div class="info-card">
            <h2 class="card-title">Basic Information</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Nickname:</span>
                    <span class="info-value">{{ $character->nickname }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Age:</span>
                    <span class="info-value">{{ $character->age }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Birthday:</span>
                    <span class="info-value">{{ $character->birthday }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Gender:</span>
                    <span class="info-value">{{ $character->gender }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Height:</span>
                    <span class="info-value">{{ $character->height }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Weight:</span>
                    <span class="info-value">{{ $character->weight }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Nationality:</span>
                    <span class="info-value">{{ $character->nationality }}</span>
                </div>
            </div>
        </div>

        <!-- Personality -->
        <div class="info-card">
            <h2 class="card-title">Personality</h2>
            <div class="personality-grid">
                <div class="personality-item">
                    <h3 class="personality-title">Traits</h3>
                    <p>{{ $character->personality }}</p>
                </div>
                <div class="personality-item">
                    <h3 class="personality-title">Likes</h3>
                    <p>{{ $character->likes }}</p>
                </div>
                <div class="personality-item">
                    <h3 class="personality-title">Dislikes</h3>
                    <p>{{ $character->dislikes }}</p>
                </div>
            </div>
        </div>

        @if($character->type === 'guardian')
            <!-- Guardian Forms -->
            <div class="forms-container">
                <!-- Real Form -->
                <div class="form-card">
                    <h2 class="card-title">Real Form</h2>
                    @if($character->real_form_image)
                        <div class="form-image">
                            <img src="{{ asset('storage/' . $character->real_form_image) }}" alt="Real Form">
                        </div>
                    @endif
                    <div class="form-details">
                        <div class="form-detail-item">
                            <span class="detail-label">Eye Color:</span>
                            <span class="detail-value">{{ $character->real_eye_color }}</span>
                        </div>
                        <div class="form-detail-item">
                            <span class="detail-label">Hair Color:</span>
                            <span class="detail-value">{{ $character->real_hair_color }}</span>
                        </div>
                        <div class="form-detail-item">
                            <span class="detail-label">Hair Length:</span>
                            <span class="detail-value">{{ $character->real_hair_length }}</span>
                        </div>
                        <div class="form-detail-item">
                            <span class="detail-label">Abilities:</span>
                            <span class="detail-value">{{ $character->real_abilities }}</span>
                        </div>
                        <div class="form-detail-item full-width">
                            <span class="detail-label">Distinguishing Features:</span>
                            <span class="detail-value">{{ $character->real_distinguishing_features }}</span>
                        </div>
                    </div>
                </div>

                <!-- Human Form -->
                <div class="form-card">
                    <h2 class="card-title">Human Form</h2>
                    @if($character->human_form_image)
                        <div class="form-image">
                            <img src="{{ asset('storage/' . $character->human_form_image) }}" alt="Human Form">
                        </div>
                    @endif
                    <div class="form-details">
                        <div class="form-detail-item">
                            <span class="detail-label">Fake Name:</span>
                            <span class="detail-value">{{ $character->human_fake_name }}</span>
                        </div>
                        <div class="form-detail-item">
                            <span class="detail-label">Fake Nickname:</span>
                            <span class="detail-value">{{ $character->human_fake_nickname }}</span>
                        </div>
                        <div class="form-detail-item">
                            <span class="detail-label">Fake Age:</span>
                            <span class="detail-value">{{ $character->human_fake_age }}</span>
                        </div>
                        <div class="form-detail-item">
                            <span class="detail-label">Fake Birthday:</span>
                            <span class="detail-value">{{ $character->human_fake_birthday }}</span>
                        </div>
                        <div class="form-detail-item">
                            <span class="detail-label">Fake Nationality:</span>
                            <span class="detail-value">{{ $character->human_fake_nationality }}</span>
                        </div>
                        <div class="form-detail-item full-width">
                            <span class="detail-label">Appearance:</span>
                            <span class="detail-value">{{ $character->human_appearance }}</span>
                        </div>
                    </div>
                </div>
            </div>

            @if($character->children->count() > 0)
                <!-- Paired Children -->
                <div class="info-card">
                    <h2 class="card-title">Paired Children</h2>
                    <div class="children-grid">
                        @foreach($character->children as $child)
                            <div class="child-card">
                                @if($child->image)
                                    <div class="child-image">
                                        <img src="{{ asset('storage/' . $child->image) }}" alt="{{ $child->name }}">
                                    </div>
                                @endif
                                <div class="child-info">
                                    <h3 class="child-name">{{ $child->name }}</h3>
                                    <p class="child-backstory">{{ Str::limit($child->backstory, 100) }}</p>
                                    <a href="{{ route('characters.show', $child) }}" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif

        @if($character->type === 'child')
            <!-- Child Information and Transformation -->
            <div class="forms-container">
                <!-- Child Information -->
                <div class="form-card">
                    <h2 class="card-title">Child Information</h2>
                    <div class="form-details">
                        <div class="form-detail-item">
                            <span class="detail-label">School:</span>
                            <span class="detail-value">{{ $character->school }}</span>
                        </div>
                        <div class="form-detail-item">
                            <span class="detail-label">Family:</span>
                            <span class="detail-value">{{ $character->family }}</span>
                        </div>
                        @if($character->pairedPartner)
                            <div class="form-detail-item full-width">
                                <span class="detail-label">Paired Guardian:</span>
                                <span class="detail-value">
                                    <a href="{{ route('characters.show', $character->pairedPartner) }}" class="partner-link">
                                        {{ $character->pairedPartner->name }}
                                    </a>
                                </span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Transformation -->
                <div class="form-card">
                    <h2 class="card-title">Transformation</h2>
                    <div class="transformation-images">
                        @if($character->before_image)
                            <div class="transformation-image">
                                <h3 class="transformation-title">Before</h3>
                                <img src="{{ asset('storage/' . $character->before_image) }}" alt="Before">
                            </div>
                        @endif
                        @if($character->after_image)
                            <div class="transformation-image">
                                <h3 class="transformation-title">After</h3>
                                <img src="{{ asset('storage/' . $character->after_image) }}" alt="After">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        <!-- Backstory -->
        <div class="info-card">
            <h2 class="card-title">Backstory</h2>
            <div class="backstory-content">
                <p>{{ $character->backstory }}</p>
            </div>
        </div>

        <!-- Delete Button -->
        <div class="delete-container">
            <form action="{{ route('characters.destroy', $character) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this character?')">
                    Delete Character
                </button>
            </form>
        </div>
    </div>
</div>
@endsection 