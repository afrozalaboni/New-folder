<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('user_name');
            $table->string('title');
            $table->string('category');
            $table->text('description');
            $table->integer('phone');
            $table->text('address');
            $table->integer('status')->default(0);
            $table->string('technician_id')->nullable();
            $table->string('technician_name')->nullable();
            $table->date('deadline')->nullable();
            $table->date('requested_deadline')->nullable();
            $table->text('delay_description')->nullable();
            $table->text('feedback')->nullable();
            $table->text('method')->nullable();
            $table->text('tnx_id')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('payment_status')->default(0);
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
        Schema::dropIfExists('complains');
    }
};
