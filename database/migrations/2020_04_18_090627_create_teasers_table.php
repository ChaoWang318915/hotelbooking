<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeasersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teasers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('packages');
            $table->text('diver');
            $table->text('family');
            $table->text('luxury');
            $table->text('honeymoon');
            $table->text('recreation');
            $table->text('friends_of_maldives');
            $table->text('best_ager');
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
        Schema::dropIfExists('teasers');
    }
}
