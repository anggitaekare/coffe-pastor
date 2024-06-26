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
        Schema::create("kategoris", function (Blueprint $table){
            $table->id();
            $table->string("nama_kategori")->unique();
            $table->timestamps();
            $table->unsignedBigInteger("updater_id");
            $table->foreign("updater_id")->references("id")->on("admins");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori');
    }

    
};
