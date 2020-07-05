<?php

use App\Models\Location\Regency;
use Illuminate\Database\Seeder;

class SeederRegency extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Regency::truncate();
        Schema::enableForeignKeyConstraints();
        
        $data = [
            [
                'id' => 3401,
                'province_id' => 34,
                'name' => 'Kabupaten Kulon Progo'
            ], [
                'id' => 3402,
                'province_id' => 34,
                'name' => 'Kabupaten Bantul'
            ], [
                'id' => 3403,
                'province_id' => 34,
                'name' => 'Kabupaten Gunung Kidul'
            ], [
                'id' => 3404,
                'province_id' => 34,
                'name' => 'Kabupaten Sleman'
            ], [
                'id' => 3471,
                'province_id' => 34,
                'name' => 'Kota Yogyakarta'
            ], 
        ];

        foreach($data as $item){
            Regency::create([
                'id' => $item['id'],
                'province_id' => $item['province_id'],
                'name' => $item['name']
            ]);
        }
    }
}
