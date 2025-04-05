@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Character</div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <h4>Choose Character Type</h4>
                        <p>Select the type of character you want to create</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Guardian</h5>
                                    <p class="card-text">Create a guardian character who protects children</p>
                                    <a href="{{ route('characters.create_guardian') }}" class="btn btn-primary">Create Guardian</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Child</h5>
                                    <p class="card-text">Create a child character who needs protection</p>
                                    <a href="{{ route('characters.create_child') }}" class="btn btn-success">Create Child</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 