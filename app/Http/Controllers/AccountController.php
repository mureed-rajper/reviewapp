<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\File;
class AccountController extends Controller
{
    // display registration form
    public function registerpage(){
        return view('formspage.register');
    }

    // user register and data inserted into database
    public function register(Request $request){

        // form custome validation
        $validate = $request->validate([
            'name' => 'required|min:4',
            'age' => 'required |numeric|between:18,65',
            'email' => 'required |email|unique:users,email',
            'password' => 'required |max:8'
        ],
        [
            'name.required' => 'please insert your name',
            'name.min' => 'name contains at least 4 character',
            'age.required' => 'please insert your age',
            'age.numeric' => 'age contains numbers',
            'age.between' => 'please insert a valide age 18 to 65',
            'email.required' => 'please insert your email',
            'email.email' => 'please insert valide email address',
            'email.unique' => 'the email address already exist',
            'password.required' => 'please insert your password',
            'password.max' => 'password contains 8 character and numbers',
        ]);

    // get user data and store into database
    
       $data = User::create([

        'name' => $request->name,
        'age' => $request->age,
        'email' => $request->email,
        'password' => $request->password,
       ]);
   
       if($data){
          return redirect()->route('home');
       }
    }

    // display login form
    public function loginpage(){
        return view('formspage.login');
    }

    // user fully authentication here

    public function login(Request $request)
     {
        // form validation here
        $valid = $request->validate([
            'email' => 'required |email',
            'password' => 'required'
        ],[
            'email.required' => 'please insert email',
            'email.email' => 'please insert a valide email address',
            'password.required' => 'please insert password'
        ]);
        
        // user authentication here
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            return redirect()->route('home')->with('sucess','you are successfully logned here');
        }
        else{
            return redirect()->route('paglogin')->with('error','email and password are not matched!');
        };
     }

    //  user logout
    public function logout(){
        Auth::logout();

        return redirect()->route('paglogin');
    }


    // THIS METHODS FOR USER PROFILE

    // show profile
    public function profile($id){
         $profile = User::find($id);

         return view("dashprofile.profile", ['profile' => $profile]);
    }

    // edit profile
    public function editpro($id){
        
        $eidtpro = User::find($id);
        
        return view("dashprofile.editprofile", ['datas' => $eidtpro]);

    }



    
}

?>


