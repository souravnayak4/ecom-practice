<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use DB;
use Toastr;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('frontend.pages.index', compact('categories'));
    }  

    public function about()
    {
        return view('frontend.pages.about');
    }
    public function shop()

    {

        $products = Product::where('status','',0)->get();



        return view('frontend.pages.shop', compact('products'));

           

    }

    public function  product_details($id)
    {

       

        $details = Product::with('category' )->where('id',$id)->first()
        ;
        
        return view('frontend.pages.product-details', compact('details')); 
       
    }

 

    public function wishlist()
    {
        return view('frontend.pages.wishlist');
    }
    public function cart()
    {
        return view('frontend.pages.cart');
    }
    
    public function myaccount()
    {
        return view('frontend.pages.my-account');
    }
    public function checkout()
    {
        return view('frontend.pages.checkout');
    }

   /*  public function addToCart(Request $request )
    {
        return view('frontend.pages.index');
       } */

    public function updatemyaccount()
    {
        return view('frontend.pages.update-my-account');
    }
}
