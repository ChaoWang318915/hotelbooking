<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitemanagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitemanagers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('language');
            $table->string('domain');
            $table->string('template');
            $table->string('meta_title');
            $table->text('meta_keywords');
            $table->text('meta_description');
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
        Schema::dropIfExists('sitemanagers');
    }
}
