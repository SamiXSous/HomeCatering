<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCateringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caterings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('Name');
            $table->unsignedInteger('adminId');
            $table->boolean('active')->default(false);
            $table->mediumText('image')->nullable();
            $table->string('adres')->nullable();
            $table->string('tel')->nullable();
            $table->string('description')->default('Description');
            $table->foreign('adminId')->references('id')->on('users');
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
        Schema::dropIfExists('caterings');
    }
}
