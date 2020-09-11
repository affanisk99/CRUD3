<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('nip',50);
            $table->string('name',150);
            $table->integer('division_id');
            $table->integer('company_id');
            $table->integer('position_id');
            $table->text('address');
            $table->date('date_of_birth');
            $table->date('join_date');
            $table->integer('status');
            $table->string('npwp',50);
            $table->string('ktp',50);
            $table->enum('marital_status',['tk','k0','k1','k2','k3']);
            $table->string('phone_number',50);
            $table->text('profile_img');
            $table->softDeletes('deleted_at',0);
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
        Schema::dropIfExists('employees');
    }
}
