<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorruptionInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corruption_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('corruptionForm_name');
            $table->string('corruptionForm_region');
            $table->string('corruptionForm_phone');
            $table->string('corruptionForm_situation');
            $table->string('corruptionForm_email');
            $table->string('corruptionForm_arguments');
            $table->string('corruptionForm_corruptName');
            $table->string('corruptionForm_files');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curroption_infos');
    }
}
