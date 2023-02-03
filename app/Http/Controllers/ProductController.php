<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Excel;
  

class ProductController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));      
    }

   

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {
        $categories = Category::all();
        return view('products.create', compact('categories'));

    }

    public function exportproducts()

    {

        return Excel::Download(new ProductsExport,'Products.xlsx' );

    }
    public function add_category()
    {
        return view('products.add_category');
    }

   /*  public function save_products_category(Request $request)
    {
        $request->validate([

            'category_name' => 'required',

        ]);

        $input = $request->all();

        Category::create($input);

        return view('products.add_category');
    } */


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

            'detail' => 'required'

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

    

        return redirect()->route('products.index')

                        ->with('success','Product updated successfully');

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

     

        return redirect()->route('products.index')

                        ->with('success','Product deleted successfully');

    }
   
}