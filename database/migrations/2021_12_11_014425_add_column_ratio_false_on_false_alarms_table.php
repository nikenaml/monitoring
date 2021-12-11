<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRatioFalseOnFalseAlarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('false_alarms', function (Blueprint $table) {
            $table->double('ratio_false')->default(0)->after('sum_false_alarm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('false_alarms', function (Blueprint $table) {
            $table->dropColumn('ratio_false');
        });
    }
}
