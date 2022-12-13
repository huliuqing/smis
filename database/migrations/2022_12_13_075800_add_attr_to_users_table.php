<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttrToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('status')->default(1)->common("状态:0:关闭,1:正常");
            $table->tinyInteger('type')->default(0)->common("用户角色:0:unknown,1:教师,2:学生");
            $table->string('sns_line_id')->common('SNS 授权： line id');
            $table->index(['sns_line_id'], 'idx_line_id');
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
             $table->dropColumn('status');
             $table->dropColumn('type');

             $table->dropIndex('idx_line_id');
             $table->dropColumn('sns_line_id');
        });
    }
}
