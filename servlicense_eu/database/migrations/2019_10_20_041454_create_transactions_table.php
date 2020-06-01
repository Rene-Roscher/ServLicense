<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->decimal('amount', 10, 2);
            $table->longText('description');
            $table->longText('mtid')->nullable();
            $table->enum('state', ['SUCCESS', 'PENDING', 'ARBORT'])->default('PENDING');
            $table->enum('type', ['PAYPAL', 'PAYSAFECARD', 'SYSTEM']);
            $table->longText('payload')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
