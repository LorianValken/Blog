<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kai Website</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #0f172a;
            --primary-blue: #1e40af;
            --primary-light: #e2e8f0;
            --accent-blue: #3b82f6;
            --accent-purple: #8b5cf6;
            --glass-bg: rgba(15, 23, 42, 0.92);
            --glass-border: rgba(255, 255, 255, 0.15);
            --neon-glow: 0 0 10px rgba(59, 130, 246, 0.7), 0 0 20px rgba(59, 130, 246, 0.5);
        }

        /* Navbar styling */
        nav.navbar {
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--glass-border);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.4);
            padding: 1rem 2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 9999;
            border-image: linear-gradient(90deg, transparent, var(--glass-border), transparent) 1;
        }

        .navbar.scrolled {
            padding: 0.7rem 2rem;
            background: rgba(15, 23, 42, 0.98);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            letter-spacing: 1px;
            transition: all 0.4s ease;
            text-shadow: var(--neon-glow);
            font-family: 'Poppins', sans-serif;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            text-shadow: 0 0 20px rgba(59, 130, 246, 0.8);
        }

        .navbar-brand::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple));
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            box-shadow: var(--neon-glow);
        }

        .navbar-brand:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        /* Nav links with holographic effect */
        .nav-link {
            font-weight: 600;
            padding: 0.6rem 1.4rem !important;
            margin: 0 0.4rem;
            border-radius: 0.75rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            color: var(--primary-light) !important;
            letter-spacing: 0.8px;
            font-family: 'Inter', sans-serif;
            text-transform: uppercase;
            font-size: 0.85rem;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.2), transparent);
            transition: all 0.6s ease;
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple));
            transition: all 0.4s ease;
            border-radius: 2px;
            box-shadow: var(--neon-glow);
        }

        .nav-link:hover::after {
            width: 70%;
        }

        .nav-link.active {
            background: rgba(59, 130, 246, 0.25);
            box-shadow: inset 0 0 15px rgba(59, 130, 246, 0.3);
        }

        .nav-link.active::after {
            width: 70%;
        }

        /* Futuristic dropdown menu */
        .dropdown-menu {
            border: none;
            background: rgba(15, 23, 42, 0.98);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 1rem;
            overflow: hidden;
            margin-top: 0.5rem;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            transform-origin: top center;
            animation: dropdownFadeIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            padding: 0.5rem;
        }

        @keyframes dropdownFadeIn {
            from {
                opacity: 0;
                transform: translateY(-15px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .dropdown-item {
            color: var(--primary-light);
            padding: 0.8rem 1.5rem;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            border-radius: 0.75rem;
            margin: 0.2rem 0;
            font-size: 0.9rem;
        }

        .dropdown-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.3), transparent);
            transition: all 0.6s ease;
        }

        .dropdown-item:hover {
            background: rgba(59, 130, 246, 0.15);
            color: white;
            padding-left: 1.8rem;
            transform: translateX(5px);
        }

        .dropdown-item:hover::before {
            left: 100%;
        }

        .dropdown-item i {
            width: 20px;
            text-align: center;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover i {
            transform: scale(1.2);
            color: var(--accent-blue);
        }

        .dropdown-divider {
            border-color: rgba(255, 255, 255, 0.1);
            margin: 0.5rem 1rem;
        }

        /* Cyberpunk buttons */
        .btn-outline-light {
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            z-index: 1;
            text-transform: uppercase;
            font-size: 0.8rem;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            background: transparent;
        }

        .btn-outline-light::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple));
            transition: all 0.5s ease;
            z-index: -1;
        }

        .btn-outline-light:hover {
            border-color: transparent;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4);
            color: white;
        }

        .btn-outline-light:hover::before {
            width: 100%;
        }

        .btn-primary {
            background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple));
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(59, 130, 246, 0.5);
            text-transform: uppercase;
            font-size: 0.8rem;
            padding: 0.6rem 1.8rem;
            border-radius: 50px;
            z-index: 1;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.7);
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, var(--accent-purple), var(--accent-blue));
            opacity: 0;
            transition: all 0.6s ease;
            z-index: -1;
        }

        .btn-primary:hover::after {
            opacity: 1;
        }

        /* Holographic toggler button */
        .navbar-toggler {
            border: 1px solid rgba(59, 130, 246, 0.5);
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        .navbar-toggler:hover {
            box-shadow: var(--neon-glow);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(59, 130, 246, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
            transition: all 0.3s ease;
        }

        .navbar-toggler:hover .navbar-toggler-icon {
            transform: scale(1.1);
        }

        /* Responsive adjustments */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                padding: 1.5rem;
                border-radius: 1rem;
                margin-top: 1rem;
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            }

            .nav-item {
                margin: 0.6rem 0;
            }

            .nav-link {
                padding: 0.8rem 1.5rem !important;
                text-align: center;
            }

            .dropdown-menu {
                background: rgba(30, 41, 59, 0.98);
                margin-left: 1.5rem;
                width: calc(100% - 3rem);
                box-shadow: none;
            }

            .btn-outline-light, .btn-primary {
                width: 100%;
                margin-top: 1rem;
                text-align: center;
            }
        }

        /* Animation for navbar */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar {
            animation: fadeInDown 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        /* Scroll behavior */
        html {
            scroll-padding-top: 80px;
        }

        body {
            padding-top: 80px;
            background-color: var(--primary-dark);
            color: var(--primary-light);
            font-family: 'Inter', sans-serif;
        }

        /* Particle background effect for navbar */
        .navbar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 30%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 70%, rgba(139, 92, 246, 0.1) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        /* Logout confirmation modal styling */
        .swal2-popup {
            background: var(--glass-bg) !important;
            backdrop-filter: blur(20px) !important;
            -webkit-backdrop-filter: blur(20px) !important;
            border: 1px solid var(--glass-border) !important;
            color: var(--primary-light) !important;
            border-radius: 1rem !important;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5) !important;
        }

        .swal2-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: var(--neon-glow);
        }

        .swal2-content {
            color: var(--primary-light) !important;
            font-size: 1.1rem !important;
        }

        .swal2-confirm {
            background: linear-gradient(90deg, var(--accent-blue), var(--accent-purple)) !important;
            border: none !important;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.5) !important;
            transition: all 0.3s ease !important;
        }

        .swal2-confirm:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.7) !important;
        }

        .swal2-cancel {
            background: transparent !important;
            border: 1px solid var(--glass-border) !important;
            color: var(--primary-light) !important;
            transition: all 0.3s ease !important;
        }

        .swal2-cancel:hover {
            background: rgba(255, 255, 255, 0.05) !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{route('home')}}">KAI៚</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    @foreach ($navbar_categories as $navbar_category)
                    <li class="nav-item">
                        <a class="nav-link position-relative {{ request('category_id') == $navbar_category->id ? 'active' : '' }}" 
                           href="{{route('home', ['category_id' => $navbar_category->id])}}">
                            {{$navbar_category->name}}
                        </a>
                    </li>
                    @endforeach

                    @if(auth()->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cog me-2"></i> MANAGE
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('admin.category.index') }}"><i class="fas fa-list me-2"></i>Categories</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.tag.index') }}"><i class="fas fa-tags me-2"></i>Tags</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="{{ route('admin.post.index') }}"><i class="fas fa-newspaper me-2"></i>Posts</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                            @csrf
                            <button class="btn btn-outline-light btn-sm px-4" type="button" onclick="confirmLogout()">
                                <i class="fas fa-sign-out-alt me-1"></i> LOGOUT
                            </button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-sm px-4" href="{{route('login')}}">
                            <i class="fas fa-sign-in-alt me-1"></i> LOGIN
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <script>
        // Enhanced navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 20) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Advanced logout confirmation
        function confirmLogout() {
            Swal.fire({
                title: 'LOGOUT CONFIRMATION',
                text: "Are you sure you want to logout from your session?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'CONFIRM LOGOUT',
                cancelButtonText: 'CANCEL',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary mx-2',
                    cancelButton: 'btn btn-outline-light mx-2'
                },
                showClass: {
                    popup: 'animate__animated animate__fadeIn animate__faster'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOut animate__faster'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                }
            });
        }

        // Add staggered animation to dropdown items
        document.querySelectorAll('.dropdown-item').forEach((item, index) => {
            item.style.transitionDelay = `${index * 0.07}s`;
        });

        // Add ripple effect to buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const x = e.clientX - e.target.getBoundingClientRect().left;
                const y = e.clientY - e.target.getBoundingClientRect().top;
                
                const ripple = document.createElement('span');
                ripple.classList.add('ripple-effect');
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    </script>
</body>
</html>