<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('award_projects', function (Blueprint $table) {
            $table->increments('id');

            // A. Basic Info

            $table->string('award_id')->unique();
            $table->string('award_title')->nullable();
            $table->date('start_date')->nullable();
            $table->string('project_refund')->nullable();
            $table->string('implementing_partner')->nullable();
            $table->string('donors')->nullable();
            $table->string('partners')->nullable();
            $table->date('reporting_date')->nullable();
            $table->date('completion_date')->nullable();
            $table->string('awp_budget')->nullable();

            // B. Indicative/Emerging

            $table->string('result_of_project')->nullable();

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
        //
        Schema::dropIfExists('award_projects');
    }
}
