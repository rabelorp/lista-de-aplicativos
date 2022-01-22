<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Apps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) { 
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->string('name', 45);
            $table->string('bundle-id', 45); 
            $table->timestamps(); 
        });

        Schema::table('apps', function($table) {
            $table->foreign('id_user')->references('id')->on('users')->nullable(); 
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void 
     */
    public function down()
    {
        Schema::dropIfExists('apps');
    }
}
