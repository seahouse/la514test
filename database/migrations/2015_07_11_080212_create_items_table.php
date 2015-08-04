<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            
            $table->text('item_number')->unique();
            $table->text('item_name');
            $table->text('item_descrip');
            $table->integer('itemclass_id')->unsigned();
            $table->integer('itemtype_id')->unsigned();
            $table->decimal('marketprice', 16, 4)->default(0.0);
            
            $table->foreign('itemclass_id')->references('id')->on('itemclasses')->onDelete('cascade');
            $table->foreign('itemtype_id')->references('id')->on('itemtypes')->onDelete('cascade');
            
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
        //$table->dropForeign('items_item_itemclass_id_foreign');
        Schema::drop('items');
    }
}
