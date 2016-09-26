<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('google_id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('author');
            $table->string('publish_date');
            $table->string('google_link_info');
            $table->string('google_link_preview');

            $table->string('description');
            $table->string('image');
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('books');
    }
}
