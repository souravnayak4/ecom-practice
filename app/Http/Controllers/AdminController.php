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
        $all = DB::table('tbl_subcategory')
             ->join('tbl_category', 'tbl_subcategory.category_id', '=', 'tbl_category.category_id')
             ->select('tbl_subcategory.*', 'tbl_category.category_name')
             ->get();

         $subcategory=view('admin.pages.subcategory')
                   ->with('all',$all);
       return view('admin.master')
       ->with('subcategory',$subcategory);
          
    }



    public function add_subcategory(){
        $all_category=DB::table('tbl_category')->get(); 
        $subcategory=view('admin.pages.add_subcategory')
                     ->with('all_category',$all_category);
        return view('admin.master')
        ->with('subcategory',$subcategory);

    }
  

    public function save_subcategory(Request $request){
        /* print($request->subcategory_name); */
        
         DB::table('tbl_subcategory')->insert([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id
            
        ]);
        
        return Redirect::back();
 
    }

    public function delete_subcategory($id){
        DB::table('tbl_subcategory')->where('subcategory_id',$id)->delete();
        
        
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

   
    
    
    
    
}
