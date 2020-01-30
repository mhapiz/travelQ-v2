<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOthersFieldToUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->string('nationality')->after('avatar');
      $table->boolean('is_visa')->after('email');
      $table->date('doe_passport')->after('is_visa');
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
      $table->drop('nationality');
      $table->drop('is_visa');
      $table->drop('doe_passport');
    });
  }
}
