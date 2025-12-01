<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Royal Fresh – Milk Subscription</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
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
      filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
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
    /* Dropdown Styles - Refined for No Layout Shift */
    .dropdown {
      position: relative;
      display: inline-flex;
      align-items: center;
    }
    .dropdown-toggle {
      text-decoration: none;
      color: var(--dark-brown);
      font-size: 1.05rem;
      font-weight: 500;
      transition: all 0.3s;
      padding: 0.5rem 0;
      position: relative;
      cursor: pointer;
      line-height: 1.2;
      white-space: nowrap;
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
      overflow: hidden;
      pointer-events: none;
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

    /* === Subscription Page Styles === */
    .subscription-container {
      max-width: 1400px;
      margin: 100px auto 6rem;
      padding: 0 4vw;
      display: grid;
      grid-template-columns: 1fr 350px;
      gap: 3rem;
      align-items: start;
    }

    .steps-section {
      display: flex;
      flex-direction: column;
      gap: 3rem;
    }

    .step {
      background: white;
      border-radius: 20px;
      padding: 2rem;
      box-shadow: var(--shadow-sm);
      border: 1px solid rgba(232, 225, 213, 0.5);
    }

    .step-header {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .step-number {
      width: 40px;
      height: 40px;
      background: var(--primary-brown);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
      font-size: 1.1rem;
    }

    .step-title {
      font-size: 1.4rem;
      font-weight: 600;
      color: var(--primary-brown);
      font-family: 'Playfair Display', serif;
    }

    .step-subtitle {
      color: #666;
      margin-bottom: 1.5rem;
      font-size: 1rem;
    }

    /* Step 1: City Selection */
    .city-select {
      position: relative;
    }

    .city-select select {
      width: 100%;
      padding: 1rem 1.5rem;
      border: 1px solid var(--light-brown);
      border-radius: 10px;
      font-size: 1rem;
      background: white;
      outline: none;
      transition: all 0.3s;
      box-shadow: var(--shadow-sm);
    }

    .city-select select:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 3px rgba(200, 169, 126, 0.2);
    }

    /* Step 2: Milk Selection */
    .milk-options {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1.5rem;
    }

    .milk-option {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: 1.5rem;
      border: 2px solid transparent;
      border-radius: 15px;
      cursor: pointer;
      transition: all 0.3s;
      background: var(--cream);
    }

    .milk-option:hover {
      border-color: var(--gold);
      box-shadow: var(--shadow-md);
    }

    .milk-option.selected {
      border-color: var(--primary-brown);
      background: var(--light-brown);
      box-shadow: var(--shadow-md);
    }

    .milk-option img {
      width: 80px;
      height: 80px;
      object-fit: contain;
      margin-bottom: 1rem;
      filter: drop-shadow(0 2px 8px rgba(0,0,0,0.1));
    }

    .milk-option label {
      font-weight: 600;
      color: var(--dark-brown);
      margin-bottom: 0.5rem;
      font-size: 1rem;
    }

    .milk-option input[type="radio"] {
      display: none;
    }

    .milk-desc {
      font-size: 0.85rem;
      color: #666;
      line-height: 1.4;
    }

    /* Step 3: Unit Size Selection */
    .unit-options {
      display: flex;
      justify-content: center;
      gap: 1.5rem;
    }

    .unit-option {
      flex: 1;
      max-width: 200px;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: 1.5rem;
      border: 2px solid transparent;
      border-radius: 15px;
      cursor: pointer;
      transition: all 0.3s;
      background: var(--cream);
    }

    .unit-option:hover {
      border-color: var(--gold);
      box-shadow: var(--shadow-md);
    }

    .unit-option.selected {
      border-color: var(--primary-brown);
      background: var(--light-brown);
      box-shadow: var(--shadow-md);
    }

    .unit-option input[type="radio"] {
      display: none;
    }

    .unit-icon {
      font-size: 3rem;
      color: var(--primary-brown);
      margin-bottom: 0.5rem;
      display: block;
    }

    .unit-label {
      font-weight: 600;
      color: var(--dark-brown);
      margin-bottom: 0.25rem;
      font-size: 1rem;
    }

    .unit-size-type {
      font-size: 0.85rem;
      color: #666;
      line-height: 1.4;
    }

    /* Step 4: Delivery Schedule */
    .schedule-section {
      margin-bottom: 1.5rem;
    }

    .schedule-title {
      font-weight: 600;
      color: var(--dark-brown);
      margin-bottom: 0.8rem;
    }

    .days-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 0.5rem;
    }

    .day-checkbox {
      display: flex;
      align-items: flex-start;
      gap: 0.75rem;
      padding: 0.75rem;
      cursor: pointer;
      border-radius: 8px;
      transition: all 0.3s;
      border: 1px solid transparent;
      flex-direction: column;
    }

    .day-checkbox:hover {
      background: var(--light-brown);
      border-color: var(--gold);
    }

    .day-checkbox input[type="checkbox"] {
      margin: 0;
      flex-shrink: 0;
    }

    .day-name {
      font-weight: 500;
      color: var(--dark-brown);
      flex: 1;
    }

    .per-day-row {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-top: 0.25rem;
    }

    .per-day-select {
      flex: 0 0 auto;
      min-width: 60px;
      padding: 0.3rem 0.5rem;
      border: 1px solid var(--light-brown);
      border-radius: 5px;
      font-size: 0.9rem;
      background: white;
      display: none;
    }

    .per-day-select:focus {
      border-color: var(--gold);
      outline: none;
    }

    .bottles-text {
      color: #666;
      font-size: 0.85rem;
      white-space: nowrap;
      display: none;
    }

    .time-options-per-day {
      display: none;
      margin-top: 0.5rem;
      padding: 0.5rem;
      background: var(--cream);
      border-radius: 5px;
      border: 1px solid var(--light-brown);
    }

    .time-options-per-day label {
      display: block;
      margin-bottom: 0.25rem;
      font-size: 0.85rem;
    }

    .delivery-error {
      color: #dc2626;
      font-size: 0.85rem;
      margin-top: 0.5rem;
      display: none;
    }

    .time-radio input[type="radio"] {
      margin-right: 0.25rem;
    }

    .quantity-section {
      margin-bottom: 1.5rem;
    }

    .quantity-section label {
      font-weight: 600;
      color: var(--dark-brown);
      margin-bottom: 0.8rem;
      display: block;
    }

    .quantity-counter {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 1rem;
      background: var(--cream);
      padding: 1rem;
      border-radius: 10px;
      border: 1px solid var(--light-brown);
    }

    .qty-btn {
      background: var(--primary-brown);
      color: white;
      border: none;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      font-size: 1.2rem;
      cursor: pointer;
      transition: all 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .qty-btn:hover {
      background: var(--dark-brown);
    }

    .qty-btn:disabled {
      background: #ccc;
      cursor: not-allowed;
    }

    #qtyDisplay {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--primary-brown);
      min-width: 30px;
      text-align: center;
    }

    /* Order Summary Sidebar */
    .order-summary {
      background: white;
      border-radius: 20px;
      padding: 2rem;
      box-shadow: var(--shadow-sm);
      border: 1px solid rgba(232, 225, 213, 0.5);
      height: fit-content;
      position: sticky;
      top: 120px;
    }

    .summary-title {
      font-size: 1.4rem;
      font-weight: 600;
      color: var(--primary-brown);
      margin-bottom: 1rem;
      font-family: 'Playfair Display', serif;
      text-align: center;
    }

    .summary-subtitle {
      text-align: center;
      color: #666;
      margin-bottom: 2rem;
      font-size: 0.95rem;
    }

    .selected-item {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 1rem;
      background: var(--cream);
      border-radius: 10px;
      margin-bottom: 1rem;
      border: 1px solid var(--light-brown);
    }

    .selected-item img {
      width: 50px;
      height: 50px;
      object-fit: contain;
      border-radius: 8px;
    }

    .selected-details h4 {
      font-weight: 600;
      color: var(--dark-brown);
      margin-bottom: 0.25rem;
    }

    .selected-details p {
      color: #666;
      font-size: 0.9rem;
    }

  .subscription-details {
  margin-bottom: 1.5rem;
  padding: 1rem;
  background: var(--light-brown);
  border-radius: 10px;
  border-left: 4px solid var(--primary-brown);
}
.subscription-details h4 {
  color: var(--primary-brown);
  font-weight: 600;
  margin-bottom: 0.5rem;
}

 .subscription-details p {
  color: #666;
  font-size: 0.9rem;
  margin-bottom: 0.75rem;
}

