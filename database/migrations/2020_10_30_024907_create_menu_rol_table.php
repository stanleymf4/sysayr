<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuRolTable extends Migration
{
    /**
     * Run the migrations. Tabla de relación menu rol
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsbmerl', function (Blueprint $table) {
            $table->unsignedInteger('gsbmerl_role_id')->comment('identificador de role');
            $table->foreign('gsbmerl_role_id', 'fk_gsbmerl_gtvrole')->references('gtvrole_id')->on('gtvrole')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('gsbmerl_menu_id')->comment('identificador de menu');
            $table->foreign('gsbmerl_menu_id', 'fk_gsbmerl_gsbmenu')->references('gsbmenu_id')->on('gsbmenu')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('gsbmerl');
    }
}
