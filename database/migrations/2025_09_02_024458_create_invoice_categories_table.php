<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up(): void
{
    Schema::create('invoice_categories', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // مثل: مورد، خدمة، مشتريات
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('invoice_categories');
    }
};
