<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class CacheController extends Controller
{
    public function reset_cache()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        return 'removed cache';
    }
}
