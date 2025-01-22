<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; // Add this line
class loginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        return view('register');
    }

   
    public function registerProcess(Request $request)
{
    // Custom email domain validation rule
    $customEmailRule = 'regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.(com|net|org|edu|gov)$/';

    // Validate the incoming request
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => ['required', 'email', 'unique:users,email', $customEmailRule], // Added custom email validation
        'password' => 'required|confirmed|min:8', 
        'terms' => 'accepted', // Terms and conditions checkbox
    ]);

    // Check if validation passes
    if ($validator->passes()) {
        // Create a new user instance
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = "customer";
        $user->password = Hash::make($request->password); // Password will be hashed before saving
        $user->save();

        // Redirect to login with a success message
        flash()->success('Registration completed successfully!');
        return redirect()->route('account.login')->with('status', 'Account created successfully.');
    } else {
        flash()->error('An error occurred. Please check your inputs.');

        // If validation fails, return to the registration page with errors
        return redirect()->route('account.register')
            ->withInput()
            ->withErrors($validator);
    }
}


    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required"
        ]);

        if($validator->fails()){
            flash()->error('Something went wrong !');
            return redirect()->route('account.login')->withInput()->withErrors($validator);
        }

        if(Auth::attempt(['email'=> $request->email, 'password'=>$request->password])){
            flash()->success('Login successfully!');
           return redirect()->route('account.dashboard');
        }else{
            flash()->error('Email or Password are incorrect');
            return redirect()->route('account.login');
        }
        
    }

    
    public function logout(Request $request)
{
    // Log the user out
    auth()->logout();

    // Invalidate the session
    $request->session()->invalidate();

   
    $request->session()->regenerateToken();
    flash()->success('Logout successfully!');
    
    return redirect()->route('home');
}

}