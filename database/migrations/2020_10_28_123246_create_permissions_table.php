<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations tabla de permisos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gtvpmss', function (Blueprint $table) {
            $table->bigIncrements('gtvpmss_id')->comment('identificador de permisos');
            $table->string('gtvpmss_desc', 150)->comment('descripción del permiso');
            $table->string('gtvpmss_slug', 50)->comment('partes de la dirección url');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations tabla de permisos
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gtvpmss');
    }
}
