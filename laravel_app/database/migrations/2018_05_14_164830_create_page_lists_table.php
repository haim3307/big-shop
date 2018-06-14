<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('page_list_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('page_list_id');
            $table->foreign('page_list_id')->references('id')->on('page_lists');
            $table->unsignedInteger('entity_id');
            $table->foreign('entity_id')->references('id')->on('entities');
            $table->integer('entity_item_id');
            $table->text('options');
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
        Schema::dropIfExists('page_lists');
    }
}
