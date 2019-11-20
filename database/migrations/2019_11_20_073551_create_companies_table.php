<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');      
            $table->string('companyName');
            $table->string('description');
            $table->string('contact');
            $table->string('facebook');
            $table->string('googleMap');
            $table->string('twitter');
            $table->integer('location');
            $table->integer('rate');
            $table->integer('gallery');
            $table->integer('workiingHour');
            $table->integer('rules');
            $table->integer('offers');            
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
        Schema::dropIfExists('companies');
    }
}
