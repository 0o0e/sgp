@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Create Guardian</span>
                    <a href="{{ route('characters.create') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('characters.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="guardian">

                        <div class="card mb-4">
                            <div class="card-header">Basic Information</div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="nickname">Nickname</label>
                                    <input type="text" class="form-control @error('nickname') is-invalid @enderror" id="nickname" name="nickname" value="{{ old('nickname') }}">
                                    @error('nickname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="age">Age</label>
                                    <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age') }}">
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="birthday">Birthday</label>
                                    <input type="text" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday') }}">
                                    @error('birthday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="gender">Gender</label>
                                    <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" value="{{ old('gender') }}">
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="height">Height</label>
                                    <input type="text" class="form-control @error('height') is-invalid @enderror" id="height" name="height" value="{{ old('height') }}">
                                    @error('height')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="weight">Weight</label>
                                    <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight') }}">
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" class="form-control @error('nationality') is-invalid @enderror" id="nationality" name="nationality" value="{{ old('nationality') }}">
                                    @error('nationality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Real Form</div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="real_eye_color">Eye Color</label>
                                    <input type="text" class="form-control @error('real_eye_color') is-invalid @enderror" id="real_eye_color" name="real_eye_color" value="{{ old('real_eye_color') }}">
                                    @error('real_eye_color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="real_hair_color">Hair Color</label>
                                    <input type="text" class="form-control @error('real_hair_color') is-invalid @enderror" id="real_hair_color" name="real_hair_color" value="{{ old('real_hair_color') }}">
                                    @error('real_hair_color')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="real_hair_length">Hair Length</label>
                                    <input type="text" class="form-control @error('real_hair_length') is-invalid @enderror" id="real_hair_length" name="real_hair_length" value="{{ old('real_hair_length') }}">
                                    @error('real_hair_length')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="real_distinguishing_features">Distinguishing Features</label>
                                    <textarea class="form-control @error('real_distinguishing_features') is-invalid @enderror" id="real_distinguishing_features" name="real_distinguishing_features" rows="3">{{ old('real_distinguishing_features') }}</textarea>
                                    @error('real_distinguishing_features')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="real_abilities">Abilities</label>
                                    <textarea class="form-control @error('real_abilities') is-invalid @enderror" id="real_abilities" name="real_abilities" rows="3">{{ old('real_abilities') }}</textarea>
                                    @error('real_abilities')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="real_form_image">Real Form Image</label>
                                    <input type="file" class="form-control @error('real_form_image') is-invalid @enderror" id="real_form_image" name="real_form_image">
                                    @error('real_form_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Human Form</div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="human_fake_name">Fake Name</label>
                                    <input type="text" class="form-control @error('human_fake_name') is-invalid @enderror" id="human_fake_name" name="human_fake_name" value="{{ old('human_fake_name') }}">
                                    @error('human_fake_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="human_fake_nickname">Fake Nickname</label>
                                    <input type="text" class="form-control @error('human_fake_nickname') is-invalid @enderror" id="human_fake_nickname" name="human_fake_nickname" value="{{ old('human_fake_nickname') }}">
                                    @error('human_fake_nickname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="human_fake_age">Fake Age</label>
                                    <input type="number" class="form-control @error('human_fake_age') is-invalid @enderror" id="human_fake_age" name="human_fake_age" value="{{ old('human_fake_age') }}">
                                    @error('human_fake_age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="human_fake_birthday">Fake Birthday</label>
                                    <input type="text" class="form-control @error('human_fake_birthday') is-invalid @enderror" id="human_fake_birthday" name="human_fake_birthday" value="{{ old('human_fake_birthday') }}">
                                    @error('human_fake_birthday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="human_fake_nationality">Fake Nationality</label>
                                    <input type="text" class="form-control @error('human_fake_nationality') is-invalid @enderror" id="human_fake_nationality" name="human_fake_nationality" value="{{ old('human_fake_nationality') }}">
                                    @error('human_fake_nationality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="human_appearance">Appearance</label>
                                    <textarea class="form-control @error('human_appearance') is-invalid @enderror" id="human_appearance" name="human_appearance" rows="3">{{ old('human_appearance') }}</textarea>
                                    @error('human_appearance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="human_form_image">Human Form Image</label>
                                    <input type="file" class="form-control @error('human_form_image') is-invalid @enderror" id="human_form_image" name="human_form_image">
                                    @error('human_form_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Personality</div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="likes">Likes</label>
                                    <textarea class="form-control @error('likes') is-invalid @enderror" id="likes" name="likes" rows="3">{{ old('likes') }}</textarea>
                                    @error('likes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="dislikes">Dislikes</label>
                                    <textarea class="form-control @error('dislikes') is-invalid @enderror" id="dislikes" name="dislikes" rows="3">{{ old('dislikes') }}</textarea>
                                    @error('dislikes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="personality">Personality</label>
                                    <textarea class="form-control @error('personality') is-invalid @enderror" id="personality" name="personality" rows="3">{{ old('personality') }}</textarea>
                                    @error('personality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Backstory</div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="backstory">Backstory</label>
                                    <textarea class="form-control @error('backstory') is-invalid @enderror" id="backstory" name="backstory" rows="5">{{ old('backstory') }}</textarea>
                                    @error('backstory')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Additional Images</div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="before_image">Before Image</label>
                                    <input type="file" class="form-control @error('before_image') is-invalid @enderror" id="before_image" name="before_image">
                                    @error('before_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

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

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                Create Guardian
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 