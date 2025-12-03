<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Butter Lassi / Laban - Royal Fresh</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #9e8329;
      --primary-light: #e6c15b;
      --primary-dark: #7d671c;
      --secondary: #426a93;
      --accent: #c7b487;
      --light-bg: #fef9f2;
      --card-bg: #fffdfa;
      --text-dark: #3b2f2f;
      --text-medium: #53462b;
      --text-light: #705f43;
      --border: #e3d1b5;
      --success: #4caf50;
      --warning: #ff9800;
      --danger: #f44336;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: var(--light-bg);
      font-family: 'Poppins', Arial, sans-serif;
      color: var(--text-dark);
      line-height: 1.6;
    }

    /* Header Styles */
    header {
      background: var(--card-bg);
      box-shadow: 0 2px 10px rgba(128, 78, 36, 0.1);
      padding: 15px 0;
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .header-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--primary);
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo i {
      font-size: 1.5rem;
    }

    .nav-links {
      display: flex;
      gap: 25px;
    }

    .nav-links a {
      color: var(--text-medium);
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s;
    }

    .nav-links a:hover {
      color: var(--primary);
    }

    .header-actions {
      display: flex;
      gap: 20px;
      align-items: center;
    }

    .header-actions a {
      color: var(--text-medium);
      font-size: 1.2rem;
      transition: color 0.3s;
    }

    .header-actions a:hover {
      color: var(--primary);
    }

    .cart-count {
      background: var(--primary);
      color: white;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.7rem;
      position: absolute;
      top: -8px;
      right: -8px;
    }

    .cart-icon {
      position: relative;
    }

    /* Main Container */
    .container {
      max-width: 1200px;
      margin: 30px auto 60px;
      padding: 0 20px;
      display: flex;
      gap: 40px;
      flex-wrap: wrap;
    }

    /* Image Gallery */
    .image-section {
      flex: 1 1 500px;
      max-width: 550px;
      background: var(--card-bg);
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 6px 26px rgba(18, 32, 19, 0.1);
      display: flex;
      flex-direction: column;
    }

    .main-image {
      width: 100%;
      height: 400px;
      object-fit: cover;
      border-radius: 14px 14px 0 0;
      cursor: zoom-in;
      transition: transform 0.3s;
    }

    .main-image:hover {
      transform: scale(1.02);
    }

    .image-thumbnails {
      display: flex;
      gap: 10px;
      padding: 15px;
      overflow-x: auto;
    }

    .thumbnail {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 8px;
      cursor: pointer;
      border: 2px solid transparent;
      transition: border 0.3s;
    }

    .thumbnail.active {
      border-color: var(--primary);
    }

    .image-actions {
      display: flex;
      justify-content: space-between;
      padding: 0 15px 15px;
    }

    .action-btn {
      background: var(--primary);
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: background 0.3s;
    }

    .action-btn:hover {
      background: var(--primary-dark);
    }

    .action-btn.secondary {
      background: transparent;
      color: var(--text-medium);
      border: 1px solid var(--border);
    }

    .action-btn.secondary:hover {
      background: #f5f5f5;
    }

    /* Product Details */
    .details-section {
      flex: 1 1 580px;
      max-width: 580px;
      background: var(--card-bg);
      border-radius: 14px;
      padding: 28px 32px 34px;
      box-shadow: 0 6px 20px rgba(194, 173, 123, 0.2);
      display: flex;
      flex-direction: column;
    }

    .breadcrumb {
      font-size: 14px;
      color: var(--text-light);
      margin-bottom: 14px;
    }

    .breadcrumb a {
      color: var(--secondary);
      text-decoration: none;
      transition: color 0.25s;
    }

    .breadcrumb a:hover {
      color: #518dc5;
    }

    .product-name {
      font-size: 1.9rem;
      font-weight: 700;
      margin: 4px 0 12px;
      color: #453a20;
    }

    .rating {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 15px;
    }

    .stars {
      color: var(--warning);
    }

    .rating-count {
      color: var(--text-light);
      font-size: 0.9rem;
    }

    .product-price {
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--secondary);
      margin-bottom: 10px;
      letter-spacing: 0.02em;
    }

    .price-compare {
      font-size: 1.2rem;
      color: var(--text-light);
      text-decoration: line-through;
      margin-left: 10px;
    }

    .discount-badge {
      background: var(--danger);
      color: white;
      padding: 3px 8px;
      border-radius: 4px;
      font-size: 0.8rem;
      font-weight: 600;
      margin-left: 10px;
    }

    .stock-status {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 20px;
      font-weight: 600;
    }

    .in-stock {
      color: var(--success);
    }

    .low-stock {
      color: var(--warning);
    }

    .out-of-stock {
      color: var(--danger);
    }

    .product-desc {
      font-size: 1rem;
      color: var(--text-medium);
      margin-bottom: 24px;
      line-height: 1.6;
    }

    .features-list {
      margin-bottom: 20px;
    }

    .feature-item {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 8px;
    }

    .feature-item i {
      color: var(--success);
    }

    label {
      font-weight: 600;
      font-size: 0.98rem;
      display: block;
      color: var(--text-light);
      margin-bottom: 6px;
    }

    select {
      width: 100%;
      font-size: 1.05rem;
      font-weight: 600;
      padding: 10px 12px;
      border-radius: 9px;
      border: 1.5px solid var(--accent);
      background-color: #f6efcc;
      color: #6f5c2b;
      outline: none;
      margin-bottom: 22px;
      transition: border-color 0.3s ease;
    }

    select:hover,
    select:focus {
      border-color: #a1915a;
    }

    .quantity-wrapper {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 28px;
    }

    .quantity-btn {
      background-color: var(--primary);
      border: none;
      color: #fff;
      font-weight: 700;
      font-size: 1.3rem;
      padding: 8px 18px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.2s ease;
      user-select: none;
    }

    .quantity-btn:hover {
      background-color: var(--primary-light);
    }

    .quantity-input {
      width: 55px;
      border: 1.8px solid #b09d57;
      border-radius: 9px;
      font-size: 1.2rem;
      font-weight: 600;
      color: #6b5934;
      text-align: center;
      padding: 8px;
      background: #fff9c9;
      outline: none;
      user-select: none;
    }

    .action-buttons {
      display: flex;
      gap: 15px;
      margin-bottom: 20px;
    }

    .add-to-cart-btn {
      background-color: var(--primary);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-weight: 700;
      font-size: 1.15rem;
      padding: 15px 25px;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(170, 133, 33, 0.62);
      transition: background-color 0.2s ease, box-shadow 0.25s ease;
      display: flex;
      align-items: center;
      gap: 10px;
      flex: 2;
      justify-content: center;
    }

    .add-to-cart-btn:hover {
      background-color: var(--primary-dark);
      box-shadow: 0 3px 17px rgba(170, 133, 33, 0.89);
    }

    .buy-now-btn {
      background-color: var(--secondary);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-weight: 700;
      font-size: 1.15rem;
      padding: 15px 25px;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(66, 106, 147, 0.62);
      transition: background-color 0.2s ease, box-shadow 0.25s ease;
      display: flex;
      align-items: center;
      gap: 10px;
      flex: 1;
      justify-content: center;
    }

    .buy-now-btn:hover {
      background-color: #355a7c;
      box-shadow: 0 3px 17px rgba(66, 106, 147, 0.89);
    }

    .wishlist-btn {
      background: transparent;
      border: 1px solid var(--border);
      color: var(--text-medium);
      border-radius: 8px;
      padding: 15px;
      cursor: pointer;
      transition: all 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .wishlist-btn:hover {
      background: #f5f5f5;
      color: var(--danger);
    }

    .shipping-info {
      background: #f9f5eb;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 20px;
    }

    .shipping-info h3 {
      font-size: 1rem;
      margin-bottom: 10px;
      color: var(--text-medium);
    }

    .shipping-options {
      display: flex;
      gap: 15px;
    }

    .shipping-option {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 0.9rem;
    }

    .shipping-option i {
      color: var(--success);
    }

    .meta-info {
      font-size: 13px;
      margin-top: 20px;
      color: #594b20;
      display: flex;
      justify-content: space-between;
      font-weight: 600;
    }

    .meta-info a {
      color: var(--secondary);
      text-decoration: none;
      font-weight: 600;
    }

    .meta-info a:hover {
      color: #518dc5;
    }

    .social-share {
      display: flex;
      gap: 10px;
      margin-top: 20px;
    }

    .social-icon {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 0.9rem;
      transition: transform 0.3s;
    }

    .social-icon:hover {
      transform: translateY(-3px);
    }

    .facebook {
      background: #3b5998;
    }

    .twitter {
      background: #1da1f2;
    }

    .pinterest {
      background: #bd081c;
    }

    .whatsapp {
      background: #25d366;
    }

    /* Product Tabs */
    .tabs-section {
      flex: 1 1 100%;
      margin-top: 40px;
    }

    .tabs {
      display: flex;
      border-bottom: 1px solid var(--border);
      margin-bottom: 20px;
    }

    .tab {
      padding: 12px 25px;
      cursor: pointer;
      font-weight: 600;
      color: var(--text-light);
      border-bottom: 3px solid transparent;
      transition: all 0.3s;
    }

    .tab.active {
      color: var(--primary);
      border-bottom: 3px solid var(--primary);
    }

    .tab-content {
      display: none;
      padding: 20px;
      background: var(--card-bg);
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .tab-content.active {
      display: block;
    }

    .description-content p {
      margin-bottom: 15px;
    }

    .specs-table {
      width: 100%;
      border-collapse: collapse;
    }

    .specs-table tr {
      border-bottom: 1px solid var(--border);
    }

    .specs-table td {
      padding: 12px 15px;
    }

    .specs-table td:first-child {
      font-weight: 600;
      width: 30%;
    }

    .review-item {
      border-bottom: 1px solid var(--border);
      padding: 20px 0;
    }

    .review-header {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .reviewer-name {
      font-weight: 600;
    }

    .review-date {
      color: var(--text-light);
      font-size: 0.9rem;
    }

    /* Related Products */
    .related-products {
      flex: 1 1 100%;
      margin-top: 40px;
    }

    .section-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--text-medium);
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 2px solid var(--border);
    }

    .products-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
    }

    .product-card {
      background: var(--card-bg);
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .product-card img {
      width: 100%;
      height: 160px;
      object-fit: cover;
    }

    .product-card-content {
      padding: 15px;
    }

    .product-card-title {
      font-weight: 600;
      margin-bottom: 8px;
      font-size: 0.95rem;
    }

    .product-card-price {
      color: var(--secondary);
      font-weight: 700;
    }

    /* Footer */
    footer {
      background: var(--card-bg);
      padding: 40px 0 20px;
      margin-top: 60px;
      border-top: 1px solid var(--border);
    }

    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 30px;
    }

    .footer-column h3 {
      font-size: 1.2rem;
      margin-bottom: 20px;
      color: var(--text-medium);
    }

    .footer-links {
      list-style: none;
    }

    .footer-links li {
      margin-bottom: 10px;
    }

    .footer-links a {
      color: var(--text-light);
      text-decoration: none;
      transition: color 0.3s;
    }

    .footer-links a:hover {
      color: var(--primary);
    }

    .copyright {
      text-align: center;
      padding-top: 20px;
      margin-top: 30px;
      border-top: 1px solid var(--border);
      color: var(--text-light);
      font-size: 0.9rem;
    }

    /* Responsive */
    @media (max-width: 1024px) {
      .container {
        flex-direction: column;
      }

      .image-section,
      .details-section {
        max-width: 100%;
      }

      .image-section {
        margin-bottom: 30px;
      }
    }

    @media (max-width: 768px) {
      .header-container {
        flex-direction: column;
        gap: 15px;
      }

      .nav-links {
        gap: 15px;
      }

      .action-buttons {
        flex-direction: column;
      }

      .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
      }
    }

    @media (max-width: 480px) {
      .container {
        padding: 0 10px;
      }

      .details-section {
        padding: 20px;
      }

      .product-name {
        font-size: 1.6rem;
      }

      .tabs {
        flex-wrap: wrap;
      }

      .tab {
        padding: 10px 15px;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  <header>
    <div class="header-container">
      <a href="#" class="logo">
        <i class="fas fa-crown"></i>
        Royal Fresh
      </a>

      <nav class="nav-links">
        <a href="/home">Home</a>
        <a href="/all-products">Shop</a>
        <a href="#">Categories</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
      </nav>
      <div class="header-actions">
        <a href="#"><i class="fas fa-search"></i></a>
        <a class="cart-header" href="/cart" aria-label="Open cart">
          <i class="fas fa-shopping-cart"></i>
          <span class="cart-badge" id="cartBadge">0</span>
        </a>
        <a href="#"><i class="fas fa-user"></i></a>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <!-- Image Gallery -->
    <div class="image-section">
      <img src="{{ asset('images/product_images/' . $product->featured_image) }}" alt="Butter Lassi / Laban"
        class="main-image" id="mainImage">
      <div class="image-thumbnails">
        @foreach($images as $image)
          <img src="{{ asset('images/product_images/' . $image) }}" alt="Thumbnail 1" class="thumbnail active"
            onclick="changeImage(this)">
        @endforeach
      </div>
      <div class="image-actions">
        <button class="action-btn secondary">
          <i class="fas fa-share-alt"></i> Share
        </button>
        <button class="action-btn">
          <i class="fas fa-heart"></i> Wishlist
        </button>
      </div>
    </div>

    <!-- Product Details -->
    <div class="details-section">
      <nav class="breadcrumb">
        <a href="#">Home</a> / <a href="#">Lassi & MilkShake</a> / Butter Lassi / Laban
      </nav>

      <h1 class="product-name">{{$product->product_name}}</h1>

      <div class="rating">
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <span class="rating-count">(42 reviews)</span>
      </div>

      <div class="product-price">
        @if($product->variant_type == 'simple')
          AED {{ $product->s_price }}
        @else
          AED {{ $product->Productvariants->min('price') }}
        @endif
        <!-- <span class="price-compare">AED 22</span>
        <span class="discount-badge">18% OFF</span> -->
      </div>

      <div class="stock-status">
        <i class="fas fa-check-circle in-stock"></i>
        <span class="in-stock">In Stock</span>
        <span>• Only 12 left</span>
      </div>

      <div class="product-desc">
        {!! $product->description !!}
      </div>



      <label for="weight-select">Weight:</label>
      <select id="weight-select">
        <option>Choose an option</option>
        <option>250 ml - AED 10</option>
        <option>500 ml - AED 18</option>
        <option>1 L - AED 32</option>
      </select>

      <div class="quantity-wrapper">
        <label>Quantity:</label>
        <button class="quantity-btn" onclick="updateQuantity(this, -1)">-</button>
        <input type="number" value="1" min="1" readonly class="quantity-input" />
        <button class="quantity-btn" onclick="updateQuantity(this, 1)">+</button>
      </div>

      <div class="action-buttons">
        <button class="add-to-cart-btn" onclick="addToCartSingle({{ $product->id }})">
          <i class="fas fa-cart-plus"></i> Add to Cart
        </button>



        <button class="buy-now-btn">
          <i class="fas fa-bolt"></i> Buy Now
        </button>
        <button class="wishlist-btn">
          <i class="far fa-heart"></i>
        </button>
      </div>

      <div class="shipping-info">
        <h3><i class="fas fa-shipping-fast"></i> Delivery Information</h3>
        <div class="shipping-options">
          <div class="shipping-option">
            <i class="fas fa-check"></i>
            <span>Free shipping for orders above AED 100</span>
          </div>
          <div class="shipping-option">
            <i class="fas fa-check"></i>
            <span>Same-day delivery in Dubai</span>
          </div>
        </div>
      </div>

      <div class="meta-info">
        <div><strong>SKU:</strong> BLL-1</div>
        <div><strong>Category:</strong> <a href="#">Lassi & MilkShake</a></div>
        <div><strong>Tags:</strong> <a href="#">Lassi</a>, <a href="#">Laban</a>, <a href="#">Dairy</a></div>
      </div>

      <div class="social-share">
        <span>Share:</span>
        <a href="#" class="social-icon facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-icon twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" class="social-icon pinterest"><i class="fab fa-pinterest-p"></i></a>
        <a href="#" class="social-icon whatsapp"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>

    <!-- Product Tabs -->
    <div class="tabs-section">
      <div class="tabs">
        <div class="tab active" onclick="openTab(event, 'description')">Description</div>
        <div class="tab" onclick="openTab(event, 'specifications')">Specifications</div>
        <div class="tab" onclick="openTab(event, 'reviews')">Reviews (42)</div>
        <div class="tab" onclick="openTab(event, 'shipping')">Shipping & Returns</div>
      </div>

      <div id="description" class="tab-content active">
        <div class="description-content">
          {!! $product->long_description !!}
        </div>
      </div>

      <div id="specifications" class="tab-content">
        {!! $product->specifications !!}
      </div>

      <div id="reviews" class="tab-content">
        <div class="review-item">
          <div class="review-header">
            <div class="reviewer-name">Ahmed K.</div>
            <div class="review-date">March 15, 2023</div>
          </div>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p>Authentic taste just like my grandmother used to make! Perfect balance of creaminess and tanginess.</p>
        </div>

        <div class="review-item">
          <div class="review-header">
            <div class="reviewer-name">Sarah M.</div>
            <div class="review-date">February 28, 2023</div>
          </div>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <p>Love this product! It's become a staple in our household. The quality is consistently excellent.</p>
        </div>

        <button class="action-btn" style="margin-top: 20px;">
          <i class="fas fa-pen"></i> Write a Review
        </button>
      </div>

      <div id="shipping" class="tab-content">
        {!! $shipping->description !!}
      </div>
    </div>

    <!-- Related Products -->
    <div class="related-products">
      <h2 class="section-title">You May Also Like</h2>
      <div class="products-grid">
        <div class="product-card">
          <img src="Assets/ml1.jpg" alt="Mango Lassi">
          <div class="product-card-content">
            <div class="product-card-title">Mango Lassi</div>
            <div class="product-card-price">AED 16</div>
          </div>
        </div>
        <div class="product-card">
          <img src="Assets/ml2.jpg" alt="Sweet Lassi">
          <div class="product-card-content">
            <div class="product-card-title">Sweet Lassi</div>
            <div class="product-card-price">AED 14</div>
          </div>
        </div>
        <div class="product-card">
          <img src="Assets/ml3.jpg" alt="Salted Lassi">
          <div class="product-card-content">
            <div class="product-card-title">Salted Lassi</div>
            <div class="product-card-price">AED 14</div>
          </div>
        </div>
        <div class="product-card">
          <img src="Assets/ml1.jpg" alt="Rose Lassi">
          <div class="product-card-content">
            <div class="product-card-title">Rose Lassi</div>
            <div class="product-card-price">AED 18</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="footer-column">
        <h3>Royal Fresh</h3>
        <p>Premium quality dairy products delivered fresh to your doorstep across the UAE.</p>
      </div>
      <div class="footer-column">
        <h3>Quick Links</h3>
        <ul class="footer-links">
          <li><a href="#">Home</a></li>
          <li><a href="#">Shop</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Customer Service</h3>
        <ul class="footer-links">
          <li><a href="#">Shipping Policy</a></li>
          <li><a href="#">Return Policy</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Terms & Conditions</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Contact Us</h3>
        <ul class="footer-links">
          <li><i class="fas fa-phone"></i> +971 4 123 4567</li>
          <li><i class="fas fa-envelope"></i> info@royalfresh.ae</li>
          <li><i class="fas fa-map-marker-alt"></i> Dubai, UAE</li>
        </ul>
      </div>
    </div>
    <div class="copyright">
      &copy; 2023 Royal Fresh. All rights reserved.
    </div>
  </footer>

  <script>
    // Quantity update function
    function updateQuantity(btn, change) {
      const input = btn.parentElement.querySelector('input[type=number]');
      let current = parseInt(input.value);
      current += change;
      if (current < 1) current = 1;
      input.value = current;
    }

    // Image gallery functionality
    function changeImage(thumb) {
      const mainImage = document.getElementById('mainImage');
      mainImage.src = thumb.src;

      // Update active thumbnail
      document.querySelectorAll('.thumbnail').forEach(t => t.classList.remove('active'));
      thumb.classList.add('active');
    }

    // Tab functionality
    function openTab(evt, tabName) {
      const tabcontent = document.getElementsByClassName("tab-content");
      for (let i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.remove("active");
      }

      const tablinks = document.getElementsByClassName("tab");
      for (let i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
      }

      document.getElementById(tabName).classList.add("active");
      evt.currentTarget.classList.add("active");
    }

    // Wishlist toggle
    document.querySelector('.wishlist-btn').addEventListener('click', function () {
      const icon = this.querySelector('i');
      if (icon.classList.contains('far')) {
        icon.classList.remove('far');
        icon.classList.add('fas');
        this.style.color = 'var(--danger)';
      } else {
        icon.classList.remove('fas');
        icon.classList.add('far');
        this.style.color = '';
      }
    });
    function addToCartSingle() {

      // Read correct cart key
      let cart = JSON.parse(localStorage.getItem("cartData") || "[]");

      // Product details
      const id = {{ $product->id }};
      const title = document.querySelector(".product-name").innerText.trim();
      const price = Number(document.querySelector(".product-price").innerText.replace("AED", "").trim());
      const quantity = Number(document.querySelector(".quantity-input").value);
      const image = document.getElementById("mainImage").src;

      const weightSelect = document.getElementById("weight-select");
      const weight = (weightSelect.value === "Choose an option") ? "" : weightSelect.value;

      // Create item
      const item = { id, title, price, quantity, weight, image };

      // check existing item
      let existing = cart.find(p => p.id === id && p.weight === weight);

      if (existing) {
        existing.quantity += quantity;
      } else {
        cart.push(item);
      }

      // Save
      localStorage.setItem("cartData", JSON.stringify(cart));

      // Update badge
      const totalQty = cart.reduce((sum, p) => sum + p.quantity, 0);
      document.getElementById("cartBadge").innerText = totalQty;

      alert("Product added to cart!");
    }

    // 🔥 FIX: This function ENSURES badge always matches localStorage
    function updateCartBadge() {
      let cart = JSON.parse(localStorage.getItem("cart") || "[]");
      const totalQty = cart.reduce((sum, p) => sum + p.quantity, 0);
      document.getElementById("cartBadge").innerText = totalQty;
    }

    // Run on page load
    document.addEventListener("DOMContentLoaded", updateCartBadge);
  </script>
</body>

</html>