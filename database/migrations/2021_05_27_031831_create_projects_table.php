<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('name');
            $table->longText('details');
            $table->boolean('is_completed')->default(false);

            $table->unsignedBigInteger('lawyer_id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('lawyer_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('users');

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
        Schema::dropIfExists('projects');
    }
}
