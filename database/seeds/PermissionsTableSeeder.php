<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
            [
                'name' => 'Create Task',
                'slug' => 'create-task',
            ],
            [
                'name' => 'Edit Task',
                'slug' => 'edit-task',
            ],
            [
                'name' => 'View Task',
                'slug' => 'view-task',
            ],
            [
                'name' => 'Delete Task',
                'slug' => 'delete-task',
            ]
        ]);
    }
}
