<?php

namespace Database\Seeders;

use App\Models\Post;
use Str;
use Faker\Factory as Faker;


use Illuminate\Database\Seeder;



class PostSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) { 
            if($i %2 == 0){
                Post::create([
                    'name' => 'Lorem Ipsum',
                    'details' => $faker->sentence(15),
                    'user_id' => 1,
                ]);
            }else{
                Post::create([
                    'name' => 'Lorem Ipsum',
                    'details' => $faker->sentence(15),
                    'user_id' => 2,
                ]); 
            }
          
        }
    }
}
