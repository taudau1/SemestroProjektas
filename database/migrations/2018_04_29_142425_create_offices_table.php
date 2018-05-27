<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //id / name / district / price / area / workers / heating / created_by / updated_by 
        Schema::create('offices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('district')->nullable();
            $table->float('price');
            $table->float('area');
            $table->integer('workers');
            $table->float('heating');
            $table->float('lng', 18, 15);
            $table->float('lat', 18, 15);
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices');
    }
}
