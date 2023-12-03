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
        Schema::create('TossMail', function (Blueprint $table) {
            $table->id('id');
            $table->string('Emertimi');
            $table->string('Subjekti');
            $table->integer('ListaId');
            $table->longText('Pershkrimi');
            $table->integer('UserId');
            $table->timestamp('CreatedAt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TossMail');
    }
};
