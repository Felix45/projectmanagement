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
        DB::table('profiles')->where(['id' => 1])->update([
                    'image' => '/images/F1pcsXgb7pAWLwjxeadj4aEvmdkGHMLle1BrOriG.jpg',
                    'quote' => 'The future belongs to those who beleive in the beauty of their dreams',
                    'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam vel, culpa neque facere maiores, debitis, blanditiis commodi quos alias at vitae totam. Id commodi labore, culpa maiores delectus cupiditate pariatur.'
        ]);

        DB::table('profiles')->where(['id' => 2])->update([
                    'image' => '/images/default.png',
                    'quote' => 'The future belongs to those who beleive in the beauty of their dreams',
                    'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam vel, culpa neque facere maiores, debitis, blanditiis commodi quos alias at vitae totam. Id commodi labore, culpa maiores delectus cupiditate pariatur.'
        ]);

        DB::table('profiles')->where(['id' => 3])->update([
                    'image' => '/images/default.png',
                    'quote' => 'The future belongs to those who beleive in the beauty of their dreams',
                    'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam vel, culpa neque facere maiores, debitis, blanditiis commodi quos alias at vitae totam. Id commodi labore, culpa maiores delectus cupiditate pariatur.'
        ]);

        DB::table('profiles')->where(['id' => 4])->update([
                    'image' => '/images/default.png',
                    'quote' => 'The future belongs to those who beleive in the beauty of their dreams',
                    'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam vel, culpa neque facere maiores, debitis, blanditiis commodi quos alias at vitae totam. Id commodi labore, culpa maiores delectus cupiditate pariatur.'
        ]);
        
    }
}
