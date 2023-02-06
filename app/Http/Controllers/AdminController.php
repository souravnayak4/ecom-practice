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
 



   
    public function subcategory()
    {   
        $all_subcategory=DB::table('tbl_subcategory')->get(); 
        return view('admin.pages.subcategory')
        ->with('all_subcategory',$all_subcategory);
    }



    public function add_subcategory()
    {
        return view('admin.pages.add_subcategory');
    }
  

    public function save_subcategory(Request $request){
        /* print($request->subcategory_name); */
        
         DB::table('tbl_subcategory')->insert([
            'subcategory_name' => $request->subcategory_name,
            'status' => $request->status
            
        ]);
        Toastr::success(' save subcategory  Successfully', 'Info', ["positionClass" => "toast-top-center"]);
        return Redirect::back();
 
    }

    public function delete_subcategory($id){
        DB::table('tbl_subcategory')->where('subcategory_id',$id)->delete();
        Toastr::warning('subcategory delete Successfully', 'Info', ["positionClass" => "toast-top-center"]);
        return Redirect::back();

    }
    
    public function editProductsubscategory( $subcategory_id)
    {

        $subcategory=DB::table('tbl_subcategory')->where('subcategory_id',$subcategory_id)->first();
        $subcategory=view('admin.pages.update-subcategory')
                ->with('subcategory',$subcategory);
        return view('admin.master')
        ->with('subcategory',$subcategory);

        
    }
    public function updateProductssubcategory(Request $request){

        
        DB::table('tbl_subcategory')
              ->where('id', $request->subcategory_id)
              ->update(['name' => $request->subcategory_name]);

        Toastr::success('subcategory Updated Successfully', 'Info', ["positionClass" => "toast-top-center"]);
        
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
