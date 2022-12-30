<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmisSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smis_schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->common('学校名称');
            $table->Integer('creator_id')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->index(['name'], 'idx_name');
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
        Schema::dropIfExists('smis_schools');
    }
}
