@extends('layouts.app')

@section('title', 'Characters')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Characters</span>
                    <a href="{{ route('characters.create') }}" class="btn btn-primary btn-sm">Create New Character</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        @forelse ($characters as $character)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    @if($character->image)
                                        <img src="{{ asset('storage/' . $character->image) }}" class="card-img-top" alt="{{ $character->name }}">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $character->name }}</h5>
                                        <p class="card-text">
                                            <span class="badge bg-{{ $character->type === 'guardian' ? 'primary' : 'success' }}">
                                                {{ ucfirst($character->type) }}
                                            </span>
                                        </p>
                                        <p class="card-text">{{ Str::limit($character->description, 100) }}</p>
                                        <div class="btn-group">
                                            <a href="{{ route('characters.show', $character) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('characters.edit', $character) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('characters.destroy', $character) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-center">No characters found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 