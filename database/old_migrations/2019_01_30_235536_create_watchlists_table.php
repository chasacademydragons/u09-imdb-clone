<?php

// use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Database\Migrations\Migration;

// class CreateWatchlistsTable extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up()
//     {
//         Schema::create('watchlists', function (Blueprint $table) {
//             $table->increments('id');
//             $table->string('list_name');
//             $table->timestamps();

//             // Foreign keys
//             $table->unsignedInteger('user_id');
//             $table->foreign('user_id')->references('id')->on('users');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down()
//     {
//         Schema::dropIfExists('watchlists');
//     }
// }
