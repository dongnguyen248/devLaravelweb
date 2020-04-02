<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            // the users_table uses bigIncrements('id') data type for the primary key.
            //  So that when you want to refer a foreign key constraint your user_id column needs to be unsignedBigInteger('user_id') type.
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');
            $table-> BigInteger('views')->unsigned()->default(0);
            $table-> BigInteger('answers')->unsigned()->default(0);
            $table-> BigInteger('votes')->default(0);
            $table-> BigInteger('best_answer_id')->unsigned()->nullable();
            $table-> BigInteger('user_id')->unsigned();

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
