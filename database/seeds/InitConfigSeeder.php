<?php

use App\Models\Config;
use Illuminate\Database\Seeder;

class InitConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::findOrCreate('dias_apartado','3');
        Config::findOrCreate('dias_prestado','3');
    }
}
