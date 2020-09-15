<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Erro ao utilizar o comando :  
 *  php artisan migrate --path=database/migrations/temp
 *  Syntax error or access violation: 1071 Specified key was too long;
 *  max key length is 767 bytes.
 * 
 * Solucao : https://laravel-news.com/laravel-5-4-key-too-long-error
 * As outlined in the Migrations guide to fix this all you have to do is edit 
 * your AppServiceProvider.php file and inside the boot method set a default string length:
 * 
 * use Illuminate\Support\Facades\Schema;

   public function boot(){
    Schema::defaultStringLength(191);
   }
 */
class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
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
        Schema::dropIfExists('tasks');
    }
}
