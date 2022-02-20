<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;

class UserController extends Controller
{
    public function login() {
        return view('pages.login');
    }

    public function register() {
        return view('pages.register');
    }

    public function dashboard() {     
        $notifications = DB::select("SELECT users.id, users.fname, users.lname, users.email, COUNT(is_read) AS unread FROM users LEFT JOIN messages ON users.id = messages.from AND messages.is_read = 0 WHERE users.id = ".Auth::id()." GROUP BY users.id, users.fname, users.lname, users.email");
         
        return view('dashboard', compact('notifications', $notifications));
    }

    public function save_register(Request $request)
    {
        $user = User::where('email', $request['email'])->first();

        if($user) {
            return response()->json(['exists' => 'Email already exists']);
        } else {
            $user = new User;
            $user->fname = $request['fname'];
            $user->lname = $request['lname'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
        }
        $user->save();
        return response()->json(['success' => 'User Registered Successfully']);
    }



    
    public function user_login(Request $request) {
   
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')])) {
            $user = Auth()->user();
                return response()->json(['success' => 'Successfully Logged In']);
 
        } else {
            return response()->json(['error'=> 'Something went wrong']);
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }    

}
