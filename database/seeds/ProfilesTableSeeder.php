<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
                [
                    'user_id' => 1,
                    'image' => 'uploads/F1pcsXgb7pAWLwjxeadj4aEvmdkGHMLle1BrOriG.jpg',
                    'quote' => 'The future belongs to those who beleive in the beauty of their dreams',
                    'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam vel, culpa neque facere maiores, debitis, blanditiis commodi quos alias at vitae totam. Id commodi labore, culpa maiores delectus cupiditate pariatur.'
                ],
                [
                    'user_id' => 2,
                    'image' => 'uploads/default.png',
                    'quote' => 'The future belongs to those who beleive in the beauty of their dreams',
                    'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam vel, culpa neque facere maiores, debitis, blanditiis commodi quos alias at vitae totam. Id commodi labore, culpa maiores delectus cupiditate pariatur.'
                ],
                [
                    'user_id' => 3,
                    'image' => 'uploads/default.png',
                    'quote' => 'The future belongs to those who beleive in the beauty of their dreams',
                    'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam vel, culpa neque facere maiores, debitis, blanditiis commodi quos alias at vitae totam. Id commodi labore, culpa maiores delectus cupiditate pariatur.'
                ],
                [
                    'user_id' => 4,
                    'image' => 'uploads/default.png',
                    'quote' => 'The future belongs to those who beleive in the beauty of their dreams',
                    'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam vel, culpa neque facere maiores, debitis, blanditiis commodi quos alias at vitae totam. Id commodi labore, culpa maiores delectus cupiditate pariatur.'
                ]
        ]);
        
    }
}
