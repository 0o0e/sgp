@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Child</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('children.update', $child) }}" method="POST" enctype="multipart/form-data" class="child-form">
        @csrf
        @method('PUT')

        <div class="form-section">
            <h2>Basic Information</h2>
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $child->name) }}" required>
            </div>

            <div class="form-group">
                <label for="nickname">Nickname</label>
                <input type="text" id="nickname" name="nickname" value="{{ old('nickname', $child->nickname) }}">
            </div>

            <div class="form-group">
                <label for="age">Age *</label>
                <input type="number" id="age" name="age" value="{{ old('age', $child->age) }}" required min="0">
            </div>

            <div class="form-group">
                <label for="birthday">Birthday *</label>
                <input type="date" id="birthday" name="birthday" value="{{ old('birthday', $child->birthday->format('Y-m-d')) }}" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender *</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender', $child->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $child->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $child->gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="height">Height (cm) *</label>
                <input type="number" id="height" name="height" value="{{ old('height', $child->height) }}" required min="0" step="0.1">
            </div>

            <div class="form-group">
                <label for="weight">Weight (kg) *</label>
                <input type="number" id="weight" name="weight" value="{{ old('weight', $child->weight) }}" required min="0" step="0.1">
            </div>

            <div class="form-group">
                <label for="nationality">Nationality</label>
                <input type="text" id="nationality" name="nationality" value="{{ old('nationality', $child->nationality) }}">
            </div>
        </div>

        <div class="form-section">
            <h2>Appearance</h2>
            <div class="form-group">
                <label for="eye_color">Eye Color</label>
                <input type="text" id="eye_color" name="eye_color" value="{{ old('eye_color', $child->eye_color) }}">
            </div>

            <div class="form-group">
                <label for="hair_color">Hair Color</label>
                <input type="text" id="hair_color" name="hair_color" value="{{ old('hair_color', $child->hair_color) }}">
            </div>

            <div class="form-group">
                <label for="hair_length">Hair Length</label>
                <input type="text" id="hair_length" name="hair_length" value="{{ old('hair_length', $child->hair_length) }}">
            </div>

            <div class="form-group">
                <label for="distinguishing_features">Distinguishing Features</label>
                <textarea id="distinguishing_features" name="distinguishing_features">{{ old('distinguishing_features', $child->distinguishing_features) }}</textarea>
            </div>
        </div>

        <div class="form-section">
            <h2>Guardian Information</h2>
            <div class="form-group">
                <label for="guardian_id">Guardian *</label>
                <select id="guardian_id" name="guardian_id" required>
                    <option value="">Select Guardian</option>
                    @foreach($guardians as $guardian)
                        <option value="{{ $guardian->id }}" {{ old('guardian_id', $child->guardian_id) == $guardian->id ? 'selected' : '' }}>
                            {{ $guardian->name }} ({{ ucfirst($guardian->guardian_type) }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-section">
            <h2>Before and After</h2>
            <div class="form-group">
                <label for="appearance_before">Appearance Before</label>
                <textarea id="appearance_before" name="appearance_before">{{ old('appearance_before', $child->appearance_before) }}</textarea>
            </div>

            <div class="form-group">
                <label for="appearance_after">Appearance After</label>
                <textarea id="appearance_after" name="appearance_after">{{ old('appearance_after', $child->appearance_after) }}</textarea>
            </div>

            <div class="form-group">
                <label for="before_image">Before Image</label>
                <input type="file" id="before_image" name="before_image" accept="image/*">
                <div id="before_image_preview" class="image-preview">
                    @if($child->beforeImage)
                        <img src="{{ $child->beforeImage->image_url }}" alt="Before Image">
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="after_image">After Image</label>
                <input type="file" id="after_image" name="after_image" accept="image/*">
                <div id="after_image_preview" class="image-preview">
                    @if($child->afterImage)
                        <img src="{{ $child->afterImage->image_url }}" alt="After Image">
                    @endif
                </div>
            </div>
        </div>

        <div class="form-section">
            <h2>Other Details</h2>
            <div class="form-group">
                <label for="family">Family</label>
                <textarea id="family" name="family">{{ old('family', $child->family) }}</textarea>
            </div>

            <div class="form-group">
                <label for="school">School</label>
                <textarea id="school" name="school">{{ old('school', $child->school) }}</textarea>
            </div>

            <div class="form-group">
                <label for="abilities">Abilities</label>
                <textarea id="abilities" name="abilities">{{ old('abilities', $child->abilities) }}</textarea>
            </div>

            <div class="form-group">
                <label for="backstory">Backstory</label>
                <textarea id="backstory" name="backstory">{{ old('backstory', $child->backstory) }}</textarea>
            </div>

            <div class="form-group">
                <label for="likes">Likes</label>
                <textarea id="likes" name="likes">{{ old('likes', $child->likes) }}</textarea>
            </div>

            <div class="form-group">
                <label for="dislikes">Dislikes</label>
                <textarea id="dislikes" name="dislikes">{{ old('dislikes', $child->dislikes) }}</textarea>
            </div>

            <div class="form-group">
                <label for="personality">Personality</label>
                <textarea id="personality" name="personality">{{ old('personality', $child->personality) }}</textarea>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Child</button>
            <a href="{{ route('children.show', $child) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@push('styles')
<style>
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.form-section {
    margin-bottom: 30px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.form-section h2 {
    margin-bottom: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input[type="text"],
.form-group input[type="number"],
.form-group input[type="date"],
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.form-group textarea {
    height: 100px;
    resize: vertical;
}

.image-preview {
    margin-top: 10px;
    max-width: 300px;
    max-height: 300px;
}

.image-preview img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.form-actions {
    margin-top: 20px;
    display: flex;
    gap: 10px;
}

.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
}

.alert-danger {
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}

.alert ul {
    margin: 0;
    padding-left: 20px;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image preview functionality
    function setupImagePreview(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);

        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                }
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '';
            }
        });
    }

    setupImagePreview('before_image', 'before_image_preview');
    setupImagePreview('after_image', 'after_image_preview');

    // Form validation
    const form = document.querySelector('.child-form');
    const requiredFields = form.querySelectorAll('[required]');
    const submitBtn = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function(e) {
        let isValid = true;
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('error');
            } else {
                field.classList.remove('error');
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields.');
        }
    });
});
</script>
@endpush
@endsection 