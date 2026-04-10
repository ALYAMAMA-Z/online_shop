<?php

namespace Database\Seeders;
 use App\Models\InvoiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceCategorySeeder extends Seeder
{
 
public function run(): void
{
    InvoiceCategory::insert([
        ['name' => 'مورد'],
        ['name' => 'خدمة'],
        ['name' => 'مشتريات'],
    ]);
}

}
