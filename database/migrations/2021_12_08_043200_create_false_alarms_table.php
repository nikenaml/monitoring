<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFalseAlarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('false_alarms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_alert');
            // $table->string('schedules_id');
            $table->string('note_alert_schedule');
            $table->integer('sum_alert_email');
            $table->longText('id_komentar');
            $table->integer('sum_false_alarm');
            // $table->float('ratio_false_alarm');

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
        Schema::dropIfExists('false_alarms');
    }
}
