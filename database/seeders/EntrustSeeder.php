<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use function App\Helper\getRoutes;
class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        $faker = Factory::create();
        $adminRole = Role::create(['name' => 'admin', 'display_name' => 'Administration', 'description' => 'Administrator', 'allowed_route' => 'admin']);
        $supervisorRole = Role::create(['name' => 'supervisor', 'display_name' => 'Supervisor', 'description' => 'supervisor', 'allowed_route' => 'admin']);
        $customerRole = Role::create(['name' => 'customer', 'display_name' => 'Customer', 'description' => 'Customer', 'allowed_route' => null]);
        $admin = User::create(['first_name' => 'Admin', 'last_name' => 'system', 'username' => 'admin', 'email' => 'admin@email.com', 'email_verified_at' => now(), 'mobile' => '01012589733', 'password' => bcrypt('123123123'), 'status' => 1, 'remember_token' => Str::random(10),]);$admin->attachRole($adminRole);
        $supervisor = User::create(['first_name' => 'supervisor', 'last_name' => 'system', 'username' => 'supervisor', 'email' => 'supervisor@email.com', 'email_verified_at' => now(), 'mobile' => '01090965914', 'password' => bcrypt('123123123'),  'status' => 1, 'remember_token' => Str::random(10),]);
        $supervisor->attachRole($supervisorRole);
        $customer = User::create(['first_name' => 'Abdullah', 'last_name' => 'Hamdy', 'username' => 'customer', 'email' => 'abdullahhamdy@email.com', 'email_verified_at' => now(), 'mobile' => '01000465713', 'password' => bcrypt('123123123'),  'status' => 1, 'remember_token' => Str::random(10),]);
        $customer->attachRole($customerRole);
        for ($i = 1; $i <= 20; $i++) {
            $random_customer = User::create(['first_name' => $faker->firstName, 'last_name' => $faker->lastName, 'username' => $faker->userName, 'email' => $faker->unique()->safeEmail, 'email_verified_at' => now(),
                'mobile' => '0100046' . $faker->numberBetween(1000000, 9999999), 'password' => bcrypt('123123123'),  'status' => 1, 'remember_token' => Str::random(10),
            ]);
            $random_customer->attachRole($customerRole);
        }


   $manageMain = Permission::create(['name' => 'main', 'display_name' => ['en'=>'Main','ar'=>'الرئيسية'], 'route' => 'index', 'module' => 'index', 'as' => 'index', 'icon' => 'fas fa-home', 'parent' => '0', 'parent_original' => '0', 'sidebar_link' => '1', 'appear' => '1', 'ordering' => '1',]);
   $manageMain->parent_show = $manageMain->id;
   $manageMain->save();
        foreach(getRoutes()['all_permissions'] as $index => $permission_name){

                $manageRoute = Permission::create(['name' => 'manage_'.$permission_name, 'display_name' => getRoutes()['displayName'][$index], 'route' => $permission_name, 'module' => $permission_name, 'as' => $permission_name.'.'.'index', 'icon' =>getRoutes()['icon'][$index]  , 'parent' => '0', 'parent_original' => '0', 'sidebar_link' =>  getRoutes()['sidebarLink'][$index], 'appear' => '1', 'ordering' => getRoutes()['ordaring'][$index]]);
                $manageRoute->parent_show = $manageRoute->id;
                $manageRoute->save();
                $show = Permission::create(['name' => 'show_'.$permission_name, 'display_name' => getRoutes()['displayName'][$index], 'route' => $permission_name, 'module' => $permission_name, 'as' =>  $permission_name.'.'.'index', 'icon' =>getRoutes()['icon'][$index] , 'parent' => $manageRoute->id, 'parent_original' => $manageRoute->id, 'parent_show' => $manageRoute->id, 'sidebar_link' => getRoutes()['sidebarLink'][$index], 'appear' => '1']);
                $create = Permission::create(['name' => 'create_'.$permission_name, 'display_name' =>['en'=>'create '.Str::singular(getRoutes()['displayName'][$index]['en']),'ar'=>'انشاء '.Str::singular(getRoutes()['displayName'][$index]['ar'])], 'route' => $permission_name, 'module' => $permission_name, 'as' => $permission_name.'.'.'create', 'icon' => null, 'parent' => $manageRoute->id, 'parent_original' => $manageRoute->id, 'parent_show' => $manageRoute->id, 'sidebar_link' => getRoutes()['sidebarLink'][$index], 'appear' => '0']);
                $display = Permission::create(['name' => 'display_'.$permission_name, 'display_name' =>  ['en'=>'Show '.Str::singular(getRoutes()['displayName'][$index]['en']),'ar'=>'عرض '.Str::singular(getRoutes()['displayName'][$index]['ar'])], 'route' => $permission_name, 'module' => $permission_name, 'as' => $permission_name.'.'.'show', 'icon' => null, 'parent' => $manageRoute->id, 'parent_original' => $manageRoute->id, 'parent_show' => $manageRoute->id, 'sidebar_link' => getRoutes()['sidebarLink'][$index], 'appear' => '0']);
                $update = Permission::create(['name' => 'update_'.$permission_name,'display_name' => ['en'=>'Update '.Str::singular(getRoutes()['displayName'][$index]['en']),'ar'=>'تعديل '.Str::singular(getRoutes()['displayName'][$index]['ar'])], 'route' => $permission_name, 'module' => $permission_name, 'as' => $permission_name.'.'.'edit', 'icon' => null, 'parent' => $manageRoute->id, 'parent_original' => $manageRoute->id, 'parent_show' => $manageRoute->id, 'sidebar_link' => getRoutes()['sidebarLink'][$index], 'appear' => '0']);
                $delete = Permission::create(['name' => 'delete_'.$permission_name, 'display_name' => ['en'=>'Delete '.Str::singular(getRoutes()['displayName'][$index]['en']),'ar'=>'حذف '.Str::singular(getRoutes()['displayName'][$index]['ar'])], 'route' => $permission_name, 'module' => $permission_name, 'as' => $permission_name.'.'.'destroy', 'icon' => null, 'parent' => $manageRoute->id, 'parent_original' => $manageRoute->id, 'parent_show' => $manageRoute->id, 'sidebar_link' => getRoutes()['sidebarLink'][$index], 'appear' => '0']);

        }



    }
}
