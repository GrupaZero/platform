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
            '--name' => config('app.name') . ' Password Grant Client'
        ]);

        Artisan::call('passport:client', [
            '--personal' => true,
            '--name' => config('app.name') . ' Personal Access Client'
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
            $records = DB::table('oauth_clients')
                ->where('name', 'like', config('app.name') . ' % Client')
                ->delete();
        }
    }
}
