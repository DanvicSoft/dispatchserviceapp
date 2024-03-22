<?php

namespace App\Http\Controllers;
use PDO;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;;
use Illuminate\Support\Facades\Session;

class Usercontroller extends Controller
{
    //show user form
    public function register(){
        return view('registerview');
    }

    public function createuser(Request $request){
      $Userfields = $request->validate([
        'name' => 'required',
        'email'   => 'required|unique:users',
        'location' => 'required',
        'password' => 'required'
      ]);
      //$Userfields['password']= bcsqrt($Userfields['password']); 
      $userfields['usertype_id'] = 2;
      $user = User::create($Userfields);
      //auth()->login($user);
       //Session::flash('message', 'Account Created Successfully, Login');
       return redirect('/loginform')->with('message', 'Account Created Successfully, Login');
    }

    //show login form
   public function loginform(){
    return view('loginform');
   }

   //auth()->user()->name

   //Authenticate user
   public function authenticate(Request $request){
     $loginFields = $request->validate([
      'email' => 'required',
      'password' => 'required'
     ]);
     //$loginFields['password'] = Hash::make($loginFields['password']);
     //dd($loginFields);
     if(auth()->attempt($loginFields)){
      $request->session()->regenerate();
      if(auth()->user()->usertype_id == 2){
       // Session::flash('message', 'You are logged In As A Customer');
      return redirect('/completedrequest')->with('message', 'You are now logged In As A Customer');
      }elseif(auth()->user()->usertype_id == 1){
      //Session::flash('message', 'You are logged In as Dispatch Rider');
      return redirect('/dispatchrequest')->with('message', 'You are now logged In As Dispatch Rider');
    }
     }
     return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
   }

    public function logoutuser(Request $request){
      auth()->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      Session::flash('message', 'you are logged out');
      return redirect('/');
    }
}
