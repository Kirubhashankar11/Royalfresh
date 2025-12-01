<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShippingPolicy;
use App\Models\Subscription;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $bags = Bag::all();
        return view('front.home', compact('products', 'bags'));
    }
    public function allProducts()
    {
        $categories = Category::with('products')->get();
      
        return view('front.all_products', compact('categories'));
    }
    public function single($id)
    {
        $product = Product::find($id);
        $shipping = ShippingPolicy::first();
        $images = $product->gallery_image;
        // dd($images);

        // Try decoding JSON; if it fails, explode by comma
        if (is_string($images)) {
            $decoded = json_decode($images, true);
            $images = $decoded ?: explode(',', $images);
        }
        // dd($images);
        return view('front.single_product', compact('product', 'shipping','images'));
    }
    public function allBaskets($id)
    {
        $basket = Bag::find($id);
         $products = Product::all();
         $bag_price = $basket->price;
         $categories = Category::all();
        return view('front.basket', compact('basket', 'products', 'bag_price', 'categories'));
    }

    public function subscriptionPage()
    {
        return view('front.subscription');
    }

    public function milkSubscription()
    {
        $products = Product::all();
        $categories = Category::all();
        $subscriptions = Subscription::all();
        return view('front.milk_subscription', compact('products', 'categories', 'subscriptions'));
    }  
    public function yogurtSubscription()
    {
        $products = Product::all();
        $categories = Category::all();
        $subscriptions = Subscription::all();
        return view('front.yogurt_subscription', compact('products', 'categories', 'subscriptions'));
    }
}
