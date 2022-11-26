<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roleSubscriber = Role::where('guard_name', 'admin')->where('name', 'Subscriber')->first();
        if (empty($roleSubscriber)) {
            $roleSubscriber = Role::create(['guard_name' => 'admin', 'name' => 'Subscriber']);
        }

        $roleAdmin = Role::where('guard_name', 'admin')->where('name', 'Admin')->first();
        if (empty($roleAdmin)) {
            $roleAdmin = Role::create(['guard_name' => 'admin', 'name' => 'Admin']);
        }

        $roleEditor = Role::where('guard_name', 'admin')->where('name', 'Editor')->first();
        if (empty($roleEditor)) {
            $roleEditor = Role::create(['guard_name' => 'admin', 'name' => 'Editor']);
        }

        $roleSuperAdmin = Role::where('guard_name', 'admin')->where('name', 'Super Admin')->first();
        if (empty($roleSuperAdmin)) {
            $roleSuperAdmin = Role::create(['guard_name' => 'admin', 'name' => 'Super Admin']);
        }

        /**
         * @var array Admin User Permissions group wise
         */
        $permissionGroups = [
            'dashboard' => [
                'dashboard.view',
            ],

            'settings' => [
                'settings.view',
                'settings.edit',
            ],

            'permission' => [
                'permission.view',
                'permission.create',
                'permission.edit',
                'permission.delete',
            ],

            'admin' => [
                'admin.view',
                'admin.create',
                'admin.edit',
                'admin.delete',
            ],

            'admin_profile' => [
                'admin_profile.view',
                'admin_profile.edit',
            ],

            'role_manage' => [
                'role.view',
                'role.create',
                'role.edit',
                'role.delete',
            ],

            'user' => [
                'user.view',
                'user.create',
                'user.edit',
                'user.delete',
            ],

            'category' => [
                'category.view',
                'category.create',
                'category.edit',
                'category.delete',
            ],

            'page' => [
                'page.view',
                'page.create',
                'page.edit',
                'page.delete',
            ],

            'service' => [
                'service.view',
                'service.create',
                'service.edit',
                'service.delete',
            ],

            'booking_request' => [
                'booking_request.view',
                'booking_request.edit',
                'booking_request.delete',
            ],

            'blog' => [
                'blog.view',
                'blog.create',
                'blog.edit',
                'blog.delete',
            ],

            'slider' => [
                'slider.view',
                'slider.create',
                'slider.edit',
                'slider.delete',
            ],

            'tracking' => [
                'tracking.view',
                'tracking.delete',
            ],

            'notifications' => [
                'email_notification.view',
                'email_notification.edit',
                'email_message.view',
                'email_message.edit',
            ],

            'contacts' => [
                'contact.view',
                'contact.create',
            ],

            'module' => [
                'module.view',
                'module.create',
                'module.edit',
                'module.delete',
                'module.toggle',
            ]
        ];

        // Assign group wise permissions
        foreach ($permissionGroups as $groupKey => $permissionGroup) {
            foreach ($permissionGroup as $permissionName) {
                $permission = Permission::where('guard_name', 'admin')->where('group_name', $groupKey)->where('name', $permissionName)->first();
                if (empty($permission)) {
                    $permission = Permission::create([
                        'guard_name' => 'admin',
                        'group_name' => $groupKey,
                        'name'       => $permissionName
                    ]);
                }

                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
