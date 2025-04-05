<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soul Guardian Project - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">
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
            --text-color: #333333;
            --background-color: #FFFFFF;
            --card-background: #F5F5F7;
            --accent-color: #7E7CD9;
            --secondary-accent: #AC99F2;
            --tertiary-accent: #B8EFF5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: var(--white);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid var(--medium-gray);
        }

        .navbar-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Cinzel', serif;
            font-size: 1.8rem;
            color: var(--violet-blue);
            text-decoration: none;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: var(--dark-gray);
            text-decoration: none;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: var(--violet-blue);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--violet-blue);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .main-content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
            flex: 1;
        }

        .card {
            background-color: var(--white);
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--medium-gray);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-family: 'Cinzel', serif;
            color: var(--violet-blue);
            margin-bottom: 1rem;
            font-size: 1.8rem;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background-color: var(--violet-blue);
            color: var(--white);
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .btn:hover {
            background-color: var(--max-blue-purple);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(126, 124, 217, 0.3);
        }

        .btn-secondary {
            background-color: var(--diamond);
            color: var(--dark-gray);
        }

        .btn-secondary:hover {
            background-color: var(--lavender-blue);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark-gray);
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem;
            background-color: var(--white);
            border: 1px solid var(--medium-gray);
            border-radius: 4px;
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--violet-blue);
            box-shadow: 0 0 5px rgba(126, 124, 217, 0.2);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .character-card {
            background-color: var(--white);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--medium-gray);
        }

        .character-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .character-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .character-info {
            padding: 1.5rem;
        }

        .character-name {
            font-family: 'Cinzel', serif;
            color: var(--violet-blue);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .character-type {
            color: var(--dark-gray);
            opacity: 0.8;
            font-size: 0.9rem;
        }

        /* Ethereal elements */
        .ethereal-orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(40px);
            opacity: 0.2;
            z-index: -1;
            animation: orbFloat 20s infinite alternate ease-in-out;
        }

        .orb-1 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, var(--violet-blue), transparent 70%);
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .orb-2 {
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, var(--diamond), transparent 70%);
            top: 60%;
            right: 10%;
            animation-delay: -5s;
        }

        .orb-3 {
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, var(--lavender-blue), transparent 70%);
            bottom: 10%;
            left: 20%;
            animation-delay: -10s;
        }

        @keyframes orbFloat {
            0% {
                transform: translate(0, 0) scale(1);
            }
            100% {
                transform: translate(50px, 30px) scale(1.1);
            }
        }

        /* Sparkles */
        .sparkle {
            position: absolute;
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background-color: var(--diamond);
            animation: sparkle 1.5s infinite;
        }

        @keyframes sparkle {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(0);
                opacity: 0;
            }
        }

        /* Floating particles */
        .floating-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 5px;
            height: 5px;
            background-color: rgba(126, 124, 217, 0.2);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        .particle:nth-child(3n) {
            background-color: rgba(184, 239, 245, 0.2);
        }

        .particle:nth-child(3n+1) {
            background-color: rgba(195, 191, 255, 0.2);
        }

        .particle:nth-child(3n+2) {
            background-color: rgba(172, 153, 242, 0.2);
        }

        @keyframes float {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(100px);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="ethereal-orb orb-1"></div>
    <div class="ethereal-orb orb-2"></div>
    <div class="ethereal-orb orb-3"></div>
    <div class="floating-particles" id="particles"></div>

    <nav class="navbar">
        <div class="navbar-content">
            <a href="/" class="logo">Soul Guardian Project</a>
            <div class="nav-links">
                <a href="/lore">Lore</a>
                <a href="/characters">Characters</a>
                <a href="/characters/create">Create Character</a>
                <a href="/fanart">Fanart</a>
            </div>
        </div>
    </nav>

    <main class="main-content">
        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Create floating particles
            const particlesContainer = document.getElementById('particles');
            const particleCount = 30;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random position
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                
                // Random size
                const size = Math.random() * 5 + 2;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                
                // Random animation duration
                const duration = Math.random() * 20 + 10;
                particle.style.animationDuration = duration + 's';
                
                // Random delay
                const delay = Math.random() * 10;
                particle.style.animationDelay = delay + 's';
                
                particlesContainer.appendChild(particle);
            }
            
            // Create sparkles
            const sections = document.querySelectorAll('.card, .character-card');
            sections.forEach(section => {
                for (let i = 0; i < 5; i++) {
                    const sparkle = document.createElement('div');
                    sparkle.classList.add('sparkle');
                    
                    // Random position
                    sparkle.style.left = Math.random() * 100 + '%';
                    sparkle.style.top = Math.random() * 100 + '%';
                    
                    // Random animation delay
                    const delay = Math.random() * 2;
                    sparkle.style.animationDelay = delay + 's';
                    
                    section.appendChild(sparkle);
                }
            });
        });
    </script>
</body>
</html> 