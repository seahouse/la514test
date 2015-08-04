<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBomitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bomitems', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('parent_item_id')->unsigned();
            $table->integer('seqnumber');
            $table->integer('item_id')->unsigned();
            $table->decimal('qtyper', 8, 6);
            $table->date('effective');
            $table->date('expires');
            
            $table->timestamps();

            $table->foreign('parent_item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bomitems');
    }
}
