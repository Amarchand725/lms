<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_classes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('study_class_id');
            $table->bigInteger('notify_id')->comment('assignment or announcement id');
            $table->string('notify_type')->comment('type of entry e.g assignment or announcement data');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('assigned_classes');
    }
}
