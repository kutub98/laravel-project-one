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
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8', // Ensures password is confirmed
            'terms' => 'accepted', // Terms and conditions checkbox
        ]);

        // Check if validation passes
        if ($validator->passes()) {
            // Create the user
            // User::create([
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'password' => Hash::make($request->password),
            //     "role"=> $request->role
            // ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = "customer";
            $user->password = Hash::make($request->password);
            $user->save();

            // Redirect to login with a success message
           flash()->success('Registerd completed successfully!');
            return redirect()->route('account.login')->with('status', 'Account created successfully.');
        } else {
            flash()->error('An error occurred.');
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

        if ($validator->passes()){
            
            if(Auth::attempt(["email"=> $request->email, 'password'=> $request->password]));
        }

        if($validator->fails()){
               flash()->error('Something wentwrong!');
            return redirect()->route('account.login')->withInput()->withErrors($validator);
        }

         flash()->success('login successfully!');
         return redirect()->route('account.dashboard');
    }

    
    public function logout(Request $request)
{
    // Log the user out
    auth()->logout();

    // Invalidate the session
    $request->session()->invalidate();

   
    $request->session()->regenerateToken();
    flash()->success('logout successfully!');
    
    return redirect()->route('home');
}

}