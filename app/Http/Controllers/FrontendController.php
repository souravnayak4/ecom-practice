<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.pages.index');
    }  
    

    public function shop()

    {

        $products = Product::latest()->paginate(5);

    

        return view('frontend.pages.shop',compact('products'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function about()
    {
        return view('frontend.pages.about');
    }
    public function wishlist()
    {
        return view('frontend.pages.wishlist');
    }
    public function cart()
    {
        return view('frontend.pages.cart');
    }
    
    public function checkout()
    {
        return view('frontend.pages.checkout');
    }
    public function myaccount()
    {
        return view('frontend.pages.my-account');
    }
}
