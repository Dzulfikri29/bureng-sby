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
        $this->call(UsersTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(GeneralsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductImagesTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(SectionImagesTableSeeder::class);
        $this->call(SocialMediaTableSeeder::class);
        $this->call(StructuresTableSeeder::class);
        $this->call(TrainingsTableSeeder::class);
        $this->call(ActivityImagesTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(TutorialsTableSeeder::class);
    }
}
