<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = App\Role::find(1);
        $role_supervisor = App\Role::find(2);
        $role_junior = App\Role::find(3);

        $perm_edit = App\Permission::find(2);
        $perm_view = App\Permission::find(3);
        $perm_delete = App\Permission::find(4);

        $role_admin->permissions()->attach([$perm_edit->id,$perm_view->id,$perm_delete->id]);
        $role_supervisor->permissions()->attach([$perm_edit->id,$perm_view->id,$perm_delete->id]);
        $role_junior->permissions()->attach([$perm_view->id]);

        $user_one = App\User::create([
                'name' => 'Felix Ouma',
                'email' => 'fokinyo@yahoo.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
        ]);
        $user_one->roles()->attach($role_supervisor);
        $user_one->permissions()->attach([$perm_edit->id,$perm_view->id,$perm_delete->id]);

        $user_two = App\User::create([
                'name' => 'Emily Atkins',
                'email' => 'emmyatkins@yahoo.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
        ]);
        $user_two->roles()->attach($role_junior);
        $user_two->permissions()->attach([$perm_view->id]);

        $user_three = App\User::create([
                'name' => 'John Atah',
                'email' => 'atah@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
        ]);
        $user_three->roles()->attach($role_junior);
        $user_three->permissions()->attach([$perm_view->id]);


        $user_four = App\User::create([
                'name' => 'Kevin Ouma',
                'email' => 'kouma@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
        ]);

        $user_four->roles()->attach($role_junior);
        $user_four->permissions()->attach([$perm_view->id]);

    }
}
