<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//model
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => '<NAME>',
            'email' => '<EMAIL>',
            'password' => bcrypt('<PASSWORD>'),
        ]);
    }
}

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();

        for ($i = 0; $i < 30; $i++){
            //per essere sicur che la frase che mi restituisce faker
            //sia più corta di 255 caratteri
            $title = substr(fake()->sentence(), 0, 255);

            Post::create([
                'title' => $title,
                'slug' => str()->slug($title),
                'content' => fake()->paragraph(),
            ]);
        }
    }
}

