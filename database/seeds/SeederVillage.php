<?php

use App\Models\Location\Village;
use Illuminate\Database\Seeder;

class SeederVillage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Village::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'district_id' => 3401010,
                'data' => [
                    [
                        'id' => 3401010001,
                        'name' => "JANGKARAN"
                    ],
                    [
                        'id' => 3401010002,
                        'name' => "SINDUTAN"
                    ],
                    [
                        'id' => 3401010003,
                        'name' => "PALIHAN"
                    ],
                    [
                        'id' => 3401010004,
                        'name' => "GLAGAH"
                    ],
                    [
                        'id' => 3401010005,
                        'name' => "KALI DENGEN"
                    ],
                    [
                        'id' => 3401010006,
                        'name' => "PLUMBON"
                    ],
                    [
                        'id' => 3401010007,
                        'name' => "KEDUNDANG"
                    ],
                    [
                        'id' => 3401010010,
                        'name' => "KALIGINTUNG"
                    ],
                    [
                        'id' => 3401010011,
                        'name' => "TEMON WETAN"
                    ],
                    [
                        'id' => 3401010012,
                        'name' => "TEMON KULON"
                    ],
                    [
                        'id' => 3401010013,
                        'name' => "KEBONREJO"
                    ],
                    [
                        'id' => 3401010014,
                        'name' => "JANTEN"
                    ],
                    [
                        'id' => 3401010015,
                        'name' => "KARANG WULUH"
                    ]
                ]
            ],
            [
                'district_id' => 3401020,
                'data' => [
                    [
                        'id' => 3401020001,
                        'name' => "KARANG WUNI"
                    ],
                    [
                        'id' => 3401020002,
                        'name' => "SOGAN"
                    ],
                    [
                        'id' => 3401020003,
                        'name' => "KULWARU"
                    ],
                    [
                        'id' => 3401020004,
                        'name' => "NGESTIHARJO"
                    ],
                    [
                        'id' => 3401020005,
                        'name' => "TRIHARJO"
                    ],
                    [
                        'id' => 3401020006,
                        'name' => "BENDUNGAN"
                    ],
                    [
                        'id' => 3401020007,
                        'name' => "GIRI PENI"
                    ],
                    [
                        'id' => 3401020008,
                        'name' => "WATES"
                    ]
                ]
            ],
            [
                'district_id' => 3401030,
                'data' => [
                    [
                        'id' => 3401030001,
                        'name' => "GARONGAN"
                    ],
                    [
                        'id' => 3401030004,
                        'name' => "KANOMAN"
                    ],
                    [
                        'id' => 3401030005,
                        'name' => "DEPOK"
                    ],
                    [
                        'id' => 3401030006,
                        'name' => "BOJONG"
                    ],
                    [
                        'id' => 3401030007,
                        'name' => "TAYUBAN"
                    ],
                    [
                        'id' => 3401030008,
                        'name' => "GOTAKAN"
                    ],
                    [
                        'id' => 3401030009,
                        'name' => "PANJATAN"
                    ],
                    [
                        'id' => 3401030011,
                        'name' => "KREMBANGAN"
                    ]
                ]
            ],
            [
                'district_id' => 3401040,
                'data' => [
                    [
                        'id' => 3401040001,
                        'name' => "KARANG SEWU"
                    ],
                    [
                        'id' => 3401040002,
                        'name' => "BANARAN"
                    ],
                    [
                        'id' => 3401040003,
                        'name' => "KRANGGAN"
                    ],
                    [
                        'id' => 3401040004,
                        'name' => "NOMPOREJO"
                    ],
                    [
                        'id' => 3401040005,
                        'name' => "BROSOT"
                    ],
                    [
                        'id' => 3401040006,
                        'name' => "PANDOWAN"
                    ],
                    [
                        'id' => 3401040007,
                        'name' => "TIRTA RAHAYU"
                    ]
                ]
            ],
            [
                'district_id' => 3401050,
                'data' => [
                    [
                        'id' => 3401050001,
                        'name' => "WAHYUHARJO"
                    ],
                    [
                        'id' => 3401050002,
                        'name' => "BUMIREJO"
                    ],
                    [
                        'id' => 3401050003,
                        'name' => "JATIREJO"
                    ],
                    [
                        'id' => 3401050004,
                        'name' => "SIDOREJO"
                    ],
                    [
                        'id' => 3401050005,
                        'name' => "GULUREJO"
                    ],
                    [
                        'id' => 3401050006,
                        'name' => "NGENTAKREJO"
                    ]
                ]
            ],
            [
                'district_id' => 3401060,
                'data' => [
                    [
                        'id' => 3401060001,
                        'name' => "DEMANGREJO"
                    ],
                    [
                        'id' => 3401060002,
                        'name' => "SRIKAYANGAN"
                    ],
                    [
                        'id' => 3401060003,
                        'name' => "TUKSONO"
                    ],
                    [
                        'id' => 3401060004,
                        'name' => "SALAMREJO"
                    ],
                    [
                        'id' => 3401060005,
                        'name' => "SUKORENO"
                    ],
                    [
                        'id' => 3401060006,
                        'name' => "KALIAGUNG"
                    ],
                    [
                        'id' => 3401060007,
                        'name' => "SENTOLO"
                    ],
                    [
                        'id' => 3401060008,
                        'name' => "BANGUNCIPTO"
                    ]
                ]
            ],
            [
                'district_id' => 3401070,
                'data' => [
                    [
                        'id' => 3401070001,
                        'name' => "TAWANGSARI"
                    ],
                    [
                        'id' => 3401070002,
                        'name' => "KARANGSARI"
                    ],
                    [
                        'id' => 3401070003,
                        'name' => "KEDUNGSARI"
                    ],
                    [
                        'id' => 3401070004,
                        'name' => "MARGOSARI"
                    ],
                    [
                        'id' => 3401070005,
                        'name' => "PENGASIH"
                    ],
                    [
                        'id' => 3401070006,
                        'name' => "SENDANGSARI"
                    ],
                    [
                        'id' => 3401070007,
                        'name' => "SIDOMULYO"
                    ]
                ]
            ],
            [
                'district_id' => 3401080,
                'data' => [
                    [
                        'id' => 3401080001,
                        'name' => "HARGOMULYO"
                    ],
                    [
                        'id' => 3401080002,
                        'name' => "HARGOREJO"
                    ],
                    [
                        'id' => 3401080003,
                        'name' => "HARGOWILIS"
                    ],
                    [
                        'id' => 3401080004,
                        'name' => "KALIREJO"
                    ],
                    [
                        'id' => 3401080005,
                        'name' => "HARGOTIRTO"
                    ]
                ]
            ],
            [
                'district_id' => 3401090,
                'data' => [
                    [
                        'id' => 3401090001,
                        'name' => "JATIMULYO"
                    ],
                    [
                        'id' => 3401090002,
                        'name' => "GIRIPURWO"
                    ],
                    [
                        'id' => 3401090003,
                        'name' => "PENDOWOREJO"
                    ],
                    [
                        'id' => 3401090004,
                        'name' => "PURWOSARI"
                    ]
                ]
            ],
            [
                'district_id' => 3401100,
                'data' => [
                    [
                        'id' => 3401100001,
                        'name' => "BANYUROTO"
                    ],
                    [
                        'id' => 3401100002,
                        'name' => "DONOMULYO"
                    ],
                    [
                        'id' => 3401100003,
                        'name' => "WIJIMULYO"
                    ],
                    [
                        'id' => 3401100004,
                        'name' => "TANJUNGHARJO"
                    ],
                    [
                        'id' => 3401100005,
                        'name' => "JATI SARONO"
                    ],
                    [
                        'id' => 3401100006,
                        'name' => "KEMBANG"
                    ]
                ]
            ],
            [
                'district_id' => 3401110,
                'data' => [
                    [
                        'id' => 3401110001,
                        'name' => "BANJARARUM"
                    ],
                    [
                        'id' => 3401110002,
                        'name' => "BANJARASRI"
                    ],
                    [
                        'id' => 3401110003,
                        'name' => "BANJARHARJO"
                    ],
                    [
                        'id' => 3401110004,
                        'name' => "BANJAROYO"
                    ]
                ]
            ],
            [
                'district_id' => 3401120,
                'data' => [
                    [
                        'id' => 3401120001,
                        'name' => "KEBON HARJO"
                    ],
                    [
                        'id' => 3401120002,
                        'name' => "BANJARSARI"
                    ],
                    [
                        'id' => 3401120003,
                        'name' => "PURWOHARJO"
                    ],
                    [
                        'id' => 3401120004,
                        'name' => "SIDOHARJO"
                    ],
                    [
                        'id' => 3401120005,
                        'name' => "GERBOSARI"
                    ],
                    [
                        'id' => 3401120006,
                        'name' => "NGARGOSARI"
                    ],
                    [
                        'id' => 3401120007,
                        'name' => "PAGERHARJO"
                    ]
                ]
            ],
            [
                'district_id' => 3402010,
                'data' => [
                    [
                        'id' => 3402010001,
                        'name' => "PONCOSARI"
                    ],
                    [
                        'id' => 3402010002,
                        'name' => "TRIMURTI"
                    ]
                ]
            ],
            [
                'district_id' => 3402020,
                'data' => [
                    [
                        'id' => 3402020001,
                        'name' => "GADINGSARI"
                    ],
                    [
                        'id' => 3402020002,
                        'name' => "GADINGHARJO"
                    ],
                    [
                        'id' => 3402020003,
                        'name' => "SRIGADING"
                    ],
                    [
                        'id' => 3402020004,
                        'name' => "MURTIGADING"
                    ]
                ]
            ],
            [
                'district_id' => 3402030,
                'data' => [
                    [
                        'id' => 3402030001,
                        'name' => "TIRTOHARGO"
                    ],
                    [
                        'id' => 3402030002,
                        'name' => "PARANGTRITIS"
                    ],
                    [
                        'id' => 3402030003,
                        'name' => "DONOTIRTO"
                    ],
                    [
                        'id' => 3402030004,
                        'name' => "TIRTOSARI"
                    ],
                    [
                        'id' => 3402030005,
                        'name' => "TIRTOMULYO"
                    ]
                ]
            ],
            [
                'district_id' => 3402040,
                'data' => [
                    [
                        'id' => 3402040001,
                        'name' => "SELOHARJO"
                    ],
                    [
                        'id' => 3402040002,
                        'name' => "PANJANGREJO"
                    ],
                    [
                        'id' => 3402040003,
                        'name' => "SRIHARDONO"
                    ]
                ]
            ],
            [
                'district_id' => 3402050,
                'data' => [
                    [
                        'id' => 3402050001,
                        'name' => "SIDOMULYO"
                    ],
                    [
                        'id' => 3402050002,
                        'name' => "MULYODADI"
                    ],
                    [
                        'id' => 3402050003,
                        'name' => "SUMBERMULYO"
                    ]
                ]
            ],
            [
                'district_id' => 3402060,
                'data' => [
                    [
                        'id' => 3402060001,
                        'name' => "CATURHARJO"
                    ],
                    [
                        'id' => 3402060002,
                        'name' => "TRIHARJO"
                    ],
                    [
                        'id' => 3402060003,
                        'name' => "GILANGHARJO"
                    ],
                    [
                        'id' => 3402060004,
                        'name' => "WIJIREJO"
                    ]
                ]
            ],
            [
                'district_id' => 3402070,
                'data' => [
                    [
                        'id' => 3402070001,
                        'name' => "PALBAPANG"
                    ],
                    [
                        'id' => 3402070002,
                        'name' => "RINGIN HARJO"
                    ],
                    [
                        'id' => 3402070003,
                        'name' => "BANTUL"
                    ],
                    [
                        'id' => 3402070004,
                        'name' => "TRIRENGGO"
                    ],
                    [
                        'id' => 3402070005,
                        'name' => "SABDODADI"
                    ]
                ]
            ],
            [
                'district_id' => 3402080,
                'data' => [
                    [
                        'id' => 3402080001,
                        'name' => "PATALAN"
                    ],
                    [
                        'id' => 3402080002,
                        'name' => "CANDEN"
                    ],
                    [
                        'id' => 3402080003,
                        'name' => "SUMBER AGUNG"
                    ],
                    [
                        'id' => 3402080004,
                        'name' => "TRIMULYO"
                    ]
                ]
            ],
            [
                'district_id' => 3402090,
                'data' => [
                    [
                        'id' => 3402090001,
                        'name' => "SELOPAMIORO"
                    ],
                    [
                        'id' => 3402090002,
                        'name' => "SRIHARJO"
                    ],
                    [
                        'id' => 3402090003,
                        'name' => "KEBON AGUNG"
                    ],
                    [
                        'id' => 3402090004,
                        'name' => "KARANG TENGAH"
                    ],
                    [
                        'id' => 3402090005,
                        'name' => "GIRIREJO"
                    ],
                    [
                        'id' => 3402090006,
                        'name' => "KARANGTALUN"
                    ],
                    [
                        'id' => 3402090007,
                        'name' => "IMOGIRI"
                    ],
                    [
                        'id' => 3402090008,
                        'name' => "WUKIRSARI"
                    ]
                ]
            ],
            [
                'district_id' => 3402100,
                'data' => [
                    [
                        'id' => 3402100001,
                        'name' => "MANGUNAN"
                    ],
                    [
                        'id' => 3402100003,
                        'name' => "DLINGO"
                    ],
                    [
                        'id' => 3402100005,
                        'name' => "JATIMULYO"
                    ],
                    [
                        'id' => 3402100006,
                        'name' => "TERONG"
                    ]
                ]
            ],
            [
                'district_id' => 3402110,
                'data' => [
                    [
                        'id' => 3402110001,
                        'name' => "WONOKROMO"
                    ],
                    [
                        'id' => 3402110003,
                        'name' => "SEGOROYOSO"
                    ],
                    [
                        'id' => 3402110004,
                        'name' => "BAWURAN"
                    ],
                    [
                        'id' => 3402110005,
                        'name' => "WONOLELO"
                    ]
                ]
            ],
            [
                'district_id' => 3402120,
                'data' => [
                    [
                        'id' => 3402120001,
                        'name' => "SITIMULYO"
                    ],
                    [
                        'id' => 3402120002,
                        'name' => "SRIMULYO"
                    ],
                    [
                        'id' => 3402120003,
                        'name' => "SRIMARTANI"
                    ]
                ]
            ],
            [
                'district_id' => 3402130,
                'data' => [
                    [
                        'id' => 3402130001,
                        'name' => "TAMANAN"
                    ],
                    [
                        'id' => 3402130002,
                        'name' => "JAGALAN"
                    ],
                    [
                        'id' => 3402130003,
                        'name' => "SINGOSAREN"
                    ],
                    [
                        'id' => 3402130004,
                        'name' => "WIROKERTEN"
                    ],
                    [
                        'id' => 3402130005,
                        'name' => "JAMBIDAN"
                    ],
                    [
                        'id' => 3402130006,
                        'name' => "POTORONO"
                    ],
                    [
                        'id' => 3402130007,
                        'name' => "BATURETNO"
                    ],
                    [
                        'id' => 3402130008,
                        'name' => "BANGUNTAPAN"
                    ]
                ]
            ],
            [
                'district_id' => 3402140,
                'data' => [
                    [
                        'id' => 3402140001,
                        'name' => "PENDOWOHARJO"
                    ],
                    [
                        'id' => 3402140002,
                        'name' => "TIMBULHARJO"
                    ],
                    [
                        'id' => 3402140003,
                        'name' => "BANGUNHARJO"
                    ],
                    [
                        'id' => 3402140004,
                        'name' => "PANGGUNGHARJO"
                    ]
                ]
            ],
            [
                'district_id' => 3402150,
                'data' => [
                    [
                        'id' => 3402150001,
                        'name' => "BANGUNJIWO"
                    ],
                    [
                        'id' => 3402150002,
                        'name' => "TIRTONIRMOLO"
                    ],
                    [
                        'id' => 3402150003,
                        'name' => "TAMANTIRTO"
                    ],
                    [
                        'id' => 3402150004,
                        'name' => "NGESTIHARJO"
                    ]
                ]
            ],
            [
                'district_id' => 3402160,
                'data' => [
                    [
                        'id' => 3402160001,
                        'name' => "TRIWIDADI"
                    ],
                    [
                        'id' => 3402160002,
                        'name' => "SENDANGSARI"
                    ],
                    [
                        'id' => 3402160003,
                        'name' => "GUWOSARI"
                    ]
                ]
            ],
            [
                'district_id' => 3402170,
                'data' => [
                    [
                        'id' => 3402170001,
                        'name' => "ARGODADI"
                    ],
                    [
                        'id' => 3402170002,
                        'name' => "ARGOREJO"
                    ],
                    [
                        'id' => 3402170003,
                        'name' => "ARGOSARI"
                    ],
                    [
                        'id' => 3402170004,
                        'name' => "ARGOMULYO"
                    ]
                ]
            ],
            [
                'district_id' => 3403010,
                'data' => [
                    [
                        'id' => 3403010006,
                        'name' => "GIRIHARJO"
                    ],
                    [
                        'id' => 3403010007,
                        'name' => "GIRIWUNGU"
                    ],
                    [
                        'id' => 3403010008,
                        'name' => "GIRIMULYO"
                    ],
                    [
                        'id' => 3403010009,
                        'name' => "GIRIKARTO"
                    ],
                    [
                        'id' => 3403010010,
                        'name' => "GIRISEKAR"
                    ],
                    [
                        'id' => 3403010011,
                        'name' => "GIRISUKO"
                    ]
                ]
            ],
            [
                'district_id' => 3403011,
                'data' => [
                    [
                        'id' => 3403011001,
                        'name' => "GIRIJATI"
                    ],
                    [
                        'id' => 3403011002,
                        'name' => "GIRIASIH"
                    ],
                    [
                        'id' => 3403011003,
                        'name' => "GIRICAHYO"
                    ],
                    [
                        'id' => 3403011004,
                        'name' => "GIRIPURWO"
                    ],
                    [
                        'id' => 3403011005,
                        'name' => "GIRITIRTO"
                    ]
                ]
            ],
            [
                'district_id' => 3403020,
                'data' => [
                    [
                        'id' => 3403020001,
                        'name' => "KARANG DUWET"
                    ],
                    [
                        'id' => 3403020002,
                        'name' => "KARANG ASEM"
                    ],
                    [
                        'id' => 3403020003,
                        'name' => "MULUSAN"
                    ],
                    [
                        'id' => 3403020004,
                        'name' => "GIRING"
                    ],
                    [
                        'id' => 3403020005,
                        'name' => "SODO"
                    ],
                    [
                        'id' => 3403020006,
                        'name' => "PAMPANG"
                    ],
                    [
                        'id' => 3403020007,
                        'name' => "GROGOL"
                    ]
                ]
            ],
            [
                'district_id' => 3403030,
                'data' => [
                    [
                        'id' => 3403030001,
                        'name' => "KRAMBIL SAWIT"
                    ],
                    [
                        'id' => 3403030002,
                        'name' => "KANIGORO"
                    ],
                    [
                        'id' => 3403030003,
                        'name' => "PLANJAN"
                    ],
                    [
                        'id' => 3403030004,
                        'name' => "MONGGOL"
                    ],
                    [
                        'id' => 3403030006,
                        'name' => "NGLORA"
                    ],
                    [
                        'id' => 3403030007,
                        'name' => "JETIS"
                    ]
                ]
            ],
            [
                'district_id' => 3403040,
                'data' => [
                    [
                        'id' => 3403040005,
                        'name' => "SIDOHARJO"
                    ],
                    [
                        'id' => 3403040007,
                        'name' => "PURWODADI"
                    ],
                    [
                        'id' => 3403040008,
                        'name' => "GIRIPANGGUNG"
                    ]
                ]
            ],
            [
                'district_id' => 3403041,
                'data' => [
                    [
                        'id' => 3403041001,
                        'name' => "KEMADANG"
                    ],
                    [
                        'id' => 3403041002,
                        'name' => "KEMIRI"
                    ],
                    [
                        'id' => 3403041003,
                        'name' => "BANJAREJO"
                    ],
                    [
                        'id' => 3403041004,
                        'name' => "NGESTIREJO"
                    ],
                    [
                        'id' => 3403041005,
                        'name' => "HARGOSARI"
                    ]
                ]
            ],
            [
                'district_id' => 3403050,
                'data' => [
                    [
                        'id' => 3403050007,
                        'name' => "MELIKAN"
                    ],
                    [
                        'id' => 3403050010,
                        'name' => "BOHOL"
                    ],
                    [
                        'id' => 3403050011,
                        'name' => "PRINGOMBO"
                    ],
                    [
                        'id' => 3403050012,
                        'name' => "BOTODAYAKAN"
                    ],
                    [
                        'id' => 3403050013,
                        'name' => "PETIR"
                    ],
                    [
                        'id' => 3403050014,
                        'name' => "SEMUGIH"
                    ],
                    [
                        'id' => 3403050015,
                        'name' => "KARANGWUNI"
                    ],
                    [
                        'id' => 3403050016,
                        'name' => "PUCANGANOM"
                    ]
                ]
            ],
            [
                'district_id' => 3403051,
                'data' => [
                    [
                        'id' => 3403051001,
                        'name' => "BALONG"
                    ],
                    [
                        'id' => 3403051002,
                        'name' => "JEPITU"
                    ],
                    [
                        'id' => 3403051003,
                        'name' => "KARANGAWEN"
                    ],
                    [
                        'id' => 3403051004,
                        'name' => "TILENG"
                    ],
                    [
                        'id' => 3403051005,
                        'name' => "NGLINDUR"
                    ],
                    [
                        'id' => 3403051008,
                        'name' => "SONGBANYU"
                    ]
                ]
            ],
            [
                'district_id' => 3403060,
                'data' => [
                    [
                        'id' => 3403060001,
                        'name' => "PACAREJO"
                    ],
                    [
                        'id' => 3403060002,
                        'name' => "CANDIREJO"
                    ],
                    [
                        'id' => 3403060003,
                        'name' => "DADAPAYU"
                    ],
                    [
                        'id' => 3403060004,
                        'name' => "NGEPOSARI"
                    ],
                    [
                        'id' => 3403060005,
                        'name' => "SEMANU"
                    ]
                ]
            ],
            [
                'district_id' => 3403070,
                'data' => [
                    [
                        'id' => 3403070001,
                        'name' => "GOMBANG"
                    ],
                    [
                        'id' => 3403070002,
                        'name' => "SIDOREJO"
                    ],
                    [
                        'id' => 3403070003,
                        'name' => "BEDOYO"
                    ],
                    [
                        'id' => 3403070004,
                        'name' => "KARANG ASEM"
                    ],
                    [
                        'id' => 3403070005,
                        'name' => "PONJONG"
                    ],
                    [
                        'id' => 3403070006,
                        'name' => "GENJAHAN"
                    ],
                    [
                        'id' => 3403070007,
                        'name' => "SUMBER GIRI"
                    ],
                    [
                        'id' => 3403070009,
                        'name' => "TAMBAKROMO"
                    ],
                    [
                        'id' => 3403070010,
                        'name' => "SAWAHAN"
                    ],
                    [
                        'id' => 3403070011,
                        'name' => "UMBUL REJO"
                    ]
                ]
            ],
            [
                'district_id' => 3403080,
                'data' => [
                    [
                        'id' => 3403080001,
                        'name' => "BENDUNGAN"
                    ],
                    [
                        'id' => 3403080002,
                        'name' => "BEJIHARJO"
                    ],
                    [
                        'id' => 3403080003,
                        'name' => "WILADEG"
                    ],
                    [
                        'id' => 3403080004,
                        'name' => "KELOR"
                    ],
                    [
                        'id' => 3403080005,
                        'name' => "NGIPAK"
                    ],
                    [
                        'id' => 3403080006,
                        'name' => "KARANGMOJO"
                    ],
                    [
                        'id' => 3403080007,
                        'name' => "GEDANG REJO"
                    ],
                    [
                        'id' => 3403080008,
                        'name' => "NGAWIS"
                    ],
                    [
                        'id' => 3403080009,
                        'name' => "JATI AYU"
                    ]
                ]
            ],
            [
                'district_id' => 3403090,
                'data' => [
                    [
                        'id' => 3403090002,
                        'name' => "MULO"
                    ],
                    [
                        'id' => 3403090004,
                        'name' => "WARENG"
                    ],
                    [
                        'id' => 3403090005,
                        'name' => "PULUTAN"
                    ],
                    [
                        'id' => 3403090006,
                        'name' => "SIRAMAN"
                    ],
                    [
                        'id' => 3403090007,
                        'name' => "KARANG REJEK"
                    ],
                    [
                        'id' => 3403090008,
                        'name' => "BALEHARJO"
                    ],
                    [
                        'id' => 3403090009,
                        'name' => "SELANG"
                    ],
                    [
                        'id' => 3403090010,
                        'name' => "WONOSARI"
                    ],
                    [
                        'id' => 3403090012,
                        'name' => "PIYAMAN"
                    ],
                    [
                        'id' => 3403090013,
                        'name' => "KARANG TENGAH"
                    ],
                    [
                        'id' => 3403090014,
                        'name' => "GARI"
                    ]
                ]
            ],
            [
                'district_id' => 3403100,
                'data' => [
                    [
                        'id' => 3403100001,
                        'name' => "BANYUSOCO"
                    ],
                    [
                        'id' => 3403100002,
                        'name' => "PLEMBUTAN"
                    ],
                    [
                        'id' => 3403100003,
                        'name' => "BLEBERAN"
                    ],
                    [
                        'id' => 3403100004,
                        'name' => "GETAS"
                    ],
                    [
                        'id' => 3403100005,
                        'name' => "DENGOK"
                    ],
                    [
                        'id' => 3403100007,
                        'name' => "PLAYEN"
                    ],
                    [
                        'id' => 3403100008,
                        'name' => "NGAWU"
                    ],
                    [
                        'id' => 3403100009,
                        'name' => "BANDUNG"
                    ],
                    [
                        'id' => 3403100010,
                        'name' => "LOGANDENG"
                    ],
                    [
                        'id' => 3403100011,
                        'name' => "GADING"
                    ],
                    [
                        'id' => 3403100012,
                        'name' => "BANARAN"
                    ],
                    [
                        'id' => 3403100013,
                        'name' => "NGLERI"
                    ]
                ]
            ],
            [
                'district_id' => 3403110,
                'data' => [
                    [
                        'id' => 3403110001,
                        'name' => "SEMOYO"
                    ],
                    [
                        'id' => 3403110002,
                        'name' => "PENGKOK"
                    ],
                    [
                        'id' => 3403110003,
                        'name' => "BEJI"
                    ],
                    [
                        'id' => 3403110005,
                        'name' => "NGLEGI"
                    ],
                    [
                        'id' => 3403110006,
                        'name' => "PUTAT"
                    ],
                    [
                        'id' => 3403110007,
                        'name' => "SALAM"
                    ],
                    [
                        'id' => 3403110008,
                        'name' => "PATUK"
                    ],
                    [
                        'id' => 3403110009,
                        'name' => "NGORO ORO"
                    ],
                    [
                        'id' => 3403110010,
                        'name' => "NGLANGGERAN"
                    ],
                    [
                        'id' => 3403110011,
                        'name' => "TERBAH"
                    ]
                ]
            ],
            [
                'district_id' => 3403120,
                'data' => [
                    [
                        'id' => 3403120001,
                        'name' => "NGALANG"
                    ],
                    [
                        'id' => 3403120002,
                        'name' => "HARGO MULYO"
                    ],
                    [
                        'id' => 3403120004,
                        'name' => "TEGALREJO"
                    ],
                    [
                        'id' => 3403120005,
                        'name' => "WATU GAJAH"
                    ],
                    [
                        'id' => 3403120006,
                        'name' => "SAMPANG"
                    ]
                ]
            ],
            [
                'district_id' => 3403130,
                'data' => [
                    [
                        'id' => 3403130001,
                        'name' => "KEDUNG KERIS"
                    ],
                    [
                        'id' => 3403130002,
                        'name' => "NGLIPAR"
                    ],
                    [
                        'id' => 3403130003,
                        'name' => "PENGKOL"
                    ],
                    [
                        'id' => 3403130004,
                        'name' => "KEDUNGPOH"
                    ],
                    [
                        'id' => 3403130005,
                        'name' => "KATONGAN"
                    ],
                    [
                        'id' => 3403130006,
                        'name' => "PILANG REJO"
                    ],
                    [
                        'id' => 3403130007,
                        'name' => "NATAH"
                    ]
                ]
            ],
            [
                'district_id' => 3403140,
                'data' => [
                    [
                        'id' => 3403140001,
                        'name' => "WATU SIGAR"
                    ],
                    [
                        'id' => 3403140002,
                        'name' => "BEJI"
                    ],
                    [
                        'id' => 3403140003,
                        'name' => "KAMPUNG"
                    ],
                    [
                        'id' => 3403140004,
                        'name' => "JURANG JERO"
                    ],
                    [
                        'id' => 3403140005,
                        'name' => "SAMBIREJO"
                    ],
                    [
                        'id' => 3403140006,
                        'name' => "TANCEP"
                    ]
                ]
            ],
            [
                'district_id' => 3403150,
                'data' => [
                    [
                        'id' => 3403150001,
                        'name' => "KALITEKUK"
                    ],
                    [
                        'id' => 3403150002,
                        'name' => "KEMEJING"
                    ],
                    [
                        'id' => 3403150003,
                        'name' => "SEMIN"
                    ],
                    [
                        'id' => 3403150004,
                        'name' => "PUNDUNG SARI"
                    ],
                    [
                        'id' => 3403150005,
                        'name' => "KARANG SARI"
                    ],
                    [
                        'id' => 3403150006,
                        'name' => "REJOSARI"
                    ],
                    [
                        'id' => 3403150007,
                        'name' => "BULUREJO"
                    ],
                    [
                        'id' => 3403150009,
                        'name' => "SUMBERREJO"
                    ],
                    [
                        'id' => 3403150010,
                        'name' => "CANDI REJO"
                    ]
                ]
            ],
            [
                'district_id' => 3404010,
                'data' => [
                    [
                        'id' => 3404010001,
                        'name' => "SUMBERRAHAYU"
                    ],
                    [
                        'id' => 3404010002,
                        'name' => "SUMBERSARI"
                    ],
                    [
                        'id' => 3404010003,
                        'name' => "SUMBER AGUNG"
                    ],
                    [
                        'id' => 3404010004,
                        'name' => "SUMBERARUM"
                    ]
                ]
            ],
            [
                'district_id' => 3404020,
                'data' => [
                    [
                        'id' => 3404020001,
                        'name' => "SENDANG MULYO"
                    ],
                    [
                        'id' => 3404020002,
                        'name' => "SENDANG ARUM"
                    ],
                    [
                        'id' => 3404020003,
                        'name' => "SENDANG REJO"
                    ],
                    [
                        'id' => 3404020004,
                        'name' => "SENDANGSARI"
                    ],
                    [
                        'id' => 3404020005,
                        'name' => "SENDANGAGUNG"
                    ]
                ]
            ],
            [
                'district_id' => 3404030,
                'data' => [
                    [
                        'id' => 3404030001,
                        'name' => "MARGOLUWIH"
                    ],
                    [
                        'id' => 3404030002,
                        'name' => "MARGODADI"
                    ],
                    [
                        'id' => 3404030003,
                        'name' => "MARGOMULYO"
                    ],
                    [
                        'id' => 3404030004,
                        'name' => "MARGOAGUNG"
                    ],
                    [
                        'id' => 3404030005,
                        'name' => "MARGOKATON"
                    ]
                ]
            ],
            [
                'district_id' => 3404040,
                'data' => [
                    [
                        'id' => 3404040001,
                        'name' => "SIDOREJO"
                    ],
                    [
                        'id' => 3404040002,
                        'name' => "SIDOLUHUR"
                    ],
                    [
                        'id' => 3404040003,
                        'name' => "SIDOMULYO"
                    ],
                    [
                        'id' => 3404040004,
                        'name' => "SIDOAGUNG"
                    ],
                    [
                        'id' => 3404040005,
                        'name' => "SIDOKARTO"
                    ],
                    [
                        'id' => 3404040006,
                        'name' => "SIDOARUM"
                    ],
                    [
                        'id' => 3404040007,
                        'name' => "SIDOMOYO"
                    ]
                ]
            ],
            [
                'district_id' => 3404050,
                'data' => [
                    [
                        'id' => 3404050001,
                        'name' => "BALECATUR"
                    ],
                    [
                        'id' => 3404050002,
                        'name' => "AMBARKETAWANG"
                    ],
                    [
                        'id' => 3404050003,
                        'name' => "BANYURADEN"
                    ],
                    [
                        'id' => 3404050004,
                        'name' => "NOGOTIRTO"
                    ],
                    [
                        'id' => 3404050005,
                        'name' => "TRIHANGGO"
                    ]
                ]
            ],
            [
                'district_id' => 3404060,
                'data' => [
                    [
                        'id' => 3404060001,
                        'name' => "TIRTOADI"
                    ],
                    [
                        'id' => 3404060002,
                        'name' => "SUMBERADI"
                    ],
                    [
                        'id' => 3404060003,
                        'name' => "TLOGOADI"
                    ],
                    [
                        'id' => 3404060004,
                        'name' => "SENDANGADI"
                    ],
                    [
                        'id' => 3404060005,
                        'name' => "SINDUADI"
                    ]
                ]
            ],
            [
                'district_id' => 3404070,
                'data' => [
                    [
                        'id' => 3404070001,
                        'name' => "CATUR TUNGGAL"
                    ],
                    [
                        'id' => 3404070002,
                        'name' => "MAGUWOHARJO"
                    ],
                    [
                        'id' => 3404070003,
                        'name' => "CONDONG CATUR"
                    ]
                ]
            ],
            [
                'district_id' => 3404080,
                'data' => [
                    [
                        'id' => 3404080001,
                        'name' => "SENDANG TIRTO"
                    ],
                    [
                        'id' => 3404080002,
                        'name' => "TEGAL TIRTO"
                    ],
                    [
                        'id' => 3404080003,
                        'name' => "JOGO TIRTO"
                    ],
                    [
                        'id' => 3404080004,
                        'name' => "KALI TIRTO"
                    ]
                ]
            ],
            [
                'district_id' => 3404090,
                'data' => [
                    [
                        'id' => 3404090001,
                        'name' => "SUMBER HARJO"
                    ],
                    [
                        'id' => 3404090002,
                        'name' => "WUKIR HARJO"
                    ],
                    [
                        'id' => 3404090003,
                        'name' => "GAYAM HARJO"
                    ],
                    [
                        'id' => 3404090004,
                        'name' => "SAMBI REJO"
                    ],
                    [
                        'id' => 3404090005,
                        'name' => "MADU REJO"
                    ],
                    [
                        'id' => 3404090006,
                        'name' => "BOKO HARJO"
                    ]
                ]
            ],
            [
                'district_id' => 3404100,
                'data' => [
                    [
                        'id' => 3404100001,
                        'name' => "PURWO MARTANI"
                    ],
                    [
                        'id' => 3404100002,
                        'name' => "TIRTO MARTANI"
                    ],
                    [
                        'id' => 3404100003,
                        'name' => "TAMAN MARTANI"
                    ],
                    [
                        'id' => 3404100004,
                        'name' => "SELO MARTANI"
                    ]
                ]
            ],
            [
                'district_id' => 3404110,
                'data' => [
                    [
                        'id' => 3404110001,
                        'name' => "WEDOMARTANI"
                    ],
                    [
                        'id' => 3404110002,
                        'name' => "UMBULMARTANI"
                    ],
                    [
                        'id' => 3404110003,
                        'name' => "WIDODO MARTANI"
                    ],
                    [
                        'id' => 3404110004,
                        'name' => "BIMO MARTANI"
                    ],
                    [
                        'id' => 3404110005,
                        'name' => "SINDUMARTANI"
                    ]
                ]
            ],
            [
                'district_id' => 3404120,
                'data' => [
                    [
                        'id' => 3404120001,
                        'name' => "SARI HARJO"
                    ],
                    [
                        'id' => 3404120002,
                        'name' => "SINDUHARJO"
                    ],
                    [
                        'id' => 3404120003,
                        'name' => "MINOMARTANI"
                    ],
                    [
                        'id' => 3404120004,
                        'name' => "SUKO HARJO"
                    ],
                    [
                        'id' => 3404120005,
                        'name' => "SARDONOHARJO"
                    ],
                    [
                        'id' => 3404120006,
                        'name' => "DONOHARJO"
                    ]
                ]
            ],
            [
                'district_id' => 3404130,
                'data' => [
                    [
                        'id' => 3404130001,
                        'name' => "CATUR HARJO"
                    ],
                    [
                        'id' => 3404130002,
                        'name' => "TRIHARJO"
                    ],
                    [
                        'id' => 3404130003,
                        'name' => "TRIDADI"
                    ],
                    [
                        'id' => 3404130004,
                        'name' => "PANDOWO HARJO"
                    ],
                    [
                        'id' => 3404130005,
                        'name' => "TRI MULYO"
                    ]
                ]
            ],
            [
                'district_id' => 3404140,
                'data' => [
                    [
                        'id' => 3404140001,
                        'name' => "BANYU REJO"
                    ],
                    [
                        'id' => 3404140002,
                        'name' => "TAMBAK REJO"
                    ],
                    [
                        'id' => 3404140003,
                        'name' => "SUMBER REJO"
                    ],
                    [
                        'id' => 3404140004,
                        'name' => "PONDOK REJO"
                    ],
                    [
                        'id' => 3404140005,
                        'name' => "MORO REJO"
                    ],
                    [
                        'id' => 3404140006,
                        'name' => "MARGO REJO"
                    ],
                    [
                        'id' => 3404140007,
                        'name' => "LUMBUNG REJO"
                    ],
                    [
                        'id' => 3404140008,
                        'name' => "MERDIKO REJO"
                    ]
                ]
            ],
            [
                'district_id' => 3404150,
                'data' => [
                    [
                        'id' => 3404150001,
                        'name' => "BANGUN KERTO"
                    ],
                    [
                        'id' => 3404150002,
                        'name' => "DONOKERTO"
                    ],
                    [
                        'id' => 3404150003,
                        'name' => "GIRI KERTO"
                    ],
                    [
                        'id' => 3404150004,
                        'name' => "WONO KERTO"
                    ]
                ]
            ],
            [
                'district_id' => 3404160,
                'data' => [
                    [
                        'id' => 3404160001,
                        'name' => "PURWO BINANGUN"
                    ],
                    [
                        'id' => 3404160002,
                        'name' => "CANDI BINANGUN"
                    ],
                    [
                        'id' => 3404160003,
                        'name' => "HARJO BINANGUN"
                    ],
                    [
                        'id' => 3404160004,
                        'name' => "PAKEM BINANGUN"
                    ],
                    [
                        'id' => 3404160005,
                        'name' => "HARGO BINANGUN"
                    ]
                ]
            ],
            [
                'district_id' => 3404170,
                'data' => [
                    [
                        'id' => 3404170001,
                        'name' => "WUKIR SARI"
                    ],
                    [
                        'id' => 3404170002,
                        'name' => "ARGO MULYO"
                    ],
                    [
                        'id' => 3404170003,
                        'name' => "GLAGAH HARJO"
                    ],
                    [
                        'id' => 3404170004,
                        'name' => "KEPUH HARJO"
                    ],
                    [
                        'id' => 3404170005,
                        'name' => "UMBUL HARJO"
                    ]
                ]
            ],
            [
                'district_id' => 3471010,
                'data' => [
                    [
                        'id' => 3471010001,
                        'name' => "GEDONGKIWO"
                    ],
                    [
                        'id' => 3471010002,
                        'name' => "SURYODININGRATAN"
                    ],
                    [
                        'id' => 3471010003,
                        'name' => "MANTRIJERON"
                    ]
                ]
            ],
            [
                'district_id' => 3471020,
                'data' => [
                    [
                        'id' => 3471020001,
                        'name' => "PATEHAN"
                    ],
                    [
                        'id' => 3471020002,
                        'name' => "PANEMBAHAN"
                    ],
                    [
                        'id' => 3471020003,
                        'name' => "KADIPATEN"
                    ]
                ]
            ],
            [
                'district_id' => 3471030,
                'data' => [
                    [
                        'id' => 3471030001,
                        'name' => "BRONTOKUSUMAN"
                    ],
                    [
                        'id' => 3471030002,
                        'name' => "KEPARAKAN"
                    ],
                    [
                        'id' => 3471030003,
                        'name' => "WIROGUNAN"
                    ]
                ]
            ],
            [
                'district_id' => 3471040,
                'data' => [
                    [
                        'id' => 3471040001,
                        'name' => "GIWANGAN"
                    ],
                    [
                        'id' => 3471040002,
                        'name' => "SOROSUTAN"
                    ],
                    [
                        'id' => 3471040003,
                        'name' => "PANDEYAN"
                    ],
                    [
                        'id' => 3471040004,
                        'name' => "WARUNGBOTO"
                    ],
                    [
                        'id' => 3471040005,
                        'name' => "TAHUNAN"
                    ],
                    [
                        'id' => 3471040006,
                        'name' => "MUJA MUJU"
                    ],
                    [
                        'id' => 3471040007,
                        'name' => "SEMAKI"
                    ]
                ]
            ],
            [
                'district_id' => 3471050,
                'data' => [
                    [
                        'id' => 3471050001,
                        'name' => "PRENGGAN"
                    ],
                    [
                        'id' => 3471050002,
                        'name' => "PURBAYAN"
                    ],
                    [
                        'id' => 3471050003,
                        'name' => "REJOWINANGUN"
                    ]
                ]
            ],
            [
                'district_id' => 3471060,
                'data' => [
                    [
                        'id' => 3471060001,
                        'name' => "BACIRO"
                    ],
                    [
                        'id' => 3471060002,
                        'name' => "DEMANGAN"
                    ],
                    [
                        'id' => 3471060003,
                        'name' => "KLITREN"
                    ],
                    [
                        'id' => 3471060004,
                        'name' => "KOTABARU"
                    ],
                    [
                        'id' => 3471060005,
                        'name' => "TERBAN"
                    ]
                ]
            ],
            [
                'district_id' => 3471070,
                'data' => [
                    [
                        'id' => 3471070001,
                        'name' => "SURYATMAJAN"
                    ],
                    [
                        'id' => 3471070002,
                        'name' => "TEGAL PANGGUNG"
                    ],
                    [
                        'id' => 3471070003,
                        'name' => "BAUSASRAN"
                    ]
                ]
            ],
            [
                'district_id' => 3471080,
                'data' => [
                    [
                        'id' => 3471080001,
                        'name' => "PURWO KINANTI"
                    ]
                ]
            ],
            [
                'district_id' => 3471090,
                'data' => [
                    [
                        'id' => 3471090001,
                        'name' => "PRAWIRODIRJAN"
                    ],
                    [
                        'id' => 3471090002,
                        'name' => "NGUPASAN"
                    ]
                ]
            ],
            [
                'district_id' => 3471100,
                'data' => [
                    [
                        'id' => 3471100001,
                        'name' => "NOTOPRAJAN"
                    ],
                    [
                        'id' => 3471100002,
                        'name' => "NGAMPILAN"
                    ]
                ]
            ],
            [
                'district_id' => 3471110,
                'data' => [
                    [
                        'id' => 3471110001,
                        'name' => "PATANGPULUHAN"
                    ],
                    [
                        'id' => 3471110002,
                        'name' => "WIROBRAJAN"
                    ],
                    [
                        'id' => 3471110003,
                        'name' => "PAKUNCEN"
                    ]
                ]
            ],
            [
                'district_id' => 3471120,
                'data' => [
                    [
                        'id' => 3471120001,
                        'name' => "PRINGGOKUSUMAN"
                    ],
                    [
                        'id' => 3471120002,
                        'name' => "SOSROMENDURAN"
                    ]
                ]
            ],
            [
                'district_id' => 3471130,
                'data' => [
                    [
                        'id' => 3471130001,
                        'name' => "BUMIJO"
                    ],
                    [
                        'id' => 3471130002,
                        'name' => "GOWONGAN"
                    ],
                    [
                        'id' => 3471130003,
                        'name' => "COKRODININGRATAN"
                    ]
                ]
            ],
            [
                'district_id' => 3471140,
                'data' => [
                    [
                        'id' => 3471140001,
                        'name' => "TEGALREJO"
                    ],
                    [
                        'id' => 3471140003,
                        'name' => "KRICAK"
                    ],
                    [
                        'id' => 3471140004,
                        'name' => "KARANGWARU"
                    ]
                ]
            ]
        ];

        foreach($data as $item){
            foreach($item['data'] as $village){
                Village::create([
                    'id' => $village['id'],
                    'district_id' => $item['district_id'],
                    'name' => ucwords(strtolower($village['name']))
                ]);
            }
        }
    }
}
