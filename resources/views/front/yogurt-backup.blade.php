<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Royal Fresh – Yogurt Subscription</title>
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

    /* Step 2: Yogurt Selection */
    .yogurt-options {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1.5rem;
    }

    .yogurt-option {
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

    .yogurt-option:hover {
      border-color: var(--gold);
      box-shadow: var(--shadow-md);
    }

    .yogurt-option.selected {
      border-color: var(--primary-brown);
      background: var(--light-brown);
      box-shadow: var(--shadow-md);
    }

    .yogurt-option img {
      width: 80px;
      height: 80px;
      object-fit: contain;
      margin-bottom: 1rem;
      filter: drop-shadow(0 2px 8px rgba(0,0,0,0.1));
    }

    .yogurt-option label {
      font-weight: 600;
      color: var(--dark-brown);
      margin-bottom: 0.5rem;
      font-size: 1rem;
    }

    .yogurt-option input[type="radio"] {
      display: none;
    }

    .yogurt-desc {
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

    .jars-text {
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

    .qty-btn:hover:not(:disabled) {
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
      color: #ccc;
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
      .yogurt-options {
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
      .yogurt-options {
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
        <div class="dropdown">
          <a href="#" class="dropdown-toggle">Subscription</a>
          <div class="dropdown-menu">
            <a href="/milk-subscription.html">Milk Subscription</a>
            <a href="/yogurt-subscription.html">Yogurt Subscription</a>
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

      <!-- <div id="timeSlotContainer"></div> -->

      <!-- Step 2: Yogurt Variety -->
      <div class="step">
        <div class="step-header">
          <div class="step-number">2</div>
          <h3 class="step-title">Select Your Preferred Yogurt Variety</h3>
        </div>
        <p class="step-subtitle">Each variety offers unique benefits and exquisite taste.</p>
        <div class="yogurt-options">
          <label class="yogurt-option selected">
            <input type="radio" name="yogurtType" value="cow" checked>
            <img src="Assets/filteration_images/cow_filteration.png" alt="Cow Yoghurt">
            <div>Cow Yoghurt</div>
            <div class="yogurt-desc">Classic &<br>Creamy</div>
          </label>
          <label class="yogurt-option">
            <input type="radio" name="yogurtType" value="buffalo">
            <img src="Assets/filteration_images/buffalo_filteration.png" alt="Buffalo Yoghurt">
            <div>Buffalo Yoghurt</div>
            <div class="yogurt-desc">Rich &<br>Thick</div>
          </label>
        </div>
      </div>
      
      <!-- Step 3: Unit Size -->
      <div class="step">
        <div class="step-header">
          <div class="step-number">3</div>
          <h3 class="step-title">Select Your Unit Size</h3>
        </div>
        <p class="step-subtitle">Choose the jar size that fits your needs.</p>
        <div class="unit-options">
          <label class="unit-option">
            <input type="radio" name="unitSize" value="1KG">
            <span class="unit-icon">🫙</span>
            <div class="unit-label">1 KG / Jar</div>
            <div class="unit-size-type">Regular Size</div>
          </label>
          <label class="unit-option">
            <input type="radio" name="unitSize" value="500g">
            <span class="unit-icon">🫙</span>
            <div class="unit-label">500 Gram / Jar</div>
            <div class="unit-size-type">Small Size</div>
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
    <input type="checkbox" name="days[]" value="Monday">
    <span class="day-name">Monday</span>
    <div class="time-slot-container"></div>
  </div>
  <div class="per-day-row">
    <select class="per-day-select"></select>
    <!-- <span class="bottles-text"> bottles</span> -->
  </div>

  <!-- Keep empty, will be filled dynamically -->
  <div class="time-options-per-day"></div>
</label>

            <label class="day-checkbox">
              <div style="display: flex; align-items: center; gap: 0.75rem; flex: 1;">
                <input type="checkbox" name="days[]" value="Tuesday">
                <span class="day-name">Tuesday</span>
                <div class="time-slot-container"></div>
              </div>
              <div class="per-day-row">
                <select class="per-day-select"></select>
                <!-- <span class="bottles-text"> bottles</span> -->
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
                <input type="checkbox" name="days[]" value="Wednesday">
                <span class="day-name">Wednesday</span>
                <div class="time-slot-container"></div>
              </div>
              <div class="per-day-row">
                <select class="per-day-select"></select>
                <!-- <span class="bottles-text"> bottles</span> -->
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
                <input type="checkbox" name="days[]" value="Thursday">
                <span class="day-name">Thursday</span>
                <div class="time-slot-container"></div>
              </div>
              <div class="per-day-row">
                <select class="per-day-select"></select>
                <!-- <span class="bottles-text"> bottles</span> -->
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
                <input type="checkbox" name="days[]" value="Friday">
                <span class="day-name">Friday</span>
                <div class="time-slot-container"></div>
              </div>
              <div class="per-day-row">
                <select class="per-day-select"></select>
                <!-- <span class="bottles-text"> bottles</span> -->
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
                <input type="checkbox" name="days[]" value="Saturday" checked>
                <span class="day-name">Saturday</span>
                <div class="time-slot-container"></div>
              </div>
              <div class="per-day-row">
                <select class="per-day-select"></select>
                <!-- <span class="bottles-text"> bottles</span> -->
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
                <input type="checkbox" name="days[]" value="Sunday">
                <span class="day-name">Sunday</span>
                <div class="time-slot-container"></div>
              </div>
              <div class="per-day-row">
                <select class="per-day-select"></select>
                <!-- <span class="bottles-text"> bottles</span> -->
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
        <h4 id="subTitle">Custom Cow Yoghurt Subscription</h4>
        <p id="jarSize">Jar Size: <span id="jarSizeSpan">1KG</span></p>
        <p id="planDetails"><i class="fas fa-check"></i> <span id="monthlyJars"></span></p>
        <p>Subscription Duration: 
          <select id="monthsSelect">
            <option value="1" selected>1 Months</option>
            <option value="3">3 Months</option>
            <option value="6">6 Months</option>
            <option value="12">12 Months</option>
          </select>
        </p>
      </div>
      <div id="priceBox" class="price-box" style="display: none;">Your Subscription Amount: AED 0</div>
      <div class="flex-note">
        <i class="fas fa-check-circle"></i> Flexible Subscription: Cancel or modify anytime.
      </div>
      <button class="add-to-cart-btn" id="addToCartBtn" disabled>
        <i class="fas fa-shopping-cart"></i> Add to Cart
      </button>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
document.addEventListener('DOMContentLoaded', function() {
  // Elements (your existing IDs/classes)
  const citySelect = document.getElementById('citySelect');
  const yogurtOptions = document.querySelectorAll('.yogurt-option');
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
  let selectedYogurt = 'cow';
  // Do not preselect a unit by default; user will choose one
  let selectedUnit = '';
  let quantity = parseInt(qtyDisplay.textContent, 10) || 4;
  let selectedMonths = 1; // will be read from option label text
  let lastFetchedUnitPrice = 0; // price per jar from DB

  // Initialize select2
  if (window.jQuery && $(citySelect).select2) {
    $(citySelect).select2({
      placeholder: "— Select Your City —",
      allowClear: true,
      width: '100%'
    });
    // ensure select2 triggers change events we handle
    $(citySelect).on('change', onCityChange);
  }

  // helper: read months from select label text (handles incorrect numeric values in 'value' attr)
  function readMonthsFromLabel() {
    if (!monthsSelect) return 1;
    const opt = monthsSelect.options[monthsSelect.selectedIndex];
    if (!opt) return 1;
    const parsed = parseInt(opt.textContent.trim(), 10);
    return (Number.isInteger(parsed) && parsed > 0) ? parsed : 1;
  }

  // Update quantity UI
  function setQuantity(q) {
    quantity = q;
    qtyDisplay.textContent = quantity;
    // disable decrement when reaching min (4) to match your earlier behavior
    decrementBtn.disabled = (quantity <= 4);
  }

  // toggle schedule visibility (if you have an inner wrapper; otherwise keep schedule visible)
  function toggleSchedule() {
    if (quantity > 0) {
      if (document.getElementById('scheduleInner')) document.getElementById('scheduleInner').style.display = 'block';
      decrementBtn.disabled = false;
    } else {
      if (document.getElementById('scheduleInner')) document.getElementById('scheduleInner').style.display = 'none';
      decrementBtn.disabled = true;
    }
  }

  // Update selects for per-day jars
  function updateAllSelectOptions() {
    // Special-case: when monthly quantity == 4, per-day selects represent bottles PER DELIVERY (0..1)
    // For other quantities we keep per-day options up to the monthly quantity (legacy behavior)
    const isStrict4 = (quantity === 4);
    const maxOption = isStrict4 ? 1 : quantity;
    document.querySelectorAll('.per-day-select').forEach(select => {
      const currentVal = parseInt(select.value || 0, 10);
      select.innerHTML = '';
      for (let i = 0; i <= maxOption; i++) {
        const opt = document.createElement('option');
        opt.value = i;
        opt.textContent = i;
        select.appendChild(opt);
      }
      select.value = Math.min(currentVal, maxOption);
    });
  }

  // Show/hide per-day controls when a day checkbox is toggled
  dayCheckboxes.forEach(cb => {
    const label = cb.closest('.day-checkbox');
    const select = label.querySelector('.per-day-select');
    // some entries use 'bottles-text' or 'jars-text' naming; prefer either
    const jarsText = label.querySelector('.bottles-text') || label.querySelector('.jars-text') || label.querySelector('.jars-text');
    const timeOptions = label.querySelector('.time-options-per-day');

    function updateForCheck(e) {
      const newState = e ? e.target.checked : cb.checked;

      // If strict 4-bottle rule applies, prevent checking more than 1 day
      if (quantity === 4 && newState) {
        const currentlyChecked = Array.from(dayCheckboxes).filter(x => x.checked).length;
        if (currentlyChecked > 1) {
          // undo the attempted check and inform user
          e.target.checked = false;
          scheduleError.style.display = 'block';
          scheduleError.textContent = 'For 4 bottles/month you may only choose one delivery day (1 bottle/week).';
          setTimeout(() => { scheduleError.style.display = 'none'; }, 3000);
          return;
        }
      }

      if (newState) {
        if (select) select.style.display = 'inline-block';
        if (jarsText) jarsText.style.display = 'inline';
        if (timeOptions) timeOptions.style.display = 'block';
      } else {
        if (select) select.style.display = 'none';
        if (jarsText) jarsText.style.display = 'none';
        if (timeOptions) timeOptions.style.display = 'none';
        if (select) select.value = 0;
      }

      // rebalance and refresh UI
      redistribute();
      updateSummary();
      // recalc delivery + product price whenever schedule changes
      if (typeof updatePriceDisplay === 'function') updatePriceDisplay();
      validateForm();
    }

    cb.addEventListener('change', updateForCheck);
  });

  // redistribute jars among selected days
  // When quantity === 4 we distribute weekly-needed (1) as per-delivery bottles (0..1)
  function redistribute() {
    const selected = Array.from(dayCheckboxes).filter(cb => cb.checked);
    if (selected.length === 0) return;

    if (quantity === 4) {
      // only one day allowed and it should have 1 per delivery
      selected.forEach((cb, i) => {
        const label = cb.closest('.day-checkbox');
        const sel = label.querySelector('.per-day-select');
        if (sel) sel.value = (i === 0 ? 1 : 0);
      });
      return;
    }

    // legacy behavior: distribute monthly quantity across selected days
    const activePairs = selected.map(cb => {
      const label = cb.closest('.day-checkbox');
      return { cb, select: label.querySelector('.per-day-select') };
    });
    const numDays = activePairs.length;
    const perDayBase = Math.floor(quantity / numDays);
    const remainder = quantity % numDays;
    activePairs.forEach((pair, index) => {
      if (pair.select) pair.select.value = perDayBase + (index < remainder ? 1 : 0);
    });
  }

  // per-day select change handler
  function handlePerDayChange(e) {
    const thisSelect = e.target;
    const thisLabel = thisSelect.closest('.day-checkbox');
    const thisCb = thisLabel.querySelector('input[type="checkbox"]');
    if (!thisCb.checked) return;
    // If strict 4-bottle rule applies, keep per-day value to 1 and do not allow changes
    if (quantity === 4) {
      thisSelect.value = 1;
      updateSummary();
      return;
    }

    // legacy behavior: per-day selects are monthly portions
    let proposed = parseInt(thisSelect.value || 0, 10);
    const otherSelects = Array.from(dayCheckboxes)
      .filter(cb => cb.checked && cb !== thisCb)
      .map(cb => cb.closest('.day-checkbox').querySelector('.per-day-select'));
    const otherSum = otherSelects.reduce((s, sel) => s + parseInt(sel.value || 0, 10), 0);
    const maxForThis = Math.max(0, quantity - otherSum);
    const actual = Math.max(0, Math.min(proposed, maxForThis));
    thisSelect.value = actual;

    const remaining = quantity - actual;
    if (otherSelects.length > 0) {
      const perOther = Math.floor(remaining / otherSelects.length);
      const rem = remaining % otherSelects.length;
      otherSelects.forEach((s, i) => { s.value = perOther + (i < rem ? 1 : 0); });
    }
    updateSummary();
  }

  // attach per-day select change listeners
  document.querySelectorAll('.per-day-select').forEach(select => {
    select.addEventListener('change', handlePerDayChange);
  });

  // yogurt option click (handles the label with input inside)
  yogurtOptions.forEach(option => {
    option.addEventListener('click', function() {
      yogurtOptions.forEach(opt => opt.classList.remove('selected'));
      this.classList.add('selected');
      const input = this.querySelector('input[type="radio"]');
      if (input) selectedYogurt = input.value;
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
  if (monthsSelect) {
    monthsSelect.addEventListener('change', function() {
      selectedMonths = readMonthsFromLabel();
      fetchAndUpdatePrice();
      validateForm();
    });
    selectedMonths = readMonthsFromLabel();
  }

  // city select change (select2 or normal select)
  function onCityChange() {
    fetchAndUpdatePrice();
    updateSummary();
  }
  citySelect.addEventListener('change', onCityChange);

  // Build URL helper (encode params) - uses yogurt_type
  function buildPriceUrl(city, yogurt, unit) {
    const params = new URLSearchParams();
    params.append('city', city);
    params.append('yogurt_type', yogurt);
    params.append('unit', unit);
    return '/get-yogurt-price?' + params.toString();
  }

  // Fetch per-jar price from server and update total
  function fetchAndUpdatePrice() {
    const city = citySelect.value;
    if (!city || !selectedYogurt || !selectedUnit) {
      // hide price
      priceBox.style.display = 'none';
      lastFetchedUnitPrice = 0;
      validateForm();
      return;
    }

    const url = buildPriceUrl(city, selectedYogurt, selectedUnit);

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
        } else {
          lastFetchedUnitPrice = 0;
        }
        // update combined display (product + delivery)
        updatePriceDisplay();
        validateForm();
      })
      .catch(err => {
        console.error('Price fetch error:', err);
        lastFetchedUnitPrice = 0;
        updatePriceDisplay();
        validateForm();
      });
  }

  // Calculate delivery charges based on selected days/time slots
  function calculateDeliveryCharges() {
    // sum per-delivery charge for each selected day
    let chargePerDelivery = 0;
    Array.from(dayCheckboxes).forEach(cb => {
      if (!cb.checked) return;
      const dayName = cb.value;
      const label = cb.closest('.day-checkbox');
      const timeRadio = label.querySelector(`input[name="time-${dayName}"]:checked`);
      if (timeRadio) {
        const c = parseFloat(timeRadio.dataset.charge || timeRadio.getAttribute('data-charge') || 0);
        chargePerDelivery += isFinite(c) ? c : 0;
      }
    });
    // total delivery charge = per-delivery sum * 4 weeks * months
    const months = readMonthsFromLabel();
    return chargePerDelivery * 4 * months;
  }

  // Update the price box to include product total + delivery charges
  function updatePriceDisplay() {
    const months = readMonthsFromLabel();
    const productTotal = (lastFetchedUnitPrice || 0) * quantity * months;
    const deliveryTotal = calculateDeliveryCharges();
    const combined = productTotal + deliveryTotal;
    if (!priceBox) return;
    // show formatted result
    priceBox.style.display = 'block';
    priceBox.innerHTML = `
      <div style="font-weight:700;">Your Subscription Amount: AED ${combined.toFixed(2)}</div>
      <div style="margin-top:8px; font-size:0.95rem; color:#fff; opacity:0.95;">
        <div>Product: AED ${productTotal.toFixed(2)}</div>
        <div>Delivery: AED ${deliveryTotal.toFixed(2)}</div>
      </div>
    `;
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

    // Update subscriptionDetails text
    const yogurtItem = selectedYogurt;
  const unitLabel = selectedUnit || document.querySelector('.unit-option.selected')?.querySelector('input')?.value || '';
  document.getElementById('subTitle').innerText = `Custom ${ (yogurtItem.charAt(0).toUpperCase() + yogurtItem.slice(1)) } Yoghurt Subscription`;
  document.getElementById('jarSizeSpan').innerText = unitLabel || '—';
    document.getElementById('monthlyJars').innerText = `${quantity} Jars per Month`;
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
      scheduleError.textContent = 'Please select at least 1 jar per month.';
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
  const saturdayCb = Array.from(dayCheckboxes).find(cb => cb.value === 'Saturday');
  if (saturdayCb) {
    saturdayCb.checked = true;
    const satLabel = saturdayCb.closest('.day-checkbox');
    const satSelect = satLabel.querySelector('.per-day-select');
    const satJarsText = satLabel.querySelector('.jars-text');
    const satTimeOptions = satLabel.querySelector('.time-options-per-day');
    if (satSelect) satSelect.style.display = 'inline-block';
    if (satJarsText) satJarsText.style.display = 'inline';
    if (satTimeOptions) satTimeOptions.style.display = 'block';
  }
  redistribute();
  toggleSchedule();
  updateSummary();
  fetchAndUpdatePrice();
  validateForm();

  // Wire quantity buttons to update behavior and enforce the strict-4 rule
  function enforceDayLimitOnQuantityChange() {
    if (quantity !== 4) return;
    // if quantity is exactly 4, ensure at most one day is selected and that day's select = 1
    const checked = Array.from(dayCheckboxes).filter(cb => cb.checked);
    if (checked.length > 1) {
      // uncheck extras (keep the first)
      const toUncheck = checked.slice(1);
      toUncheck.forEach(cb => {
        cb.checked = false;
        const label = cb.closest('.day-checkbox');
        const sel = label.querySelector('.per-day-select');
        const jarsText = label.querySelector('.bottles-text') || label.querySelector('.jars-text');
        const timeOptions = label.querySelector('.time-options-per-day');
        if (sel) sel.style.display = 'none';
        if (jarsText) jarsText.style.display = 'none';
        if (timeOptions) timeOptions.style.display = 'none';
        if (sel) sel.value = 0;
      });
      const first = checked[0];
      if (first) {
        const label = first.closest('.day-checkbox');
        const sel = label.querySelector('.per-day-select');
        if (sel) { sel.style.display = 'inline-block'; sel.value = 1; }
      }
      scheduleError.style.display = 'block';
      scheduleError.textContent = 'Selection adjusted: for 4 bottles/month please choose one day (1 bottle/week).';
      setTimeout(() => { scheduleError.style.display = 'none'; }, 3000);
    }
  }

  if (incrementBtn) {
    incrementBtn.addEventListener('click', function() {
      setQuantity(quantity + 1);
      updateAllSelectOptions();
      enforceDayLimitOnQuantityChange();
      redistribute();
      fetchAndUpdatePrice();
      updateSummary();
      validateForm();
    });
  }
  if (decrementBtn) {
    decrementBtn.addEventListener('click', function() {
      const newQ = Math.max(4, quantity - 1);
      setQuantity(newQ);
      updateAllSelectOptions();
      enforceDayLimitOnQuantityChange();
      redistribute();
      fetchAndUpdatePrice();
      updateSummary();
      validateForm();
    });
  }

  // Add to Cart handler
  addToCartBtn.addEventListener('click', function(e) {
    e.preventDefault();
    if (addToCartBtn.disabled) return;

    // Prepare data for adding to cart
    const city = citySelect.value;
    const yogurt = selectedYogurt;
    const unit = selectedUnit;
    const months = readMonthsFromLabel();
    const perJarPrice = lastFetchedUnitPrice;
    const totalAmount = (perJarPrice * quantity * months);

    // Collect schedule details
    const schedule = {};
    Array.from(dayCheckboxes).forEach(cb => {
      if (cb.checked) {
        const dayName = cb.value;
        const label = cb.closest('.day-checkbox');
        const jars = parseInt(label.querySelector('.per-day-select').value || 0, 10);
        const timeRadios = label.querySelectorAll(`input[name="time-${dayName}"]`);
        const selectedTime = Array.from(timeRadios).find(r => r.checked)?.value || '';
        schedule[dayName] = { jars, time: selectedTime };
      }
    });

    // TODO: send to backend / add to cart endpoint - placeholder below
    console.log('Add to cart payload:', {
      city, yogurt, unit, quantity, months, perJarPrice, totalAmount, schedule
    });

    alert(`Added to cart:
City: ${city}
Yoghurt: ${yogurt}
Unit: ${unit}
Quantity (per month): ${quantity}
Months: ${months}
Total: AED ${totalAmount}`);

    // Example: To POST to server (uncomment and adapt)
    /*
    fetch('/cart/add-yoghurt-subscription', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      },
      body: JSON.stringify({
        city, yogurt, unit, quantity, months, perJarPrice, totalAmount, schedule
      })
    }).then(res => res.json()).then(resp => {
      // handle success / redirect to checkout
    });
    */
  });
});


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
          <input type="radio" name="time-${dayName}" value="${slot.id}" data-charge="${slot.charge || 0}" ${index === 0 ? 'checked' : ''}>
          <span>${slot.time} (AED ${slot.charge || 0})</span>
        `;
        container.appendChild(label);
      });

      // attach change listeners so delivery charge updates immediately
      const radios = container.querySelectorAll(`input[name="time-${dayName}"]`);
      radios.forEach(r => r.addEventListener('change', function() {
        if (typeof updatePriceDisplay === 'function') updatePriceDisplay();
      }));
    });
  }

  // Auto-load if city preselected
  const preCity = $('#citySelect').val();
  if (preCity) {
    fetch(`/get-city-slots/${preCity}`)
      .then(res => res.json())
      .then(data => updateTimeSlotOptions(data));
  }

  // Delegate: whenever any time-slot radio changes, refresh the combined price
  document.addEventListener('change', function(e) {
    const t = e.target;
    if (!t) return;
    if (t.matches && (t.matches('input[type="radio"][name^="time-"]') || t.matches('input[name="timeSlot"]'))) {
      if (typeof updatePriceDisplay === 'function') updatePriceDisplay();
    }
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const citySelect = document.getElementById('citySelect');
  const daysCheckboxes = document.querySelectorAll('input[name="days[]"]');
  const monthsSelect = document.getElementById('monthsSelect');
  const timeSlotContainer = document.getElementById('timeSlotContainer');
  const amountDisplay = document.getElementById('priceBox');

  let selectedSlotCharge = 0;

  // Fetch slots on city change
   $(document).on('select2:select', '#citySelect', function(e) {
      const city = this.value;
 
    if (!city) return;

    fetch(`/get-city-slots/${city}`)
      .then(res => res.json())
      .then(data => {
        console.log("Slots fetchedddd:", data);
        timeSlotContainer.innerHTML = '';
        data.forEach(slot => {
            console.log(slot.charge);
            
          const label = document.createElement('label');

          label.innerHTML = `
            <input type="radio" name="timeSlot" value="${slot.id}" data-charge="${slot.charge}">
            ${slot.time} (AED ${slot.charge})
          `;
          timeSlotContainer.appendChild(label);
        });

        // When user selects time slot (global radios), update combined price
        document.querySelectorAll('input[name="timeSlot"]').forEach(radio => {
          radio.addEventListener('change', function() {
            selectedSlotCharge = parseFloat(this.dataset.charge);
            if (typeof updatePriceDisplay === 'function') updatePriceDisplay();
            else calculateTotal();
          });
        });
      });
  });

  // When days or months change
  daysCheckboxes.forEach(cb => cb.addEventListener('change', function() {
    if (typeof updatePriceDisplay === 'function') updatePriceDisplay(); else calculateTotal();
  }));
  monthsSelect.addEventListener('change', function() {
    if (typeof updatePriceDisplay === 'function') updatePriceDisplay(); else calculateTotal();
  });

  function calculateTotal() {
    // Deprecated: kept for backward compatibility. Prefer updatePriceDisplay()
    if (typeof updatePriceDisplay === 'function') {
      updatePriceDisplay();
      return;
    }
    const selectedDays = [...daysCheckboxes].filter(cb => cb.checked).length;
    const months = parseInt(monthsSelect.value) || 1;

    if (!selectedSlotCharge || selectedDays === 0) {
      amountDisplay.innerHTML = `Your Subscription Amount: AED 0.00`;
      return;
    }

    const total = selectedSlotCharge * selectedDays * 4 * months;
    amountDisplay.innerHTML = `
      Your Subscription Amount: <strong style="color:green">AED ${total.toFixed(2)}</strong>
      <br><small>(${selectedDays} days/week × AED ${selectedSlotCharge} × 4 weeks × ${months} month)</small>
    `;
  }
});


</script>



</body>
</html>