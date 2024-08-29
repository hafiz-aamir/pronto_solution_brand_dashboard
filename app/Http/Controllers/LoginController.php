<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
use Exception; 
use Mail;
use Auth;
use Session;
use Hash;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon; 
use Illuminate\Support\Str;


class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest');
    }


    

    public function index(){
        
        try {
        
            
            
            
            
        return view('welcome');
        
        }catch(\Exception $e) { 

            return redirect()->back()->with('error', $e->getMessage());

        }

    }


    public function login(){
        
        try {
        
            
            
            
            
        return view('welcome');
        
        }catch(\Exception $e) { 

            return redirect()->back()->with('error', $e->getMessage());

        }

    }

    

    public function postlogin(Request $request)
    {
       
        // dd("Ssdd");
        
        try {
          
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
            ]);
    
            // dd("dsfdfdf");
        
            $email = $request->email;
            $password = $request->password;
    
            if(Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {
            
                $user = Auth::user();
                
                if($user){
                    return redirect("dashboard/index")->with('message', 'Signin Successfully');
                }
            
            }else{
                return redirect()->back()->with('error', 'Invalid Email or Password');
            }
            
        }catch(\Exception $e) { 

            return redirect()->back()->with('error', $e->getMessage());

        }
    
    }


}
