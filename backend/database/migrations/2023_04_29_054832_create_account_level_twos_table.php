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
        Schema::create('account_level_twos', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('category_id')
                ->constrained('account_categories')
                ->onDelete('cascade');
            $table
                ->foreignId('account_level_one_id')
                ->constrained('account_level_ones')
                ->onDelete('cascade');
            $table->string('account_no', 20);
            $table->string('name');
            $table->tinyInteger('header')->default(false);
            $table->string('currency_id')->default(1);
            $table->string('tax_id')->nullable();
            $table->timestamps();
            $table->unique(['account_no', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_level_twos');
    }
};
