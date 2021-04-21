<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
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