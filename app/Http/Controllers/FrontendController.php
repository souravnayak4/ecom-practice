<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
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

       

        $details = Product::with('category' )->where('id',$id)->first();
        
        return view('frontend.pages.product-details', compact('details')); 
       
    }
    public function searchdata(Request $request)

    {
       
       $searchText=$request->search;
       $products=Product::where('product_name','LIKE',"%$searchText%")
       ->orWhere('detail','LIKE',"%$searchText%")
       ->get();
       return view('frontend.pages.shop', compact('products'));
    }
    public function show_cart()
    {
        $id=Auth::guard('customer')->user()->id;
        $cart=cart::where('customer_id','=',$id)->get();
        return view('frontend.pages.cart', compact('cart'));
    }
   


 

 
    public function add_cart(Request $request,$id)
    {
        if(Auth::guard('customer')->check())
        {
            $customer=Auth::guard('customer')->user();
            $products=Product::find($id);
             $cart= new cart;
            $cart->name=$customer->name; 
            $cart->email=$customer->email; 
            $cart->contact=$customer->contact; 
            $cart->address=$customer->address; 
            $cart->customer_id=$customer->id; 

            $cart->product_name=$products->product_name;
            $cart->price=$products->price; 
            $cart->image=$products->image;
            $cart->product_id=$products->id;

            $cart->quantity=$request->quantity;
            
            $cart->save();
            return redirect()->back();
            
            
        }
        else
        {
             return redirect('/new-user-login');
        }
    }

  /*   Auth::guard('admin')->user()->name;
    {{Auth::guard('customer')->user( )->name }} */
    
    public function remove_cart($id)
    {
    $cart=Cart::find($id);
    $cart->delete();
    return redirect()->back();
    }

    public function cash_order()
    {
        $id=Auth::guard('customer')->user()->id;
        $data=Cart::where('customer_id','=',$id)->get();
        foreach($data as $data)
        {
           $order=new order;
           $order->name=$data->name;
           $order->email=$data->email;
           $order->contact=$data->contact;
           $order->address=$data->address;
           $order->customer_id=$data->customer_id;

           $order->product_name=$data->product_name;
           $order->price=$data->price;
           $order->image=$data->image;
           $order->quantity=$data->quantity;
           $order->product_id=$data->product_id;

           $order->payment_status='cash on deleviry';
           $order->delivery_status='Not paid';
           $order->save();
           /* $cart_id=$data->id;
           $cart=Cart::find('$cart_id');
           $cart=delete(); */
           
        }
        Toastr::success('Product Updated Successfully', 'Info', ["positionClass" => "toast-top-center"]);

        return redirect()->back();

    }

    public function wishlist()
    {
        return view('frontend.pages.wishlist');
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
