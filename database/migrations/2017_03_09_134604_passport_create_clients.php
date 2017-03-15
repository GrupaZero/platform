<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class PassportCreateClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Artisan::call('passport:client', [
            '--password' => true,
            '--name' => 'Password Grant Client'
        ]);

        Artisan::call('passport:client', [
            '--personal' => true,
            '--name' => 'Personal Access Client'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('oauth_clients')) {
            DB::table('oauth_clients')
                ->where('name', 'Password Grant Client')
                ->delete();

            DB::table('oauth_clients')
                ->where('name', 'Personal Access Client')
                ->delete();
        }
    }
}
