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
        Schema::table('paragraphs', function (Blueprint $table) {
            $table->unsignedSmallInteger("approved")->default(constantValue("paragraph_approving.approval_pending"));//0->not approved,1->approved,2->approval pending
            $table->unsignedSmallInteger("no_more_questions")->default(constantValue("questions_from_paragraph.more_to_ask"));//0->more to ask, 1-> no more to ask
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paragraphs', function (Blueprint $table) {
            $table->dropColumn(["approved","no_more_questions"]);
        });
    }
};
