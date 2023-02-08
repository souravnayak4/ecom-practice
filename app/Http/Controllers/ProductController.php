<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
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
        
        return Redirect::back();

    }





   
    public function index()

    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));      
    }


    public function create()

    {
        $categories = Category::all();
        return view('products.create', compact('categories'));

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
    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $request->validate([

            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'category_id' => 'required',
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

     

    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function show(Product $product)

    {
        return view('products.show',compact('product'));
    }

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Product $product)

    {

        $request->validate([

            'name' => 'required',
            'detail' => 'required',
            'price' => 'required'
            
           

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

       



        return redirect()->route('products.index');


    }

  

    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function destroy(Product $product)

    {
        $product->delete();

        return redirect()->route('products.index');                   
    }




   
}