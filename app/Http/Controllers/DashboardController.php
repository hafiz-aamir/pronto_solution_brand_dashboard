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
use App\Models\Lead;
use Carbon\Carbon; 
use Illuminate\Support\Str;


class DashboardController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index(){
    
        try {
    
            
            return view('admin_dashboard.index');
        
        }catch(\Exception $e) { 

            return redirect()->back()->with('error', $e->getMessage());

        }

    }

    

    public function logout()
    {

        Auth::logout();
        
        return redirect('/login');
        
    }
    

}
