<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmisRefUserSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smis_user_schools', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('school_id');
            $table->bigInteger('user_id');
            $table->tinyInteger('type')->default(0)->common('0:default,1:学校管理员,2:普通教师,3:普通学生');
            $table->unique(['school_id', 'user_id']);
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
        Schema::dropIfExists('smis_user_schools');
    }
}
