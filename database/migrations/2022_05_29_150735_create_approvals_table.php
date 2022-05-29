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
        Schema::create('question_approvals', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger ('question_id');
            $table->foreign('question_id')->references('id')
                ->on((new \App\Models\Question())->getTable())
                ->onDelete('cascade');

            $table->unsignedSmallInteger("current_status");//0->not approved,1->approved,2->approval pending
            $table->string('comment')->nullable();

            $table->unsignedBigInteger ('user_id');
            $table->foreign('user_id')->references('id')
                ->on((new \App\Models\User())->getTable())
                ->onDelete('cascade');

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
        Schema::dropIfExists('question_approvals');
    }
};
