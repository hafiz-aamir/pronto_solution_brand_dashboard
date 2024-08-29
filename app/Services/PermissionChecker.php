<?php

namespace App\Services;

use App\Traits\PermissionTrait;

class PermissionChecker
{
    use PermissionTrait;

    public static function checkPermission($permissionName, $menuName)
    {
        $instance = new self();
        return $instance->hasPermission($permissionName, $menuName);
    }
}
