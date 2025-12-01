<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Royal Fresh – Subscription</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <style>
    :root {
      --primary-brown: #62451c;
      --light-brown: #f7ecdc;
      --accent-brown: #baa0683b;
      --dark-brown: #3d2b10;
      --cream: #fff9f0;
      --gold: #c8a97e;
      --shadow-sm: 0 2px 12px rgba(98, 69, 28, 0.08);
      --shadow-md: 0 4px 20px rgba(98, 69, 28, 0.12);
      --shadow-lg: 0 8px 30px rgba(98, 69, 28, 0.15);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: var(--cream);
      color: var(--dark-brown);
      line-height: 1.6;
      overflow-x: hidden;
    }

    /* === Premium Header === */
    header {
      background: rgba(255, 249, 240, 0.95);
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      box-shadow: var(--shadow-sm);
      padding: 1rem 4vw;
      transition: all 0.3s ease;
    }

    header.scrolled {
      padding: 0.7rem 4vw;
      background: rgba(255, 249, 240, 0.98);
      backdrop-filter: blur(10px);
    }

    .header-container {
      max-width: 1400px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 1.5rem;
    }

    .logo {
      display: flex;
      align-items: center;
      font-weight: 700;
      letter-spacing: 1px;
      color: var(--primary-brown);
      font-size: 1.6rem;
      font-family: 'Playfair Display', serif;
    }

    .logo img {
      height: 42px;
      margin-right: 12px;
      filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    .logo-text {
      display: inline;
    }

    .nav-links {
      display: flex;
      gap: 2rem;
      align-items: center;
      flex-wrap: wrap;
      justify-content: center;
    }

    .nav-links a {
      text-decoration: none;
      color: var(--dark-brown);
      font-size: 1.05rem;
      font-weight: 500;
      transition: all 0.3s;
      padding: 0.5rem 0;
      position: relative;
    }

    .nav-links a:hover {
      color: var(--primary-brown);
    }

    .nav-links a::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: var(--primary-brown);
      transition: width 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .nav-links a:hover::after {
      width: 100%;
    }

    .search-container {
      flex: 1;
      min-width: 240px;
      max-width: 360px;
      margin: 0 1.5rem;
      position: relative;
    }

    #searchInput {
      width: 100%;
      padding: 0.8rem 1.2rem 0.8rem 3rem;
      border-radius: 30px;
      border: 1px solid var(--light-brown);
      font-size: 1rem;
      outline: none;
      transition: all 0.3s;
      box-shadow: var(--shadow-sm);
      background: white;
    }

    #searchInput:focus {
      border-color: var(--gold);
      box-shadow: 0 4px 15px rgba(200, 169, 126, 0.2);
    }

    .search-icon {
      position: absolute;
      left: 1.2rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--primary-brown);
      font-size: 1.1rem;
    }

    /* Mobile Menu Styles */
    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      font-size: 1.5rem;
      color: var(--primary-brown);
      cursor: pointer;
      padding: 0.5rem;
      z-index: 1001;
    }

    .side-nav {
      position: fixed;
      top: 0;
      right: -100%;
      left: auto;
      width: 280px;
      height: 100vh;
      background: var(--cream);
      z-index: 1001;
      transition: right 0.3s ease;
      box-shadow: var(--shadow-lg);
      display: flex;
      flex-direction: column;
      padding: 5rem 2rem 2rem;
    }

    .side-nav.open {
      right: 0;
    }

    .side-nav-header {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 2rem;
      padding-bottom: 1rem;
      border-bottom: 1px solid var(--light-brown);
    }

    .close-btn {
      background: none;
      border: none;
      font-size: 1.5rem;
      color: var(--primary-brown);
      cursor: pointer;
      padding: 0.5rem;
      border-radius: 50%;
      transition: background 0.3s;
    }

    .close-btn:hover {
      background: var(--light-brown);
    }

    .side-nav-links {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .side-nav-links a {
      text-decoration: none;
      color: var(--dark-brown);
      font-size: 1.1rem;
      font-weight: 500;
      padding: 0.8rem 0;
      position: relative;
      transition: color 0.3s;
    }

    .side-nav-links a:hover {
      color: var(--primary-brown);
    }

    .side-nav-links a::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: var(--primary-brown);
      transition: width 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .side-nav-links a:hover::after {
      width: 100%;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1000;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }

    .overlay.active {
      opacity: 1;
      visibility: visible;
    }

    /* === Subscription Section === */
    .subscriptions {
      padding: 8rem 4vw 6rem;
      background: white;
      position: relative;
      text-align: center;
    }

    .section-title {
      font-size: clamp(2rem, 4vw, 3rem);
      margin-bottom: 1rem;
      color: var(--primary-brown);
      font-family: 'Playfair Display', serif;
      position: relative;
      padding-bottom: 20px;
    }

    .section-title::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 3px;
      background: var(--gold);
    }

    .section-subtitle {
      color: #666;
      margin-bottom: 4rem;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
      font-size: 1.1rem;
    }

    .subscription-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 3rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .sub-card {
      background: white;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: var(--shadow-sm);
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 2.5rem 2rem;
      position: relative;
      border: 1px solid rgba(232, 225, 213, 0.5);
      cursor: pointer;
      text-decoration: none;
      color: inherit;
    }

    .sub-card:hover {
      transform: translateY(-12px);
      box-shadow: var(--shadow-lg);
    }

    .sub-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 5px;
      background: linear-gradient(90deg, var(--primary-brown), var(--gold));
      transform: scaleX(0);
      transition: transform 0.5s;
    }

    .sub-card:hover::before {
      transform: scaleX(1);
    }

    .sub-image {
      width: 140px;
      height: 140px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 1.5rem;
      border: 3px solid var(--light-brown);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      transition: all 0.3s;
    }

    .sub-card:hover .sub-image {
      transform: scale(1.05);
      border-color: var(--gold);
    }

    .sub-title {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 1rem;
      color: var(--dark-brown);
      text-align: center;
    }

    .sub-desc {
      color: #666;
      margin-bottom: 2rem;
      text-align: center;
      line-height: 1.6;
    }

    .sub-btn {
      background: var(--primary-brown);
      color: white;
      border: none;
      border-radius: 25px;
      padding: 0.8rem 2rem;
      cursor: pointer;
      font-size: 1rem;
      font-weight: 500;
      transition: all 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      box-shadow: 0 4px 10px rgba(98, 69, 28, 0.2);
      margin-top: auto;
    }

    .sub-btn:hover {
      background: var(--dark-brown);
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(98, 69, 28, 0.3);
    }

    .dropdown {
      position: relative;
      display: inline-flex;
      /* Matches flex behavior of <a> in container */
      align-items: center;
      /* Centers like other links */
    }

    .dropdown-toggle {
      text-decoration: none;
      color: var(--dark-brown);
      font-size: 1.05rem;
      font-weight: 500;
      transition: all 0.3s;
      padding: 0.5rem 0;
      /* Exact match to .nav-links a padding */
      position: relative;
      cursor: pointer;
      line-height: 1.2;
      /* Ensures consistent height */
      white-space: nowrap;
      /* Prevents wrapping */
    }

    .dropdown-toggle:hover {
      color: var(--primary-brown);
    }

    .dropdown-toggle::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: var(--primary-brown);
      transition: width 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .dropdown-toggle:hover::after {
      width: 100%;
    }

    .dropdown-menu {
      position: absolute;
      top: 100%;
      /* Drops directly below without gap */
      left: 50%;
      transform: translateX(-50%);
      background: white;
      min-width: 200px;
      border-radius: 10px;
      box-shadow: var(--shadow-lg);
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.3s ease, visibility 0.3s ease;
      z-index: 1001;
      border: 1px solid var(--light-brown);
      margin-top: 0;
      /* No extra space */
      overflow: hidden;
      pointer-events: none;
      /* Prevents interference until shown */
    }

    .dropdown:hover .dropdown-menu {
      opacity: 1;
      visibility: visible;
      pointer-events: auto;
    }

    .dropdown-menu a {
      display: block;
      padding: 0.8rem 1.2rem;
      text-decoration: none;
      color: var(--dark-brown);
      font-size: 0.95rem;
      font-weight: 500;
      transition: all 0.3s;
      white-space: nowrap;
    }

    .dropdown-menu a:hover {
      background: var(--light-brown);
      color: var(--primary-brown);
      padding-left: 1.5rem;
    }

    /* Mobile Dropdown Styles - Unchanged */
    @media (max-width: 768px) {
      .dropdown-mobile {
        position: relative;
      }

      .dropdown-mobile .dropdown-toggle {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
      }

      .dropdown-menu-mobile {
        list-style: none;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        background: var(--light-brown);
        margin-top: 0.5rem;
        border-radius: 5px;
        padding: 0;
      }

      .dropdown-mobile.open .dropdown-menu-mobile {
        max-height: 200px;
      }

      .dropdown-menu-mobile li {
        border-top: 1px solid var(--cream);
      }

      .dropdown-menu-mobile a {
        padding: 1rem 1.5rem;
        display: block;
        color: var(--dark-brown);
        text-decoration: none;
        transition: padding-left 0.3s;
      }

      .dropdown-menu-mobile a:hover {
        background: var(--cream);
        padding-left: 2rem;
      }
    }

    /* === Responsive Overrides === */
    @media (max-width: 1024px) {
      .subscription-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
      }
    }

    @media (max-width: 768px) {
      .header-container {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
      }

      .logo {
        margin-bottom: 0;
      }

      .logo-text {
        display: none;
      }

      .nav-links {
        display: none;
      }

      .search-container {
        display: none;
        /* Hide search on very small screens, or adjust as needed */
      }

      .mobile-menu-btn {
        display: block;
      }

      .subscriptions {
        padding: 6rem 4vw 4rem;
      }

      .subscription-grid {
        grid-template-columns: 1fr;
      }

      .sub-card {
        padding: 2rem 1.5rem;
      }

      .sub-image {
        width: 120px;
        height: 120px;
      }
    }

    @media (max-width: 480px) {
      .subscriptions {
        padding: 5rem 4vw 3rem;
      }

      .sub-card {
        padding: 1.5rem 1rem;
      }

      .sub-image {
        width: 100px;
        height: 100px;
      }

      .side-nav {
        width: 100%;
        right: -100%;
      }
    }
  </style>
