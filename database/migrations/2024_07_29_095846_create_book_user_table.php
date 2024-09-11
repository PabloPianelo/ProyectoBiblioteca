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
        Schema::create('book_user', function (Blueprint $table) {
            $table->id(); // O $table->bigIncrements('id'); si necesitas una clave primaria diferente
            $table->unsignedBigInteger('book_id'); // Asegúrate de que el tipo coincida con la tabla books
            $table->unsignedBigInteger('user_id'); // Asegúrate de que el tipo coincida con la tabla users
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Asegura que la combinación de book_id y user_id sea única
            $table->unique(['book_id', 'user_id']);

            $table->date("fecha_Reserva");
            $table->date("fecha_Fin_reserva");
            $table->date("fecha_Devolucion_reserva")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_user');
    }
};

