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
        //* Cada comentario se relaciona con el usuario y el post
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete('cascade'); //* Crea la foreign key y buscara si existe otro modelo en relacion
            $table->foreignId("post_id")->constrained()->onDelete('cascade'); //* Si se elimina un post tambien se lborran los comentarios
            $table->string("comentario");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
