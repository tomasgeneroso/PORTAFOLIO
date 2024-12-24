<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Table_Products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name')->nullable(false);
            $table->decimal('price', 20, 2)->nullable(false);
            $table->integer('stock')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Table_Products');
    }
};
