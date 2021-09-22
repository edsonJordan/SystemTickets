<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_supports', function (Blueprint $table) {
            $table->id();
            $table->string('group', 40)->unique();

            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('type_supports')->onDelete('cascade');

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
        Schema::dropIfExists('group_supports');
    }
}
