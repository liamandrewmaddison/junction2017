<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopersTable extends Migration
{

    public function up()
    {
        // Schema::create('sign_developer', function(Blueprint $table) {
        //     $table->increments('developer_id');
        //     $table->string('developer_name');
        //     $table->string('developer_email');
        //     $table->integer('developer_updated');
        //     $table->integer('developer_created');
        //     $table->integer('developer_removed');
        //     // Constraints declaration
        // });
    }

    public function down()
    {
        // Schema::drop('developers');
    }
}
