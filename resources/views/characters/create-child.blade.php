@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Create Child</span>
                    <a href="{{ route('characters.create') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('characters.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="child">

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
                            <div class="card-header">Child Information</div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="paired_partner_id">Paired Guardian</label>
                                    <select class="form-control @error('paired_partner_id') is-invalid @enderror" id="paired_partner_id" name="paired_partner_id">
                                        <option value="">Select Guardian</option>
                                        @foreach($guardians ?? [] as $guardian)
                                            <option value="{{ $guardian->id }}" {{ old('paired_partner_id') == $guardian->id ? 'selected' : '' }}>
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
                                    <input type="text" class="form-control @error('school') is-invalid @enderror" id="school" name="school" value="{{ old('school') }}">
                                    @error('school')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="family">Family</label>
                                    <textarea class="form-control @error('family') is-invalid @enderror" id="family" name="family" rows="3">{{ old('family') }}</textarea>
                                    @error('family')
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
                            <div class="card-header">Images</div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="image">Character Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

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
                            <button type="submit" class="btn btn-success">
                                Create Child
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 