<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller {
 public function showLogin(){return view('auth.login');}
 public function showRegister(){return view('auth.register');}
 public function login(Request $request){$data=$request->validate(['email'=>'required|email','password'=>'required|string']); if(Auth::attempt($data,$request->boolean('remember'))){$request->session()->regenerate();return redirect()->intended(route('dashboard'));}return back()->withErrors(['email'=>'Las credenciales no son válidas.'])->withInput();}
 public function register(Request $request){$data=$request->validate(['name'=>'required|string|max:100','email'=>'required|email|unique:users,email','phone'=>'nullable|string|max:30','password'=>'required|string|min:8|confirmed']);$user=User::create($data+['role'=>'customer']);Auth::login($user);$request->session()->regenerate();return redirect()->route('events.index')->with('success','Cuenta creada correctamente.');}
 public function logout(Request $request){Auth::logout();$request->session()->invalidate();$request->session()->regenerateToken();return redirect()->route('home');}
}
