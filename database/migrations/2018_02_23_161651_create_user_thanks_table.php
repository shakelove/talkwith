<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserThanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_thanks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('thanks_id')->unsigned()->index();
            $table->timestamps();
            
            // 外部キー設定
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('thanks_id')->references('id')->on('users')->onDelete('cascade');

            // user_idとthanks_idの組み合わせの重複を許さない
            $table->unique(['user_id', 'thanks_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_thanks');
    }
}
