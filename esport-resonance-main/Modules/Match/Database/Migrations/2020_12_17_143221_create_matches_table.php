<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->date('match_date');
            $table->time('match_time');
            $table->string('match_location');
            $table->longText('match_details');
            $table->string('stadium');

            $table->unsignedBigInteger('team_1');
            $table->unsignedBigInteger('team_2');
            $table->foreign('team_1')->references('id')->on('teams');
            $table->foreign('team_2')->references('id')->on('teams');

            $table->foreignId('match_group_id')->constrained();
            $table->foreignId('match_round_id')->constrained();
            $table->foreignId('match_status_id')->constrained();
            $table->foreignId('match_finish_id')->nullable()->constrained();

            $table->integer('score_team_1')->default('0')->nullable();
            $table->integer('score_team_2')->default('0')->nullable();
            $table->integer('score_additional_team_1')->default('0')->nullable();
            $table->integer('score_additional_team_2')->default('0')->nullable();

            $table->string('image')->nullable();
            $table->string('youtube')->nullable();
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
        Schema::dropIfExists('matches');
    }
}
