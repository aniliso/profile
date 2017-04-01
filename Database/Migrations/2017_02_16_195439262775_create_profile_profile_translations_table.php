<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileProfileTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile__profile_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields
            $table->text('biography')->nullable();

            $table->integer('profile_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['profile_id', 'locale']);
            $table->foreign('profile_id')->references('id')->on('profile__profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile__profile_translations', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
        });
        Schema::dropIfExists('profile__profile_translations');
    }
}
