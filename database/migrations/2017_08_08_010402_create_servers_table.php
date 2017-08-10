<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner')->comment('持有者');
            $table->ipAddress('ip')->unique()->comment('服务器ip');
            $table->string('provider_name')->nullable()->comment('服务器商');
            $table->string('provider_account')->nullable()->comment('服务器平台账号');
            $table->string('provider_pwd')->nullable()->comment('服务器平台密码');
            $table->string('server_account')->comment('服务器账号');
            $table->string('server_pwd')->comment('服务器密码');
            $table->date('deadline')->nullable()->comment('到期时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
