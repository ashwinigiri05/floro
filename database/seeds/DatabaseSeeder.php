<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(User::class,10);
      
        factory(App\User::class, 10000)->create();
        // factory(App\User::class, 10000)->create()->each(function ($user)
        // {
        //     $user->posts()->save(factory(App\Post::class)->make());
        // });

    }
    
}
