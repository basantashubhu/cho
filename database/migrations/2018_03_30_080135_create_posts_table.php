<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_of_application');
            $table->string('ico_name');
            $table->string('ico_slogan');
            $table->string('website_url');
            $table->string('country_of_operation');
            $table->string('link_to_video');
            $table->mediumText('body');
            $table->string('bounty');
            $table->string('link_to_bounty')->nullable();
            $table->string('minimum_investment');
            $table->string('token_name');
            $table->string('token_type');
            $table->string('platform');
            $table->string('pre_ico_price');
            $table->string('current_ico_price');
            $table->string('total_token_sale');
            $table->string('total_token_sold');
            $table->string('restricted_country');
            $table->string('accepting');
            $table->string('soft_cap');
            $table->string('hard_cap');
            $table->string('distributed_ico');
            $table->dateTime('ico_start_date');
            $table->dateTime('ico_end_date');
            $table->string('link_to_whitepaper');
            $table->string('kyc', 1);
            $table->string('whitelist');
            $table->string('bonus');
            $table->string('pre_sale_bonus')->nullable();
            $table->string('main_sale_bonus')->nullable();
            $table->string('categories');
            $table->string('facebook_link')->nullable();
            $table->string('bitcointalk_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('medium_link')->nullable();
            $table->string('telegram_link')->nullable();
            $table->string('reddit_link')->nullable();
            $table->string('contact_email');
            $table->boolean('published')->default(0);
            $table->string('post_token')->unique();
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
        Schema::dropIfExists('posts');
    }
}
