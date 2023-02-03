<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

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

        $products = Product::latest()->paginate(5);

    

        return view('frontend.pages.shop',compact('products'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function  product_details($id)
    {

        $details=DB::table('products')->where('id',$id)->first();
        return view('frontend.pages.product-details')->with('details',$details);
       
    }

    public function blogdetails($id)
    {
      $blog =DB::table('blog')->where('id',$id)->first();
      return view('details')->with('blog',$blog);
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
    public function addToCart(Request $request)
    {
        if ($request->session()->has('customer'))
       {
        return 'hello';

       }
       else
       {
        return view('frontend.pages.my-account');
       }
        
        
    }
    public function updatemyaccount()
    {
        return view('frontend.pages.update-my-account');
    }
}
