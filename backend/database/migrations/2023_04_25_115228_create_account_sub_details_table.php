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
        Schema::create('account_sub_details', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('detail_id')
                ->constrained('account_details')
                ->onDelete('cascade');
            $table->string('account_no', 20);
            $table->string('name');
            $table->tinyInteger('lock')->default(0);
            $table->string('currency_id');
            $table->timestamps();
            $table->unique(['account_no', 'detail_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_sub_details');
    }
};
