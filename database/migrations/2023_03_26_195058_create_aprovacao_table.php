<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprovacao', function (Blueprint $table) {
            $table->increments('id');    
            $table->integer('id_pedido')->unsigned(); ;
            $table->integer('id_aprovador')->unsigned();   
            $table->string('status',2);       
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
        Schema::dropIfExists('aprovacao');
    }
};
