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
        Schema::create('EmailListNames', function (Blueprint $table) {
            $table->id('idEmailListNames');
            $table->string('Emertimi');
            $table->integer('UserId');
            $table->timestamp('CreatedAt');
            $table->timestamp('UpdatedAt')->nullable();
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('EmailListNames');
    }
};
