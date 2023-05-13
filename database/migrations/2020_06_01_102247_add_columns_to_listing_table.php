<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listing', function (Blueprint $table) {
            //
            $table->string('username');
            $table->string('user_email');
            $table->string('category');
            $table->string('subcategory')->nullable();
            $table->string('image2')->nullable()->default('AMAS.png');
            $table->string('image3')->nullable()->default('AMAS.png');
            $table->string('image4')->nullable()->default('AMAS.png');
            $table->string('image5')->nullable()->default('AMAS.png');
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
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('color')->nullable();
            $table->string('age')->nullable();
            $table->string('video')->nullable();
            $table->text('info')->nullable();
            $table->string('job_type')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->string('priority')->nullable()->default('No');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listing', function (Blueprint $table) {
            //
            Schema::dropIfExists('username');
            Schema::dropIfExists('user_email');
            Schema::dropIfExists('category');
            Schema::dropIfExists('subcategory');
            Schema::dropIfExists('image2');
            Schema::dropIfExists('image3');
            Schema::dropIfExists('image4');
            Schema::dropIfExists('image5');
            Schema::dropIfExists('phone');
            Schema::dropIfExists('job_type');
            Schema::dropIfExists('country');
            Schema::dropIfExists('address1');
            Schema::dropIfExists('address2');
            Schema::dropIfExists('type');
            Schema::dropIfExists('career_level');
            Schema::dropIfExists('positions_available');
            Schema::dropIfExists('gender');
            Schema::dropIfExists('payment_method1');
            Schema::dropIfExists('payment_method2');
            Schema::dropIfExists('payment_method3');
            Schema::dropIfExists('payment_method4');
            Schema::dropIfExists('payment_method5');
            Schema::dropIfExists('payment_method6');
            Schema::dropIfExists('price');
            Schema::dropIfExists('condition');
            Schema::dropIfExists('purpose');
            Schema::dropIfExists('property_type');
            Schema::dropIfExists('bedrooms');
            Schema::dropIfExists('bathrooms');
            Schema::dropIfExists('expire_after');
            Schema::dropIfExists('land_area');
            Schema::dropIfExists('start_time');
            Schema::dropIfExists('end_time');
            Schema::dropIfExists('color');
            Schema::dropIfExists('age');
            Schema::dropIfExists('video');
            Schema::dropIfExists('info');
            Schema::dropIfExists('status');
            Schema::dropIfExists('priority');
        });
    }
}
