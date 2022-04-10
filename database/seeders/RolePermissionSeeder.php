<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  Create roles
         //  Create roles
         $roleSuperAdmin = Role::create(['name' => 'superadmin','guard_name'=>'admin']);

         //  permission List as array
         $permissions = [

             [
                 'group_name' => 'dashboard',
                 'permissions' => [
                      // Dashboard permission
                     'dashboard.view',
                 ]
             ],
             [
                 'group_name' => 'admin',
                 'permissions' => [
                     // Admin permission
                     'admin.create',
                     'admin.view',
                     'admin.edit',
                     'admin.delete',
                 ]
             ],
             [
                 'group_name' => 'role',
                 'permissions' => [
                     // Role permission
                     'role.create',
                     'role.view',
                     'role.edit',
                     'role.delete',
                 ]
             ],
             [
                 'group_name' => 'profile',
                 'permissions' => [
                     // Profile permission
                     'profile.view',
                     'profile.edit',
                 ]
             ],
             [
                'group_name' => 'settings',
                'permissions' => [
                    'setting.view',
                    'setting.update',
                ]
            ],
            [
                'group_name' => 'about',
                'permissions' => [
                    'about.edit',
                ]
            ],
            [
                'group_name' => 'category',
                'permissions' => [
                    // category permission
                    'category.create',
                    'category.view',
                    'category.edit',
                    'category.delete',
                ]
            ],
            [
                'group_name' => 'product',
                'permissions' => [
                    // product permission
                    'product.create',
                    'product.view',
                    'product.edit',
                    'product.delete',
                ]
            ],
            [
                'group_name' => 'contact',
                'permissions' => [
                    // contact permission
                    'contact.view',
                    'contact.edit',
                    'contact.delete',
                ]
            ],
            [
                'group_name' => 'faq',
                'permissions' => [
                    // faq permission
                    'faq.create',
                    'faq.view',
                    'faq.edit',
                    'faq.delete',
                ]
            ],
            [
                'group_name' => 'faq_category',
                'permissions' => [
                    // faq permission
                    'faq.category.create',
                    'faq.category.view',
                    'faq.category.edit',
                    'faq.category.delete',
                ]
            ],
         ];

         // Assaign Permission
         for ($i=0; $i < count($permissions); $i++) {
             $permissionGroup = $permissions[$i]['group_name'];

             for ($j=0; $j < count($permissions[$i]['permissions']); $j++) {
                 // Create Permission
                 $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j],'group_name' => $permissionGroup, 'guard_name'=>'admin']);
                 $roleSuperAdmin->givePermissionTo($permission);
                //  $permission->assignRole($roleSuperAdmin);
             }
         }
    }
}
