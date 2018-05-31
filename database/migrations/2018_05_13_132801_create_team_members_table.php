<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('position');
            $table->string('twitter_link');
            $table->string('fb_link');
            $table->string('linked_link');
            $table->timestamps();
        });

         Schema::create('post_team_member', function (Blueprint $table) {
            $table->integer('team_member_id')->unsigned();
            $table->integer('post_id')->unsigned();

            $table->foreign('post_id')
                    ->references('id')
                    ->on('posts')
                    ->onDelete('cascade');

            $table->foreign('team_member_id')
                    ->references('id')
                    ->on('team_members')
                    ->onDelete('cascade');

            $table->primary(['post_id', 'team_member_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_members');
    }
}
