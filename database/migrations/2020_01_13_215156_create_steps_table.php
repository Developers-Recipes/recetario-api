<?php

use App\Models\step;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedInteger('number_step');
            $table->integer('name');
            $table->integer('description');
            $table->integer('links_references');
            $table->boolean('completed')->default(step::INCOMPLETED_STEP);
            $table->timestamps();

            $table->foreign('recipe_id')->references('id')->on('recipes')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('steps');
    }
}