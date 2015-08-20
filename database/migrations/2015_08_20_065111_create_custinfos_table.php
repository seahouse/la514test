<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custinfos', function (Blueprint $table) {
            $table->increments('id');            

            $table->boolean('active')->nullable()->default(true);
            $table->text('number')->unique();
            $table->text('name')->nullable()->default('');
            $table->integer('contact_id')->nullable();
            $table->text('comments')->nullable()->default('');
            
            $table->timestamps();

            $table->foreign('contact_id')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('custinfos');
    }
}
