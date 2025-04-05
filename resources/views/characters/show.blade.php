@extends('layouts.app')

@section('title', $character->name)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Character Details</span>
                    <div>
                        <a href="{{ route('characters.edit', $character) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('characters.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                    </div>
                </div>

                <div class="card-body">
                    @if($character->image)
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $character->image) }}" class="img-fluid rounded" alt="{{ $character->name }}" style="max-height: 300px;">
                        </div>
                    @endif

                    <div class="mb-3">
                        <h4>{{ $character->name }}</h4>
                        <span class="badge bg-{{ $character->type === 'guardian' ? 'primary' : 'success' }}">
                            {{ ucfirst($character->type) }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <h5>Description</h5>
                        <p>{{ $character->description }}</p>
                    </div>

                    <div class="mt-4">
                        <form action="{{ route('characters.destroy', $character) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this character?')">
                                Delete Character
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 