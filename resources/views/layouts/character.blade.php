<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sul Guardian Project</title>
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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Loading Animation Styles */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #000;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.5s ease-out;
        }

        .loading-screen.fade-out {
            opacity: 0;
            pointer-events: none;
        }

        .loading-text {
            color: #fff;
            font-size: 3rem;
            font-weight: bold;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease, transform 1s ease;
        }

        .loading-text.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .loading-line {
            width: 0;
            height: 3px;
            background-color: #fff;
            margin-top: 20px;
            transition: width 1.5s ease;
        }

        .loading-line.visible {
            width: 200px;
        }

        .navbar {
            background-color: var(--white);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid var(--medium-gray);
            width: 100% !important;
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
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            flex: 1;
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
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-text" id="loadingText">Sul Guardian Project</div>
        <div class="loading-line" id="loadingLine"></div>
    </div>

    <!-- Navigation -->
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

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Sul Guardian Project. All rights reserved.</p>
        </div>
    </footer>

    <!-- Loading Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loadingScreen = document.getElementById('loadingScreen');
            const loadingText = document.getElementById('loadingText');
            const loadingLine = document.getElementById('loadingLine');
            
            // Show the loading screen
            loadingScreen.style.display = 'flex';
            
            // Trigger animations after a short delay
            setTimeout(() => {
                loadingText.classList.add('visible');
                
                // Trigger line animation after text appears
                setTimeout(() => {
                    loadingLine.classList.add('visible');
                    
                    // Hide loading screen after animations complete
                    setTimeout(() => {
                        loadingScreen.classList.add('fade-out');
                        
                        // Remove from DOM after fade out
                        setTimeout(() => {
                            loadingScreen.style.display = 'none';
                        }, 500);
                    }, 2000);
                }, 500);
            }, 300);
        });
    </script>
</body>
</html> 