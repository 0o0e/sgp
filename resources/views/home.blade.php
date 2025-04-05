@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="hero">
    <style>
        :root {
            --light-cyan: #DBFFF3;
            --diamond: #B8EFF5;
            --lavender-blue: #C3BFFF;
            --max-blue-purple: #AC99F2;
            --violet-blue: #7E7CD9;
            --white: #FFFFFF;
            --light-gray: #F5F5F7;
            --medium-gray: #E0E0E0;
            --dark-gray: #333333;
        }

        .hero {
            position: relative;
            height: 80vh;
            background: linear-gradient(rgba(126, 124, 217, 0.3), rgba(184, 239, 245, 0.3)),
                        url('https://images.unsplash.com/photo-1518709268805-4e9042af9f23?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin: -2rem -2rem 2rem -2rem;
            padding: 2rem;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(126, 124, 217, 0.1), rgba(184, 239, 245, 0.1));
            z-index: 1;
            pointer-events: none;
        }

        .hero-content {
            max-width: 800px;
            position: relative;
            z-index: 2;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--medium-gray);
            backdrop-filter: blur(10px);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .hero-content:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .hero-title {
            font-family: 'Cinzel', serif;
            font-size: 3.5rem;
            color: var(--violet-blue);
            margin-bottom: 1rem;
            text-shadow: 0 0 15px rgba(126, 124, 217, 0.3);
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: var(--dark-gray);
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .featured-section {
            margin-top: 4rem;
            padding: 0 2rem;
        }

        .section-title {
            font-family: 'Cinzel', serif;
            font-size: 2rem;
            color: var(--violet-blue);
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 2px;
            background-color: var(--violet-blue);
            box-shadow: 0 0 10px rgba(126, 124, 217, 0.3);
        }

        .featured-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .featured-card {
            background-color: var(--white);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.5s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--medium-gray);
            height: 100%;
        }

        .featured-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border-color: rgba(126, 124, 217, 0.3);
        }

        .featured-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .featured-card:hover .featured-image {
            transform: scale(1.1);
        }

        .featured-content {
            padding: 1.5rem;
        }

        .featured-title {
            font-family: 'Cinzel', serif;
            color: var(--violet-blue);
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
        }

        .featured-text {
            color: var(--dark-gray);
            opacity: 0.8;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 2rem;
            background-color: rgba(126, 124, 217, 0.1);
            color: var(--violet-blue);
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(126, 124, 217, 0.3);
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn:hover {
            background-color: rgba(126, 124, 217, 0.2);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(126, 124, 217, 0.2);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
            
            .featured-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="hero-content">
        <h1 class="hero-title">Soul Guardian Project</h1>
        <p class="hero-subtitle">After death, most would have thought that you'd wake up in the afterlife, right? Well, sorry to disappoint but you must first earn the right to enter into that peaceful eternal bliss. You must now protect the children as their guardians and make sure that they make it safely to adulthood.</p>
        <a href="/characters/create" class="btn">Create Your Character</a>
    </div>
</div>

<div class="featured-section">
    <h2 class="section-title">Explore the World</h2>
    <div class="featured-grid">
        <div class="featured-card">
            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Lore" class="featured-image">
            <div class="featured-content">
                <h3 class="featured-title">World Lore</h3>
                <p class="featured-text">Discover the rich history and mythology of the Soul Guardian world.</p>
                <a href="/lore" class="btn">Read More</a>
            </div>
        </div>

        <div class="featured-card">
            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Characters" class="featured-image">
            <div class="featured-content">
                <h3 class="featured-title">Characters</h3>
                <p class="featured-text">Meet the guardians and children of the Soul Guardian world.</p>
                <a href="/characters" class="btn">View Characters</a>
            </div>
        </div>

        <div class="featured-card">
            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Fanart" class="featured-image">
            <div class="featured-content">
                <h3 class="featured-title">Fanart Gallery</h3>
                <p class="featured-text">Browse and share amazing fanart of your favorite characters.</p>
                <a href="/fanart" class="btn">View Gallery</a>
            </div>
        </div>
    </div>
</div>
@endsection 