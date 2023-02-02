<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdagamaAndTanggallahirAndIdjabatanAndIdgolonganToEmpployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->integer('id_agama')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('id_jabatan')->nullable();
            $table->string('id_golongan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('id_agama')->nullable();
            $table->dropColumn('tanggal_lahir')->nullable();
            $table->dropColumn('id_jabatan')->nullable();
            $table->dropColumn('id_golongan')->nullable();
        });
    }
}
