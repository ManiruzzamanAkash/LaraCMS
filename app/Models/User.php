<?php

namespace App\Models;

use App\Helpers\StringHelper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'phone_no', 'password', 'avatar', 'status', 'deleted_by', 'language_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * getAdminPermissionGroups
     *
     * @return array Returns the array of permission groups name
     */
    public static function getAdminPermissionGroups()
    {
        $permissions_group = DB::table('permissions')
            ->select('group_name as name')
            ->where('guard_name', 'admin')
            ->groupBy('group_name', 'guard_name')
            ->get();
        return StringHelper::modelToArray($permissions_group);
    }

    /**
     * getPermissionsByGroupName Get all per missions for a group
     *
     * @param string $group_name
     * @return array Returns the array of permissions
     */
    public static function getPermissionsByGroupName($group_name)
    {
        $permissions = DB::table('permissions')
            ->select('id', 'name')
            ->where('guard_name', 'admin')
            ->where('group_name', $group_name)
            ->get();
        return StringHelper::modelToArray($permissions);
    }

    /**
     * roleHasPermissions Check role has array of permissions or not
     *
     * @param object $role
     * @param array $permissions
     * @return boolean If has all permissions, return true, else false
     */
    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $pm) {
            if (!$role->hasPermissionTo($pm->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
        }
        return $hasPermission;
    }
}
