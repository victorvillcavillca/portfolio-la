<?php

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
        $this->call(PermissionsTableSeeder::class);
		$this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
		$this->call(SpecialtyAreasTableSeeder::class);
        $this->call(SpecialtiesTableSeeder::class);
        $this->call(ResourceCategoriesTableSeeder::class);
        $this->call(ResourcesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
