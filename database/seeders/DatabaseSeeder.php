<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Article::factory(100)->create(); // Populate database with 100 Articles. 1000 articles and 10000 comments takes too much time to seed.
         Comment::factory(1000)->create();
    }
}
