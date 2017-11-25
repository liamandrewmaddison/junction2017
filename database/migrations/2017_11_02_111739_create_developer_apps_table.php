<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeveloperAppsTable extends Migration
{

    public function up()
    {
        // Schema::create('sign_developer_application', function(Blueprint $table) {
        //     $table->increments('application_id');
        //     $table->integer('developer_id')->unsigned();
        //     $table->string('application_name');
        //     $table->boolean('application_suspended');
        //     $table->integer('application_created');
        //     $table->integer('application_updated');
        //     $table->boolean('application_removed');
        //     $table->foreign('developer_id')
        //         ->references('developer_id')
        //         ->on('sign_developer');

        // });
    }

    public function down()
    {
        // Schema::drop('developer_apps');
    }
}
