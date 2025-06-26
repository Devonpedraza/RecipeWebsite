<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Easy Meals</title>
    <link rel="icon" href="{{ asset('images/icons8-hamburger-64.png') }}" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="bg-white shadow sticky top-0 z-50 mt-0">
        <div class="container mx-auto px-1 flex flex-wrap items-center justify-between py-3">
            <a href="/" class="nav-brand text-2xl sm:text-2xl md:text-3xl lg:text-5xl font-kaushan flex items-center gap-2 whitespace-nowrap">
                Easy Meals
                <i class="bi bi-fork-knife text-lg sm:text-xl md:text-3xl lg:text-4xl"></i>
            </a>
            <!-- Hamburger button -->
            <button id="nav-toggle" class="block lg:hidden text-gray-700 focus:outline-none ml-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Nav menu -->
            <div id="nav-menu" class="menu-closed transition-all w-full flex-col lg:flex lg:flex-row lg:items-center lg:justify-between lg:w-auto lg:space-x-8 lg:space-y-0 hidden lg:flex">
                <ul class="flex flex-col lg:flex-row flex-1 justify-center items-center space-y-2 lg:space-y-0 lg:space-x-8">
                    <li><a href="/" class="nav-underline font-kaushan block px-2 text-lg">Home</a></li>
                    <li><a href="/recipes" class="nav-underline font-kaushan block px-2 text-lg">Browse Recipes</a></li>
                    @auth
                    <li><a href="/myrecipes" class="nav-underline font-kaushan block px-2 text-lg">My Recipes</a></li>
                    @endauth
                    <li><a href="/about" class="nav-underline font-kaushan block px-2 text-lg">About</a></li>
                </ul>
                <ul class="flex flex-col lg:flex-row items-center justify-end space-y-2 lg:space-y-0">
                    @guest
                    <li><a href="/register" class="nav-underline font-kaushan block px-3 text-lg">Register</a></li>
                    <li><a href="/login" class="nav-underline font-kaushan block px-3 text-lg border-t border-gray-200 lg:border-t-0 lg:border-l lg:border-gray-300">Login</a></li>
                    @endguest

                    @auth
                    <li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="nav-underline font-kaushan block px-3 text-lg border-t border-gray-200 lg:border-t-0 lg:border-l lg:border-gray-30" >Logout</button>
                    </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const navToggle = document.getElementById('nav-toggle');
                const navMenu = document.getElementById('nav-menu');

                navToggle.addEventListener('click', function() {
                    if (navMenu.classList.contains('menu-closed')) {
                        navMenu.classList.remove('menu-closed');
                        navMenu.classList.add('menu-open');
                    } else {
                        navMenu.classList.remove('menu-open');
                        navMenu.classList.add('menu-closed');
                    }
                });

                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 1024) {
                        navMenu.classList.remove('menu-open', 'menu-closed');
                    } else {
                        if (!navMenu.classList.contains('menu-closed')) {
                            navMenu.classList.add('menu-closed');
                        }
                    }
                });
            });

        </script>

    </nav>



    <main class="container my-5" style="max-width: 1200px; padding: 0 1rem;">
        {{ $slot }}
    </main>



    <!-- Footer -->
    <div class="container">
        <footer class="footer d-flex flex-wrap justify-content-between align-items-center py-3 my-3 border-top">
            <p class="col-md-4 mb-0">
                © 2025 Easy <span>Meals</span>, Inc
            </p>
            <a href="index.html" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none" aria-label="Bootstrap">Easy <span> Meals <i class="bi bi-fork-knife"></i></span></a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item">
                    <a href="/" class="nav-link px-3">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/recipes" class="nav-link px-3">Browse recipes</a>
                </li>
                <li class="nav-item">
                    <a href="/myrecipes" class="nav-link px-3">My Recipes</a>
                </li>
                <li class="nav-item">
                    <a href="/about" class="nav-link px-3">About</a>
                </li>
            </ul>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
