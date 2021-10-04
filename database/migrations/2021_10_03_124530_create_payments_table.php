<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('price')->default('regular')->change();
        });
        Schema::create('payments', function (Blueprint $table) {
            $table->string('id', 30)->primary();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onDelete('cascade');
            $table->string('owner_id');
            $table->string('external_id');
            $table->string('account_number', 30);
            $table->integer('expected_amount');
            $table->string('status');
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
        Schema::dropIfExists('payments');
    }
}
