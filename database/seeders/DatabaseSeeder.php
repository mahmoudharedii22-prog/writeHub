<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $users = User::factory(20)->create();

        $posts = Post::factory(50)->create([
            'user_id' => fn () => $users->random()->id,
        ]);

    }
}
