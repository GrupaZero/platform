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
        /**
         * 'regexp' sims to not work for postgresql.
         * Need to use 'similar to' instead.
         */
        if (Schema::hasTable('oauth_clients')) {
            $records = DB::table('oauth_clients')
                ->where('name', 'similar to', '(Password Grant|Personal Access) Client')
                ->delete();
        }
    }
}
