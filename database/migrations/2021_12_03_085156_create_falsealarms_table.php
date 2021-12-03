<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFalsealarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('falsealarms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('tanggal_komentar');
            $table->string('sum_alert_email');
            $table->integer('schedules_id');
            $table->string('id_komentar');
            $table->string('sum_false_alarm');

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
        Schema::dropIfExists('falsealarms');
    }
}
