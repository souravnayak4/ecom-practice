<?php

namespace App\Http\Controllers;

use App\Models\Subadmin;
use Illuminate\Http\Request;
use App\Mail\MailSubadminMailable;
use Illuminate\support\Facades\Mail;
use App\Mail\SubadmindetailsMailable;
use Illuminate\Support\Facades\Auth;

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
   
    
    private function SubadmindetailsMailable($request)
    {
        $subadmin = [
            'name'=>$request->input('name'),
            'contact' => $request->input('contact'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
           $to_subadmin_email = $request-> input('email');
        Mail::to($to_subadmin_email)->send(new SubadmindetailsMailable($subadmin));

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
        

       $this->SubadmindetailsMailable($request);

        return redirect()->route('subadmins.index')

         ->with('success','subadmin created successfully.');
    }
  /*  */
 /*   public function login(Request $request)
   {
    
    $subadmin= Subadmin::where('email',$request->input('email'))->get();
     return $subadmin->password;
     return view('subadmins.login');
   } 
    
   public function addlogin(Request $request)
   {
     $subadmin= Subadmin::where('email',$request->input('email'))->get();
     return $subadmin->password;
   } */

  
   public function  subadminindex()
    {
        return view('subadmins.login');
    } 
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('subadmins.index')
                        ->with('message', 'Signed in!');
        }
   
        return redirect('/subadmins')->with('message', 'Login details are not valid!');
    }
 



   
   /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function show(Subadmin $subadmin)
    {
        return view('subadmins.show',compact('subadmin'));
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

     

        return redirect()->route('subadmins.index')

                        ->with('success','subadmin deleted successfully');
    }

    public function mailsubadmin(Subadmin $subadmin)
    {
        return view('subadmins.show',compact('subadmin'));  
        Mail::to("$subadmin->email")->send(new MailSubadminMailable($subadmin));
        return redirect()->route('subadmins.index')

                        ->with('success','subadmin details  successfully');
    }
}
