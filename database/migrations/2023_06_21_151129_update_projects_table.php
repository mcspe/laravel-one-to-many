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
        Schema::table('projects', function (Blueprint $table) {
          $table->dropColumn('original_image_path');

          $table->unsignedBigInteger('type_id')->nullable()->after('id');
          $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');

          $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
          $table->string('original_image_path')->after('image_path');

          $table->dropForeign(['type_id']);
          $table->dropColumn('type_id');

          $table->dropColumn('deleted_at');
        });
    }
};
