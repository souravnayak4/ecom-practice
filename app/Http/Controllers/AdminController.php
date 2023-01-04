<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\product;
use App\Models\material;
use DB;
use Toastr;
use Redirect;

class AdminController extends Controller
{
    // This is dashboard page
    public function dashboard()
    {   
        return view('admin.pages.dashboard');
    }

     public function category()
    {  
        $all_category=DB::table('tbl_category')->get(); 
       return view('admin.pages.category')
       ->with('all_category',$all_category);
       
        
    } 
    public function add_category(){
        $category=view('admin.pages.add_category');
        return view('admin.master')
        ->with('category',$category);

    }
    public function save_category(Request $request){

        //print($request->area_name);
        DB::table('tbl_category')->insert([
            'category_name' => $request->category_name
            
        ]);

       
        
        return Redirect::back();

    }
    public function delete_category($id){
        DB::table('tbl_category')->where('category_id',$id)->delete();
        
        
        return Redirect::back();

    }


    public function subcategory()
    {   
        $all_subcategory=DB::table('tbl_subcategory')->get(); 
       return view('admin.pages.subcategory')
       ->with('all_subcategory',$all_subcategory);
          
    }


    public function add_subcategory(){
        $subcategory=view('admin.pages.add_subcategory');
        return view('admin.master')
        ->with('subcategory',$subcategory);

    }
    public function save_subcategory(Request $request){

        //print($request->area_name);
        DB::table('tbl_subcategory')->insert([
            'subcategory_name' => $request->subcategory_name
            
        ]);
        
        return Redirect::back();

    }

   

    
    public function add_products(Request $request)
    {   
        $all_category=DB::table('tbl_category')->get();
        $all_subcategory=DB::table('tbl_subcategory')->get();
                 
        return view('admin.pages.add_products')
        ->with('all_category',$all_category)
       ->with('all_subcategory',$all_subcategory);
       
       
    return Redirect::back();
    }
    public function save_products(Request $request){
     /* dd($request->all()); */
        
       /*  DB::table('products')->insert([
            
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->sproduct_name,
            'small_description' => $request->small_description,
            'description' => $request->description,
            'original_price' => $request->original_price,
            

            
        ]);
 */
        
        
        return Redirect::back();

    }
    public function all_products_details()
    {   
        return view('admin.pages.products_details');
    }


    public function orders()
    {   
        return view('admin.pages.orders');
    }


    public function tracking()
    {   
        return view('admin.pages.tracking');
    }


    public function subadmin()
    {   
        return view('admin.pages.subadmin');
    }


    public function changepassword()
    {   
        return view('admin.pages.changepassword');
    }

    public function adminsetting()
    {   
        return view('admin.pages.usersetting');
    }


    public function adminlogin()
    {   
        return view('admin.login');
    }

    public function addcategory()
    {   
        return view('admin.pages.add_category');
    }

   
    
    
    public function all_products()
    {   
        $products = product::all();
        return view('admin.pages.products');
    }
     function insert(Request $mater)
    {   
        $name= $mater->get('pname');
        $name= $mater->get('PPrice');
        $name= $mater->file('image')->getclientOriginalName();
        $req->image->move(public_path('images'),$pimage);
    }
    
}
