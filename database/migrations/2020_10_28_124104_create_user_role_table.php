<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsbusrl', function (Blueprint $table) {
            $table->bigIncrements('gsbusrl_id')->comment('identificador de relación usuario role');
            $table->unsignedInteger('gsbusrl_role_id')->comment('identificador de role');
            $table->foreign('gsbusrl_role_id', 'fk_gsbusrl_gtvrole')->references('gtvrole_id')->on('gtvrole')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('gsbusrl_user_id')->comment('identificador de usuario');
            $table->foreign('gsbusrl_user_id', 'fk_gsbusrl_gsbuser')->references('gsbuser_id')->on('gsbuser')->onDelete('restrict')->onUpdate('restrict');
            $table->boolean('gsbusrl_ssts')->comment('estado de la relacion usuario role');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gsbusrl');
    }
}
