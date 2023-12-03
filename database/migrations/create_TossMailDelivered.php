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
        Schema::create('TossMailDelivered', function (Blueprint $table) {
            $table->id('id');
            $table->integer('TossMailId');
            $table->boolean('Delivered');
            $table->integer('ListaId');
            $table->integer('ListaEmailId');
            $table->integer('UserId');
            $table->timestamp('CreatedAt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TossMailDelivered');
    }
};