</head>

<body>
  <!-- Mobile Side Nav Overlay -->
  <div class="overlay" id="overlay"></div>

  <!-- Mobile Side Nav Panel -->
  <nav class="side-nav" id="sideNav">
    <div class="side-nav-header">
      <button class="close-btn" id="closeBtn">
        <i data-lucide="x"></i>
      </button>
    </div>
    <ul class="side-nav-links">

      <li><a href="/home">Home</a></li>
      <li><a href="/all-products">Products</a></li>
      <!-- New Dropdown Menu for Mobile -->
      <li class="dropdown-mobile">
        <a href="/subscription" class="dropdown-toggle">Subscription <i class="fas fa-chevron-down"></i></a>
        <ul class="dropdown-menu-mobile">
          <li><a href="/milk-subscription">Milk Subscription</a></li>
          <li><a href="/yogurt-subscription">Yogurt Subscription</a></li>
        </ul>
      </li>
      <li><a href="#features">Features</a></li>
      <li><a href="#testimonials">Testimonials</a></li>
      <li><a href="#bags">Premium Bags</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>
  <a class="cart-header" href="/cart" aria-label="Open cart">
    <i class="fas fa-shopping-cart"></i>
    <span class="cart-badge" id="cartBadge">0</span>
  </a>

  <!-- === Premium Header === -->
  <header id="mainHeader">
    <div class="header-container">
      <div class="logo">
        <img src="Assets/logo.png" alt="Royal Fresh Logo" />
        <!-- <span class="logo-text">Royal Fresh</span> -->
      </div>
      <div class="search-container">
        <i class="fas fa-search search-icon"></i>
        <input type="text" id="searchInput" placeholder="Search products..." />
      </div>
      <nav class="nav-links">
        <a href="/home">Home</a>
        <a href="/all-products">Products</a>
        <!-- New Dropdown Menu -->
        <div class="dropdown">
          <a href="/subscription" class="dropdown-toggle">Subscription</a>
          <div class="dropdown-menu">
            <a href="/milk-subscription">Milk Subscription</a>
            <a href="/yogurt-subscription">Yogurt Subscription</a>
          </div>
        </div>
        <a href="#features">Features</a>
        <a href="#testimonials">Testimonials</a>
        <a href="#bags">Premium Bags</a>
        <a href="#contact">Contact</a>
      </nav>
      <a class="cart-header" href="/cart" aria-label="Open cart">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-badge" id="cartBadge">0</span>
      </a>
      <button class="mobile-menu-btn" id="mobileMenuBtn">
        <i data-lucide="menu"></i>
      </button>
    </div>
  </header>

  <!-- === Subscription Section === -->
  <section class="subscriptions">
    <h2 class="section-title">Choose Your Subscription</h2>
    <p class="section-subtitle">Enjoy hassle-free deliveries of your favorite dairy products with our flexible
      subscription plans. Select the one that suits you best.</p>

    <div class="subscription-grid">
      <a href="/milk-subscription" class="sub-card">
        <img src="{{ asset('Assets/ml1.jpg') }}" alt="Milk Subscription" class="sub-image" />
        <h3 class="sub-title">Milk Subscription</h3>
        <p class="sub-desc">Get fresh farm milk delivered to your door every morning. Choose your quantity and frequency
          for ultimate convenience.</p>
        <button class="sub-btn">
          <i class="fas fa-milk-bottle"></i> Select Plan
        </button>
      </a>

      <a href="/yogurt-subscription" class="sub-card">
        <img src="{{ asset('Assets/ml2.jpg') }}" alt="Yogurt Subscription" class="sub-image" />
        <h3 class="sub-title">Yogurt Subscription</h3>
        <p class="sub-desc">Creamy, probiotic-rich yogurt delivered weekly. Perfect for healthy breakfasts and snacks
          with customizable portions.</p>
        <button class="sub-btn">
          <i class="fas fa-utensils"></i> Select Plan
        </button>
      </a>
    </div>
  </section>

  <!-- Lucide Icons Script -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    // Initialize Lucide Icons
    document.addEventListener('DOMContentLoaded', function () {
      lucide.createIcons();
    });

    // Mobile Menu Functionality
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const sideNav = document.getElementById('sideNav');
    const closeBtn = document.getElementById('closeBtn');
    const overlay = document.getElementById('overlay');

    function openMenu() {
      sideNav.classList.add('open');
      overlay.classList.add('active');
      document.body.style.overflow = 'hidden'; // Prevent body scroll
    }

    function closeMenu() {
      sideNav.classList.remove('open');
      overlay.classList.remove('active');
      document.body.style.overflow = ''; // Restore body scroll
    }

    mobileMenuBtn.addEventListener('click', openMenu);
    closeBtn.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);

    // Close menu on link click
    document.querySelectorAll('.side-nav-links a').forEach(link => {
      link.addEventListener('click', closeMenu);
    });

    // Header scroll effect
    window.addEventListener('scroll', function () {
      const header = document.getElementById('mainHeader');
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });

    // Mobile Dropdown Toggle
    document.addEventListener('DOMContentLoaded', function () {
      // Mobile Subscription Dropdown Toggle
      const mobileDropdownToggle = document.querySelector('.dropdown-mobile .dropdown-toggle');
      const mobileDropdown = document.querySelector('.dropdown-mobile');

      if (mobileDropdownToggle) {
        mobileDropdownToggle.addEventListener('click', function (e) {
          e.preventDefault();
          mobileDropdown.classList.toggle('open');
          const icon = this.querySelector('i');
          if (icon) {
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
          }
        });
      }

      // Close mobile dropdown when clicking outside
      document.addEventListener('click', function (e) {
        if (!mobileDropdown.contains(e.target)) {
          mobileDropdown.classList.remove('open');
          const icon = mobileDropdownToggle.querySelector('i');
          if (icon) {
            icon.classList.add('fa-chevron-down');
            icon.classList.remove('fa-chevron-up');
          }
        }
      });
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  </script>
</body>

</html>