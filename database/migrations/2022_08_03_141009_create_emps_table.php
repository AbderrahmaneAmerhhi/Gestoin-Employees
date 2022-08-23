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
        Schema::create('emps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dept_id')->constrainted()->onUpdate('cascade')->onDelete('cascade');;
            $table->string('name');
            $table->string('image');
            $table->string('registration'); // matricule
            $table->integer('sup_id')->nullable()->default(0);
            $table->date('date_emb');
            $table->boolean('status')->default(0);
            $table->string('post');
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
        Schema::dropIfExists('emps');
    }
};
