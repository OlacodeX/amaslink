<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToMessagesRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages_replies', function (Blueprint $table) {
            //
            $table->integer('message_id');
            $table->integer('sender_id');
            $table->string('sender_name');
            $table->text('reply');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages_replies', function (Blueprint $table) {
            //
            dropIfExists('message_id');
            dropIfExists('sender_id');
            dropIfExists('sender_name');
            dropIfExists('reply');
        });
    }
}
