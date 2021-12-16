<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('business', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('languages', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('business_id')->default(0);
            $table->foreign('business_id')->references('id')->on('business')->onDelete('cascade');
            
            $table->integer('parent_id')->default(0)->index('idx_categories_parent_id');
            $table->integer('sort_order')->nullable();

            $table->unsignedBigInteger('created_by')->default(0);
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            
            $table->text('categories_image', 65535)->nullable();
            $table->text('categories_icon', 65535)->nullable();
            $table->string('categories_slug', 191);
            $table->boolean('categories_status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('categories_details', function (Blueprint $table) {
            $table->integer('categories_description_id', true);
            
            $table->unsignedBigInteger('categories_id')->default(0);
            $table->foreign('categories_id')->references('id')->on('categories');
            
            $table->unsignedBigInteger('languages_id')->default(0);
            $table->foreign('languages_id')->default(0)->references('id')->on('languages');

            $table->string('category_name')->nullable();
            $table->longText('description')->nullable();

            $table->timestamps();

        });
        
        Schema::create('general_setting', function (Blueprint $table) {
            $table->id();
            $table->enum('default_language', ['en', 'es'])->default('en');
            $table->enum('currency', ['USD', 'INR'])->default('USD');
            $table->bigInteger('created_by')->default('0');
            $table->timestamps();
        });

        Schema::create('website_setting', function (Blueprint $table) {
            $table->id();
            $table->string('website_name')->nullable();
            $table->string('website_logo')->nullable();
            $table->bigInteger('created_by')->default('0');
            $table->timestamps();
        });

        Schema::create('payment_setting', function (Blueprint $table) {
            $table->id();
            $table->enum('paytm_status', ['on', 'off'])->default('off');
            $table->enum('paytm_mode', ['sandbox', 'live'])->default('sandbox');
            $table->string('paytm_merchant_key');
            $table->string('paytm_secret_key');
            $table->bigInteger('created_by')->default('0');
            $table->timestamps();
        });

        Schema::create('notification_setting', function (Blueprint $table) {
            $table->id();
            $table->enum('order_noti_status', ['on', 'off'])->default('on');
            $table->enum('order_noti_type', ['email', 'sms', 'both'])->default('both');
            $table->enum('user_noti_status', ['on', 'off'])->default('on');
            $table->enum('user_noti_type', ['email', 'sms', 'both'])->default('both');
            $table->enum('newsletter_noti_status', ['on', 'off'])->default('on');
            $table->enum('newsletter_noti_type', ['email', 'sms', 'both'])->default('both');
            $table->bigInteger('created_by')->default('0');
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
        Schema::dropIfExists('business');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('language');
        Schema::dropIfExists('categories_details');
        Schema::dropIfExists('general_setting');
        Schema::dropIfExists('website_setting');
        Schema::dropIfExists('payment_setting');
        Schema::dropIfExists('notification_setting');
    }
}
