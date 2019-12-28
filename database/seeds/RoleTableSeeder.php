<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $role_guess = new Role();
        $role_guess->name = "guest";
        $role_guess->description = 'Im a Guest';
        $role_guess->save();

        $role_user = new Role();
        $role_user->name = "user";
        $role_user->description = 'Im a User';
        $role_user->save();

        $role_admin = new Role();
        $role_admin->name = "admin";
        $role_admin->description = 'Im an Admin';
        $role_admin->save();


    }
}