.subscription-details p:last-child {
  margin-bottom: 0;
}

#monthsSelect {
  width: 100%;
  padding: 0.5rem 0.75rem;
  border: 1px solid var(--light-brown);
  border-radius: 5px;
  font-size: 0.9rem;
  background: white;
  outline: none;
  transition: all 0.3s;
  margin-top: 0.25rem;
  display: block;
}

#monthsSelect:focus {
  border-color: var(--gold);
  box-shadow: 0 0 0 2px rgba(200, 169, 126, 0.2);
}

    .price-box {
      background: var(--primary-brown);
      color: white;
      text-align: center;
      padding: 1rem;
      border-radius: 10px;
      margin: 1.5rem 0;
      font-size: 1.5rem;
      font-weight: bold;
    }

    .warning {
      background: #fff5f5;
      border: 1px solid #fecaca;
      border-radius: 10px;
      padding: 1rem;
      text-align: center;
      color: #dc2626;
      font-weight: 500;
      margin-bottom: 1rem;
    }

    .flex-note {
      background: var(--light-brown);
      border-radius: 10px;
      padding: 1rem;
      text-align: center;
      color: #666;
      font-size: 0.9rem;
      margin-top: 1rem;
    }

    .add-to-cart-btn {
      background: var(--primary-brown);
      color: white;
      border: none;
      border-radius: 25px;
      padding: 1rem 2rem;
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s;
      width: 100%;
      margin-top: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      box-shadow: var(--shadow-sm);
    }

    .add-to-cart-btn:hover:not(:disabled) {
      background: var(--dark-brown);
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .add-to-cart-btn:disabled {
      background: #ccc;
      cursor: not-allowed;
      transform: none;
    }

    /* Responsive */
    @media (max-width: 1024px) {
      .subscription-container {
        grid-template-columns: 1fr;
        gap: 2rem;
      }
      .order-summary {
        order: 2;
        position: static;
      }
    }

    @media (max-width: 768px) {
      .milk-options {
        grid-template-columns: repeat(2, 1fr);
      }
      .unit-options {
        flex-direction: column;
        align-items: center;
      }
      .days-grid {
        grid-template-columns: 1fr;
      }
      .header-container {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
      }
      .logo-text {
        display: none;
      }
      .nav-links {
        display: none;
      }
      .search-container {
        display: none;
      }
      .mobile-menu-btn {
        display: block;
      }
      .day-checkbox {
        gap: 0.5rem;
        padding: 0.5rem;
      }
      .per-day-row {
        flex-wrap: wrap;
      }
    }

    @media (max-width: 480px) {
      .step {
        padding: 1.5rem;
      }
      .milk-options {
        grid-template-columns: 1fr;
      }
      .unit-options {
        gap: 1rem;
      }
      .day-checkbox {
        flex-wrap: wrap;
        gap: 0.5rem;
      }
      .per-day-select {
        min-width: 50px;
      }
      .time-options-per-day {
        margin-left: 1.25rem;
      }
    }

    /* Time Section Styles */
    .time-radio:hover {
      background: var(--light-brown);
      border-color: var(--gold);
    }
    .time-radio input[type="radio"]:checked + span {
      color: var(--primary-brown);
      font-weight: 600;
    }
  </style>
</head>
<body>
  <!-- === Premium Header === -->
  <header id="mainHeader">
    <div class="header-container">
      <div class="logo">
        <img src="{{ asset('Assets/logo.png') }}" alt="Royal Fresh Logo" />
        <!-- <span class="logo-text">Royal Fresh</span> -->
      </div>
      <div class="search-container">
        <i class="fas fa-search search-icon"></i>
        <input type="text" id="searchInput" placeholder="Search products..." />
      </div>
      <nav class="nav-links">
        <a href="/home">Home</a>
        <a href="/all-products">Products</a>
        <div class="dropdown">
          <a href="#" class="dropdown-toggle">Subscription</a>
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
      <button class="mobile-menu-btn" id="mobileMenuBtn">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </header>

  <!-- Mobile Side Nav Overlay -->
  <div class="overlay" id="overlay"></div>

  <!-- Mobile Side Nav Panel -->
  <nav class="side-nav" id="sideNav">
    <div class="side-nav-header">
      <button class="close-btn" id="closeBtn">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <ul class="side-nav-links">
      <li><a href="index.html">Home</a></li>
      <li><a href="products.html">Products</a></li>
      <li class="dropdown-mobile">
        <a href="#" class="dropdown-toggle">Subscription <i class="fas fa-chevron-down"></i></a>
        <ul class="dropdown-menu-mobile">
          <li><a href="milksubscription.html">Milk Subscription</a></li>
          <li><a href="yogurtsubscription.html">Yogurt Subscription</a></li>
        </ul>
      </li>
      <li><a href="#features">Features</a></li>
      <li><a href="#testimonials">Testimonials</a></li>
      <li><a href="#bags">Premium Bags</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>

  <!-- === Subscription Content === -->
  <div class="subscription-container">
    <div class="steps-section">
      <!-- Step 1: City -->
      <div class="step">
        <div class="step-header">
          <div class="step-number">1</div>
          <h3 class="step-title">Confirm Your Delivery City</h3>
        </div>
        <p class="step-subtitle">This helps us show you accurate plans and delivery availability.</p>
        <div class="city-select">
         <select id="citySelect">
            <option value="">— Select Your City —</option>
            <option value="Dubai">Dubai</option>
            <option value="Sharjah">Sharjah</option>
            <option value="Ajman">Ajman</option>
            <option value="Abu Dhabi">Abu Dhabi</option>
            <option value="Al Ain">Al Ain</option>
            <option value="Ras Al Khaimah">Ras Al Khaimah</option>
            <option value="Fujairah">Fujairah</option>
            <option value="Umm Al Quwain">Umm Al Quwain</option>
          </select>
        </div>
      </div>

      <!-- Step 2: Milk Variety -->
      <div class="step">
        <div class="step-header">
          <div class="step-number">2</div>
          <h3 class="step-title">Select Your Preferred Milk Variety</h3>
        </div>
        <p class="step-subtitle">Each variety offers unique benefits and exquisite taste.</p>
        <div class="milk-options">
          <label class="milk-option selected">
            <input type="radio" name="milkType" value="cow" checked>
            <img src="{{asset('Assets/filteration_images/cow_filteration.png')}}" alt="Cow Milk">
            <div>Cow Milk</div>
            <div class="milk-desc">Rich & Creamy<br>Classic</div>
          </label>
          <label class="milk-option">
            <input type="radio" name="milkType" value="buffalo">
            <img src="{{asset('Assets/filteration_images/buffalo_filteration.png')}}" alt="Buffalo Milk">
            <div>Buffalo Milk</div>
            <div class="milk-desc">Extra Nutritious &<br>Thick</div>
          </label>
          <label class="milk-option">
            <input type="radio" name="milkType" value="goat">
            <img src="{{asset('Assets/filteration_images/goat_filteration.png')}}" alt="Goat Milk">
            <div>Goat Milk</div>
            <div class="milk-desc">Easily Digestible<br>Mild</div>
          </label>
          <label class="milk-option">
            <input type="radio" name="milkType" value="camel">
            <img src="{{asset('Assets/filteration_images/camel_filteration.png')}}" alt="Camel Milk">
            <div>Camel Milk</div>
            <div class="milk-desc">Unique Healthy &<br>Full Fat</div>
          </label>
        </div>
      </div>

      <!-- Step 3: Unit Size -->
      <div class="step">
        <div class="step-header">
          <div class="step-number">3</div>
          <h3 class="step-title">Select Your Unit Size</h3>
        </div>
        <p class="step-subtitle">Choose the bottle size that fits your needs.</p>
        <div class="unit-options">
          <label class="unit-option">
            <input type="radio" name="unitSize" value="1L">
            <i class="fas fa-bottle-water unit-icon"></i>
            <div class="unit-label">1L / Bottle</div>
            <div class="unit-size-type">Small Size</div>
          </label>
          <label class="unit-option selected">
            <input type="radio" name="unitSize" value="1.5L" checked>
            <i class="fas fa-bottle-water unit-icon"></i>
            <div class="unit-label">1.5L / Bottle</div>
            <div class="unit-size-type">Regular Size</div>
          </label>
        </div>
      </div>

      <!-- Step 4: Delivery Schedule -->
      <div class="step" id="deliveryStep" style="display: none;">
        <div class="step-header">
          <div class="step-number">4</div>
          <h3 class="step-title">Select Delivery Schedule</h3>
        </div>
        <p class="step-subtitle">Choose your delivery days and time slots for each day.</p>
        <div class="quantity-section" id="quantitySection">
          <label>How many bottles per month?</label>
          <div class="quantity-counter">
            <button type="button" class="qty-btn" id="decrementBtn" disabled>-</button>
            <span id="qtyDisplay">4</span>
            <button type="button" class="qty-btn" id="incrementBtn">+</button>
          </div>
        </div>
        <div class="schedule-section" id="scheduleInner" style="display: none;">
          <div class="schedule-title">Delivery Days:</div>
          <div class="days-grid">
            <label class="day-checkbox">
  <div style="display: flex; align-items: center; gap: 0.75rem; flex: 1;">
    <input type="checkbox" value="Monday">
    <span class="day-name">Monday</span>
  </div>
  <div class="per-day-row">
    <select class="per-day-select"></select>
    <span class="bottles-text"> bottles</span>
  </div>

  <!-- Keep empty, will be filled dynamically -->
  <div class="time-options-per-day"></div>
</label>

            <label class="day-checkbox">
              <div style="display: flex; align-items: center; gap: 0.75rem; flex: 1;">
                <input type="checkbox" value="Tuesday">
                <span class="day-name">Tuesday</span>
              </div>
              <div class="per-day-row">
                <select class="per-day-select"></select>
                <span class="bottles-text"> bottles</span>
              </div>
              <div class="time-options-per-day">
                <label class="time-radio" style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                  <input type="radio" name="time-Tuesday" value="AM" checked>
                  <span>Morning (05:30–10:00)</span>
                </label>
                <label class="time-radio" style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                  <input type="radio" name="time-Tuesday" value="PM">
                  <span>Evening (14:00–23:00)</span>
                </label>
              </div>
            </label>
            <label class="day-checkbox">
              <div style="display: flex; align-items: center; gap: 0.75rem; flex: 1;">
                <input type="checkbox" value="Wednesday">
                <span class="day-name">Wednesday</span>
              </div>
              <div class="per-day-row">
                <select class="per-day-select"></select>
                <span class="bottles-text"> bottles</span>
              </div>
              <div class="time-options-per-day">
                <label class="time-radio" style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                  <input type="radio" name="time-Wednesday" value="AM" checked>
                  <span>Morning (05:30–10:00)</span>
                </label>
                <label class="time-radio" style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                  <input type="radio" name="time-Wednesday" value="PM">
                  <span>Evening (14:00–23:00)</span>
                </label>
              </div>
            </label>
            <label class="day-checkbox">
              <div style="display: flex; align-items: center; gap: 0.75rem; flex: 1;">
                <input type="checkbox" value="Thursday">
                <span class="day-name">Thursday</span>
              </div>
              <div class="per-day-row">
                <select class="per-day-select"></select>
                <span class="bottles-text"> bottles</span>
              </div>
              <div class="time-options-per-day">
                <label class="time-radio" style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                  <input type="radio" name="time-Thursday" value="AM" checked>
                  <span>Morning (05:30–10:00)</span>
                </label>
                <label class="time-radio" style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                  <input type="radio" name="time-Thursday" value="PM">
                  <span>Evening (14:00–23:00)</span>
                </label>
              </div>
            </label>
            <label class="day-checkbox">
              <div style="display: flex; align-items: center; gap: 0.75rem; flex: 1;">
                <input type="checkbox" value="Friday">
                <span class="day-name">Friday</span>
              </div>
              <div class="per-day-row">
                <select class="per-day-select"></select>
                <span class="bottles-text"> bottles</span>
              </div>
              <div class="time-options-per-day">
                <label class="time-radio" style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                  <input type="radio" name="time-Friday" value="AM" checked>
                  <span>Morning (05:30–10:00)</span>
                </label>
                <label class="time-radio" style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                  <input type="radio" name="time-Friday" value="PM">
                  <span>Evening (14:00–23:00)</span>
                </label>
              </div>
            </label>
            <label class="day-checkbox">
              <div style="display: flex; align-items: center; gap: 0.75rem; flex: 1;">
                <input type="checkbox" value="Saturday" checked>
                <span class="day-name">Saturday</span>
              </div>
              <div class="per-day-row">
                <select class="per-day-select"></select>
                <span class="bottles-text"> bottles</span>
              </div>
              <div class="time-options-per-day">
                <label class="time-radio" style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                  <input type="radio" name="time-Saturday" value="AM" checked>
                  <span>Morning (05:30–10:00)</span>
                </label>
                <label class="time-radio" style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                  <input type="radio" name="time-Saturday" value="PM">
                  <span>Evening (14:00–23:00)</span>
                </label>
              </div>
            </label>
            <label class="day-checkbox">
              <div style="display: flex; align-items: center; gap: 0.75rem; flex: 1;">
                <input type="checkbox" value="Sunday">
                <span class="day-name">Sunday</span>
              </div>
              <div class="per-day-row">
                <select class="per-day-select"></select>
                <span class="bottles-text"> bottles</span>
              </div>
              <div class="time-options-per-day">
                <label class="time-radio" style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                  <input type="radio" name="time-Sunday" value="AM" checked>
                  <span>Morning (05:30–10:00)</span>
                </label>
                <label class="time-radio" style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                  <input type="radio" name="time-Sunday" value="PM">
                  <span>Evening (14:00–23:00)</span>
                </label>
              </div>
            </label>
          </div>
          <div id="scheduleError" class="delivery-error"></div>
        </div>
      </div>
    </div>

    <!-- Order Summary -->
    <div class="order-summary">
      <h3 class="summary-title">Your Order</h3>
      <p class="summary-subtitle">Subscription Confirmation<br>Review your choices and finalize your delivery.</p>
      <div id="cityWarning" class="warning" style="display: block;">
        <i class="fas fa-exclamation-triangle"></i> Please select your delivery city.
      </div>
      <div id="subscriptionDetails" class="subscription-details" style="display: none;">
        <h4 id="subTitle">Custom Cow Milk Subscription</h4>
        <p id="bottleSize">Bottle Size: <span id="bottleSizeSpan">1.5L</span></p>
        <p id="planDetails"><i class="fas fa-check"></i> <span id="monthlyBottles"></span></p>
        <p>Subscription Duration: 
          <select id="monthsSelect">
            <option value="3" selected>1 Months</option>
            <option value="6">3 Months</option>
            <option value="8">6 Months</option>
            <option value="12">12 Months</option>
          </select>
        </p>
      </div>
      <div id="priceBox" class="price-box" style="display: none;">Your Subscription Amount: AED 0</div>
      
      <button class="add-to-cart-btn" id="addToCartBtn" disabled>
        <i class="fas fa-shopping-cart"></i> Add to Cart
      </button>
    </div>
  </div>

  <!-- (Use your existing HTML markup above — keep it as is) -->
<!-- Below is the improved JavaScript to replace your current <script> section -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Elements (your existing IDs/classes)
  const citySelect = document.getElementById('citySelect');
  const milkOptions = document.querySelectorAll('.milk-option');
  const unitOptions = document.querySelectorAll('.unit-option');
  const monthsSelect = document.getElementById('monthsSelect');
  const qtyDisplay = document.getElementById('qtyDisplay');
  const decrementBtn = document.getElementById('decrementBtn');
  const incrementBtn = document.getElementById('incrementBtn');
  const dayCheckboxes = document.querySelectorAll('.day-checkbox input[type="checkbox"]');
  const scheduleError = document.getElementById('scheduleError');
  const addToCartBtn = document.getElementById('addToCartBtn');
  const subscriptionDetails = document.getElementById('subscriptionDetails');
  const cityWarning = document.getElementById('cityWarning');
  const priceBox = document.getElementById('priceBox');
  const deliveryStep = document.getElementById('deliveryStep');

  // Local state
  let selectedMilk = 'cow';
  let selectedUnit = '1.5L';
  let quantity = parseInt(qtyDisplay.textContent) || 4;
  let selectedMonths = 1; // will be read from option label text (robust to value mismatch)
  let lastFetchedUnitPrice = 0; // price per bottle from DB

  // Initialize select2
  if (window.jQuery && $(citySelect).select2) {
    $(citySelect).select2({
      placeholder: "— Select Your City —",
      allowClear: true,
      width: '100%'
    });
  }

  // helper: read months from select label text (handles incorrect numeric values in 'value' attr)
  function readMonthsFromLabel() {
    const opt = monthsSelect.options[monthsSelect.selectedIndex];
    if (!opt) return 1;
    // e.g., text '1 Months' -> parseInt('1') => 1
    const parsed = parseInt(opt.textContent.trim(), 10);
    return (Number.isInteger(parsed) && parsed > 0) ? parsed : 1;
  }

  // Update quantity UI
  function setQuantity(q) {
    quantity = q;
    qtyDisplay.textContent = quantity;
  }

  // toggle schedule visibility (existing logic)
  function toggleSchedule() {
    if (quantity > 0) {
      document.getElementById('scheduleInner').style.display = 'block';
      decrementBtn.disabled = false;
    } else {
      document.getElementById('scheduleInner').style.display = 'none';
      decrementBtn.disabled = true;
    }
  }

  // Update selects for per-day bottles
  function updateAllSelectOptions() {
    document.querySelectorAll('.per-day-select').forEach(select => {
      const currentVal = parseInt(select.value || 0);
      select.innerHTML = '';
      for (let i = 0; i <= quantity; i++) {
        const opt = document.createElement('option');
        opt.value = i;
        opt.textContent = i;
        select.appendChild(opt);
      }
      select.value = Math.min(currentVal, quantity);
    });
  }

  // redistribute bottles among selected days
  function redistribute() {
    const activePairs = Array.from(dayCheckboxes)
      .filter(cb => cb.checked)
      .map(cb => {
        const label = cb.closest('.day-checkbox');
        return { cb, select: label.querySelector('.per-day-select') };
      });
    if (activePairs.length === 0) return;
    const numDays = activePairs.length;
    const perDayBase = Math.floor(quantity / numDays);
    const remainder = quantity % numDays;
    activePairs.forEach((pair, index) => {
      const val = perDayBase + (index < remainder ? 1 : 0);
      pair.select.value = val;
    });
  }

  // per-day select change handler
  function handlePerDayChange(e) {
    const thisSelect = e.target;
    const thisLabel = thisSelect.closest('.day-checkbox');
    const thisCb = thisLabel.querySelector('input[type="checkbox"]');
    if (!thisCb.checked) return;
    let proposed = parseInt(thisSelect.value);
    const activePairs = Array.from(dayCheckboxes)
      .filter(cb => cb.checked)
      .map(cb => {
        const label = cb.closest('.day-checkbox');
        return { cb, select: label.querySelector('.per-day-select') };
      })
      .filter(pair => pair.cb !== thisCb);
    const activeSelects = activePairs.map(pair => pair.select);
    let otherSum = 0;
    activeSelects.forEach(s => otherSum += parseInt(s.value || 0));
    const maxForThis = quantity - otherSum;
    let actual = Math.max(0, Math.min(proposed, maxForThis));
    thisSelect.value = actual;
    let remaining = quantity - actual;
    if (activeSelects.length > 0) {
      const perOther = Math.floor(remaining / activeSelects.length);
      const rem = remaining % activeSelects.length;
      activeSelects.forEach((s, i) => {
        s.value = perOther + (i < rem ? 1 : 0);
      });
    } else {
      // single day selected, adjust quantity
      quantity = actual;
      qtyDisplay.textContent = quantity;
      updateAllSelectOptions();
      fetchAndUpdatePrice(); // price depends on quantity for monthly total
      updateSummary();
    }
    updateSummary();
  }

  // quantity buttons
  decrementBtn.addEventListener('click', () => {
    // keep your original minimum of 4 if you want; original code prevented decrement below 4
    if (quantity > 1) { // allow reducing to 1 for more flexibility
      setQuantity(quantity - 1);
      updateAllSelectOptions();
      redistribute();
      fetchAndUpdatePrice();
      toggleSchedule();
      validateForm();
    }
  });

  incrementBtn.addEventListener('click', () => {
    if (quantity < 100) {
      setQuantity(quantity + 1);
      updateAllSelectOptions();
      redistribute();
      fetchAndUpdatePrice();
      toggleSchedule();
      validateForm();
    }
  });

  // day checkboxes toggle behavior
  dayCheckboxes.forEach(cb => {
    cb.addEventListener('change', () => {
      const label = cb.closest('.day-checkbox');
      const select = label.querySelector('.per-day-select');
      const bottlesText = label.querySelector('.bottles-text');
      const timeOptions = label.querySelector('.time-options-per-day');
      if (cb.checked) {
  if (select) select.style.display = 'inline-block';
  if (bottlesText) bottlesText.style.display = 'inline';
  if (timeOptions) timeOptions.style.display = 'block';
  updateAllSelectOptions();
} else {
  if (select) {
    select.style.display = 'none';
    select.value = 0;
  }
  if (bottlesText) bottlesText.style.display = 'none';
  if (timeOptions) timeOptions.style.display = 'none';
}

      redistribute();
      validateForm();
    });
  });

  // attach per-day select change listeners (some selects may not yet exist; attach to current)
  document.querySelectorAll('.per-day-select').forEach(select => {
    select.addEventListener('change', handlePerDayChange);
  });

  // Milk option click (handles the label with input inside)
  milkOptions.forEach(option => {
    option.addEventListener('click', function() {
      milkOptions.forEach(opt => opt.classList.remove('selected'));
      this.classList.add('selected');
      const input = this.querySelector('input[type="radio"]');
      if (input) selectedMilk = input.value;
      fetchAndUpdatePrice();
      updateSummary();
    });
  });

  // Unit option click
  unitOptions.forEach(option => {
    option.addEventListener('click', function() {
      unitOptions.forEach(opt => opt.classList.remove('selected'));
      this.classList.add('selected');
      const input = this.querySelector('input[type="radio"]');
      if (input) selectedUnit = input.value;
      fetchAndUpdatePrice();
      updateSummary();
    });
  });

  // months select change
  monthsSelect.addEventListener('change', function() {
    selectedMonths = readMonthsFromLabel();
    fetchAndUpdatePrice();
    validateForm();
  });

  // city select change (select2 or normal select)
  // handle both native change and select2 change
  function onCityChange() {
    // citySelect.value will be "" if not selected
    fetchAndUpdatePrice();
    updateSummary();
  }
  citySelect.addEventListener('change', onCityChange);
  if (window.jQuery && $(citySelect).data('select2')) {
    // select2 triggers 'change' already; redundancy ok
    $(citySelect).on('change', onCityChange);
  }

  // Read months initially
  selectedMonths = readMonthsFromLabel();

  // Build URL helper (encode params)
  function buildPriceUrl(city, milk, unit) {
    const params = new URLSearchParams();
    params.append('city', city);
    params.append('milk_type', milk);
    params.append('unit', unit);
    return '/get-price?' + params.toString();
  }

  // Fetch per-bottle price from server and update total
  function fetchAndUpdatePrice() {
    const city = citySelect.value;
    if (!city || !selectedMilk || !selectedUnit) {
      // hide price
      priceBox.style.display = 'none';
      lastFetchedUnitPrice = 0;
      return;
    }

    const url = buildPriceUrl(city, selectedMilk, selectedUnit);

    // show loading state
    priceBox.style.display = 'block';
    priceBox.textContent = 'Fetching price...';

    fetch(url, {
      credentials: 'same-origin',
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
      .then(res => res.json())
      .then(data => {
        if (data && data.success && typeof data.price !== 'undefined') {
          lastFetchedUnitPrice = Number(data.price) || 0;
          // compute total: per-bottle * quantity * months
          const total = (lastFetchedUnitPrice * quantity * selectedMonths);
          priceBox.innerHTML = `Your Subscription Amount: AED ${total}`;
        } else {
          lastFetchedUnitPrice = 0;
          priceBox.innerHTML = data && data.message ? `Price not found` : 'Price not found';
        }
        validateForm();
      })
      .catch(err => {
        console.error('Price fetch error:', err);
        lastFetchedUnitPrice = 0;
        priceBox.innerHTML = 'Error fetching price';
        validateForm();
      });
  }

  // Update summary UI (enable/disable sections)
  function updateSummary() {
    const city = citySelect.value;

    if (!city) {
      cityWarning.style.display = 'block';
      subscriptionDetails.style.display = 'none';
      priceBox.style.display = 'none';
      deliveryStep.style.display = 'none';
      addToCartBtn.disabled = true;
      return;
    }

    cityWarning.style.display = 'none';
    subscriptionDetails.style.display = 'block';
    deliveryStep.style.display = 'block';
    priceBox.style.display = 'block';
    // Update subscriptionDetails text if you have elements to update (subTitle, bottle size, etc.)
    const milkItem = document.querySelector('.milk-option.selected')?.querySelector('input')?.value || selectedMilk;
    const bottleSize = selectedUnit || document.querySelector('.unit-option.selected')?.querySelector('input')?.value || '1.5L';
    document.getElementById('subTitle').innerText = `Custom ${ (milkItem.charAt(0).toUpperCase() + milkItem.slice(1)) } Milk Subscription`;
    document.getElementById('bottleSizeSpan').innerText = bottleSize;
    document.getElementById('monthlyBottles').innerText = `${quantity} Bottles per Month`;
  }

  // Form validation enabling Add to Cart
  function validateForm() {
    const city = citySelect.value;
    if (!city) {
      addToCartBtn.disabled = true;
      scheduleError.style.display = 'none';
      return;
    }

    // schedule validation
    const selectedCount = Array.from(dayCheckboxes).filter(cb => cb.checked).length;
    let isValid = true;

    if (quantity < 1) {
      scheduleError.style.display = 'block';
      scheduleError.textContent = 'Please select at least 1 bottle per month.';
      isValid = false;
    } else if (selectedCount < 1) {
      scheduleError.style.display = 'block';
      scheduleError.textContent = 'Please select at least one delivery day.';
      isValid = false;
    } else {
      // ensure a time is chosen for each selected day
      let allTimesSelected = true;
      Array.from(dayCheckboxes).forEach(cb => {
        if (cb.checked) {
          const label = cb.closest('.day-checkbox');
          const dayName = cb.value;
          const timeRadios = label.querySelectorAll(`input[name="time-${dayName}"]`);
          const selectedTime = Array.from(timeRadios).some(r => r.checked);
          if (!selectedTime) allTimesSelected = false;
        }
      });
      if (!allTimesSelected) {
        scheduleError.style.display = 'block';
        scheduleError.textContent = 'Please select a time slot for each delivery day.';
        isValid = false;
      } else {
        scheduleError.style.display = 'none';
      }
    }

    // price must be fetched and > 0
    if (!(lastFetchedUnitPrice > 0)) {
      isValid = false;
    }

    addToCartBtn.disabled = !isValid;
  }

  // initial setup
  updateAllSelectOptions();
  // ensure Saturday/Monday appear selected as in your original HTML
  // show sat elements if sat checkbox exists
  const saturdayCb = Array.from(dayCheckboxes).find(cb => cb.value === 'Saturday');
  if (saturdayCb) {
    saturdayCb.checked = true;
    const satLabel = saturdayCb.closest('.day-checkbox');
    const satSelect = satLabel.querySelector('.per-day-select');
    const satBottlesText = satLabel.querySelector('.bottles-text');
    const satTimeOptions = satLabel.querySelector('.time-options-per-day');
    if (satSelect) satSelect.style.display = 'inline-block';
    if (satBottlesText) satBottlesText.style.display = 'inline';
    if (satTimeOptions) satTimeOptions.style.display = 'block';
  }
  redistribute();
  toggleSchedule();
  updateSummary();
  fetchAndUpdatePrice();
  validateForm();

  // Add to Cart handler
  addToCartBtn.addEventListener('click', function(e) {
    e.preventDefault();
    if (addToCartBtn.disabled) return;

    // Prepare data for adding to cart
    const city = citySelect.value;
    const milk = selectedMilk;
    const unit = selectedUnit;
    const months = readMonthsFromLabel();
    const perBottlePrice = lastFetchedUnitPrice;
    const totalAmount = (perBottlePrice * quantity * months);

    // Collect schedule details
    const schedule = {};
    Array.from(dayCheckboxes).forEach(cb => {
      if (cb.checked) {
        const dayName = cb.value;
        const label = cb.closest('.day-checkbox');
        const bottles = parseInt(label.querySelector('.per-day-select').value || 0, 10);
        const timeRadios = label.querySelectorAll(`input[name="time-${dayName}"]`);
        const selectedTime = Array.from(timeRadios).find(r => r.checked)?.value || '';
        schedule[dayName] = { bottles, time: selectedTime };
      }
    });

    // TODO: send to backend / add to cart endpoint - placeholder below
    console.log('Add to cart payload:', {
      city, milk, unit, quantity, months, perBottlePrice, totalAmount, schedule
    });

    // Replace the alert below with actual AJAX POST to your cart API if desired
    alert(`Added to cart:
City: ${city}
Milk: ${milk}
Unit: ${unit}
Quantity (per month): ${quantity}
Months: ${months}
Total: AED ${totalAmount}`);

    // Example: To POST to server (uncomment and adapt)
    /*
    fetch('/cart/add-subscription', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({
        city, milk, unit, quantity, months, perBottlePrice, totalAmount, schedule
      })
    }).then(res => res.json()).then(resp => {
      // handle success / redirect to checkout
    });
    */
  });
});
function updateTimeOptionsForCity(selectedCity) {
    const timeData = timeOptionsByCity[selectedCity] || [];
    dayCheckboxes.forEach(cb => {
      const label = cb.closest('.day-checkbox');
      const container = label.querySelector('.time-options-per-day');
      if (!container) return;
      container.innerHTML = ''; // Clear old options

      // Build new time radio buttons
      timeData.forEach((time, index) => {
        const radioId = `time-${cb.value}-${index}`;
        const labelEl = document.createElement('label');
        labelEl.className = 'time-radio';
        labelEl.style = 'display: flex; align-items: center; gap: 0.5rem; cursor: pointer;';

        const inputEl = document.createElement('input');
        inputEl.type = 'radio';
        inputEl.name = `time-${cb.value}`;
        inputEl.value = time.value;

        const spanEl = document.createElement('span');
        spanEl.textContent = time.label;

        labelEl.appendChild(inputEl);
        labelEl.appendChild(spanEl);
        container.appendChild(labelEl);
      });
    });
  }

  // ⚡ Hook into your existing city change event
  function onCityChange() {
    const city = citySelect.value;
    updateTimeOptionsForCity(city); // ✅ dynamically update time slots
    fetchAndUpdatePrice();
    updateSummary();
  }

  citySelect.addEventListener('change', onCityChange);
  if (window.jQuery && $(citySelect).data('select2')) {
    $(citySelect).on('change', onCityChange);
  }


document.addEventListener('DOMContentLoaded', function() {
  // Handle Select2 city dropdown
  $(document).on('select2:select', '#citySelect', function(e) {
    const city = this.value;
    console.log('Selected city:', city);

    if (!city) return;

    // Fetch slots dynamically
    fetch(`/get-city-slots/${city}`)
      .then(res => res.json())
      .then(data => {
        console.log('Slots fetched:', data);
        updateTimeSlotOptions(data);
      })
      .catch(err => console.error('Error fetching slots:', err));
  });

  // Function to update time slot radio buttons for each day
  function updateTimeSlotOptions(timeSlots) {
    const allDays = document.querySelectorAll('.time-options-per-day');
    allDays.forEach(container => {
      container.innerHTML = ''; // Clear old slots

      if (!timeSlots || timeSlots.length === 0) {
        container.innerHTML = '<p style="color:#999;">No slots available for this city</p>';
        return;
      }

      const dayName = container.closest('.day-checkbox').querySelector('.day-name').textContent;

      timeSlots.forEach((slot, index) => {
        const label = document.createElement('label');
        label.classList.add('time-radio');
        label.style.cssText = 'display:flex; align-items:center; gap:0.5rem; cursor:pointer; margin-bottom:4px;';

        label.innerHTML = `
          <input type="radio" name="time-${dayName}" value="${slot.id}" ${index === 0 ? 'checked' : ''}>
          <span>${slot.time}</span>
        `;
        container.appendChild(label);
      });
    });
  }

  // Auto-load if city preselected
  const preCity = $('#citySelect').val();
  if (preCity) {
    fetch(`/get-city-slots/${preCity}`)
      .then(res => res.json())
      .then(data => updateTimeSlotOptions(data));
  }
});
</script>



</body>
</html>