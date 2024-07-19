<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function profile(User $user){
        $thePosts = $user->posts()->latest()->get();
        return view('profile-posts',['username' => $user->username, 'posts' => $thePosts, 'postsCount' => $user->posts()->count()]);
    }
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','You are loged out.');
    }
    public function showCorrectHomePage(){
        if(auth()->check()){
            return view('homepage-feed');
        } else {
            return view('homepage');
        }
    }
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);
        if(auth()->attempt(['username' => $incomingFields['loginusername'], 'password'=> $incomingFields['loginpassword']])){
            $request->session()->regenerate();
            return redirect('/')->with('success',  'successfully logged in.');
        } else {
            return redirect('/')->with('failure', 'Invalide Login');
        }
    }
    
    public function register(Request $request){
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users','username')],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'min:8','confirmed']
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/')->with('success', 'Registered Successfully.');
    }
}
