@extends('layouts.app2')

@section('title', 'Characters')

@section('content')
<div class="characters-page">
    <div class="characters-header">
        <div class="container">
            <h1 class="page-title">Characters</h1>
            <p class="page-description">Explore the guardians and children of the Soul Guardian Project</p>
            <a href="{{ route('characters.create') }}" class="btn-create">Create New Character</a>
        </div>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="characters-grid">
            @forelse ($characters as $character)
                <div class="character-card">
                    <div class="character-image-container">
                        @if($character->image)
                            <img src="{{ asset('storage/' . $character->image) }}" class="character-image" alt="{{ $character->name }}">
                        @elseif($character->type == 'guardian' && $character->real_form_image)
                            <img src="{{ asset('storage/' . $character->real_form_image) }}" class="character-image" alt="{{ $character->name }} (Real Form)">
                        @elseif($character->type == 'guardian' && $character->human_form_image)
                            <img src="{{ asset('storage/' . $character->human_form_image) }}" class="character-image" alt="{{ $character->name }} (Human Form)">
                        @else
                            <div class="character-image-placeholder">
                                <!-- Simple placeholder without background pattern -->
                            </div>
                        @endif
                        <div class="character-type-badge {{ $character->type }}">
                            {{ ucfirst($character->type) }}
                        </div>
                    </div>
                    <div class="character-info">
                        <h3 class="character-name">{{ $character->name }}</h3>
                        <p class="character-description">{{ Str::limit($character->description, 100) }}</p>
                        <div class="character-actions">
                            <a href="{{ route('characters.show', $character) }}" class="btn-view">View Details</a>
                            <div class="action-buttons">
                                <a href="{{ route('characters.edit', $character) }}" class="btn-edit" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('characters.destroy', $character) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" title="Delete" onclick="return confirm('Are you sure you want to delete this character?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>esaa
                    </div>
                </div>
            @empty
                <div class="no-characters">
                    <div class="no-characters-message">
                        <h3>No Characters Found</h3>
                        <p>Start by creating your first character</p>
                        <a href="{{ route('characters.create') }}" class="btn-create">Create Character</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    .characters-page {
        padding: 2rem 0;
        background-color: var(--light-gray);
        min-height: 100vh;
    }

    .characters-header {
        background: linear-gradient(135deg, var(--violet-blue), var(--max-blue-purple));
        color: white;
        padding: 3rem 0;
        margin-bottom: 2rem;
        text-align: center;
    }

    .page-title {
        font-family: 'Cinzel', serif;
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .page-description {
        font-size: 1.1rem;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto 1.5rem;
    }

    .btn-create {
        display: inline-block;
        background-color: white;
        color: var(--violet-blue);
        padding: 0.8rem 1.5rem;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-create:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        color: var(--violet-blue);
    }

    .characters-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 1rem;
    }

    .character-card {
        background-color: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .character-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .character-image-container {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .character-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .character-card:hover .character-image {
        transform: scale(1.05);
    }

    .character-image-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--violet-blue), var(--max-blue-purple));
        position: relative;
        overflow: hidden;
    }

    .character-type-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .character-type-badge.guardian {
        background-color: var(--violet-blue);
        color: white;
    }

    .character-type-badge.child {
        background-color: var(--diamond);
        color: var(--dark-gray);
    }

    .character-info {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .character-name {
        font-family: 'Cinzel', serif;
        font-size: 1.4rem;
        margin-bottom: 0.5rem;
        color: var(--violet-blue);
    }

    .character-description {
        color: var(--dark-gray);
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
        line-height: 1.5;
        flex-grow: 1;
    }

    .character-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }

    .btn-view {
        background-color: var(--violet-blue);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: background-color 0.3s ease;
    }

    .btn-view:hover {
        background-color: var(--max-blue-purple);
        color: white;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn-edit, .btn-delete {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background-color: var(--diamond);
        color: var(--dark-gray);
    }

    .btn-delete {
        background-color: #ff6b6b;
        color: white;
    }

    .btn-edit:hover, .btn-delete:hover {
        transform: scale(1.1);
    }

    .no-characters {
        grid-column: 1 / -1;
        text-align: center;
        padding: 3rem;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .no-characters-message {
        max-width: 400px;
        margin: 0 auto;
    }

    .no-characters h3 {
        font-family: 'Cinzel', serif;
        color: var(--violet-blue);
        margin-bottom: 0.5rem;
    }

    .no-characters p {
        color: var(--dark-gray);
        margin-bottom: 1.5rem;
    }

    @media (max-width: 768px) {
        .characters-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
        
        .page-title {
            font-size: 2rem;
        }
        
        .character-image-container {
            height: 200px;
        }
    }
</style>
@endsection 