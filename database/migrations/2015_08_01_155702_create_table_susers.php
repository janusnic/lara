<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSusers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('susers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('username')->nullable();
            
            $table->string('email')->unique();
            
            $table->string('avatar');
            $table->string('provider');
            $table->string('provider_id')->unique();
            
            $table->string('activation_code');
            $table->integer('active');
            $table->timestamps();
            $table->softDeletes();

            
   
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('susers');
    }
}
