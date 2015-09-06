<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoheadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poheads', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('status')->default(0);
            $table->text('number');
            $table->date('orderdate');
            $table->integer('vendinfo_id');            
            $table->text('fob')->nullable();      
            $table->text('shipvia')->nullable();     
            $table->text('comments')->nullable();
            $table->decimal('freight', 16, 2)->default(0.0);
            $table->integer('term_id')->nullable();
            $table->integer('vend_contact_id')->nullable();
            $table->text('vendaddress')->nullable();
            $table->integer('shipto_account_id')->nullable();
            $table->text('shiptoaddress')->nullable();
            $table->integer('sohead_id')->nullable();
            $table->date('releasedate')->nullable();
            
            $table->timestamps();

            $table->foreign('vendinfo_id')->references('id')->on('vendinfos');
            $table->foreign('term_id')->references('id')->on('terms');
            $table->foreign('vend_contact_id')->references('id')->on('contacts');
            $table->foreign('shipto_account_id')->references('id')->on('contacts');
            $table->foreign('sohead_id')->references('id')->on('soheads');
            $table->unique('number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('poheads');
    }
}
