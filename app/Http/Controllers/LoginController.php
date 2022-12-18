<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

use function Psy\debug;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        FacadesSession::flush();
        Auth::logout();

        return Redirect('login');
    }
}