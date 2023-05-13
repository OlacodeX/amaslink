<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('fb')->nullable();
            $table->string('twitter')->nullable();
            $table->string('flickr')->nullable();
            $table->string('insta')->nullable();
            $table->string('ytube')->nullable();
            $table->string('vimeo')->nullable();
            $table->string('behance')->nullable();
            $table->string('linkd')->nullable();
            $table->string('web')->nullable();
            $table->string('l_name')->nullable();
            $table->string('u_name')->nullable();
            $table->string('pp')->nullable();
            $table->rememberToken();
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
        //
        Schema::dropIfExists('users');
    }
}
