@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Guardian</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('guardians.store') }}" method="POST" enctype="multipart/form-data" class="guardian-form">
        @csrf

        <div class="form-section">
            <h2>Basic Information</h2>
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="nickname">Nickname</label>
                <input type="text" id="nickname" name="nickname" value="{{ old('nickname') }}">
            </div>

            <div class="form-group">
                <label for="guardian_type">Guardian Type *</label>
                <select id="guardian_type" name="guardian_type" required>
                    <option value="">Select Type</option>
                    <option value="angel" {{ old('guardian_type') == 'angel' ? 'selected' : '' }}>Angel</option>
                    <option value="devil" {{ old('guardian_type') == 'devil' ? 'selected' : '' }}>Devil</option>
                </select>
            </div>

            <div class="form-group">
                <label for="age">Age *</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}" required min="0">
            </div>

            <div class="form-group">
                <label for="birthday">Birthday *</label>
                <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender *</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="height">Height (cm) *</label>
                <input type="number" id="height" name="height" value="{{ old('height') }}" required min="0" step="0.1">
            </div>

            <div class="form-group">
                <label for="weight">Weight (kg) *</label>
                <input type="number" id="weight" name="weight" value="{{ old('weight') }}" required min="0" step="0.1">
            </div>

            <div class="form-group">
                <label for="nationality">Nationality</label>
                <input type="text" id="nationality" name="nationality" value="{{ old('nationality') }}">
            </div>
        </div>

        <div class="form-section">
            <h2>Real Form Appearance</h2>
            <div class="form-group">
                <label for="real_eye_color">Eye Color</label>
                <input type="text" id="real_eye_color" name="real_eye_color" value="{{ old('real_eye_color') }}">
            </div>

            <div class="form-group">
                <label for="real_hair_color">Hair Color</label>
                <input type="text" id="real_hair_color" name="real_hair_color" value="{{ old('real_hair_color') }}">
            </div>

            <div class="form-group">
                <label for="real_hair_length">Hair Length</label>
                <input type="text" id="real_hair_length" name="real_hair_length" value="{{ old('real_hair_length') }}">
            </div>

            <div class="form-group">
                <label for="real_distinguishing_features">Distinguishing Features</label>
                <textarea id="real_distinguishing_features" name="real_distinguishing_features">{{ old('real_distinguishing_features') }}</textarea>
            </div>

            <div class="form-group">
                <label for="real_form_image">Real Form Image</label>
                <input type="file" id="real_form_image" name="real_form_image" accept="image/*">
                <div id="real_form_image_preview" class="image-preview"></div>
            </div>
        </div>

        <div class="form-section">
            <h2>Human Form Appearance</h2>
            <div class="form-group">
                <label for="fake_name">Human Name</label>
                <input type="text" id="fake_name" name="fake_name" value="{{ old('fake_name') }}">
            </div>

            <div class="form-group">
                <label for="fake_nickname">Human Nickname</label>
                <input type="text" id="fake_nickname" name="fake_nickname" value="{{ old('fake_nickname') }}">
            </div>

            <div class="form-group">
                <label for="fake_age">Human Age</label>
                <input type="number" id="fake_age" name="fake_age" value="{{ old('fake_age') }}" min="0">
            </div>

            <div class="form-group">
                <label for="fake_birthday">Human Birthday</label>
                <input type="date" id="fake_birthday" name="fake_birthday" value="{{ old('fake_birthday') }}">
            </div>

            <div class="form-group">
                <label for="fake_nationality">Human Nationality</label>
                <input type="text" id="fake_nationality" name="fake_nationality" value="{{ old('fake_nationality') }}">
            </div>

            <div class="form-group">
                <label for="fake_eye_color">Human Eye Color</label>
                <input type="text" id="fake_eye_color" name="fake_eye_color" value="{{ old('fake_eye_color') }}">
            </div>

            <div class="form-group">
                <label for="fake_hair_color">Human Hair Color</label>
                <input type="text" id="fake_hair_color" name="fake_hair_color" value="{{ old('fake_hair_color') }}">
            </div>

            <div class="form-group">
                <label for="fake_hair_length">Human Hair Length</label>
                <input type="text" id="fake_hair_length" name="fake_hair_length" value="{{ old('fake_hair_length') }}">
            </div>

            <div class="form-group">
                <label for="fake_height">Human Height (cm)</label>
                <input type="number" id="fake_height" name="fake_height" value="{{ old('fake_height') }}" min="0" step="0.1">
            </div>

            <div class="form-group">
                <label for="fake_weight">Human Weight (kg)</label>
                <input type="number" id="fake_weight" name="fake_weight" value="{{ old('fake_weight') }}" min="0" step="0.1">
            </div>

            <div class="form-group">
                <label for="fake_distinguishing_features">Human Distinguishing Features</label>
                <textarea id="fake_distinguishing_features" name="fake_distinguishing_features">{{ old('fake_distinguishing_features') }}</textarea>
            </div>

            <div class="form-group">
                <label for="human_form_image">Human Form Image</label>
                <input type="file" id="human_form_image" name="human_form_image" accept="image/*">
                <div id="human_form_image_preview" class="image-preview"></div>
            </div>
        </div>

        <div class="form-section">
            <h2>Other Details</h2>
            <div class="form-group">
                <label for="abilities">Abilities</label>
                <textarea id="abilities" name="abilities">{{ old('abilities') }}</textarea>
            </div>

            <div class="form-group">
                <label for="backstory">Backstory</label>
                <textarea id="backstory" name="backstory">{{ old('backstory') }}</textarea>
            </div>

            <div class="form-group">
                <label for="likes">Likes</label>
                <textarea id="likes" name="likes">{{ old('likes') }}</textarea>
            </div>

            <div class="form-group">
                <label for="dislikes">Dislikes</label>
                <textarea id="dislikes" name="dislikes">{{ old('dislikes') }}</textarea>
            </div>

            <div class="form-group">
                <label for="personality">Personality</label>
                <textarea id="personality" name="personality">{{ old('personality') }}</textarea>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Create Guardian</button>
            <a href="{{ route('guardians.index') }}" class="btn btn-secondary">Cancel</a>
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

    setupImagePreview('real_form_image', 'real_form_image_preview');
    setupImagePreview('human_form_image', 'human_form_image_preview');

    // Form validation
    const form = document.querySelector('.guardian-form');
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