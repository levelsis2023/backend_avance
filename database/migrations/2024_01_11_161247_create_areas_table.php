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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dependencie_id')->nullable(); // Columna para la clave foránea
            $table->foreign('dependencie_id')->references('id')->on('dependencies'); // Restricción de clave foránea
            $table->string('code')->nullable();
            $table->integer('level')->nullable();
            $table->string('name')->nullable();
            $table->string('name_short')->nullable();
            $table->string('name_title')->nullable();
            $table->string('responsible')->nullable();
            $table->string('phone_responsible')->nullable();
            $table->string('phone_area')->nullable();
            $table->string('email_area')->nullable();
            $table->unsignedBigInteger('area_id')->nullable(); // Columna para la clave foránea
            $table->foreign('area_id')->references('id')->on('areas'); // Restricción de clave foránea
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
