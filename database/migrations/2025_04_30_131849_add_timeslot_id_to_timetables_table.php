<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('timetables', function (Blueprint $table) {
        $table->foreignId('timeslot_id')->after('teacher_id')->nullable()->constrained('timeslots')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('timetables', function (Blueprint $table) {
        $table->dropForeign(['timeslot_id']);
        $table->dropColumn('timeslot_id');
    });
}

};
