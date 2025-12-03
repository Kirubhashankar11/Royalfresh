<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Royal Fresh – Premium Meat & Milk Delivery</title>
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
  flex-wrap: wrap; /* keep as you had */
  gap: 1.5rem;
}
/* .city-badge {
  position: absolute;
  top: 140%;
  right: 4vw;
  transform: translateY(-50%);
  background: #523a17;
  color: #fff;
  padding: 6px 18px;
  border-radius: 999px;
  font-size: 13px;
  font-weight: 500;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
  white-space: nowrap;
} */

/* Slightly smaller / reposition on mobile */
/* @media (max-width: 768px) {
  .city-badge {
    top: auto;
    bottom: 8px;
    right: 20%;
    transform: translateX(50%);
    font-size: 12px;
    padding: 4px 12px;
  }
} */

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

    /* === Location Modal === */
    .location-modal {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0.7);
      background: white;
      border-radius: 20px;
      padding: 2rem;
      max-width: 500px;
      width: 90%;
      max-height: 80vh;
      overflow-y: auto;
      z-index: 1002;
      box-shadow: var(--shadow-lg);
      opacity: 0;
      transition: all 0.3s ease;
      display: none;
    }

    .location-modal.active {
      display: block;
      opacity: 1;
      transform: translate(-50%, -50%) scale(1);
    }

    .modal-header {
      text-align: center;
      margin-bottom: 1.5rem;
      padding-bottom: 1rem;
      border-bottom: 1px solid var(--light-brown);
    }

    .modal-title {
      font-size: 1.8rem;
      color: var(--primary-brown);
      font-family: 'Playfair Display', serif;
      margin-bottom: 0.5rem;
    }

    .modal-subtitle {
      color: #666;
      font-size: 1rem;
    }

    .modal-body {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .form-label {
      font-weight: 500;
      color: var(--dark-brown);
      font-size: 0.95rem;
    }

    .form-select {
      width: 100%;
      padding: 0.8rem;
      border: 1px solid var(--light-brown);
      border-radius: 10px;
      font-size: 1rem;
      background: white;
      outline: none;
      transition: all 0.3s;
    }

    .form-select:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 3px rgba(200, 169, 126, 0.2);
    }

    .modal-footer {
      display: flex;
      justify-content: flex-end;
      margin-top: 1.5rem;
      padding-top: 1rem;
      border-top: 1px solid var(--light-brown);
      gap: 1rem;
    }

    .btn {
      padding: 0.8rem 1.5rem;
      border-radius: 25px;
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      border: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-primary {
      background: var(--primary-brown);
      color: white;
      box-shadow: var(--shadow-sm);
    }

    .btn-primary:hover {
      background: var(--dark-brown);
      transform: translateY(-2px);
      box-shadow: var(--shadow-md);
    }

    .btn-secondary {
      background: transparent;
      color: var(--dark-brown);
      border: 2px solid var(--light-brown);
    }

    .btn-secondary:hover {
      background: var(--light-brown);
      border-color: var(--gold);
    }

    /* === Premium Hero Section with Videos === */
    .hero {
      height: 100vh;
      min-height: 700px;
      display: flex;
      position: relative;
      overflow: hidden;
      margin-top: 80px;
    }

    .video-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
    }

    .video-panel {
      flex: 1;
      position: relative;
      overflow: hidden;
    }

    .video-panel video {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .video-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.4);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .meat-panel .video-overlay {
      background: linear-gradient(to right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.3));
    }

    .milk-panel .video-overlay {
      background: linear-gradient(to left, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.3));
    }

    .hero-content {
      position: relative;
      z-index: 2;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 4vw;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100%;
    }

    .hero-title {
      font-size: clamp(2.5rem, 5vw, 4.5rem);
      font-weight: 700;
      margin-bottom: 1.5rem;
      color: white;
      font-family: 'Playfair Display', serif;
      line-height: 1.1;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    .hero-subtitle {
      font-size: clamp(1.1rem, 2.5vw, 1.4rem);
      margin-bottom: 2.5rem;
      color: white;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
      font-weight: 400;
      text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
    }

    .hero-btns {
      display: flex;
      gap: 1.5rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .btn-primary {
      background: var(--primary-brown);
      color: white;
      border: 2px solid var(--primary-brown);
      box-shadow: 0 4px 15px rgba(98, 69, 28, 0.3);
    }

    .btn-primary:hover {
      background: var(--dark-brown);
      border-color: var(--dark-brown);
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(98, 69, 28, 0.4);
    }

    .btn-secondary {
      background: transparent;
      color: white;
      border: 2px solid white;
    }

    .btn-secondary:hover {
      background: white;
      color: var(--primary-brown);
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(255, 255, 255, 0.2);
    }

    /* === Premium Bags Section === */
    .bags {
      padding: 6rem 4vw;
      background: white;
      position: relative;
    }

    .bags-title {
      font-size: clamp(2rem, 4vw, 3rem);
      margin-bottom: 1rem;
      text-align: center;
      color: var(--primary-brown);
      font-family: 'Playfair Display', serif;
      position: relative;
      padding-bottom: 20px;
    }

    .bags-title::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 3px;
      background: var(--gold);
    }

    .bags-subtitle {
      text-align: center;
      color: #666;
      margin-bottom: 3rem;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
      font-size: 1.1rem;
    }

    .slider-container {
      position: relative;
      max-width: 1400px;
      margin: 0 auto;
    }

    .slider {
      overflow: hidden;
    }

    .slider-track {
      display: flex;
      transition: transform 0.3s ease;
      gap: 2rem;
    }

    .bag-card {
      flex: 0 0 280px;
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

    .bag-card:hover {
      transform: translateY(-12px);
      box-shadow: var(--shadow-lg);
    }

    .bag-card::before {
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

    .bag-card:hover::before {
      transform: scaleX(1);
    }

    .bag-image {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 1.5rem;
      border: 3px solid var(--light-brown);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      transition: all 0.3s;
    }

    .bag-card:hover .bag-image {
      transform: scale(1.05);
      border-color: var(--gold);
    }

    .bag-price {
      color: var(--dark-brown);
      font-size: 1.3rem;
      font-weight: bold;
      margin-bottom: 1.5rem;
    }

    .add-cart-btn {
      background: var(--primary-brown);
      color: white;
      border: none;
      border-radius: 25px;
      padding: 0.8rem 1.8rem;
      cursor: pointer;
      font-size: 1rem;
      font-weight: 500;
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

    .slider-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(255, 255, 255, 0.9);
      border: none;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      cursor: pointer;
      font-size: 1.2rem;
      color: var(--primary-brown);
      box-shadow: var(--shadow-sm);
      transition: all 0.3s;
      z-index: 10;
    }

    .slider-btn:hover {
      background: white;
      box-shadow: var(--shadow-md);
      transform: translateY(-50%) scale(1.1);
    }

    .prev-btn {
      left: 10px;
    }

    .next-btn {
      right: 10px;
    }

    /* === Products Section === */
    #products {
      padding: 6rem 4vw;
      background: white;
      position: relative;
    }

    .section-title {
      font-size: clamp(2rem, 4vw, 3rem);
      margin-bottom: 1rem;
      text-align: center;
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
      text-align: center;
      color: #666;
      margin-bottom: 3rem;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
      font-size: 1.1rem;
    }

    .category-tabs {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-bottom: 50px;
      flex-wrap: wrap;
    }

    .category-tab {
      background: white;
      border: 1px solid #e8e1d5;
      padding: 12px 28px;
      border-radius: 30px;
      cursor: pointer;
      font-weight: 500;
      transition: all 0.3s;
      color: var(--dark-brown);
    }

    .category-tab.active {
      background: var(--primary-brown);
      color: white;
      border-color: var(--primary-brown);
      box-shadow: var(--shadow-sm);
    }

    .category-tab:hover:not(.active) {
      border-color: var(--primary-brown);
      color: var(--primary-brown);
    }

    .products-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 2rem;
      justify-content: center;
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
      width: 120px;
      height: 120px;
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
    }

    .product-type {
      font-size: 0.9rem;
      color: var(--primary-brown);
      margin-bottom: 0.8rem;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .product-price {
      color: var(--dark-brown);
      font-size: 1.2rem;
      font-weight: bold;
      margin-bottom: 1.5rem;
    }

    .add-cart-btn {
      background: var(--primary-brown);
      color: white;
      border: none;
      border-radius: 25px;
      padding: 0.8rem 1.8rem;
      cursor: pointer;
      font-size: 1rem;
      font-weight: 500;
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

    /* === Features Section === */
    .features {
      padding: 6rem 4vw;
      background: var(--light-brown);
      position: relative;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2.5rem;
      margin-top: 3rem;
    }

    .feature-card {
      background: white;
      border-radius: 20px;
      padding: 2.5rem 2rem;
      text-align: center;
      transition: all 0.4s;
      border: 1px solid rgba(232, 225, 213, 0.5);
      box-shadow: var(--shadow-sm);
      position: relative;
      overflow: hidden;
    }

    .feature-card::before {
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

    .feature-card:hover::before {
      transform: scaleX(1);
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: var(--shadow-lg);
    }

    .feature-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, var(--primary-brown), var(--gold));
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.5rem;
      color: white;
      font-size: 2rem;
      box-shadow: 0 6px 15px rgba(98, 69, 28, 0.2);
    }

    .feature-title {
      font-size: 1.4rem;
      font-weight: 600;
      margin-bottom: 1rem;
      color: var(--dark-brown);
    }

    .feature-desc {
      color: #666;
      line-height: 1.7;
    }

    /* === Testimonials Section === */
    .testimonials {
      padding: 6rem 4vw;
      background: white;
    }

    .testimonials-container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .testimonial-cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin-top: 3rem;
    }

    .testimonial-card {
      background: var(--light-brown);
      border-radius: 20px;
      padding: 2.5rem 2rem;
      position: relative;
      box-shadow: var(--shadow-sm);
      transition: all 0.3s;
    }

    .testimonial-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-md);
    }

    .testimonial-text {
      font-style: italic;
      margin-bottom: 1.5rem;
      color: var(--dark-brown);
      line-height: 1.7;
    }

    .testimonial-author {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .author-avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid var(--gold);
    }

    .author-info h4 {
      font-weight: 600;
      color: var(--primary-brown);
      margin-bottom: 5px;
    }

    .author-info p {
      color: #777;
      font-size: 0.9rem;
    }

    /* === Footer === */
    footer {
      background: var(--dark-brown);
      color: white;
      padding: 4rem 4vw 1.5rem;
    }

    .footer-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 3rem;
      margin-bottom: 3rem;
      max-width: 1400px;
      margin-left: auto;
      margin-right: auto;
    }

    .footer-column h3 {
      font-size: 1.4rem;
      margin-bottom: 1.5rem;
      color: var(--gold);
      position: relative;
      padding-bottom: 12px;
      font-family: 'Playfair Display', serif;
    }

    .footer-column h3::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 50px;
      height: 2px;
      background: var(--gold);
    }

    .footer-links {
      list-style: none;
    }

    .footer-links li {
      margin-bottom: 12px;
    }

    .footer-links a {
      color: #cccccc;
      text-decoration: none;
      transition: all 0.3s;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .footer-links a:hover {
      color: white;
      transform: translateX(5px);
    }

    .footer-links a i {
      width: 20px;
      text-align: center;
      color: var(--gold);
    }

    .social-links {
      display: flex;
      gap: 15px;
      margin-top: 1.5rem;
    }

    .social-link {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      transition: all 0.3s;
    }

    .social-link:hover {
      background: var(--gold);
      transform: translateY(-3px);
    }

    .copyright {
      text-align: center;
      padding-top: 2.5rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      color: #aaaaaa;
      font-size: 0.9rem;
      max-width: 1400px;
      margin-left: auto;
      margin-right: auto;
    }

    /* === Responsive Overrides === */
    @media (max-width: 1024px) {
      .hero-title {
        font-size: 3.5rem;
      }

      .bag-card {
        flex: 0 0 250px;
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

      .hero {
        height: auto;
        min-height: 600px;
        padding: 4rem 0;
      }

      .video-container {
        flex-direction: column;
      }

      .video-panel {
        height: 50%;
      }

      .hero-btns {
        flex-direction: column;
        align-items: center;
      }

      .btn {
        width: 100%;
        max-width: 280px;
        justify-content: center;
      }

      .product-card {
        width: 100%;
      }

      .features-grid,
      .testimonial-cards {
        grid-template-columns: 1fr;
      }

      .bag-card {
        flex: 0 0 100%;
      }

      .slider-btn {
        width: 40px;
        height: 40px;
        font-size: 1rem;
      }

      .location-modal {
        width: 95%;
        padding: 1.5rem;
      }

      .modal-title {
        font-size: 1.5rem;
      }
    }

    @media (max-width: 480px) {
      .hero-title {
        font-size: 2.2rem;
      }

      .hero-subtitle {
        font-size: 1rem;
      }

      .products-list {
        grid-template-columns: 1fr;
      }

      .category-tabs {
        flex-wrap: wrap;
      }

      .category-tab {
        padding: 10px 20px;
        font-size: 0.9rem;
      }

      .bag-card {
        padding: 1.5rem 1rem;
      }

      .bag-image {
        width: 100px;
        height: 100px;
      }

      .side-nav {
        width: 100%;
        right: -100%;
      }
    }

    /* Header is already fixed; make sure it’s positioning context for the pill */
header#mainHeader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
}

.city-pill {
  position: absolute;
  top: 20%;              /* Sits below header bar */
  right: 4vw;             /* Align to right */
  transform: translateY(-50%);
  background: #523a17;
  color: #fff;
  padding: 6px 18px;
  border: none;
  border-radius: 999px;
  font-size: 13px;
  font-weight: 500;
  white-space: nowrap;
  box-shadow: 0 2px 8px rgba(0,0,0,0.15);
  display: inline-flex;
  align-items: center;
  gap: 4px;
  cursor: pointer;
  z-index: 999;
}

/* Mobile fix */
@media (max-width: 768px) {
  .city-pill {
    top: 160%;
    right: 3vw;
    font-size: 12px;
    padding: 5px 14px;
  }
}
  </style>
</head>

<body>
  @php
    $hasCity = session()->has('selected_city');
@endphp

@if(!$hasCity)
<script>
  document.addEventListener('DOMContentLoaded', function () {
      showLocationModal();
  });
</script>
@endif
  <div class="overlay" id="modalOverlay">
  </div>

<!-- === Location Modal === -->
<div class="location-modal" id="locationModal">
  <form method="POST" action="{{ route('set.city') }}">
    @csrf

    <div class="modal-header">
      <h2 class="modal-title">Select Your Location</h2>
      <p class="modal-subtitle">
        To provide the best delivery experience, please select your state and city in the UAE.
      </p>
    </div>

    <div class="modal-body">
      <div class="form-group">
        <label for="stateSelect" class="form-label">Select State (Emirate)</label>
        <select id="stateSelect" class="form-select">
          <option value="">Choose a state...</option>
        </select>
      </div>

      <div class="form-group">
        <label for="citySelect" class="form-label">Select City</label>
        <select id="citySelect" name="city" class="form-select" disabled>
          <option value="">First select a state...</option>
        </select>
      </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="btn btn-primary" id="continueBtn" disabled>
        Continue
      </button>
    </div>
  </form>
</div>
  <!-- === Premium Header === -->
  <header id="mainHeader">
    <div class="header-container">
      <div class="logo">
       
        <img src="{{ asset('Assets/logo.png') }}" alt="Royal Fresh Logo" />
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

  @if(session('selected_city'))
    <button id="changeCityBtn" class="city-pill" type="button">
        Delivering to:
        <strong id="selectedCityText">{{ session('selected_city') }}</strong>
    </button>
@endif

  
  <!-- === Premium Hero Section with Videos === -->
  <section class="hero">
    <div class="video-container">
    
      <div class="video-panel meat-panel">
        <video autoplay loop muted playsinline>
          <source src="{{ asset('Assets/meat.mp4') }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <div class="video-overlay"></div>
      </div>
      <div class="video-panel milk-panel">
        <video autoplay loop muted playsinline>
          <source src="{{ asset('Assets/milk.mp4') }}" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <div class="video-overlay"></div>
      </div>
    </div>
    <div class="hero-content">
      <h1 class="hero-title">Premium Quality Meat & Dairy</h1>
      <p class="hero-subtitle">Experience the finest selection of farm-fresh products, carefully sourced and delivered
        to your doorstep with uncompromising quality.</p>
      <div class="hero-btns">
        <a href="#products" class="btn btn-primary">
          <i class="fas fa-shopping-basket"></i> Shop Now
        </a>
        <a href="#features" class="btn btn-secondary">
          <i class="fas fa-play-circle"></i> Learn More
        </a>
      </div>
    </div>
  </section>

  <!-- === Products Section === -->
  <section id="products">
    <h2 class="section-title">Our Premium Selection</h2>
    <p class="section-subtitle">
      Carefully curated products that meet our stringent quality standards for freshness and taste
    </p>

    <div class="category-tabs">
  <div class="category-tab active" onclick="filterByCategory('all')">
      All Products
  </div>

  <div class="category-tab" onclick="filterByCategory('mutton & beef')">
      Meat Selection
  </div>

  <div class="category-tab" onclick="filterByCategory('dairy products')">
      Dairy Products
  </div>
</div>
    
    <div class="products-list" id="productsList">
      <!-- Meat Products -->
        @foreach ($products as $product)
      <div class="product-card"
     data-title="{{ strtolower($product->product_name) }}"
     data-type="{{ strtolower($product->category ?? 'uncategorized') }}">


        <img src="{{ asset('images/product_images/' . $product->featured_image) }}" alt="{{ $product->product_name }}" class="product-image" />
        <h3 class="product-title"><a href="{{ route('single.product', $product->id) }}">{{ $product->product_name }}</a></h3>
       <div class="product-type">
    {{ $product->category ?? 'Uncategorized' }}
</div>
        
         @if($product->variant_type == 'simple')
        @php
    $group = session('city_group', 'dubai');

    if ($group === 'dubai') {
        $price = $product->price_dubai ?? $product->s_price;
    } elseif ($group === 'shj_ajm') {
        $price = $product->price_shj_ajm ?? $product->s_price;
    } else {
        $price = $product->price_other ?? $product->s_price;
    }
@endphp

@if($product->variant_type == 'simple')
    <div class="product-price">
     @php
    $displayWeight = $product->s_weight;
@endphp
<div class="product-price">
    AED {{ $price }}/{{ $displayWeight }} {{ optional($product->Sunit)->name }}
</div>
    </div>
@else
    <div class="product-price">
        From AED {{ $product->Productvariants->min('price') }}/{{ $product->Productvariants->min('weight') }} {{ optional($product->unit)->name }}
    </div>
@endif
        @else
        <div class="product-price">
  From AED {{ $product->Productvariants->min('price') }}/{{ $product->Productvariants->min('weight') }} {{ optional($product->unit)->name ?? '' }}
</div>
        @endif
        <button class="add-cart-btn">
          <i class="fas fa-cart-plus"></i> Add to Cart
        </button>
      </div>
      @endforeach



  </section>

  <!-- === Premium Bags Section === -->
  <section id="bags" class="bags">
    <h2 class="bags-title">Premium Backet</h2>
    <p class="bags-subtitle">Choose a bag value to shop up to that amount in meat and dairy products. Fill your bag with
      fresh quality!</p>

    <div class="slider-container">
      <div class="slider">
        <div class="slider-track" id="sliderTrack">
          @foreach($bags as $bag)
            <div class="bag-card">
              <img src="{{ asset('Assets/bag.jpeg') }}" alt="Premium Bag ₹{{ $bag->price }}" class="bag-image" />
              <div class="bag-price">{{ $bag->name }}</div>
              <a href="/baskets/{{ $bag->id }}" style="text-decoration: none;"><button class="add-cart-btn">
                  <i class="fas fa-cart-plus"></i> Purchase</button></a>
            </div>
          @endforeach

        </div>
      </div>
      <button class="slider-btn prev-btn" id="prevBtn">
        <i class="fas fa-chevron-left"></i>
      </button>
      <button class="slider-btn next-btn" id="nextBtn">
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>
  </section>

  <!-- === Features Section === -->
  <section class="features" id="features">
    <h2 class="section-title">Why Choose Royal Fresh</h2>
    <p class="section-subtitle">
      We are committed to excellence in every aspect of our service and products
    </p>

    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-award"></i>
        </div>
        <h3 class="feature-title">Premium Quality</h3>
        <p class="feature-desc">All our products undergo rigorous quality checks to ensure they meet the highest
          standards of freshness and taste.</p>
      </div>

      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-truck"></i>
        </div>
        <h3 class="feature-title">Fast Delivery</h3>
        <p class="feature-desc">We deliver fresh products to your doorstep within 24 hours of ordering with our
          temperature-controlled logistics.</p>
      </div>

      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-leaf"></i>
        </div>
        <h3 class="feature-title">Natural & Fresh</h3>
        <p class="feature-desc">Our products are sourced from trusted farms with no artificial additives, preservatives,
          or hormones.</p>
      </div>

      <div class="feature-card">
        <div class="feature-icon">
          <i class="fas fa-headset"></i>
        </div>
        <h3 class="feature-title">24/7 Support</h3>
        <p class="feature-desc">Our dedicated customer support team is available round the clock to assist you with any
          queries or concerns.</p>
      </div>
    </div>
  </section>

  <!-- === Testimonials Section === -->
  <section class="testimonials" id="testimonials">
    <div class="testimonials-container">
      <h2 class="section-title">What Our Customers Say</h2>
      <p class="section-subtitle">
        Don't just take our word for it - hear from our satisfied customers
      </p>

      <div class="testimonial-cards">
        <div class="testimonial-card">
          <p class="testimonial-text">"The quality of meat from Royal Fresh is exceptional. I've been a customer for
            over two years and have never been disappointed. Their delivery is always on time and the products are
            consistently fresh."</p>
          <div class="testimonial-author">
            <img src="{{asset('Assets/customer1.jpg')}}" alt="Customer" class="author-avatar" />
            <div class="author-info">
              <h4>Rajesh Kumar</h4>
              <p>Regular Customer</p>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <p class="testimonial-text">"As a restaurant owner, I rely on Royal Fresh for all my meat and dairy supplies.
            Their consistent quality and reliable delivery have helped me maintain the standards my customers expect."
          </p>
          <div class="testimonial-author">
            <img src="{{asset('Assets/customer2.jpg')}}" alt="Customer" class="author-avatar" />
            <div class="author-info">
              <h4>Priya Sharma</h4>
              <p>Restaurant Owner</p>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <p class="testimonial-text">"The milk from Royal Fresh tastes exactly like it did when I was a child - pure
            and unadulterated. My family won't drink milk from anywhere else now. Thank you for bringing back real
            taste!"</p>
          <div class="testimonial-author">
            <img src="{{asset('Assets/customer3.jpg')}}" alt="Customer" class="author-avatar" />
            <div class="author-info">
              <h4>Anita Desai</h4>
              <p>Homemaker</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- === Footer === -->
  <footer id="contact">
    <div class="footer-container">
      <div class="footer-column">
        <h3>Royal Fresh</h3>
        <p>Premium quality meat and dairy products delivered fresh to your doorstep across India since 1997. Experience
          the difference that quality makes.</p>
        <div class="social-links">
          <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
          <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
          <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <div class="footer-column">
        <h3>Quick Links</h3>
        <ul class="footer-links">
          <li><a href="#"><i class="fas fa-chevron-right"></i> Home</a></li>
          <li><a href="/all-products"><i class="fas fa-chevron-right"></i> Products</a></li>
          <li><a href="#features"><i class="fas fa-chevron-right"></i> Features</a></li>
          <li><a href="#testimonials"><i class="fas fa-chevron-right"></i> Testimonials</a></li>
          <li><a href="#contact"><i class="fas fa-chevron-right"></i> Contact</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h3>Contact Info</h3>
        <ul class="footer-links">
          <li><a href="#"><i class="fas fa-map-marker-alt"></i> 123 Fresh Street, Mumbai, India</a></li>
          <li><a href="tel:+911234567890"><i class="fas fa-phone"></i> +91-1234-567-890</a></li>
          <li><a href="mailto:info@royalfresh.com"><i class="fas fa-envelope"></i> info@royalfresh.com</a></li>
          <li><a href="#"><i class="fas fa-clock"></i> Mon-Sun: 8:00 AM - 10:00 PM</a></li>
        </ul>
      </div>
    </div>

    <div class="copyright">
      © 2025 Royal Fresh. All rights reserved. | Crafted with <i class="fas fa-heart" style="color: var(--gold);"></i>
      for discerning customers
    </div>
  </footer>

  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  <script>
    function addToCart(id) {

      let cart = JSON.parse(localStorage.getItem("cartData") || "[]");

      const card = document.querySelector(`[data-id="${id}"]`);

      const title = card.querySelector(".product-title").innerText;
      const price = Number(card.querySelector(".product-price").innerText.match(/\d+/)[0]);

      const image = card.querySelector(".product-image").src;
      const weight = card.dataset.weight || "";
      const quantity = 1;

      let existing = cart.find(i => i.id == id && i.weight == weight);

      if (existing) {
        existing.quantity += 1;
      } else {
        cart.push({ id, title, price, quantity, weight, image });
      }

      localStorage.setItem("cartData", JSON.stringify(cart));

      const totalQty = cart.reduce((sum, p) => sum + p.quantity, 0);
      document.getElementById("cartBadge").innerText = totalQty;
    }


    const uaeData = {
      "Abu Dhabi": [
        "Abu Dhabi City", "Al Ain", "Liwa Oasis", "Zayed City", "Al Shahama"
      ],
      "Ajman": [
        "Ajman City", "Al Nuaimiya", "Al Rashidiya", "Mashrif", "Al Jurf"
      ],
      "Dubai": [
        "Dubai", "Dubai Marina", "Jumeirah", "Downtown Dubai", "Deira", "Bur Dubai", "Al Barsha"
      ],
      "Fujairah": [
        "Fujairah City", "Dibba Al-Fujairah", "Al Hayl", "Siji", "Masfout"
      ],
      "Ras Al Khaimah": [
        "Ras Al Khaimah City", "Al Jazirah Al Hamra", "Dibba Al-Hisn", "Khatt", "Al Rams"
      ],
      "Sharjah": [
        "Sharjah City", "Al Majaz", "Al Nahda", "Muwaileh", "Khor Fakkan"
      ],
      "Umm Al Quwain": [
        "Umm Al Quwain City", "Al Salami", "Al Ibri", "Falaj Al Mualla", "Qawasim Corniche"
      ]
    };

    // Initialize Lucide Icons
    document.addEventListener('DOMContentLoaded', function () {
      lucide.createIcons();

      // Show modal on load
      showLocationModal();

// ✅ Show modal
function showLocationModal() {
  const modal   = document.getElementById('locationModal');
  const overlay = document.getElementById('modalOverlay');
  if (!modal || !overlay) return;

  modal.classList.add('active');
  overlay.classList.add('active');

  modal.style.display   = 'block';
  overlay.style.display = 'block';
  document.body.style.overflow = 'hidden';
}

// ✅ Hide modal
function closeLocationModal() {
  const modal   = document.getElementById('locationModal');
  const overlay = document.getElementById('modalOverlay');
  if (!modal || !overlay) return;

  modal.classList.remove('active');
  overlay.classList.remove('active');

  modal.style.display   = 'none';
  overlay.style.display = 'none';
  document.body.style.overflow = '';
}

document.addEventListener('DOMContentLoaded', function () {
  const $stateSelect = $('#stateSelect');
  const $citySelect  = $('#citySelect');
  const continueBtn  = document.getElementById('continueBtn');

  // 1) Fill states
  Object.keys(uaeData).forEach(state => {
    $stateSelect.append(new Option(state, state));
  });

  // 2) Select2 init ONCE
  $stateSelect.select2({
    placeholder: "Search and select a state...",
    width: '100%'
  });

  $citySelect.select2({
    placeholder: "Search and select a city...",
    width: '100%'
  });

  // 3) State change → load cities
  $stateSelect.on('change', function () {
    const selectedState = $(this).val();

    $citySelect.empty(); // clear old
    if (!selectedState || !uaeData[selectedState]) {
      $citySelect.append(new Option('First select a state...', ''));
      $citySelect.prop('disabled', true).trigger('change');
      if (continueBtn) continueBtn.disabled = true;
      return;
    }

    // Add default option
    $citySelect.append(new Option('Select City', ''));

    // Add all cities
    uaeData[selectedState].forEach(city => {
      $citySelect.append(new Option(city, city));
    });

    $citySelect.prop('disabled', false).trigger('change');
    if (continueBtn) continueBtn.disabled = true;
  });

  // 4) City change → enable Continue
  $citySelect.on('change', function () {
    const selectedCity = $(this).val();
    if (continueBtn) {
      continueBtn.disabled = !selectedCity;
    }
  });

  // 5) Overlay click closes modal
  const modalOverlay = document.getElementById('modalOverlay');
  if (modalOverlay) {
    modalOverlay.addEventListener('click', closeLocationModal);
  }

  // 6) Header pill opens modal again
  const changeCityBtn = document.getElementById('changeCityBtn');
  if (changeCityBtn) {
    changeCityBtn.addEventListener('click', function () {
      showLocationModal();
    });
  }
});


    // Initialize Select2 for searchable dropdowns
    // function initializeSelect2() {
    //   $('#stateSelect').select2({
    //     placeholder: "Search and select a state...",
    //     allowClear: true,
    //     width: '100%'
    //   });

    //   $('#citySelect').select2({
    //     placeholder: "Search and select a city...",
    //     allowClear: true,
    //     width: '100%'
    //   });
    // }

    // Show Location Modal
    function showLocationModal() {
  const modal   = document.getElementById('locationModal');
  const overlay = document.getElementById('modalOverlay');
  if (!modal || !overlay) return;

  modal.classList.add('active');
  overlay.classList.add('active');

  // Make sure it's visible
  modal.style.display   = 'block';
  overlay.style.display = 'block';

  document.body.style.overflow = 'hidden';
  initializeSelect2();
}

    // Close Location Modal
    function closeLocationModal() {
  const modal   = document.getElementById('locationModal');
  const overlay = document.getElementById('modalOverlay');

  if (!modal || !overlay) return;

  modal.classList.remove('active');
  overlay.classList.remove('active');

  // Make absolutely sure it's hidden even if style.display was set earlier
  modal.style.display   = 'none';
  overlay.style.display = 'none';

  // Reset selections
  $('#stateSelect').val(null).trigger('change');
  $('#citySelect').val(null).trigger('change.select2');
  document.getElementById('continueBtn').disabled = true;
  document.getElementById('citySelect').disabled  = true;
}

    // State Change Handler
    $('#stateSelect').on('change', function () {
      const selectedState = $(this).val();
      const citySelect = $('#citySelect');
      const continueBtn = document.getElementById('continueBtn');

      if (selectedState) {
        // Populate cities
        citySelect.empty().append('<option value="">Choose a city...</option>');
        const cities = uaeData[selectedState] || [];
        cities.forEach(city => {
          citySelect.append(`<option value="${city}">${city}</option>`);
        });
        citySelect.prop('disabled', false).trigger('change');
        continueBtn.disabled = true;
      } else {
        citySelect.prop('disabled', true).val(null).trigger('change');
        continueBtn.disabled = true;
      }
    });

    // City Change Handler
    $('#citySelect').on('change', function () {
      const selectedCity = $(this).val();
      const continueBtn = document.getElementById('continueBtn');
      continueBtn.disabled = !selectedCity;
    });

    // Continue Button Handler
    // document.getElementById('continueBtn').addEventListener('click', function() {
    //   const state = $('#stateSelect').val();
    //   const city = $('#citySelect').val();
    //   if (state && city) {
    //     // Store selection (e.g., in localStorage for persistence)
    //     localStorage.setItem('selectedState', state);
    //     localStorage.setItem('selectedCity', city);
    //     console.log(`Selected: ${state}, ${city}`); // For demo; integrate with delivery logic
    //     closeLocationModal();
    //   }
    // });

    // Cancel Button Handler
    // document.getElementById('cancelBtn').addEventListener('click', closeLocationModal);

    // Overlay Click to Close
    document.getElementById('modalOverlay').addEventListener('click', closeLocationModal);

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

    // Bags Slider
    const sliderTrack = document.getElementById('sliderTrack');
    const bagCards = document.querySelectorAll('.bag-card');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let currentIndex = 0;
    const cardWidth = 280;
    const gap = 32; // 2rem assuming 16px base

    function getVisibleCards() {
      const width = window.innerWidth;
      if (width < 768) return 1;
      return 3;
    }

    function slideTo(index) {
      const visible = getVisibleCards();
      const maxIndex = Math.max(0, bagCards.length - visible);
      currentIndex = Math.max(0, Math.min(index, maxIndex));
      const offset = currentIndex * (cardWidth + gap);
      sliderTrack.style.transform = `translateX(-${offset}px)`;
    }

    prevBtn.addEventListener('click', () => slideTo(currentIndex - 1));
    nextBtn.addEventListener('click', () => slideTo(currentIndex + 1));
    window.addEventListener('resize', () => slideTo(currentIndex));
    slideTo(0);

    // Filter products by category
    function filterByCategory(category) {
      const cards = document.querySelectorAll('.product-card');
      const tabs = document.querySelectorAll('.category-tab');

      // Update active tab
      tabs.forEach(tab => tab.classList.remove('active'));
      event.target.classList.add('active');

      // Show/hide products based on category
      cards.forEach(card => {
        if (category === 'all' || card.getAttribute('data-type') === category) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    }

    // Filter products by search
    function filterProducts() {
      const input = document.getElementById('searchInput').value.trim().toLowerCase();
      const cards = document.querySelectorAll('.product-card');
      cards.forEach((card) => {
        const title = card.getAttribute('data-title').toLowerCase();
        const type = card.getAttribute('data-type').toLowerCase();
        card.style.display = title.includes(input) || type.includes(input) ? 'flex' : 'none';
      });
    }

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

    <script>
document.addEventListener("DOMContentLoaded", () => {
    
    const stateSelect    = document.getElementById("stateSelect");
    const citySelect     = document.getElementById("citySelect");
    const continueBtn    = document.getElementById("continueBtn");
    const locationModal  = document.getElementById("locationModal");
    const modalOverlay   = document.getElementById("modalOverlay");
    const selectedCityEl = document.getElementById("selectedCityText");
    const changeCityBtn  = document.getElementById("changeCityBtn");

    // 1) Make header pill open the modal again
    if (changeCityBtn) {
        changeCityBtn.addEventListener("click", () => {
            showLocationModal();   // you already have this function
        });
    }

    // 2) Enable / disable Continue based on city
    if (citySelect && continueBtn) {
        citySelect.addEventListener("change", () => {
            continueBtn.disabled = citySelect.value === "";
        });
    }

    // 3) When user clicks Continue → save city via AJAX
//     if (continueBtn) {
//     continueBtn.addEventListener("click", function (e) {
//         e.preventDefault(); // prevent normal form submit

//         const city = citySelect.value;
//         if (!city) return;

//         fetch("{{ route('set.city') }}", {
//             method: "POST",
//             headers: {
//                 "Content-Type": "application/json",
//                 "X-CSRF-TOKEN": "{{ csrf_token() }}",
//                 "X-Requested-With": "XMLHttpRequest"
//             },
//             body: JSON.stringify({ city })
//         })
//         .then(res => res.json())
//         .then(data => {
//             if (data.success) {
//                 // ✅ update header text instantly
//                 if (selectedCityEl) {
//                     selectedCityEl.textContent = data.city;
//                 }

//                 // ⬇️ Just call our global closer
//                 closeLocationModal();

//                 // OPTIONAL: if you want to refresh prices etc:
//                 // window.location.reload();
//             }
//         })
//         .catch(err => console.error(err));
//     });
// }

});
</script>
   

</body>

</html>