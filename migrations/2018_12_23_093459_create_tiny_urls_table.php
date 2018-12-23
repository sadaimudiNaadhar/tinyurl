<?php

/**
 * Created By sadaimudiNaadhar 
 * @author https://github.com/sadaimudiNaadhar
 *
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTinyUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('tinyurls.TABLE'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('short_code');
            $table->string('short_url', 191);
            $table->string('long_url', 191);
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
        Schema::dropIfExists(config('tinyurls.TABLE'));
    }
}
