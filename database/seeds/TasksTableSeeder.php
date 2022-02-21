<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'user_id'=> 1,
                'project_id' => 1,
                'visibility' => 1,
                'status' => 0,
                'priority' => 1,
                'description' => 'Design application wireframes'
            ],
            [
                'user_id'=> 1,
                'project_id' => 1,
                'visibility' => 2,
                'status' => 0,
                'priority' => 0,
                'description' => 'Prepare minutes for first application meeting'
            ],
            [
                'user_id'=> 1,
                'project_id' => 2,
                'visibility' => 1,
                'status' => 0,
                'priority' => 1,
                'description' => 'Design architecture of the building'
            ],
            [
                'user_id'=> 2,
                'project_id' => 3,
                'visibility' => 1,
                'status' => 0,
                'priority' => 1,
                'description' => 'Mark the football pitch in preparation of the event'
            ],
            [
                'user_id'=> 3,
                'project_id' => 4,
                'visibility' => 1,
                'status' => 0,
                'priority' => 1,
                'description' => 'Design graduation booklet'
            ],
        ]);

        $task_one = App\Task::find(1);
        $task_one->documents()->attach([1]);
        $task_one->assignees()->attach([2,3,4]);

        $task_two = App\Task::find(2);
        $task_two->documents()->attach([2,3]);
        $task_two->assignees()->attach([3,4]);

        $task_three = App\Task::find(3);
        $task_three->documents()->attach([1,3]);
        $task_three->assignees()->attach([2,3,4]);

        $task_four = App\Task::find(4);
        $task_four->documents()->attach([3,4]);
        $task_four->assignees()->attach([1,3,4]);

        $task_five = App\Task::find(5);
        $task_five->documents()->attach([4]);
        $task_five->assignees()->attach([1,2,4]);
    }
}
