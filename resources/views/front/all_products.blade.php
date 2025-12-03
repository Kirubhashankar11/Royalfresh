<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Royal Fresh – Premium Products</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

    .mobile-filter-btn {
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

    /* === Main Content === */
    .main-content {
      margin-top: 100px;
      padding: 2rem 4vw;
    }

    .container {
      max-width: 1600px;
      margin: 0 auto;
      display: flex;
      gap: 2.5rem;
    }

    /* === Filter Sidebar - Fixed with Scroll === */
    .filter-sidebar {
      width: 280px;
      background: white;
      border-radius: 20px;
      padding: 2rem 1.5rem;
      box-shadow: var(--shadow-sm);
      border: 1px solid rgba(232, 225, 213, 0.5);
      height: calc(100vh - 140px);
      position: sticky;
      top: 120px;
      overflow-y: auto;
    }

    .filter-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      padding-bottom: 12px;
      border-bottom: 2px solid var(--gold);
    }

    .filter-sidebar::-webkit-scrollbar {
      width: 6px;
    }

    .filter-sidebar::-webkit-scrollbar-track {
      background: var(--light-brown);
      border-radius: 10px;
    }

    .filter-sidebar::-webkit-scrollbar-thumb {
      background: var(--gold);
      border-radius: 10px;
    }

    .filter-sidebar h3 {
      font-size: 1.5rem;
      color: var(--primary-brown);
      margin: 0;
      font-family: 'Playfair Display', serif;
    }

    .filter-group {
      margin-bottom: 2rem;
    }

    .filter-group h4 {
      font-size: 1.1rem;
      color: var(--dark-brown);
      margin-bottom: 1rem;
      font-weight: 600;
    }

    .filter-options {
      display: flex;
      flex-direction: column;
      gap: 0.8rem;
    }

    .filter-option {
      display: flex;
      align-items: center;
      gap: 0.8rem;
    }

    .filter-option input[type="checkbox"] {
      accent-color: var(--gold);
      width: 18px;
      height: 18px;
    }

    .filter-option label {
      font-size: 0.95rem;
      color: var(--dark-brown);
      cursor: pointer;
    }

    .price-range {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .price-inputs {
      display: flex;
      gap: 0.8rem;
    }

    .price-inputs input {
      width: 100%;
      border: 1.5px solid var(--light-brown);
      border-radius: 8px;
      padding: 0.7rem 0.8rem;
      background: white;
      color: var(--dark-brown);
      font-weight: 500;
      outline: none;
      transition: all 0.3s;
    }

    .price-inputs input:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 3px rgba(200, 169, 126, 0.2);
    }

    .price-slider {
      width: 100%;
      height: 6px;
      background: var(--light-brown);
      border-radius: 5px;
      outline: none;
      -webkit-appearance: none;
    }

    .price-slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: var(--gold);
      cursor: pointer;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
      transition: all 0.3s;
    }

    .price-slider::-webkit-slider-thumb:hover {
      background: var(--primary-brown);
      transform: scale(1.1);
    }

    .filter-buttons {
      display: flex;
      gap: 1rem;
      margin-top: 1rem;
    }

    .filter-btn {
      flex: 1;
      padding: 0.9rem 0;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 1rem;
      border: none;
    }

    .apply-btn {
      background: var(--primary-brown);
      color: white;
      box-shadow: var(--shadow-sm);
    }

    .reset-btn {
      background: transparent;
      color: var(--dark-brown);
      border: 1.5px solid var(--light-brown);
    }

    .apply-btn:hover {
      background: var(--dark-brown);
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .reset-btn:hover {
      background: var(--light-brown);
      border-color: var(--gold);
    }

    /* Animal Filter Styles*/
    .animal-filters {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 0.8rem;
    }

    .animal-label {
      cursor: pointer;
      border: 2px solid transparent;
      border-radius: 12px;
      padding: 4px;
      transition: all 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .animal-label:hover {
      border-color: var(--gold);
    }

    .animal-label.selected {
      border: 3px solid var(--primary-brown);
      box-shadow: var(--shadow-sm);
    }

    .animal-checkbox {
      display: none;
    }

    .animal-image {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 8px;
      display: block;

    }

    /* === Products Container === */
    .products-container {
      flex: 1;
    }

    .category-section {
      border-radius: 20px;
      margin-bottom: 3rem;
      padding: 2.5rem 2rem;
      box-shadow: var(--shadow-sm);
      background: white;
      border: 1px solid rgba(232, 225, 213, 0.5);
    }

    .category-header {
      text-align: center;
      margin-bottom: 2.5rem;
      position: relative;
    }

    .category-title {
      font-size: 2.2rem;
      font-weight: 700;
      color: var(--primary-brown);
      margin-bottom: 0.5rem;
      font-family: 'Playfair Display', serif;
      position: relative;
      display: inline-block;
      padding-bottom: 10px;
    }

    .category-title::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 3px;
      background: var(--gold);
    }

    /* === Premium Product Cards - 4 per row === */
    .products-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 2rem;
      margin-bottom: 1.5rem;
    }

    .product-card {
      background: white;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: var(--shadow-sm);
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 2rem 1.5rem 1.5rem;
      position: relative;
      border: 1px solid rgba(232, 225, 213, 0.5);
    }

    .product-card:hover {
      transform: translateY(-12px);
      box-shadow: var(--shadow-lg);
    }

    .product-card::before {
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

    .product-card:hover::before {
      transform: scaleX(1);
    }

    .product-image {
      width: 140px;
      height: 140px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 1.5rem;
      border: 3px solid var(--light-brown);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      transition: all 0.3s;
    }

    .product-card:hover .product-image {
      transform: scale(1.05);
      border-color: var(--gold);
    }

    .product-title {
      font-size: 1.3rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
      text-align: center;
      color: var(--dark-brown);
      line-height: 1.3;
      height: 3.2rem;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    .product-price {
      color: var(--dark-brown);
      font-size: 1.3rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }

    .product-weight-label {
      font-weight: 500;
      font-size: 0.95rem;
      color: var(--primary-brown);
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    select.product-weight {
      border-radius: 8px;
      padding: 0.5rem 0.8rem;
      border: 1.5px solid var(--light-brown);
      background: white;
      color: var(--dark-brown);
      font-weight: 500;
      font-size: 0.95rem;
      outline: none;
      transition: all 0.3s;
      cursor: pointer;
    }

    select.product-weight:hover,
    select.product-weight:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 3px rgba(200, 169, 126, 0.2);
    }

    .quantity-controls {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin: 1rem 0 1.2rem 0;
      justify-content: center;
    }

    .quantity-controls button {
      background: var(--primary-brown);
      border: none;
      color: white;
      border-radius: 8px;
      padding: 0.6rem 0.9rem;
      font-weight: bold;
      font-size: 1.1rem;
      cursor: pointer;
      user-select: none;
      transition: all 0.3s;
      box-shadow: var(--shadow-sm);
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .quantity-controls button:hover {
      background: var(--dark-brown);
      transform: translateY(-2px);
    }

    .quantity-controls input {
      width: 50px;
      border: 1.5px solid var(--light-brown);
      border-radius: 8px;
      text-align: center;
      font-size: 1.1rem;
      font-weight: 600;
      padding: 0.6rem 0;
      color: var(--dark-brown);
      background: white;
      outline: none;
      user-select: none;
      transition: all 0.3s;
    }

    .quantity-controls input:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 3px rgba(200, 169, 126, 0.2);
    }

    .add-cart-btn {
      background: var(--primary-brown);
      color: white;
      border: none;
      border-radius: 25px;
      padding: 0.9rem 1.5rem;
      cursor: pointer;
      font-size: 1rem;
      font-weight: 600;
      transition: all 0.3s;
      margin-top: auto;
      width: 100%;
      max-width: 12rem;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      box-shadow: 0 4px 10px rgba(98, 69, 28, 0.2);
    }

    .add-cart-btn:hover {
      background: var(--dark-brown);
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(98, 69, 28, 0.3);
    }

    /* === Responsive Overrides === */
    @media (max-width: 1400px) {
      .products-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }

    @media (max-width: 1200px) {
      .products-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 1024px) {
      .container {
        flex-direction: column;
        padding: 0;
      }

      .filter-sidebar {
        width: 100%;
        position: static;
        height: auto;
        max-height: 400px;
      }

      .products-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
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

      .mobile-filter-btn {
        display: block;
      }

      .main-content {
        margin-top: 140px;
        padding: 1rem 2vw;
      }

      .products-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .category-section {
        padding: 2rem 1.5rem;
      }

      .side-nav {
        width: 100%;
        right: -100%;
      }

      .filter-sidebar {
        position: fixed;
        top: 100px;
        left: 0;
        width: 100%;
        height: calc(100vh - 100px);
        z-index: 1001;
        background: white;
        border-radius: 0 0 20px 20px;
        padding: 1rem 1.5rem;
        box-shadow: var(--shadow-lg);
        border: none;
        transform: translateX(-100%);
        transition: transform 0.3s ease;
        max-height: none;
        overflow-y: auto;
      }

      .filter-sidebar.open {
        transform: translateX(0);
      }

      /* Updated for 2 images per row on mobile */
      .animal-label {
        flex: 0 0 calc(50% - 0.5rem);
      }
    }

    @media (max-width: 480px) {
      .products-grid {
        grid-template-columns: 1fr;
      }

      .category-title {
        font-size: 1.8rem;
      }

      .animal-label {
        flex: 0 0 calc(50% - 0.5rem);
      }
    }
  </style>
</head>

<body>
  <!-- === Premium Header === -->
  <header id="mainHeader">
    <div class="header-container">
      <div class="logo">
        <img src="Assets/logo.png" alt="Royal Fresh Logo" />
        Royal Fresh
      </div>
      <div class="search-container">
        <i class="fas fa-search search-icon"></i>
        <input type="text" id="searchInput" placeholder="Search products..." oninput="filterProducts()" />
      </div>
      <nav class="nav-links">
        <a href="/home">Home</a>
        <a href="/all-products">Products</a>
        <a href="/subscription">Subscription</a>
        <a href="#features">Features</a>
        <a href="#testimonials">Testimonials</a>
        <a href="#contact">Contact</a>
      </nav>
      <a class="cart-header" href="/cart" aria-label="Open cart">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-badge" id="cartBadge">0</span>
      </a>
    </div>
  </header>

  <!-- === Main Content === -->
  <div class="main-content">
    <div class="container">
      <!-- Filter Sidebar -->
      <aside class="filter-sidebar">
        <h3>Filter Products</h3>
        <form id="filterForm">

          <div class="filter-group">
            <h4>Categories</h4>
            <div class="filter-options">
              @foreach($categories as $category)
                <div class="filter-option">
                  <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                  <label for="{{ $category->name }}">{{ $category->name }}</label>
                </div>
              @endforeach

            </div>
          </div>

          <div class="filter-group">
            <h4>Price Range</h4>
            <div class="price-range">
              <div class="price-inputs">
                <input type="number" name="min_price" placeholder="Min">
                <input type="number" name="max_price" placeholder="Max">
              </div>
              <!-- <input type="range" class="price-slider" min="0" max="100" value="100"> -->
            </div>
          </div>

          <!-- <div class="filter-group">
          <h4>Weight Options</h4>
          <div class="filter-options">
            <div class="filter-option">
              <input type="checkbox" id="250g">
              <label for="250g">250 grams</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="500g">
              <label for="500g">500 grams</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="1kg">
              <label for="1kg">1 kg</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="1l">
              <label for="1l">1 litre</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="2l">
              <label for="2l">2 litre</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="5l">
              <label for="5l">5 litre</label>
            </div>
          </div>
        </div> -->

          <!-- <div class="filter-group">
          <h4>Availability</h4>
          <div class="filter-options">
            <div class="filter-option">
              <input type="checkbox" id="in-stock" checked>
              <label for="in-stock">In Stock</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="out-of-stock">
              <label for="out-of-stock">Out of Stock</label>
            </div>
          </div>
        </div> -->

          <div class="filter-group">
            <h4>Ratings</h4>
            <div class="filter-options">
              <div class="filter-option">
                <input type="checkbox" id="rating5">
                <label for="rating5">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </label>
              </div>
              <div class="filter-option">
                <input type="checkbox" id="rating4">
                <label for="rating4">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i> & above
                </label>
              </div>
              <div class="filter-option">
                <input type="checkbox" id="rating3">
                <label for="rating3">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                  <i class="far fa-star"></i> & above
                </label>
              </div>
            </div>
          </div>
          <div class="filter-group">
            <div class="filter-options animal-filters">
              <label class="animal-label">
                <input type="checkbox" class="animal-checkbox" value="cow" name="filter_cat[]">
                <img src="{{asset('Assets/filteration_images/cow_filteration.png')}}" alt="Cow" class="animal-image">
              </label>
              <label class="animal-label">
                <input type="checkbox" class="animal-checkbox" value="goat" name="filter_cat[]">
                <img src="{{asset('Assets/filteration_images/goat_filteration.png')}}" alt="Goat" class="animal-image">
              </label>
              <label class="animal-label">
                <input type="checkbox" class="animal-checkbox" value="camel" name="filter_cat[]">
                <img src="{{asset('Assets/filteration_images/camel_filteration.png')}}" alt="Camel"
                  class="animal-image">
              </label>
              <label class="animal-label">
                <input type="checkbox" class="animal-checkbox" value="hen" name="filter_cat[]">
                <img src="{{asset('Assets/filteration_images/hen_filteration.png')}}" alt="Hen" class="animal-image">
              </label>
              <label class="animal-label">
                <input type="checkbox" class="animal-checkbox" value="buffalo" name="filter_cat[]">
                <img src="{{asset('Assets/filteration_images/buffalo_filteration.png')}}" alt="Buffalo"
                  class="animal-image">
              </label>
              <label class="animal-label">
                <input type="checkbox" class="animal-checkbox" value="sea_food" name="filter_cat[]">
                <img src="{{asset('Assets/filteration_images/fish_filteration.png')}}" alt="fish" class="animal-image">
              </label>
            </div>
          </div>

          <div class="filter-buttons">
            <button type="submit" class="filter-btn apply-btn">Apply Filters</button>
            <button type="reset" class="filter-btn reset-btn">Reset</button>
          </div>
        </form>
      </aside>

      <!-- Products Container -->


      <main class="products-container" id="product-list">
        @include('front.partials.products', ['products' => $category->products])
      </main>






      </main>
    </div>
  </div>

  <script>
    /*
      Universal "Add to Cart" script
      - Saves cart to localStorage under key "cartData"
      - Updates header badge #cartBadge
      - Works with product cards structured like:
          <div class="product-card">
            <img class="product-image" ...>
            <div class="product-title">...</div>
            <div class="product-price">AED 50</div>          OR "From AED 60"
            <select class="product-weight">...</select>      (optional)
            <input type="number" class="product-qty" value="1"> (optional)
            <button class="add-cart-btn">Add to Cart</button>
          </div>
      If your classes differ, change the selectors inside addToCartFromButton()
    */

    (function () {
      const STORAGE_KEY = 'cartData';

      // Load cart from localStorage or empty array
      function loadCart() {
        try {
          const raw = localStorage.getItem(STORAGE_KEY);
          return raw ? JSON.parse(raw) : [];
        } catch (e) {
          console.error('Failed to parse cartData', e);
          return [];
        }
      }

      // Save cart to localStorage
      function saveCart(cart) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(cart));
      }

      // Re-render the header badge
      function renderCartBadge() {
        const badge = document.getElementById('cartBadge');
        if (!badge) return;
        const cart = loadCart();
        const totalQty = cart.reduce((s, it) => s + (it.quantity || 0), 0);
        badge.textContent = totalQty;
      }

      // Utility to get number from price text "AED 50", "From AED 60/250 gm", etc.
      function parsePrice(text) {
        if (!text) return 0;
        // find first number (integer or decimal)
        const m = text.replace(',', '').match(/(\d+(\.\d+)?)/);
        return m ? parseFloat(m[0]) : 0;
      }

      // Called when an Add to Cart button is clicked — finds nearest product-card and extracts data
      function addToCartFromButton(btn) {
        // Find nearest product card - tries a few fallbacks
        const card = btn.closest('.product-card') || btn.closest('[data-product-id]') || btn.parentElement;
        if (!card) {
          console.warn('Product card not found for add-to-cart button');
          return;
        }

        // Extract product info. Adjust these selectors if your markup differs.
        const id = card.dataset.id || card.getAttribute('data-id') || card.getAttribute('data-product-id') || parseInt(card.querySelector('.product-id')?.textContent || '') || null;
        const titleEl = card.querySelector('.product-title') || card.querySelector('h3, h2, .title');
        const priceEl = card.querySelector('.product-price');
        const imgEl = card.querySelector('.product-image img') || card.querySelector('.product-image') || card.querySelector('img');
        const weightEl = card.querySelector('.product-weight') || card.querySelector('select.product-weight');
        const qtyEl = card.querySelector('input[type="number"], input.product-qty');

        const title = titleEl ? titleEl.textContent.trim() : (card.getAttribute('data-title') || 'Product');
        const price = priceEl ? parsePrice(priceEl.textContent) : parsePrice(card.getAttribute('data-price') || '');
        const image = imgEl ? (imgEl.src || imgEl.getAttribute('src')) : '';
        const weight = weightEl ? (weightEl.value || weightEl.options?.[weightEl.selectedIndex]?.text || '') : (card.getAttribute('data-weight') || '');
        const quantity = qtyEl ? Math.max(1, parseInt(qtyEl.value || 1)) : 1;

        // If id is still null, use a fallback unique id (not recommended long-term)
        const productId = id !== null && id !== '' ? (typeof id === 'string' && id.match(/^\d+$/) ? parseInt(id) : id) : (title + '::' + weight);

        // Build product object
        const product = {
          id: productId,
          title,
          price,
          weight,
          quantity,
          image
        };

        // Load cart and update
        const cart = loadCart();

        // Try to find existing item with same id and weight
        const existing = cart.find(i => String(i.id) === String(product.id) && String(i.weight) === String(product.weight));

        if (existing) {
          existing.quantity = (existing.quantity || 0) + product.quantity;
        } else {
          cart.push(product);
        }

        saveCart(cart);
        renderCartBadge();

        // Optional: flash UI feedback on button
        btn.classList.add('added-to-cart');
        setTimeout(() => btn.classList.remove('added-to-cart'), 900);

        console.log('Cart updated', cart);
      }

      // Attach click listeners to all add-to-cart buttons; also observe DOM for newly added cards
      function attachAddToCartHandlers(root = document) {
        // Buttons commonly use .add-cart-btn, .add-to-cart, or .add-cart
        const selectors = ['.add-cart-btn', '.add-to-cart', 'button[data-action="add-to-cart"]', '.btn-add-cart'];
        const buttons = root.querySelectorAll(selectors.join(','));
        buttons.forEach(btn => {
          // avoid re-binding
          if (btn.__cartBound) return;
          btn.__cartBound = true;
          btn.addEventListener('click', function (e) {
            e.preventDefault();
            addToCartFromButton(btn);
          });
        });
      }

      // Observe DOM so dynamically loaded product lists also get handlers
      const observer = new MutationObserver((mutationsList) => {
        for (const m of mutationsList) {
          if (m.addedNodes && m.addedNodes.length) {
            m.addedNodes.forEach(node => {
              if (node.nodeType === 1) {
                // if product grid added
                if (node.matches && node.matches('.products-grid, .product-card, .product-list')) {
                  attachAddToCartHandlers(node);
                } else {
                  // check inside node for buttons
                  attachAddToCartHandlers(node);
                }
              }
            });
          }
        }
      });

      // Initialize on DOM ready
      document.addEventListener('DOMContentLoaded', () => {
        renderCartBadge();
        attachAddToCartHandlers(document);

        // Watch the whole document for new product cards loaded dynamically
        observer.observe(document.body, { childList: true, subtree: true });
      });

      // expose functions to window for quick debugging if needed
      window._cartUtils = { loadCart, saveCart, renderCartBadge, addToCartFromButton };
    })();
  </script>

  <style>
    /* tiny feedback style - optional and won't break your design */
    .added-to-cart {
      transform: translateY(-2px);
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.12);
      transition: transform .12s ease;
    }
  </style>


</body>

</html>