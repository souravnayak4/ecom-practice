<?php

namespace App\Http\Controllers;

use App\Models\Subadmin;
use Illuminate\Http\Request;


class SubadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subadmins = Subadmin::latest()->paginate(5);
        return view('subadmins.index',compact('subadmins'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subadmins.create');
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
    
            'contact' => 'required',
    
            'email' => 'email',
            'password' => 'required',
    
        ]);
        $input = $request->all();
        Subadmin::create($input);

        return redirect()->route('subadmins.index')

                    ->with('success','subadmin created successfully.');
    }

   



   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function show(Subadmin $subadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function edit(Subadmin $subadmin)
    {
        return view('subadmins.edit',compact('subadmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subadmin $subadmin)
    {
        $request->validate([

            'name' => 'required',

            'contact' => 'required',
    
            'email' => 'email',
            'password' => 'required',

        ]);

  

        $input = $request->all();

  

       
          

        $subadmin->update($input);

    

        return redirect()->route('subadmins.index')

                        ->with('success','subadmin updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subadmin $subadmin)
    {
        $subadmin->delete();

     

        return redirect()->route('subadmin.index')

                        ->with('success','subadmin deleted successfully');
    }
}
