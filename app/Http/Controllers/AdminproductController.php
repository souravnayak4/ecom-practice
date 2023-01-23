<?php

namespace App\Http\Controllers;

use App\Models\Adminproduct;
use Illuminate\Http\Request;

class AdminproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert()
    {
        return view('admin.pages.product');
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id='' )
    {
        if($id>0){
            $arr=Adminproduct::where(['id'=>$id])->get();
        }
         $request->validate([
            'name'=>'required',
            'brand'=>'required',
            'short_desc'=>'required',
            'desc'=>'required',
            'technical_specification'=>'required',
            'uses'=>'required',
            'warranty'=>'required',
           

         ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adminproduct  $adminproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Adminproduct $adminproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adminproduct  $adminproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Adminproduct $adminproduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adminproduct  $adminproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adminproduct $adminproduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adminproduct  $adminproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adminproduct $adminproduct)
    {
        //
    }
}
