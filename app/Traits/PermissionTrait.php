<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use App\Models\Permission;
use App\Models\Menu;
use App\Models\User_special_permission;


trait PermissionTrait
{
    
    /**
     * Check if the authenticated user has a specific permission for a given menu.
     *
     * @param string $permissionName
     * @param string $menuName
     * @return bool
     */

    public function hasPermission($permissionName, $menuName)
    {   
        
        $user = Auth::user();

        if (!$user) {
            return false;
        }

        // Super admin role check
        if ($user->role_id == '2') {
            return true; 
        }
        else{

            $permission = Permission::where('permission', $permissionName)->first();

            if (!$permission) {
                return false;
            }

            
            $menu = Menu::where('name', $menuName)->first();

            if (!$menu) {
                return false;
            }

            
            $hasPermission = User_special_permission::where('user_id', $user->id)
                ->where('menu_id', $menu->id)
                ->where('permission_id', $permission->id)
                ->where('status', '1')
                ->exists();

            return $hasPermission;

        }
      
        
    }
}

