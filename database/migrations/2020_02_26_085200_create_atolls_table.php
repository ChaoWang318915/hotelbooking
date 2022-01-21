<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atolls', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('atoll_name', 200);
             $table->string('atoll_name_dhivehi',200);
             $table->string('length_width',100);
             $table->bigInteger('number_islands_atoll');
             $table->bigInteger('distance_to_male');
             $table->bigInteger('resident');
             $table->bigInteger('number_resorts_in_atoll');
             $table->string('google_coordinates',200);
             $table->text('inhabited_islands');
             $table->text('description');
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
        Schema::dropIfExists('atolls');
    }
}
