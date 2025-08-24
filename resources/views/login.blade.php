<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Modern Login Page" />
    <meta name="author" content="" />
    <title>Neon Login</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
      :root {
        --primary-color: #6c5ce7;
        --secondary-color: #a29bfe;
        --accent-color: #00cec9;
        --dark-color: #2d3436;
        --light-color: #f8f9fa;
        --neon-glow: 0 0 10px rgba(108, 92, 231, 0.8);
      }
      
      body {
        background: linear-gradient(135deg, #2d3436 0%, #000000 100%);
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
        color: var(--light-color);
        overflow-x: hidden;
      }
      
      .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: rgba(45, 52, 54, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
      }
      
      .card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.6);
      }
      
      .card h3 {
        color: white;
        font-weight: 700;
        margin-bottom: 2rem;
        text-align: center;
        position: relative;
        font-size: 2rem;
        text-transform: uppercase;
        letter-spacing: 3px;
      }
      
      .card h3::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 3px;
        background: var(--accent-color);
        border-radius: 3px;
      }
      
      .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 10px;
        padding: 15px 20px;
        transition: all 0.3s;
        color: white;
      }
      
      .form-control::placeholder {
        color: rgba(255, 255, 255, 0.5);
      }
      
      .form-control:focus {
        background: rgba(255, 255, 255, 0.2);
        border-color: var(--accent-color);
        box-shadow: var(--neon-glow);
        color: white;
      }
      
      .btn-primary {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        border: none;
        border-radius: 50px;
        padding: 12px 20px;
        width: 100%;
        font-weight: 600;
        letter-spacing: 1px;
        transition: all 0.4s;
        text-transform: uppercase;
        position: relative;
        overflow: hidden;
        z-index: 1;
      }
      
      .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
        transition: all 0.4s;
        z-index: -1;
      }
      
      .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
      }
      
      .btn-primary:hover::before {
        left: 0;
      }
      
      .invalid-feedback {
        margin-top: 5px;
        font-size: 0.85rem;
        color: #ff7675;
      }
      
      .text-muted {
        color: rgba(255, 255, 255, 0.6) !important;
      }
      
      a {
        color: var(--accent-color) !important;
        text-decoration: none;
        transition: all 0.3s;
        font-weight: 500;
      }
      
      a:hover {
        text-shadow: 0 0 10px var(--accent-color);
      }
      
      /* Floating particles */
      .particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        overflow: hidden;
      }
      
      .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        filter: blur(1px);
        animation: float linear infinite;
      }
      
      @keyframes float {
        0% {
          transform: translateY(0) rotate(0deg);
          opacity: 1;
        }
        100% {
          transform: translateY(-1000px) rotate(720deg);
          opacity: 0;
        }
      }
      
      /* Neon border animation */
      .neon-border {
        position: relative;
      }
      
      .neon-border::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        z-index: -1;
        background: linear-gradient(45deg, #6c5ce7, #00cec9, #6c5ce7);
        background-size: 200%;
        border-radius: 20px;
        opacity: 0;
        transition: 0.5s;
        animation: neon 3s linear infinite;
      }
      
      .neon-border:hover::before {
        opacity: 1;
        box-shadow: 0 0 15px var(--primary-color);
      }
      
      @keyframes neon {
        0% {
          background-position: 0% 50%;
        }
        50% {
          background-position: 100% 50%;
        }
        100% {
          background-position: 0% 50%;
        }
      }
      
      /* Responsive adjustments */
      @media (max-width: 576px) {
        .card {
          padding: 1.5rem;
          width: 90% !important;
        }
      }
      
      /* Custom checkbox */
      .form-check-input {
        background-color: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
      }
      
      .form-check-input:checked {
        background-color: var(--accent-color);
        border-color: var(--accent-color);
      }
      
      .form-check-label {
        color: rgba(255, 255, 255, 0.7);
      }
      
      /* Password toggle */
      .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: rgba(255, 255, 255, 0.5);
        transition: all 0.3s;
      }
      
      .password-toggle:hover {
        color: var(--accent-color);
      }
    </style>
  </head>
  <body>
    <!-- Floating particles background -->
    <div class="particles" id="particles"></div>
    
    <!-- Page content -->
    <div class="d-flex justify-content-center align-items-center min-vh-100 p-3">
      <div class="card p-4 w-100 neon-border animate__animated animate__fadeIn" style="max-width: 420px;">
        <h3 class="animate__animated animate__fadeInDown">Login</h3>
        <form method="POST" action="{{ route('authenticate')}}">
          @csrf
          <div class="mb-4 animate__animated animate__fadeIn animate__delay-1s">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email')}}" placeholder="Enter your email"/>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-4 animate__animated animate__fadeIn animate__delay-2s">
            <label for="password" class="form-label">Password</label>
            <div class="position-relative">
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password"/>
              <i class="fas fa-eye password-toggle" id="togglePassword"></i>
            </div>
          </div>
          
          <div class="mb-4 form-check animate__animated animate__fadeIn animate__delay-2s">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
          </div>
          
          <button type="submit" class="btn btn-primary mb-3 animate__animated animate__fadeIn animate__delay-3s">Sign In</button>
          
          <div class="text-center text-muted mt-4 animate__animated animate__fadeIn animate__delay-4s">
            <small>Don't have an account? <a href="#">Sign up</a></small><br>
            <small><a href="#">Forgot password?</a></small>
          </div>
        </form>
      </div>
    </div>

    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
      // Password toggle
      const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#password');
      
      togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
      });
      
      // Create floating particles
      function createParticles() {
        const particlesContainer = document.getElementById('particles');
        const particleCount = 30;
        
        for (let i = 0; i < particleCount; i++) {
          const particle = document.createElement('div');
          particle.classList.add('particle');
          
          // Random size between 2px and 6px
          const size = Math.random() * 4 + 2;
          particle.style.width = `${size}px`;
          particle.style.height = `${size}px`;
          
          // Random position
          particle.style.left = `${Math.random() * 100}vw`;
          particle.style.bottom = `-${size}px`;
          
          // Random animation duration between 10s and 20s
          const duration = Math.random() * 10 + 10;
          particle.style.animationDuration = `${duration}s`;
          
          // Random delay
          particle.style.animationDelay = `${Math.random() * 10}s`;
          
          particlesContainer.appendChild(particle);
        }
      }
      
      // Initialize particles when page loads
      window.addEventListener('load', createParticles);
      
      // Add hover effect to card
      const card = document.querySelector('.card');
      card.addEventListener('mouseenter', () => {
        card.classList.add('animate__pulse');
      });
      
      card.addEventListener('mouseleave', () => {
        card.classList.remove('animate__pulse');
      });
    </script>
  </body>
</html>