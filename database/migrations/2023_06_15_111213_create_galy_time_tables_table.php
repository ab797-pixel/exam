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
        Schema::create('galy_time_tables', function (Blueprint $table) {
            $table->id();
            $table->integer('hall_number')->nullable();
            $table->date('date');
            $table->string('session');
            $table->string('subcode');
            $table->string('degree');
            $table->string('subject');
            $table->string('reg_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galy_time_tables');
    }
};
