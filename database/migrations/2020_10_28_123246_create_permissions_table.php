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
            $table->bigIncrements('gtvpmss_id', 50)->comment('identificador de permisos');
            $table->string('gtvpmss_slug', 50)->comment('partes de la dirección url');
            $table->timestamps();
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
