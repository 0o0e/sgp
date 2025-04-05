@extends('layouts.app')

@section('title', 'Edit Character')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Character</h4>
                    <a href="{{ route('characters.show', $character) }}" class="btn btn-secondary btn-sm">Back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('characters.update', $character) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="mb-0">Basic Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $character->name) }}" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="type">Type</label>
                                            <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                                                <option value="guardian" {{ old('type', $character->type) == 'guardian' ? 'selected' : '' }}>Guardian</option>
                                                <option value="child" {{ old('type', $character->type) == 'child' ? 'selected' : '' }}>Child</option>
                                            </select>
                                            @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="nickname">Nickname</label>
                                            <input type="text" class="form-control @error('nickname') is-invalid @enderror" id="nickname" name="nickname" value="{{ old('nickname', $character->nickname) }}" required>
                                            @error('nickname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="age">Age</label>
                                            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age', $character->age) }}" required>
                                            @error('age')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="birthday">Birthday</label>
                                            <input type="text" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday', $character->birthday) }}" required>
                                            @error('birthday')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="gender">Gender</label>
                                            <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" value="{{ old('gender', $character->gender) }}" required>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="height">Height</label>
                                            <input type="text" class="form-control @error('height') is-invalid @enderror" id="height" name="height" value="{{ old('height', $character->height) }}" required>
                                            @error('height')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="weight">Weight</label>
                                            <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight', $character->weight) }}" required>
                                            @error('weight')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="nationality">Nationality</label>
                                            <input type="text" class="form-control @error('nationality') is-invalid @enderror" id="nationality" name="nationality" value="{{ old('nationality', $character->nationality) }}" required>
                                            @error('nationality')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="mb-0">Personality</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label for="personality">Personality</label>
                                            <textarea class="form-control @error('personality') is-invalid @enderror" id="personality" name="personality" rows="3" required>{{ old('personality', $character->personality) }}</textarea>
                                            @error('personality')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="likes">Likes</label>
                                            <textarea class="form-control @error('likes') is-invalid @enderror" id="likes" name="likes" rows="3" required>{{ old('likes', $character->likes) }}</textarea>
                                            @error('likes')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="dislikes">Dislikes</label>
                                            <textarea class="form-control @error('dislikes') is-invalid @enderror" id="dislikes" name="dislikes" rows="3" required>{{ old('dislikes', $character->dislikes) }}</textarea>
                                            @error('dislikes')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($character->type === 'guardian')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header bg-danger text-white">
                                            <h5 class="mb-0">Real Form</h5>
                                        </div>
                                        <div class="card-body">
                                            @if($character->real_form_image)
                                                <div class="mb-3">
                                                    <img src="{{ asset('storage/' . $character->real_form_image) }}" class="img-thumbnail" alt="Current real form image" style="max-height: 200px;">
                                                </div>
                                            @endif
                                            <div class="form-group mb-3">
                                                <label for="real_form_image">Real Form Image</label>
                                                <input type="file" class="form-control @error('real_form_image') is-invalid @enderror" id="real_form_image" name="real_form_image">
                                                @error('real_form_image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="real_eye_color">Eye Color</label>
                                                <input type="text" class="form-control @error('real_eye_color') is-invalid @enderror" id="real_eye_color" name="real_eye_color" value="{{ old('real_eye_color', $character->real_eye_color) }}" required>
                                                @error('real_eye_color')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="real_hair_color">Hair Color</label>
                                                <input type="text" class="form-control @error('real_hair_color') is-invalid @enderror" id="real_hair_color" name="real_hair_color" value="{{ old('real_hair_color', $character->real_hair_color) }}" required>
                                                @error('real_hair_color')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="real_hair_length">Hair Length</label>
                                                <input type="text" class="form-control @error('real_hair_length') is-invalid @enderror" id="real_hair_length" name="real_hair_length" value="{{ old('real_hair_length', $character->real_hair_length) }}" required>
                                                @error('real_hair_length')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="real_distinguishing_features">Distinguishing Features</label>
                                                <textarea class="form-control @error('real_distinguishing_features') is-invalid @enderror" id="real_distinguishing_features" name="real_distinguishing_features" rows="3" required>{{ old('real_distinguishing_features', $character->real_distinguishing_features) }}</textarea>
                                                @error('real_distinguishing_features')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="real_abilities">Abilities</label>
                                                <textarea class="form-control @error('real_abilities') is-invalid @enderror" id="real_abilities" name="real_abilities" rows="3" required>{{ old('real_abilities', $character->real_abilities) }}</textarea>
                                                @error('real_abilities')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header bg-success text-white">
                                            <h5 class="mb-0">Human Form</h5>
                                        </div>
                                        <div class="card-body">
                                            @if($character->human_form_image)
                                                <div class="mb-3">
                                                    <img src="{{ asset('storage/' . $character->human_form_image) }}" class="img-thumbnail" alt="Current human form image" style="max-height: 200px;">
                                                </div>
                                            @endif
                                            <div class="form-group mb-3">
                                                <label for="human_form_image">Human Form Image</label>
                                                <input type="file" class="form-control @error('human_form_image') is-invalid @enderror" id="human_form_image" name="human_form_image">
                                                @error('human_form_image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="human_fake_name">Fake Name</label>
                                                <input type="text" class="form-control @error('human_fake_name') is-invalid @enderror" id="human_fake_name" name="human_fake_name" value="{{ old('human_fake_name', $character->human_fake_name) }}" required>
                                                @error('human_fake_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="human_fake_nickname">Fake Nickname</label>
                                                <input type="text" class="form-control @error('human_fake_nickname') is-invalid @enderror" id="human_fake_nickname" name="human_fake_nickname" value="{{ old('human_fake_nickname', $character->human_fake_nickname) }}" required>
                                                @error('human_fake_nickname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="human_fake_age">Fake Age</label>
                                                <input type="number" class="form-control @error('human_fake_age') is-invalid @enderror" id="human_fake_age" name="human_fake_age" value="{{ old('human_fake_age', $character->human_fake_age) }}" required>
                                                @error('human_fake_age')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="human_fake_birthday">Fake Birthday</label>
                                                <input type="text" class="form-control @error('human_fake_birthday') is-invalid @enderror" id="human_fake_birthday" name="human_fake_birthday" value="{{ old('human_fake_birthday', $character->human_fake_birthday) }}" required>
                                                @error('human_fake_birthday')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="human_fake_nationality">Fake Nationality</label>
                                                <input type="text" class="form-control @error('human_fake_nationality') is-invalid @enderror" id="human_fake_nationality" name="human_fake_nationality" value="{{ old('human_fake_nationality', $character->human_fake_nationality) }}" required>
                                                @error('human_fake_nationality')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="human_appearance">Appearance</label>
                                                <textarea class="form-control @error('human_appearance') is-invalid @enderror" id="human_appearance" name="human_appearance" rows="3" required>{{ old('human_appearance', $character->human_appearance) }}</textarea>
                                                @error('human_appearance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($character->type === 'child')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header bg-warning">
                                            <h5 class="mb-0">Child Information</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-3">
                                                <label for="paired_partner_id">Paired Guardian</label>
                                                <select class="form-control @error('paired_partner_id') is-invalid @enderror" id="paired_partner_id" name="paired_partner_id" required>
                                                    <option value="">Select Guardian</option>
                                                    @foreach($guardians ?? [] as $guardian)
                                                        <option value="{{ $guardian->id }}" {{ old('paired_partner_id', $character->paired_partner_id) == $guardian->id ? 'selected' : '' }}>
                                                            {{ $guardian->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('paired_partner_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="school">School</label>
                                                <input type="text" class="form-control @error('school') is-invalid @enderror" id="school" name="school" value="{{ old('school', $character->school) }}" required>
                                                @error('school')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="family">Family</label>
                                                <textarea class="form-control @error('family') is-invalid @enderror" id="family" name="family" rows="3" required>{{ old('family', $character->family) }}</textarea>
                                                @error('family')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card mb-4">
                                        <div class="card-header bg-warning">
                                            <h5 class="mb-0">Transformation</h5>
                                        </div>
                                        <div class="card-body">
                                            @if($character->before_image)
                                                <div class="mb-3">
                                                    <img src="{{ asset('storage/' . $character->before_image) }}" class="img-thumbnail" alt="Current before image" style="max-height: 200px;">
                                                </div>
                                            @endif
                                            <div class="form-group mb-3">
                                                <label for="before_image">Before Image</label>
                                                <input type="file" class="form-control @error('before_image') is-invalid @enderror" id="before_image" name="before_image">
                                                @error('before_image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            @if($character->after_image)
                                                <div class="mb-3">
                                                    <img src="{{ asset('storage/' . $character->after_image) }}" class="img-thumbnail" alt="Current after image" style="max-height: 200px;">
                                                </div>
                                            @endif
                                            <div class="form-group mb-3">
                                                <label for="after_image">After Image</label>
                                                <input type="file" class="form-control @error('after_image') is-invalid @enderror" id="after_image" name="after_image">
                                                @error('after_image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="card mb-4">
                            <div class="card-header bg-dark text-white">
                                <h5 class="mb-0">Backstory</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="backstory">Backstory</label>
                                    <textarea class="form-control @error('backstory') is-invalid @enderror" id="backstory" name="backstory" rows="5" required>{{ old('backstory', $character->backstory) }}</textarea>
                                    @error('backstory')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                Update Character
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 