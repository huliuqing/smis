<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmisFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smis_followers', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->comment("关注 id");
            $table->bigInteger('follower_id')->comment("user.id");
            $table->unique(['user_id', 'follower_id'], 'uk_user_follower_id');
            $table->index(['follower_id'], 'idx_follower_id');
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
        Schema::dropIfExists('smis_followers');
    }
}
