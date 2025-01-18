<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
          'name' => 'UI UX',
          'slug' => 'ui-ux'
        ]);
        Category::create([
          'name' => 'BlockChain',
          'slug' => 'block-chain'
        ]);
        Category::create([
          'name' => 'Mechine Learning',
          'slug' => 'mechine-learning'
        ]);
    }
}
