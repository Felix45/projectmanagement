<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            [
                'user_id'=> 1,
                'title'=>'Develop Mobile Betting Application',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui delectus ullam voluptate deleniti illo reprehenderit ad magni aperiam dolorem mollitia perspiciatis officiis, aliquam architecto repellat quisquam repellendus quam a. Deserunt.'
            ],
            [
                'user_id'=> 1,
                'title'=>'Construction funding proposal',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui delectus ullam voluptate deleniti illo reprehenderit ad magni aperiam dolorem mollitia perspiciatis officiis, aliquam architecto repellat quisquam repellendus quam a. Deserunt.'
            ],
            [
                'user_id'=> 2,
                'title'=>'Plan weekend sporting event',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui delectus ullam voluptate deleniti illo reprehenderit ad magni aperiam dolorem mollitia perspiciatis officiis, aliquam architecto repellat quisquam repellendus quam a. Deserunt.'
            ],
            [
                'user_id'=> 3,
                'title'=>'Plan graduation ceremony',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui delectus ullam voluptate deleniti illo reprehenderit ad magni aperiam dolorem mollitia perspiciatis officiis, aliquam architecto repellat quisquam repellendus quam a. Deserunt.'
            ],
        ]);
    }
}
