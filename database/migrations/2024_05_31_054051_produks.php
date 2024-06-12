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
        Schema::create("produks", function (Blueprint $table) {
            $table->id();
            $table->string("nama_produk");
            $table->integer("harga_produk");
            $table->string('gambar_produk')->nullable();
            $table->unsignedBigInteger("updater_id");
            $table->foreignId('id_kategori')->references('id')->on('kategoris');
            $table->foreign("updater_id")->references("id")->on("admins");

            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("produks");
        //
    }
};