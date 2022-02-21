<?php

use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
            [
                'url' => '1645405721.odt'
            ],
            [
                'url' => '1645405721.pdf'
            ],
            [
                'url' => '1645405457.odt'
            ],
            [
                'url' => '1645405457.pdf'
            ],
        ]);
    }
}
