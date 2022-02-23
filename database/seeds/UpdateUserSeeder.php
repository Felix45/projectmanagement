<?php

use Illuminate\Database\Seeder;

class UpdateUserSeeder extends Seeder
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

        $user_one = App\User::find(1);
        $user_one->roles()->sync($role_supervisor);
        $user_one->permissions()->attach([$perm_edit->id,$perm_view->id,$perm_delete->id]);

    }
}
