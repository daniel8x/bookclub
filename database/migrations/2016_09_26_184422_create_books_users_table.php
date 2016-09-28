<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('books_users_suggestions', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->integer('book_id')->unsigned();
          $table->integer('suggestion_id')->unsigned()->nullable();
          $table->foreign('book_id')->references('id')->on('books')
              ->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('user_id')->references('id')->on('users')
              ->onUpdate('cascade')->onDelete('cascade');
          $table->foreign('suggestion_id')->references('id')->on('suggestions')
              ->onUpdate('cascade')->onDelete('cascade');
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
          Schema::drop('books_users_suggestions');
    }
}
