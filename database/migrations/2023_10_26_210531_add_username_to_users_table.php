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
    {   //* Se ejecuta al hacer la migracion
        Schema::table('users', function (Blueprint $table) {
            //* Añadir a la tabla users el atributo username, se debe arrancar la migracion para que funcione
            //* Unique evitara que se creen cuentas con el mismo username
            $table->string("username")->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   //* Se ejecuta cuando hay rollback
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("username");
        });
    }
};
