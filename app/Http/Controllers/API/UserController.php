<?php

namespace App\Http\Controllers\API;

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


class UserController extends Controller
{
    
    public function register(Request $request){ 

        try {

            $validator = Validator::make($request->all(), [
                
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'password' => 'required|min:6|max:16',
                'role_id' => 'required|numeric',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                
            ]);
            
            
            if($validator->fails()) {
                
                $message = $validator->messages();
                
                return response()->json([
                    
                    'status_code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                    'errors' => strval($validator->errors())
                
                ], Response::HTTP_UNPROCESSABLE_ENTITY);

            }

            $user = $request->all();
            $user['uuid'] = Str::uuid();
            $user['password'] = bcrypt($user['password']);
            $user['ip'] = $request->ip();
            $user['auth_id'] = Auth::user()->uuid;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName(); // Prepend timestamp for unique filename
                $folderName = '/upload_files/users/';
                $destinationPath = public_path() . $folderName;
        
                // Ensure the directory exists, if not create it
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
        
                // Move the file to the destination path
                $file->move($destinationPath, $fileName);
        
                // Update the menu's icon path
                $user['image'] = $folderName . $fileName;
            }

            
            $save_user = User::create($user);
            $user = auth()->user();

            if($save_user) { 
            
                
                return response()->json([
                    
                    'status_code' => 201,
                    'message' => 'Registration Successfull',
                    // 'accessToken' => $access_Token, 

                ], 201);

            }
        
        }catch (QueryException $e) {
            
            if ($e->getCode() === '23000') { // SQLSTATE code for integrity constraint violation
                // Handle unique constraint violation
                return response()->json([

                    'status_code' => Response::HTTP_CONFLICT,
                    'message' => 'Duplicate entry detected',
                    'error' => 'The email address has already been taken.',

                ], Response::HTTP_CONFLICT); // 409 Conflict
            }

            // For other SQL errors
            return response()->json([

                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Database error',
                'error' => $e->getMessage(),

            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 Internal Server Error
        
        }catch (\Exception $e) { 
            // Handle general exceptions
            return response()->json([

                'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Server error',
                'error' => $e->getMessage(),

            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 Internal Server Error
        }

            
    }


    public function login(Request $request){


        $validator = Validator::make($request->all(), [
             
            'email' => 'required|email',
            'password' => 'required',

        ]); 
        
        if($validator->fails()){
            
            $message = $validator->messages();
            
            return response()->json([
                
                'status_code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => strval($validator->errors())
            
            ], Response::HTTP_UNPROCESSABLE_ENTITY);

        } 
        
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){

            $user = Auth::user();
            $get_user = User::where('email', $email)->first();
            $access_Token = $user->createToken('MyToken')->accessToken; 

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'login successfull',
                'data' => $get_user,
                'token' => $access_Token,

            ], Response::HTTP_OK);
            
        }else{

            return response()->json([
                'message' => 'Invalid credentials',
                'status_code' => Response::HTTP_UNAUTHORIZED,
            ], Response::HTTP_UNAUTHORIZED);

        }


    } 



    public function logout(Request $request)
    {
        
        $user = Auth::user(); 
        $user->token()->revoke();

        if($user){
            activity()->useLog('Logout')->causedBy($user)->withProperties($user)->log('You have Been Logout');
        }

        return response()->json([
            
            'status_code' => Response::HTTP_OK,
            'message' => 'Successfully logged out'
        
        ], Response::HTTP_OK);

    }


}
