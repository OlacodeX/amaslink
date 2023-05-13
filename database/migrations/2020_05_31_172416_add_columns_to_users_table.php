<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
            $table->string('pp')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            Schema::dropIfExists('name');
            Schema::dropIfExists('phone');
            Schema::dropIfExists('country');
            Schema::dropIfExists('email_verified_at');
            Schema::dropIfExists('fb');
            Schema::dropIfExists('twitter');
            Schema::dropIfExists('flickr');
            Schema::dropIfExists('insta');
            Schema::dropIfExists('ytube');
            Schema::dropIfExists('vimeo');
            Schema::dropIfExists('behance');
            Schema::dropIfExists('linkd');
            Schema::dropIfExists('web');
            Schema::dropIfExists('l_name');
            Schema::dropIfExists('pp');
        });
    }
}
