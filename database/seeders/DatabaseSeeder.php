<?php

namespace Database\Seeders;
use App\Models\Image;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Product::factory(3)
        ->hasVariants(10)
      
        ->has(Image::factory(3)->sequence(fn( $sequence) => [
            'featured'   => $sequence->index === 0,
            
        ]))
       
        ->create();
        
        \App\Models\User::factory()->create([
            'email' =>'user1@example.com',
            'password' => 'password'
        ]);
    }
}
