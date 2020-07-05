<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeederUsers::class);
        // Location
        $this->call(SeederProvince::class);
        $this->call(SeederRegency::class);
        $this->call(SeederDistrict::class);
        $this->call(SeederVillage::class);
    }
}
