<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_item', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('exam_form_id');
            $table->bigInteger('exam_category_id');
            $table->bigInteger('exam_group_id');
            $table->integer('point');
            $table->string('question');
            $table->bigInteger('created_id');
            $table->bigInteger('updated_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('exam_item');
    }
}
