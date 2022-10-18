<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('example_immutable_model', function (Blueprint $table) {
            $table->id();
            $table->string('label')->nullable();
            $table->float('price')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('example_immutable_model');
    }
};