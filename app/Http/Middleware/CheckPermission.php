<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Menu;
use App\Models\User_special_permission;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permissionName
     * @param  string  $menuName
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permissionName, $menuName)
    {
        $user = Auth::user();

        if (!$user) {
            return back()->with('error', 'Unauthorized');
        }

        
        if ($user->role_id == '2') {

            return $next($request);

        }
        else{


            $permission = Permission::where('permission', $permissionName)->first();

            if (!$permission) {
                return redirect('dashboard/index')->with('error', 'Permission not found');
            }
    
        
            $menu = Menu::where('name', $menuName)->first();
    
            if (!$menu) {
                return redirect('dashboard/index')->with('error', 'Menu not found');
            }
    
            
            $hasPermission = User_special_permission::where('user_id', $user->id)
                ->where('menu_id', $menu->id)
                ->where('permission_id', $permission->id)
                ->exists();
    
            if (!$hasPermission) {
                return redirect('dashboard/index')->with('error', 'You do not have permission for perporm this action');
            }
    
            return $next($request);


        }

       
       
    }
}

