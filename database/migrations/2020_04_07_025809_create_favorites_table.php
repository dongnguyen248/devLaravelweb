<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();//unsigned because user_id and question_id never have negated number
            $table->bigInteger('question_id')->unsigned();
            $table->timestamps();
            $table->unique(['user_id','question_id']);// bescause if have a column have user_id and question_id it will can't inserted;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
    
}