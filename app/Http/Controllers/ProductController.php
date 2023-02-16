<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Excel;
use DB;
use Redirect;
use Toastr;
  

class ProductController extends Controller

{ 
    public function category()
    {  
        $all_category=DB::table('categories')->get(); 
       return view('products.category')
       ->with('all_category',$all_category);
  
    } 
 

     public function trash()
    {
        $all_category = Category::onlyTrashed()->get();
        $data = compact('all_category');
        return view('products.category-trash')->with($data);
  
    } 
    public function addProductscategory()
    {
        return view('products.add_category');
    }

 
    public function saveProductsCategory(Request $request){

        /* print($request->name); */
         DB::table('categories')->insert([
            'name' => $request->name,
            'status' => $request->status
            
        ]); 
         Toastr::success('category add Successfully', 'Info', ["positionClass" => "toast-top-center"]);
        $all_category=DB::table('categories')->get(); 
       return view('products.category')
       ->with('all_category',$all_category); 

    } 
 
      public function delete_category($id){
        DB::table('categories')->where('id',$id)->delete();
        return Redirect::back();

    }   
    public function trash_category($id)
    {
        $all_category = Category::find($id);
        if(!is_null($all_category)){
            $all_category->delete();
        }
        return redirect('products.category-trash');
    } 


    public function editProductscategory( $id)
    {

        $category=DB::table('categories')->where('id',$id)->first();
        $category=view('products.update-category')
                ->with('category',$category);
        return view('admin.master')
        ->with('category',$category);

        
    }

    public function updateProductscategory(Request $request){

        
        DB::table('categories')
              ->where('id', $request->id)
              ->update(['name' => $request->name]);

        Toastr::success('category Updated Successfully', 'Info', ["positionClass" => "toast-top-center"]);
        
        $all_category=DB::table('categories')->get(); 
        return view('products.category')
        ->with('all_category',$all_category);

    }





   
    public function index()
    {     
        $products = Product::with('category' )
        ->get();
        $products = Product::with('subcategory')->get();
        return view('products.index', compact('products'));          
    }   

 
    public function create()
    {
    
       $categories=DB::table('categories')->get();
       $tbl_subcategory=DB::table('tbl_subcategory')->get();
       $product=view('products.create')
       ->with('categories',$categories)
       ->with('tbl_subcategory',$tbl_subcategory);
        return view('admin.master')
        ->with('product',$product);                
    }

    public function store(Request $request)

    {

        $request->validate([

            'product_name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {

            $destinationPath = 'image/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = "$profileImage";

        }
        Product::create($input);
        return redirect()->route('products.index');

    }


    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }


    public function edit(Product $product)
    {
        
        return view('products.edit',compact('product'));
    }

    public function update(Request $request, Product $product)

    {
        $request->validate([
            'product_name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        $product->update($input);
        Toastr::success('Product Updated Successfully', 'Info', ["positionClass" => "toast-top-center"]);
        return redirect()->route('products.index');

    }
        public function destroy(Product $product)

    {
        $product->delete();

        return redirect()->route('products.index');                   
    }



    public function exportproducts()
    {
        return Excel::Download(new ProductsExport,'Products.xlsx' );
    }
    public function importsproducts()
    {
        return view('products.excel');
    }
    public function productsexcel(Request $request)
    {
        //validate
        Excel::import(new ProductsImport, $request->file('file'));
        return redirect()->route('products.index')
        ->with('success','Product created successfully.');
    }
   



    public function cart()
    {
        return view('frontend.pages.cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
   
   
}