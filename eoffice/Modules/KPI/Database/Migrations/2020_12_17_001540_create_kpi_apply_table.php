<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKpiApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_apply', function (Blueprint $table) {
            $table->id();
            $table->integer('kpi_term_id');
            $table->integer('kpi_form_id');
            $table->integer('cfg_employee_group_id')->nullable();
            $table->integer('cfg_employee_id')->nullable();
            $table->integer('goal')->nullable();
            $table->integer('created_id');
            $table->integer('updated_id')->nullable();
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
        Schema::dropIfExists('kpi_apply');
    }
}
