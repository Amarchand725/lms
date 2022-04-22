<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_overviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('created_by');
            $table->bigInteger('subject_id');
            $table->text('overview');
            $table->boolean('status')->default(1);
            $table->string('deleted_at')->nullable();
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
        Schema::dropIfExists('subject_overviews');
    }
}
