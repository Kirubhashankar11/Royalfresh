<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Royal Fresh – Premium Products</title>
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

    .cart-header {
      position: relative;
      cursor: pointer;
      padding: 0.5rem;
      border-radius: 50%;
      transition: all 0.3s;
      background: transparent;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .cart-header:hover {
      background: var(--light-brown);
      transform: scale(1.05);
    }

    .cart-header i {
      font-size: 1.2rem;
      color: var(--dark-brown);
    }

    .cart-badge {
      position: absolute;
      top: -5px;
      right: -5px;
      background: var(--gold);
      color: var(--dark-brown);
      border-radius: 50%;
      min-width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.8rem;
      font-weight: bold;
    }

    .filter-toggle {
      background: var(--primary-brown);
      color: white;
      border: none;
      padding: 0.8rem;
      border-radius: 50%;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: var(--shadow-sm);
      display: flex;
      align-items: center;
      justify-content: center;
      width: 45px;
      height: 45px;
    }

    .filter-toggle:hover {
      background: var(--dark-brown);
      transform: scale(1.1);
      box-shadow: var(--shadow-md);
    }

    .filter-toggle i {
      font-size: 1rem;
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

    /* === Filter Bar === */
    /* === Filter Bar === */
    .filter-bar {
      position: fixed;
      top: 80px;
      /* Adjusted for desktop view to reduce gap above filter section */
      left: 0;
      right: 0;
      z-index: 999;
      background: white;
      padding: 1rem 4vw;
      border-bottom: 1px solid var(--light-brown);
      box-shadow: var(--shadow-md);
      display: flex;
      gap: 2rem;
      overflow-x: auto;
      scrollbar-width: thin;
      transform: translateY(-100%);
      opacity: 0;
      transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .filter-bar.active {
      transform: translateY(0);
      opacity: 1;
    }

    .filter-bar::-webkit-scrollbar {
      height: 6px;
    }

    .filter-bar::-webkit-scrollbar-track {
      background: var(--light-brown);
      border-radius: 10px;
    }

    .filter-bar::-webkit-scrollbar-thumb {
      background: var(--gold);
      border-radius: 10px;
    }

    .filter-group {
      flex-shrink: 0;
      width: 180px;
      margin-bottom: 0;
    }

    .filter-group h4 {
      font-size: 0.95rem;
      color: var(--dark-brown);
      margin-bottom: 0.8rem;
      font-weight: 600;
    }

    .filter-select {
      width: 100%;
    }

    .price-range {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .price-inputs {
      display: flex;
      gap: 0.5rem;
    }

    .price-inputs input {
      width: 100%;
      border: 1.5px solid var(--light-brown);
      border-radius: 6px;
      padding: 0.4rem 0.5rem;
      background: white;
      color: var(--dark-brown);
      font-weight: 500;
      font-size: 0.85rem;
      outline: none;
      transition: all 0.3s;
    }

    .price-inputs input:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 2px rgba(200, 169, 126, 0.2);
    }

    .price-slider {
      width: 100%;
      height: 4px;
      background: var(--light-brown);
      border-radius: 3px;
      outline: none;
      -webkit-appearance: none;
    }

    .price-slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: var(--gold);
      cursor: pointer;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
      transition: all 0.3s;
    }

    .price-slider::-moz-range-thumb {
      appearance: none;
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: var(--gold);
      cursor: pointer;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
      border: none;
    }

    .filter-buttons {
      display: flex;
      gap: 0.5rem;
      margin-top: 0.5rem;
      flex-shrink: 0;
    }

    .filter-btn {
      flex: 1;
      padding: 0.6rem 0;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 0.85rem;
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

    /* === Main Content === */
    .main-content {
      margin-top: 100px;
      padding: 2rem 4vw;
      transition: padding-top 0.3s ease;
    }

    .container {
      max-width: 1600px;
      margin: 0 auto;
      display: flex;
      gap: 3rem;
    }

    /* === Cart Sidebar - Fixed with Scroll === */
    .cart-sidebar {
      width: 320px;
      background: white;
      border-radius: 20px;
      padding: 2rem 1.5rem;
      box-shadow: var(--shadow-sm);
      border: 1px solid rgba(232, 225, 213, 0.5);
      height: calc(100vh - 140px);
      position: sticky;
      top: 120px;
      overflow-y: auto;
      transition: all 0.3s ease;
    }

    .cart-sidebar::-webkit-scrollbar {
      width: 6px;
    }

    .cart-sidebar::-webkit-scrollbar-track {
      background: var(--light-brown);
      border-radius: 10px;
    }

    .cart-sidebar::-webkit-scrollbar-thumb {
      background: var(--gold);
      border-radius: 10px;
    }

    .cart-sidebar h3 {
      font-size: 1.5rem;
      color: var(--primary-brown);
      margin-bottom: 1.5rem;
      padding-bottom: 12px;
      border-bottom: 2px solid var(--gold);
      font-family: 'Playfair Display', serif;
    }

    .cart-item {
      display: flex;
      align-items: flex-start;
      gap: 1rem;
      padding: 1rem;
      margin-bottom: 1.2rem;
      border: 1px solid var(--light-brown);
      border-radius: 12px;
      transition: all 0.2s;
      position: relative;
    }

    .cart-item:hover {
      background: var(--light-brown);
      box-shadow: var(--shadow-sm);
    }

    .cart-item img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 50%;
      border: 2px solid var(--light-brown);
      flex-shrink: 0;
    }

    .cart-item>div {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 0.3rem;
    }

    .cart-title {
      font-size: 0.95rem;
      font-weight: 500;
    }

    .cart-weight {
      font-size: 0.85rem;
      color: var(--primary-brown);
      font-style: italic;
    }

    .cart-price {
      font-size: 0.9rem;
      color: var(--primary-brown);
    }

    .quantity-controls {
      display: flex;
      align-items: center;
      gap: 0.8rem;
      margin-top: 0.3rem;
      justify-content: flex-start;
    }

    .quantity-controls button {
      background: var(--primary-brown);
      border: none;
      color: white;
      border-radius: 6px;
      padding: 0.3rem 0.6rem;
      font-weight: bold;
      font-size: 0.9rem;
      cursor: pointer;
      user-select: none;
      transition: all 0.3s;
      box-shadow: var(--shadow-sm);
      width: 35px;
      height: 35px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .quantity-controls button:hover {
      background: var(--dark-brown);
      transform: scale(1.05);
    }

    .quantity-controls input {
      width: 45px;
      border: 1.5px solid var(--light-brown);
      border-radius: 6px;
      text-align: center;
      font-size: 0.9rem;
      font-weight: 600;
      padding: 0.3rem 0;
      color: var(--dark-brown);
      background: white;
      outline: none;
      user-select: none;
      transition: all 0.3s;
    }

    .remove-btn {
      position: absolute;
      top: 0.5rem;
      right: 0.5rem;
      background: rgba(220, 53, 69, 0.8);
      color: white;
      border: none;
      width: 24px;
      height: 24px;
      border-radius: 50%;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.8rem;
      transition: all 0.3s;
      z-index: 1;
    }

    .remove-btn:hover {
      background: rgba(220, 53, 69, 1);
      transform: scale(1.1);
    }

    .cart-total {
      font-weight: bold;
      font-size: 1.2rem;
      color: var(--primary-brown);
      padding: 1rem 0;
      text-align: right;
      margin-top: 1rem;
      border-top: 2px solid var(--gold);
    }

    /* === Delivery Setup Styles === */
    .delivery-setup {
      margin-top: 1.5rem;
      padding-top: 1rem;
      border-top: 2px solid var(--gold);
    }

    .delivery-setup h4 {
      font-size: 1.1rem;
      color: var(--primary-brown);
      margin-bottom: 1rem;
      font-family: 'Playfair Display', serif;
    }

    .delivery-setup>div {
      margin-bottom: 1rem;
    }

    .delivery-setup label {
      display: block;
      font-size: 0.9rem;
      font-weight: 500;
      color: var(--dark-brown);
      margin-bottom: 0.5rem;
    }

    .delivery-setup select,
    .delivery-setup input[type=number] {
      width: 100%;
      padding: 0.6rem;
      border: 1.5px solid var(--light-brown);
      border-radius: 8px;
      background: white;
      color: var(--dark-brown);
      font-size: 0.95rem;
      outline: none;
      transition: all 0.3s;
    }

    .delivery-setup select:focus,
    .delivery-setup input[type=number]:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 3px rgba(200, 169, 126, 0.2);
    }

    .delivery-setup .checkbox-group {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .delivery-setup .checkbox-group input[type=checkbox] {
      width: auto;
      margin-right: 0.5rem;
    }

    .delivery-setup .checkbox-group label {
      display: flex;
      align-items: center;
      font-size: 0.9rem;
      cursor: pointer;
    }

    .proceed-btn {
      background: var(--primary-brown);
      color: white;
      border: none;
      border-radius: 25px;
      padding: 1rem;
      cursor: pointer;
      font-size: 1rem;
      font-weight: 600;
      transition: all 0.3s;
      width: 100%;
      margin-top: 1rem;
      box-shadow: 0 4px 10px rgba(98, 69, 28, 0.2);
    }

    .proceed-btn:hover:not(:disabled) {
      background: var(--dark-brown);
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(98, 69, 28, 0.3);
    }

    .proceed-btn:disabled {
      background: var(--light-brown);
      color: var(--dark-brown);
      cursor: not-allowed;
      transform: none;
      box-shadow: none;
    }

    /* === Products Container === */
    .products-container {
      flex: 1;
    }

    .products-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
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
      opacity: 0;
      transform: translateY(30px);
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
      box-shadow: var(--shadow-md);
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

    .add-cart-btn:active {
      transform: translateY(-1px);
    }

    /* === Responsive Overrides === */
    @media (max-width: 1200px) {
      .products-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 1024px) {
      .container {
        flex-direction: column;
        padding: 0;
        gap: 2.5rem;
      }

      .cart-sidebar {
        width: 100%;
        position: static;
        height: auto;
        max-height: 400px;
      }

      .products-grid {
        grid-template-columns: repeat(2, 1fr);
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

      .cart-header,
      .filter-toggle {
        display: none;
      }

      .mobile-menu-btn {
        display: block;
      }

      .main-content {
        margin-top: 140px;
        padding: 1rem 2vw;
      }

      .products-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .filter-bar {
        flex-direction: column;
        gap: 1rem;
        overflow-x: visible;
        top: 120px;
        padding: 1rem 2vw;
      }

      .filter-group {
        width: 100%;
      }

      .filter-bar.active {
        padding-bottom: 2rem;
      }

      .side-nav {
        width: 100%;
        right: -100%;
      }
    }

    @media (max-width: 480px) {
      .products-grid {
        grid-template-columns: 1fr;
      }

      .category-title {
        font-size: 1.8rem;
      }
    }
  </style>
</head>

<body>
  <!-- === Premium Header === -->
  <header id="mainHeader">
    <div class="header-container">
      <div class="logo">
        <img src="{{ asset('Assets/logo.png') }}" alt="Logo" />
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


      <button id="toggleFilter" class="filter-toggle">
        <i class="fas fa-filter"></i>
      </button>
    </div>
  </header>

  <!-- === Filter Bar === -->
  <div class="filter-bar">
    <div class="filter-group">
      <h4>Categories</h4>
      <select id="categoriesFilter" class="filter-select" multiple="multiple">
        @foreach($categories as $category)
          <option value="{{ $category->name }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="filter-group">
      <h4>Price Range</h4>
      <div class="price-range">
        <div class="price-inputs">
          <input type="number" placeholder="Min" value="0">
          <input type="number" placeholder="Max" value="100">
        </div>
        <input type="range" class="price-slider" min="0" max="100" value="100">
      </div>
    </div>

    <div class="filter-group">
      <h4>Weight Options</h4>
      <select id="weightsFilter" class="filter-select" multiple="multiple">
        <option value="250 grams">250 grams</option>
        <option value="500 grams">500 grams</option>
        <option value="1 kg">1 kg</option>
        <option value="1 litre">1 litre</option>
        <option value="2 litre">2 litre</option>
        <option value="5 litre">5 litre</option>
      </select>
    </div>

    <div class="filter-group">
      <h4>Availability</h4>
      <select id="availabilityFilter" class="filter-select" multiple="multiple">
        <option value="In Stock">In Stock</option>
        <option value="Out of Stock">Out of Stock</option>
      </select>
    </div>

    <div class="filter-group">
      <h4>Ratings</h4>
      <select id="ratingsFilter" class="filter-select" multiple="multiple">
        <option value="5">★★★★★</option>
        <option value="4">★★★★☆ & above</option>
        <option value="3">★★★☆☆ & above</option>
      </select>
    </div>

    <div class="filter-group">
      <div class="filter-buttons">
        <button class="filter-btn apply-btn">Apply Filters</button>
        <button class="filter-btn reset-btn">Reset</button>
      </div>
    </div>
  </div>

  <!-- === Main Content === -->
  <div class="main-content">
    <div class="container">
      <!-- Cart Sidebar -->
      <aside class="cart-sidebar">
        <div>
          <h3>Shopping Cart</h3>
          <p>Your cart is empty</p>

          <div class="subscription-section">
            <h4>Subscription</h4>

            <div class="dropdown mb-2">
              <label>Subscription Month:</label>
              <select id="subscription-month">
                <option value="">Select</option>
                <option value="1">1 Month</option>
                <option value="3">3 Months</option>
                <option value="6">6 Months</option>
                <option value="12">12 Months</option>
              </select>
            </div>

            <div class="dropdown mb-2">
              <label>Weekly Days:</label>
              <select id="weekly-days">
                <option value="">Select Days</option>
                <option value="1">1 Day</option>
                <option value="2">2 Days</option>
                <option value="3">3 Days</option>
                <option value="4">4 Days</option>
                <option value="5">5 Days</option>
                <option value="6">6 Days</option>
                <option value="7">7 Days</option>
              </select>
            </div>

            <div class="checkbox-group">
              <label><input type="checkbox" id="select-all"> Select All Days</label>
              <label><input type="checkbox" class="day-checkbox" value="Mon"> Monday</label>
              <label><input type="checkbox" class="day-checkbox" value="Tue"> Tuesday</label>
              <label><input type="checkbox" class="day-checkbox" value="Wed"> Wednesday</label>
              <label><input type="checkbox" class="day-checkbox" value="Thu"> Thursday</label>
              <label><input type="checkbox" class="day-checkbox" value="Fri"> Friday</label>
              <label><input type="checkbox" class="day-checkbox" value="Sat"> Saturday</label>
              <label><input type="checkbox" class="day-checkbox" value="Sun"> Sunday</label>
            </div>
          </div>
      </aside>

      <!-- Products Container -->
      <main class="products-container">
        <div class="products-grid">
        </div>
      </main>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
/* -------------------------------
   Load Bag Price From Blade
-------------------------------- */
let bag_price = {{ $bag_price ?? 0 }};

/* -------------------------------
   Products From Blade
-------------------------------- */
const products = [
    @foreach($products as $product)
    {
        id: {{ $product->id }},
        title: `{{ $product->product_name }}`,
        price: {{ $product->variant_type == 'simple'
                    ? $product->s_price
                    : $product->Productvariants->min('price') }},
        image: `{{ asset('images/product_images/' . $product->featured_image) }}`,
        weights: {!! json_encode($product->weights ?? []) !!},
        categories: `{{ $product->category->name ?? '' }}`,
        inStock: {{ $product->in_stock ? 'true' : 'false' }},
        rating: {{ $product->rating ?? 0 }}
    }@if(!$loop->last),@endif
    @endforeach
];

/* -------------------------------
   Load Cart From LocalStorage
-------------------------------- */
let cart = JSON.parse(localStorage.getItem("cartData")) || [];

/* -------------------------------
   Save Cart
-------------------------------- */
function saveCart() {
    localStorage.setItem("cartData", JSON.stringify(cart));
}

/* -------------------------------
   Shuffle Products (UI effect)
-------------------------------- */
function shuffleProducts() {
    for (let i = products.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [products[i], products[j]] = [products[j], products[i]];
    }
}

/* -------------------------------
   Render Products 
-------------------------------- */
function renderProducts(list = products) {
    const grid = document.querySelector('.products-grid');
    grid.innerHTML = "";

    list.forEach((p, i) => {
        const card = document.createElement("div");
        card.className = "product-card";
        card.dataset.id = p.id;

        const weightOptions = p.weights.map(w => `<option>${w}</option>`).join("");

        card.innerHTML = `
            <img class="product-image" src="${p.image}">
            <div class="product-title">${p.title}</div>
            <div class="product-price">AED ${p.price}</div>

            <div class="product-weight-label">
                Weight:
                <select class="product-weight">${weightOptions}</select>
            </div>

            <div class="quantity-controls">
                <button onclick="updateQuantity(this, -1)">-</button>
                <input type="number" value="1" readonly>
                <button onclick="updateQuantity(this, 1)">+</button>
            </div>

            <button class="add-cart-btn" onclick="addToCart(${p.id})">
                <i class="fas fa-cart-plus"></i> Add to Cart
            </button>
        `;

        setTimeout(() => {
            card.style.opacity = "1";
            card.style.transform = "translateY(0)";
        }, i * 120);

        grid.appendChild(card);
    });
}

/* -------------------------------
   Update Quantity In Product Card
-------------------------------- */
function updateQuantity(btn, change) {
    const input = btn.parentElement.querySelector("input");
    let qty = Number(input.value) + change;
    if (qty < 1) qty = 1;
    input.value = qty;
}

/* -------------------------------
   Add To Cart
-------------------------------- */
function addToCart(id) {
    const card = document.querySelector(`[data-id="${id}"]`);

    const item = {
        id,
        title: card.querySelector(".product-title").textContent,
        price: Number(card.querySelector(".product-price").textContent.replace("AED", "")),
        weight: card.querySelector(".product-weight").value,
        quantity: Number(card.querySelector("input").value),
        image: card.querySelector(".product-image").src
    };

    let existing = cart.find(c => c.id === item.id && c.weight === item.weight);

    if (existing) {
        existing.quantity += item.quantity;
    } else {
        cart.push(item);
    }

    saveCart();
    renderCart();
}

/* -------------------------------
   Render Cart Sidebar
-------------------------------- */
function renderCart() {
    const sidebar = document.querySelector(".cart-sidebar");
    const badge = document.getElementById("cartBadge");

    badge.textContent = cart.reduce((t, i) => t + i.quantity, 0);

    if (cart.length === 0) {
        sidebar.innerHTML = `
            <h3>Shopping Cart</h3>
            <p>Your cart is empty</p>
        `;
        return;
    }

    let html = `<h3>Shopping Cart</h3>`;
    let total = 0;

    cart.forEach(item => {
        total += item.price * item.quantity;
        html += `
            <div class="cart-item">
                <img src="${item.image}">
                <div>
                    <div class="cart-title">${item.title}</div>
                    <div class="cart-weight">${item.weight}</div>
                    <div class="cart-price">AED ${item.price}</div>

                    <div class="quantity-controls">
                        <button onclick="updateCartQuantity(${item.id}, '${item.weight}', -1)">-</button>
                        <input value="${item.quantity}" readonly>
                        <button onclick="updateCartQuantity(${item.id}, '${item.weight}', 1)">+</button>
                    </div>
                </div>

                <button class="remove-btn" onclick="removeFromCart(${item.id}, '${item.weight}')">&times;</button>
            </div>
        `;
    });

    html += `<div class="cart-total">Total: AED ${total}</div>`;

    sidebar.innerHTML = html;

    attachDeliveryValidation(total);
}

/* -------------------------------
   Update Cart Quantity
-------------------------------- */
function updateCartQuantity(id, weight, change) {
    let item = cart.find(i => i.id === id && i.weight === weight);
    if (!item) return;

    item.quantity += change;
    if (item.quantity <= 0) {
        removeFromCart(id, weight);
        return;
    }

    saveCart();
    renderCart();
}

/* -------------------------------
   Remove Item From Cart
-------------------------------- */
function removeFromCart(id, weight) {
    cart = cart.filter(i => !(i.id === id && i.weight === weight));
    saveCart();
    renderCart();
}

/* -------------------------------
   Delivery Validation
-------------------------------- */
function attachDeliveryValidation(cartTotal) {
    const weekInput = document.getElementById("weekInput");
    const checkboxes = document.querySelectorAll(".days-checkboxes input[type=checkbox]");
    const checkoutBtn = document.getElementById("checkoutBtn");

    if (!weekInput || !checkoutBtn) return;

    function validate() {
        let required = Number(weekInput.value);
        let checked = document.querySelectorAll(".days-checkboxes input:checked").length;

        if (required === 7) {
            checkboxes.forEach(c => c.checked = true);
            checked = 7;
        }

        checkoutBtn.disabled = !(cartTotal >= bag_price && checked === required);
    }

    weekInput.addEventListener("change", () => {
        checkboxes.forEach(cb => cb.checked = false);
        validate();
    });

    checkboxes.forEach(cb => cb.addEventListener("change", validate));

    validate();
}

/* -------------------------------
   Filter Products (Fixed)
-------------------------------- */
function getFilteredProducts() {
    let list = [...products];

    // CATEGORY FIX (category is a string)
    const selectedCats = $("#categoriesFilter").val() || [];
    if (selectedCats.length) {
        list = list.filter(p => selectedCats.includes(p.categories));
    }

    const selectedWeights = $("#weightsFilter").val() || [];
    if (selectedWeights.length) {
        list = list.filter(p => p.weights.some(w => selectedWeights.includes(w)));
    }

    const min = Number(document.querySelector('input[placeholder="Min"]').value || 0);
    const max = Number(document.querySelector('input[placeholder="Max"]').value || 99999);

    list = list.filter(p => p.price >= min && p.price <= max);

    const availability = $("#availabilityFilter").val() || [];
    if (availability.includes("In Stock") && !availability.includes("Out of Stock"))
        list = list.filter(p => p.inStock);
    if (availability.includes("Out of Stock") && !availability.includes("In Stock"))
        list = list.filter(p => !p.inStock);

    const ratings = $("#ratingsFilter").val() || [];
    if (ratings.length) {
        const minRating = Math.max(...ratings.map(Number));
        list = list.filter(p => p.rating >= minRating);
    }

    return list;
}

/* -------------------------------
   Search + Filters
-------------------------------- */
function filterProducts() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const filtered = getFilteredProducts().filter(p =>
        p.title.toLowerCase().includes(input)
    );
    renderProducts(filtered);
}

/* -------------------------------
   Initialize
-------------------------------- */
window.addEventListener("DOMContentLoaded", () => {
    shuffleProducts();
    renderProducts();
    renderCart();
});
</script>

</body>

</html>