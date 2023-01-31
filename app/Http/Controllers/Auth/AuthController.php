<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Customer;
use Hash;

  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('frontend.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('frontend.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {

        
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if(Auth::guard('customer')->attempt($credentials)){
         /*    dd($request->all()); */
            return redirect()->intended('/my-account')
                        ->withSuccess('You have Successfully loggedin');
        }
       /*  dd("not" ); */
        return redirect("/new-user-login")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'contact' => 'required',
            'address' => 'required',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("/new-user-login")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function home()
    {
        if(Auth::check()){
            return view('/my-account');
        }
  
        return redirect("/new-user-login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return Customer::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'contact' => $data['contact'],
        'address' => $data['address'],
        'password' => Hash::make($data['password'])
      ]);
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return redirect('/new-user-login');
    }

    public function myaccountupdate(Request $request, customer $customer)

    {

        $request->validate([

            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'email' => 'required'

        ]);

  

        $input = $request->all();

        $customer->update($input);
        return redirect()->route('/my-account')

                        ->with('success',' updated successfully');

    }
}
