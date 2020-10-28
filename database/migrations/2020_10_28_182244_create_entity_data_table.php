<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gtvdven', function (Blueprint $table) {
            $table->bigIncrements('gtvdven_id')->comment('Identificador de entidad de visibilidad de datos');
            $table->string('gtvdven_code', 4)->comment('código de entidad');
            $table->string('gtvdven_desc', 50)->comment('descripción de entidad');
            $table->string('gtvdven_user', 30)->comment('usario que creó o modificó el registro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gtvdven');
    }
}
