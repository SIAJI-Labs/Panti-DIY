<?php

use App\Models\Location\District;
use Illuminate\Database\Seeder;

class SeederDistrict extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        District::truncate();
        Schema::enableForeignKeyConstraints();
        
        $data = [
            [
                'regency_id' => 3401,
                'data' => [
                    [
                        'id' => 3401010,
                        'name' => 'Temon'
                    ], [
                        'id' => 3401020,
                        'name' => 'Wates'
                    ], [
                        'id' => 3401030,
                        'name' => 'Panjatan'
                    ], [
                        'id' => 3401040,
                        'name' => 'Galur'
                    ], [
                        'id' => 3401050,
                        'name' => 'Lendah'
                    ], [
                        'id' => 3401060,
                        'name' => 'Sentolo'
                    ], [
                        'id' => 3401070,
                        'name' => 'Pengasih'
                    ], [
                        'id' => 3401080,
                        'name' => 'Kokap'
                    ], [
                        'id' => 3401090,
                        'name' => 'Girimulyo'
                    ], [
                        'id' => 3401100,
                        'name' => 'Nanggulan'
                    ], [
                        'id' => 3401110,
                        'name' => 'Kalibawang'
                    ], [
                        'id' => 3401120,
                        'name' => 'Samigaluh'
                    ], 
                ], 
            ], [
                'regency_id' => 3402,
                'data' => [
                    [
                        'id' => 3402010,
                        'name' => 'Srandakan'
                    ], [
                        'id' => 3402020,
                        'name' => 'Sanden'
                    ], [
                        'id' => 3402030,
                        'name' => 'Kretek'
                    ], [
                        'id' => 3402040,
                        'name' => 'Pundong'
                    ], [
                        'id' => 3402050,
                        'name' => 'Bambang Lipuro'
                    ], [
                        'id' => 3402060,
                        'name' => 'Pandak'
                    ], [
                        'id' => 3402070,
                        'name' => 'Bantul'
                    ], [
                        'id' => 3402080,
                        'name' => 'Jetis'
                    ], [
                        'id' => 3402090,
                        'name' => 'Imogiri'
                    ], [
                        'id' => 3402100,
                        'name' => 'Dlingo'
                    ], [
                        'id' => 3402110,
                        'name' => 'Pleret'
                    ], [
                        'id' => 3402120,
                        'name' => 'Piyungan'
                    ], [
                        'id' => 3402130,
                        'name' => 'Banguntapan'
                    ], [
                        'id' => 3402140,
                        'name' => 'Sewon'
                    ], [
                        'id' => 3402150,
                        'name' => 'Kasihan'
                    ], [
                        'id' => 3402160,
                        'name' => 'Pajangan'
                    ], [
                        'id' => 3402170,
                        'name' => 'Sedayu'
                    ], 
                ], 
            ], [
                'regency_id' => 3403,
                'data' => [
                    [
                        'id' => 3403010,
                        'name' => 'Panggan'
                    ], [
                        'id' => 3403011,
                        'name' => 'Purwosari'
                    ], [
                        'id' => 3403020,
                        'name' => 'Paliyan'
                    ], [
                        'id' => 3403030,
                        'name' => 'Sapto Sari'
                    ], [
                        'id' => 3403040,
                        'name' => 'Tepus'
                    ], [
                        'id' => 3403041,
                        'name' => 'Tanjungsari'
                    ], [
                        'id' => 3403050,
                        'name' => 'Rongkop'
                    ], [
                        'id' => 3403051,
                        'name' => 'Girisubo'
                    ], [
                        'id' => 3403060,
                        'name' => 'Semanu'
                    ], [
                        'id' => 3403070,
                        'name' => 'Ponjong'
                    ], [
                        'id' => 3403080,
                        'name' => 'Karangmojo'
                    ], [
                        'id' => 3403090,
                        'name' => 'Wonosari'
                    ], [
                        'id' => 3403100,
                        'name' => 'Playen'
                    ], [
                        'id' => 3403110,
                        'name' => 'Patuk'
                    ], [
                        'id' => 3403120,
                        'name' => 'Gedang Sari'
                    ], [
                        'id' => 3403130,
                        'name' => 'Nglipar'
                    ], [
                        'id' => 3403140,
                        'name' => 'Ngawen'
                    ], [
                        'id' => 3403150,
                        'name' => 'Semin'
                    ], 
                ], 
            ], [
                'regency_id' => 3404,
                'data' => [
                    [
                        'id' => 3404010,
                        'name' => 'Moyudan'
                    ], [
                        'id' => 3404020,
                        'name' => 'Minggir'
                    ], [
                        'id' => 3404030,
                        'name' => 'Seyegan'
                    ], [
                        'id' => 3404040,
                        'name' => 'Godean'
                    ], [
                        'id' => 3404050,
                        'name' => 'Gamping'
                    ], [
                        'id' => 3404060,
                        'name' => 'Mlati'
                    ], [
                        'id' => 3404070,
                        'name' => 'Depok'
                    ], [
                        'id' => 3404080,
                        'name' => 'Berbah'
                    ], [
                        'id' => 3404090,
                        'name' => 'Prambanan'
                    ], [
                        'id' => 3404100,
                        'name' => 'Kalasan'
                    ], [
                        'id' => 3404110,
                        'name' => 'Ngemplak'
                    ], [
                        'id' => 3404120,
                        'name' => 'Ngaglik'
                    ], [
                        'id' => 3404130,
                        'name' => 'Sleman'
                    ], [
                        'id' => 3404140,
                        'name' => 'Tempel'
                    ], [
                        'id' => 3404150,
                        'name' => 'Turi'
                    ], [
                        'id' => 3404160,
                        'name' => 'Pakem'
                    ], [
                        'id' => 3404170,
                        'name' => 'Cangkringan'
                    ], 
                ], 
            ], [
                'regency_id' => 3471,
                'data' => [
                    [
                        'id' => 3471010,
                        'name' => 'Mantrijeron'
                    ], [
                        'id' => 3471020,
                        'name' => 'Kraton'
                    ], [
                        'id' => 3471030,
                        'name' => 'Mergangsan'
                    ], [
                        'id' => 3471040,
                        'name' => 'Umbulharjo'
                    ], [
                        'id' => 3471050,
                        'name' => 'Kotagede'
                    ], [
                        'id' => 3471060,
                        'name' => 'Gondokusuman'
                    ], [
                        'id' => 3471070,
                        'name' => 'Danurejan'
                    ], [
                        'id' => 3471080,
                        'name' => 'Pakualaman'
                    ], [
                        'id' => 3471090,
                        'name' => 'Gondomanan'
                    ], [
                        'id' => 3471100,
                        'name' => 'Ngampilan'
                    ], [
                        'id' => 3471110,
                        'name' => 'Wirobrajan'
                    ], [
                        'id' => 3471120,
                        'name' => 'Gedong Tengen'
                    ], [
                        'id' => 3471130,
                        'name' => 'Jetis'
                    ], [
                        'id' => 3471140,
                        'name' => 'Tegalrejo'
                    ], 
                ], 
            ]
        ];

        foreach($data as $item){
            foreach($item['data'] as $district){
                District::create([
                    'id' => $district['id'],
                    'regency_id' => $item['regency_id'],
                    'name' => $district['name']
                ]);
            }
        }
    }
}
