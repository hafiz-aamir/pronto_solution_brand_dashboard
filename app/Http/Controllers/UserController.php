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
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use App\Models\Brand;
use Carbon\Carbon; 
use Illuminate\Support\Str;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function user_management(){
    
        try {

            if(Auth::user()->role_id == "2")
            {
                
                $get_all_user = User::where('role_id', '!=', '2')->get();

            }
            elseif(Auth::user()->role_id == "3")
            {
                $get_all_user = User::where('id', Auth::user()->id)->get();
            }

            

            return view('admin_dashboard.user_management', compact('get_all_user'));
        
        }catch(\Exception $e) { 

            return back()->with('error', $e->getMessage());

        }


    }


    public function add_user(){
    
        try {
            
            $get_brand = Brand::where('status', '1')->get();

            return view('admin_dashboard.add_user', compact('get_brand'));
        
        }catch(\Exception $e) { 

            return back()->with('error', $e->getMessage());

        }


    }



    public function store_add_user(Request $request){


            $validated = $request->validate([

                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required',
                'brand_id' => 'required|array',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required_with:password|string|min:8',
                'role_id' => 'required|numeric'

            ]);
    
            
            try {
                
                // dd($request->all());
                $ipAddress = getHostByName(getHostName());
                $auth_id = Auth::user()->uuid;
                $brandIds = implode(',', $request->brand_id);

                // dd($brandIds);
                $user = User::create([

                    'uuid' =>  Str::uuid(),
                    'fname' => $validated['fname'],
                    'lname' => $validated['lname'],
                    'email' => $validated['email'],
                    'brand_id' => $brandIds,
                    'phone' => $validated['phone'], 
                    'password' => bcrypt($validated['password']),
                    'role_id' => $validated['role_id'],
                    'ip' => $ipAddress,
                    'auth_id' => $auth_id
                    
                ]);


                if($user){
                
                    return redirect()->route('user_management')->with('message', 'Record added successfull');
                    
                }


            }catch(\Exception $e) { 
               
                return back()->with('error', $e->getMessage());

            }

        
    }



    public function edit_user($uuid){
    
        try {
        
            $get_user = User::where('uuid', $uuid)->first();
            $get_brand = Brand::where('status', '1')->get();
            // dd($get_user);  

            return view('admin_dashboard.edit_user', compact('get_user', 'get_brand'));
        
        }catch(\Exception $e) { 

            return back()->with('error', $e->getMessage());

        }

    }


    public function update_user(Request $request){
    
        // dd($request->all());
        $validated = $request->validate([

            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'brand_id' => '',

        ]);

       
        
        try {
        
           
            $upd_user = User::find($request->id);

            
            if (!$upd_user) {
                return back()->with('error', 'Record not found');
            }

            if($request->brand_id)
            {

                $brandIds = implode(',', $request->brand_id);
                $request['brand_id'] = $brandIds;

            }
            
            $upd_user->fill($request->all());
            
            $isSaved = $upd_user->save();

           
            if ($isSaved) {
                return redirect()->route('user_management')->with('message', 'Record updated successfully');
            } else {
                return back()->with('error', 'Failed to update record');
            }

        
        }catch(\Exception $e) { 

            return back()->with('error', $e->getMessage());
        }


    }



    public function delete_user($uuid){
    
        try {
        
            
            
            
        
        }catch(\Exception $e) { 

            return back()->with('error', 'Something went wrong');

        }


    }
    

}
