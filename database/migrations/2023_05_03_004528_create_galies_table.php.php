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
        Schema::create('galies', function (Blueprint $table) {
            $table->id();
            $table->string('term');
            $table->string('degree');
            $table->integer('batch');
            $table->integer('centre');
            $table->string('subject');
            $table->string('subcode');
            $table->string('reg_no');
            $table->string('graduate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galy');
    }
};
