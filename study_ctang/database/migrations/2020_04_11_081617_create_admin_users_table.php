<?php
/*
 * @Author: 
 * @Date: 2020-04-11 16:16:17
 * @LastEditTime: 2020-04-11 16:40:31
 * @FilePath: \laravel-CMS\database\migrations\2020_04_11_081617_create_admin_users_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->bigIncrements('id');//数据表的ID
            $table->string('username',50)->unique();
            $table->string('password',150);
            $table->tinyInteger('state')->comment('负责控制管理员账号的可用性');//状态字段
            $table->timestamps();//包括创建时间字段和修改时间字段
            $table->softDeletes();//软删除字段
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
