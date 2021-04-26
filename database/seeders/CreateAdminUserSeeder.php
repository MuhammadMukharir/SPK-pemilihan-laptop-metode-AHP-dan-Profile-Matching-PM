<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\BobotLangsung;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'SuperAdmin123', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $init_bobot_langsung = BobotLangsung::create(
            [
                'id_user'   => $user->id,
                'c1'        => 1,
                'c2'        => 1,
                'c3'        => 1,
                'c4'        => 1,
                'c5'        => 1,
                'c6'        => 1,
                'c7'        => 1,
                'c8'        => 1,
                'c9'        => 1,
                'c10'       => 1,
                'c11'       => 1,
                'c12'       => 1,
            ]
        );

        // create user role and user permission
        $userRole = Role::create(['name' => 'User']);

        // $userPermission = Permission::create(['name' => 'user']);
        $userPermission = Permission::where('name', 'user')->first();
        $userRole->syncPermissions($userPermission);

        // create admin role and admin permission
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}