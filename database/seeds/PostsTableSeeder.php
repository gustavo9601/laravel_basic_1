<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            for($i = 0; $i < 100; $i++){

                DB::table('posts')->insert([
                    'title' => 'Title  ' . $i,
                    'body' => 'Contente test ' . $i
                ]);
            }


    }
}
