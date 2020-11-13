<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations, relacion permisos rol
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsbpmrl', function (Blueprint $table) {
            $table->unsignedInteger('gsbpmrl_role_id')->comment('identificador de role');
            $table->foreign('gsbpmrl_role_id', 'fk_gsbpmrl_gtvrole')->references('gtvrole_id')->on('gtvrole')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('gsbpmrl_pmss_id')->comment('identificador de permiso');
            $table->foreign('gsbpmrl_pmss_id', 'fk_gsbpmrl_gtvpmss')->references('gtvpmss_id')->on('gtvpmss')->onDelete('cascade')->onUpdate('restrict');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations, relacion permisos rol
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gsbpmrl');
    }
}
