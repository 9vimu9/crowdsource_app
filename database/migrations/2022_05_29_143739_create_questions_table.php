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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            $table->mediumText("question");
            $table->mediumText("answer");

            $table->unsignedSmallInteger("approved")->default(constantValue("paragraph_approving.approval_pending"));//0->not approved,1->approved,2->approval pending

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                ->on((new \App\Models\User())->getTable())
                ->onDelete('cascade');

            $table->bigInteger('paragraph_id');
            $table->foreign('paragraph_id')->references('id')
                ->on((new \App\Models\Paragraph())->getTable())
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
        Schema::dropIfExists('questions');
    }
};
