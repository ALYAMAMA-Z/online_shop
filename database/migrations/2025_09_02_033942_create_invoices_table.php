<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
public function up(): void
{
    Schema::create('invoices', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->decimal('amount', 10, 2);
        $table->foreignId('invoice_category_id')->constrained()->onDelete('cascade');
        $table->date('invoice_date');
        $table->string('file_path');
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
