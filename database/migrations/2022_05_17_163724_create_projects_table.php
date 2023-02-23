<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->text('project_description');
            $table->string('company_name');
            $table->integer('project_process');
            $table->string('thumbnail')->nullable();
            $table->string('project_leader');
            $table->string('status');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
