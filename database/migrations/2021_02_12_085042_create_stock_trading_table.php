<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTradingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_tradings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->integer('stock_id')->index();
            $table->tinyInteger('type')->default(0)->index()->comment('0 - buy, 1 - sell');
            $table->double('shares',8,8);
            $table->double('price',8,2);
            $table->double('commission',8,2)->nullable();
            $table->double('net_price',8,2);
            $table->date('date')->index();
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
        Schema::dropIfExists('stock_trading');
    }
}
