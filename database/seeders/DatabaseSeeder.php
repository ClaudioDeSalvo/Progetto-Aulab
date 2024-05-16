<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{



    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories =
            [
                'Sport e viaggi',
                'Cinema e serie tv',
                'Casa, arredamento e bricolage',
                'Gastronomia',
                'Videogames e console',
                'Abbigliamento',
                'Telefonia',
                'Arte e Antiquariato',
                'Motori',
                'Bellezza e salute'
            ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
