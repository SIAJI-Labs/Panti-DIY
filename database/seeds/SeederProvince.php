<?php

use App\Models\Location\Province;
use Illuminate\Database\Seeder;

class SeederProvince extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Province::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'id' => 34,
                'name' => 'Daerah Istimewa Yogyakarta'
            ]
        ];

        foreach($data as $item){
            Province::create([
                'id' => $item['id'],
                'name' => $item['name']
            ]);
        }
    }
}
