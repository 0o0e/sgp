@extends('layouts.app')

@section('content')
<div class="container">
    <div class="header">
        <h1>Children</h1>
        <a href="{{ route('children.create') }}" class="btn btn-primary">Create Child</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="children-grid">
        @forelse($children as $child)
            <div class="child-card">
                <div class="child-image">
                    @if($child->beforeImage)
                        <img src="{{ $child->beforeImage->image_url }}" alt="{{ $child->name }} Before">
                    @else
                        <div class="no-image">No Image</div>
                    @endif
                </div>
                <div class="child-info">
                    <h2>{{ $child->name }}</h2>
                    @if($child->nickname)
                        <p class="nickname">"{{ $child->nickname }}"</p>
                    @endif
                    <p class="age">{{ $child->age }} years old</p>
                    <p class="guardian">Guardian: {{ $child->guardian->name }}</p>
                    <div class="actions">
                        <a href="{{ route('children.show', $child) }}" class="btn btn-info">View</a>
                        <a href="{{ route('children.edit', $child) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('children.destroy', $child) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this child?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="no-children">
                <p>No children found.</p>
            </div>
        @endforelse
    </div>
</div>

@push('styles')
<style>
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.children-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.child-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    background: white;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.child-image {
    height: 200px;
    overflow: hidden;
    background: #f5f5f5;
}

.child-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-image {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #666;
    font-style: italic;
}

.child-info {
    padding: 15px;
}

.child-info h2 {
    margin: 0 0 5px 0;
    color: #333;
}

.nickname {
    color: #666;
    font-style: italic;
    margin: 0 0 10px 0;
}

.age, .guardian {
    color: #666;
    margin: 5px 0;
}

.actions {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}

.btn {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    text-decoration: none;
    display: inline-block;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-info {
    background-color: #17a2b8;
    color: white;
}

.btn-warning {
    background-color: #ffc107;
    color: #000;
}

.btn-danger {
    background-color: #dc3545;
    color: white;
}

.delete-form {
    display: inline;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
}

.alert-success {
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

.no-children {
    grid-column: 1 / -1;
    text-align: center;
    padding: 40px;
    background: #f8f9fa;
    border-radius: 8px;
    color: #666;
}
</style>
@endpush
@endsection 