<footer class="site-footer">
  <div class="container">
    <div class="footer-content">
      <div class="footer-brand">
        <h1>KAI៚</h1>
        <p class="footer-tagline">Creating amazing experiences</p>
      </div>
      
      <div class="footer-social">
        <a href="https://www.facebook.com/kai.742591" style="text-decoration: none" target="_blank" class="social-link">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://youtube.com" style="text-decoration: none" target="_blank" class="social-link">
          <i class="fab fa-youtube"></i>
        </a>
        <a href="https://twitter.com" style="text-decoration: none" target="_blank" class="social-link">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://instagram.com" style="text-decoration: none" target="_blank" class="social-link">
          <i class="fab fa-instagram"></i>
        </a>
      </div>
    </div>
    
    <div class="footer-bottom">
      <p class="copyright">
        Copyright &copy; <span class="year">2022</span> Your Website. All rights reserved.
      </p>
    </div>
  </div>
</footer>
<style>
    /* Modern Footer Styles */
    .site-footer {
      background: linear-gradient(135deg, #1e1e1e 0%, #2a2a2a 100%);
      padding: 3rem 0 1.5rem;
      color: #fff;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      position: relative;
      overflow: hidden;
    }

    .site-footer::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg, #3b5998, #ff0000, #1DA1F2, #E1306C);
      background-size: 300% 300%;
      animation: gradientBG 8s ease infinite;
    }

    @keyframes gradientBG {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      position: relative;
      z-index: 1;
    }

    .footer-content {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }

    .footer-brand {
      margin-bottom: 1.5rem;
    }

    .footer-logo {
      height: 40px;
      margin-bottom: 10px;
      filter: brightness(0) invert(1);
      transition: transform 0.3s ease;
    }

    .footer-logo:hover {
      transform: scale(1.05);
    }

    .footer-tagline {
      color: rgba(255,255,255,0.7);
      font-size: 0.9rem;
      margin: 0;
    }

    .footer-social {
      display: flex;
      gap: 15px;
    }

    .social-link {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: rgba(255,255,255,0.1);
      color: white;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .social-link:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .social-link:nth-child(1):hover { background: #3b5998; } /* FB */
    .social-link:nth-child(2):hover { background: #ff0000; } /* YouTube */
    .social-link:nth-child(3):hover { background: #1DA1F2; } /* Twitter */
    .social-link:nth-child(4):hover { background: #E1306C; } /* Instagram */

    .footer-bottom {
      text-align: center;
      padding-top: 1.5rem;
      border-top: 1px solid rgba(255,255,255,0.1);
    }

    .copyright {
      color: rgba(255,255,255,0.6);
      font-size: 0.85rem;
      margin: 0;
    }

    .year {
      color: #fff;
      font-weight: 600;
    }

    /* Floating decoration elements */
    .site-footer::after {
      content: '';
      position: absolute;
      width: 200px;
      height: 200px;
      background: radial-gradient(circle, rgba(255,255,255,0.03) 0%, transparent 70%);
      top: -100px;
      right: -100px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .footer-content {
        flex-direction: column;
        text-align: center;
      }
      
      .footer-social {
        margin-top: 1rem;
      }
    }
</style>

<script>
// Auto-update year
document.querySelector('.year').textContent = new Date().getFullYear();
</script>