<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "name"=>"ورزشی"
        ]);
        
        Category::create([
            "name"=>"علمی"
        ]);
        
        Category::create([
            "name"=>"سیاسی"
        ]);
        
        Category::create([
            "name"=>"فرهنگی"
        ]);
        
        Category::create([
            "name"=>"اجتماعی"
        ]);
    }
}
