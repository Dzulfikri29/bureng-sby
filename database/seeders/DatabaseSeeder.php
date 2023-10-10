<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(FamiliesTableSeeder::class);
        $this->call(GalleriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GeneralsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(HistoriesTableSeeder::class);
        $this->call(FamilyTreesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
    }
}
