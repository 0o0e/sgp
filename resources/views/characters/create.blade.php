@extends('layouts.app')

@section('content')
<style>
    .create-character-container {
        padding: 3rem 0;
        min-height: 100vh;
    }

    .character-card {
        background: #FFFFFF;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(126, 124, 217, 0.2);
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .character-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .character-header {
        background: linear-gradient(135deg, #7E7CD9, #B8EFF5);
        color: white;
        padding: 2.5rem;
        text-align: center;
        border-radius: 20px 20px 0 0;
    }

    .character-title {
        font-family: 'Cinzel', serif;
        font-size: 2.8rem;
        margin-bottom: 1rem;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        letter-spacing: 1px;
    }

    .character-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        letter-spacing: 0.5px;
    }

    .character-options {
        padding: 3rem;
    }

    .option-card {
        background: white;
        border-radius: 15px;
        padding: 2.5rem;
        text-align: center;
        transition: all 0.3s ease;
        border: 1px solid rgba(126, 124, 217, 0.2);
        height: 100%;
        position: relative;
    }

    .option-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .option-title {
        font-family: 'Cinzel', serif;
        color: #7E7CD9;
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        letter-spacing: 1px;
    }

    .option-description {
        color: #666;
        margin-bottom: 2rem;
        line-height: 1.8;
        font-size: 1.1rem;
    }

    .btn-create {
        padding: 1rem 2.5rem;
        border-radius: 30px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .btn-guardian {
        background: linear-gradient(135deg, #7E7CD9, #AC99F2);
        color: white;
        border: none;
    }

    .btn-child {
        background: linear-gradient(135deg, #B8EFF5, #DBFFF3);
        color: #7E7CD9;
        border: none;
    }

    .btn-create:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
</style>

<div class="create-character-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="character-card">
                    <div class="character-header">
                        <h1 class="character-title">Create Your OC</h1>
                        <p class="character-subtitle">Choose what kid of OC you want to add</p>
                    </div>

                    <div class="character-options">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="option-card">
                                    <h3 class="option-title">Guardian</h3>
                                    <p class="option-description">Create a guardian and protect a child.</p>
                                    <a href="{{ route('characters.create_guardian') }}" class="btn btn-create btn-guardian">Create Guardian</a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="option-card">
                                    <h3 class="option-title">Child</h3>
                                    <p class="option-description">Create a child who needs protection from a guide on their path to adulthood.</p>
                                    <a href="{{ route('characters.create_child') }}" class="btn btn-create btn-child">Create Child</a>
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