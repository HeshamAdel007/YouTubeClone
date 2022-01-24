<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('channel_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('duration')->nullable();
            $table->integer('views')->default(0);
            $table->string('uid');
            $table->string('thumbnail_image')->nullable();
            $table->text('path')->nullable();
            $table->string('proccessed_file')->nullable();
            $table->boolean('processed')->default(false);
            $table->string('processing_percentage')->default(false);

            $table->enum('visibility', ['private', 'public', 'unlisted'])->default('private');

            $table->foreign('channel_id')->references('id')
                  ->on('channels') ->onDelete('cascade');
            $table->timestamps();
        });
    } // End Of Up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    } // End Of Down

} // End Of Migration
