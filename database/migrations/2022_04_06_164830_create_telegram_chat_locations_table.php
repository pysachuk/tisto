<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelegramChatLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telegram_chat_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('telegram_chat_id')
                ->constrained('telegram_chats', 'id')
                ->cascadeOnDelete();
            $table->integer('location_key');
            $table->timestamps();

            $table->foreign('location_key')
                ->references('key')
                ->on('locations')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telegram_chat_locations');
    }
}
