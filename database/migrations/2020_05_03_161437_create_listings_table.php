<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('username');
            $table->string('user_email');
            $table->string('category');
            $table->string('subcategory')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('phone');
            $table->string('country');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('type');
            $table->string('career_level')->nullable();
            $table->string('positions_available')->nullable();
            $table->string('gender')->nullable();
            $table->string('payment_method1')->nullable();
            $table->string('payment_method2')->nullable();
            $table->string('payment_method3')->nullable();
            $table->string('payment_method4')->nullable();
            $table->string('payment_method5')->nullable();
            $table->string('payment_method6')->nullable();
            $table->float('price')->nullable();
            $table->string('condition')->nullable();
            $table->string('purpose')->nullable();
            $table->string('property_type')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('expire_after')->nullable();
            $table->string('land_area')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('color')->nullable();
            $table->string('age')->nullable();
            $table->string('video')->nullable();
            $table->text('info')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('priority')->nullable()->default('No');
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
        Schema::dropIfExists('listings');
    }
}
