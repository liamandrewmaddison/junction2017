<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{

    public function up()
    {
        // Schema::create('sign_client', function(Blueprint $table) {
        //     $table->increments('client_id');
        //     $table->unsignedInteger('company_id', false)->length(10)->default(0)->index('company_id');
        //     $table->string('client_title', 255)->index('client_title');
        //     $table->string('client_email', 255)->index('client_email');
        //     $table->unsignedInteger('client_added', false)->length(10)->default(0)->index('client_added');
        //     $table->unsignedInteger('client_removed', false)->length(10)->default(0)->index('client_removed');
        //     $table->integer('client_kashflow', false)->length(11);
        //     $table->integer('client_capsule', false)->length(11);
        //     $table->string('client_closeio', 255);
        //     $table->integer('team_id')->unsigned();
        //     $table->foreign('team_id')
        //         ->references('team_id')
        //         ->on('sign_team');

        // });
    }

    public function down()
    {
        // Schema::drop('clients');
    }
}
