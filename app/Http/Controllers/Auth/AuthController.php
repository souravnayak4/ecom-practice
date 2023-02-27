<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Customer;
use Hash;
use DB;

  
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
    public function myaccount(Customer $customer)
    {
        $customer = Customer::find(1);
        return view('frontend.pages.my-account',compact('customer','customer'));
    }
  
    public function updatemyaccount()
    {
        return view('frontend.pages.update-my-account');
    }

    public function myaccountupdate(Request $request,Customer $customer)
    {
        $name = $request->input('name');
        $contact = $request->input('contact');
        $address = $request->input('address');
        $email = $request->input('email');
        

        DB::table('customers')
            ->where('id', '=', Auth::guard('customer')->user()->id)
            ->update([
                'name' => $name,
                'email' =>$email,
                'contact' =>$contact,
                'address' =>$address
            ]);
            return view('frontend.pages.my-account',compact('customer'));
    }


}
