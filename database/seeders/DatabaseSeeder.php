<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    
    public function run(){

        $cat = [
        ['id' => 1, 'name' =>  ' حلويات شرقية  ', 'description' => '', 'imagpath' => ''],
        ['id' => 2, 'name' => 'قشطة  ', 'description' => 'نللت', 'imagpath' => ''],
        ['id' => 3, 'name' => 'خشبيات ونحاسيات ', 'description' => '', 'imagpath' => ''],
        ['id' => 4, 'name' => 'قهوة   ', 'description' => 'نللت', 'imagpath' => ''],
        ['id' => 5, 'name' => 'عسل  ', 'description' => '', 'imagpath' => ''],
        ['id' => 6, 'name' => 'بوظة   ', 'description' => 'نللت', 'imagpath' => ''],
        ['id' => 7, 'name' => 'حلوبات غربية  ', 'description' => '', 'imagpath' => ''],
        ['id' => 8, 'name' => 'موالح   ', 'description' => '', 'imagpath' => ''],
        ['id' => 9, 'name' => 'ضيافات   ', 'description' => '', 'imagpath' => ''],
        ['id' => 10, 'name' => 'فناجين و مصبات قهوة   ', 'description' => '', 'imagpath' => ''],
    ];

 DB::table('categories')->insertOrIgnore($cat);

}
}
