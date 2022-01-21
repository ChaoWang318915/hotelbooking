<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hotel_id');
            $table->text('contentbox1')->nullable($value = true);
            $table->text('contentbox2')->nullable($value = true);
            $table->text('contentbox3')->nullable($value = true);
            $table->text('contentbox4')->nullable($value = true);
            $table->text('contentbox5')->nullable($value = true);
            $table->text('contentbox6')->nullable($value = true);
            $table->text('contentbox7')->nullable($value = true);
            $table->text('contentbox8')->nullable($value = true);
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
        Schema::dropIfExists('text_contents');
    }
}
