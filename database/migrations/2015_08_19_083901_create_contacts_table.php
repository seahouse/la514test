<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            
            $table->boolean('active')->nullable()->default(true);
            $table->text('name')->nullable()->default('');
            $table->integer('city_id')->nullable();
            $table->text('phone')->nullable()->default('');
            $table->text('phone2')->nullable()->default('');
            $table->text('fax')->nullable()->default('');
            $table->text('email')->nullable()->default('');
            $table->text('remark')->nullable()->default('');
            
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('citys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts');
    }
}
