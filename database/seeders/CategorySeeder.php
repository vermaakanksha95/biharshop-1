<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories=[
            ['cat_title' => 'Books','cat_description'=>'Books products'],
            ['cat_title' => 'Home & garden','cat_description'=>'Home & garden  products'],
            ['cat_title' => 'travels','cat_description'=>'travels products'],
            ['cat_title' => 'pets','cat_description'=>'pets products'],

        ];
        foreach($categories as $category){
            $category['cat_slug'] = str::slug($category['cat_title']);
            \App\Models\Category::create($category);
        }
    }
}
