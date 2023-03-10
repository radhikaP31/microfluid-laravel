<?php
namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;

use function Psy\debug;

class LoginController extends Controller
{
    /**
     * login view
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    /**
     * login
     * @param Array $request
     *
     * @return \Illuminate\View\View
     */
    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->flash('success', 'You are login successfully.. Welcome!!');
            return redirect()->route('dashboard');
        }

        $request->session()->flash('error', 'Login details are not valid!!');
        return redirect()->route('login');
    }

    /**
     * register view
     *
     * @return \Illuminate\View\View
     */
    public function registration()
    {
        return view('admin.auth.registration');
    }

    /**
     * register
     * @param Array $request
     *
     * @return \Illuminate\View\View
     */
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    /**
     * dashboard
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('admin.dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * sign out
     *
     * @return \Illuminate\View\View
     */
    public function signOut() {
        FacadesSession::flush();
        Auth::logout();

        return Redirect('login');
    }
}