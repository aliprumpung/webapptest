<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\User;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('user', function (Blueprint $table) {
            $table->string('uuid')->unique();
            $table->text('nama',191);
            $table->text('alamat');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE `user` ADD UNIQUE(`nama`(191));');
        User::create([
            'uuid' => 'hjusyd7he2ls38d',
            'nama' => 'admin',
            'alamat' => 'Kp Tengah 13540',
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
