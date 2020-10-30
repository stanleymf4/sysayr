<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations tabla de roles de usuario
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gtvrole', function (Blueprint $table) {
            $table->bigIncrements('gtvrole_id')->comment('identificador de role');
            $table->string('gtvrole_desc', 100)->comment('descripción del role')->unique();
            $table->string('gtvrole_user', 30)->comment('usario que modifico el registro');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations tabla de roles de usuario
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gtvrole');
    }
}
