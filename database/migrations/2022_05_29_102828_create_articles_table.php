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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->mediumText("url");
            $table->unsignedSmallInteger("category")->nullable();
            $table->unsignedSmallInteger("approved")
                ->default(constantValue("article_approving.approval_pending"));
            //0->not approved,1->approved,2->approval pending
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
        Schema::dropIfExists('articles');
    }
};
