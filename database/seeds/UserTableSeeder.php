<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_guest = Role::where('name', 'guest')->first();
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $admin = new User();
        $admin->name = 'Julius';
        $admin->email = 'partanduls@gmail.com';
        $admin->password = bcrypt('admin123');
        $admin->roles = 'admin';
        $admin->partner_admin_image = '/assets/static/images/user.png';
        $admin->save();
        $admin->roles()->attach($role_user);


        $user = new User();
        $user->name = 'Chona';
        $user->email = 'chona@gmail.com';
        $user->password = bcrypt('admin123');
        $user->roles = 'user';
        $user->partner_admin_image = '/assets/static/images/user.png';
        $user->save();
        $user->roles()->attach($role_admin);



    }
}
