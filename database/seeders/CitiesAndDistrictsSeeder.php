<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesAndDistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Örnek iller
        $cities = [
            ['name' => 'Antalya', 'code' => '07'],
            ['name' => 'İstanbul', 'code' => '34'],
            ['name' => 'Ankara', 'code' => '06'],
            ['name' => 'İzmir', 'code' => '35'],
            ['name' => 'Bursa', 'code' => '16'],
        ];

        DB::table('cities')->insert($cities);

        // Örnek ilçeler
        $districts = [
            // Antalya'nın ilçeleri
            ['city_id' => 1, 'name' => 'Muratpaşa', 'code' => '01'],
            ['city_id' => 1, 'name' => 'Konyaaltı', 'code' => '02'],
            ['city_id' => 1, 'name' => 'Kepez', 'code' => '03'],
            ['city_id' => 1, 'name' => 'Alanya', 'code' => '04'],
            ['city_id' => 1, 'name' => 'Manavgat', 'code' => '05'],
            
            // İstanbul'un ilçeleri
            ['city_id' => 2, 'name' => 'Kadıköy', 'code' => '01'],
            ['city_id' => 2, 'name' => 'Beşiktaş', 'code' => '02'],
            ['city_id' => 2, 'name' => 'Üsküdar', 'code' => '03'],
            ['city_id' => 2, 'name' => 'Fatih', 'code' => '04'],
            ['city_id' => 2, 'name' => 'Bakırköy', 'code' => '05'],
            
            // Ankara'nın ilçeleri
            ['city_id' => 3, 'name' => 'Çankaya', 'code' => '01'],
            ['city_id' => 3, 'name' => 'Keçiören', 'code' => '02'],
            ['city_id' => 3, 'name' => 'Yenimahalle', 'code' => '03'],
            ['city_id' => 3, 'name' => 'Mamak', 'code' => '04'],
            ['city_id' => 3, 'name' => 'Etimesgut', 'code' => '05'],
            
            // İzmir'in ilçeleri
            ['city_id' => 4, 'name' => 'Konak', 'code' => '01'],
            ['city_id' => 4, 'name' => 'Karşıyaka', 'code' => '02'],
            ['city_id' => 4, 'name' => 'Bornova', 'code' => '03'],
            ['city_id' => 4, 'name' => 'Buca', 'code' => '04'],
            ['city_id' => 4, 'name' => 'Çiğli', 'code' => '05'],
            
            // Bursa'nın ilçeleri
            ['city_id' => 5, 'name' => 'Osmangazi', 'code' => '01'],
            ['city_id' => 5, 'name' => 'Nilüfer', 'code' => '02'],
            ['city_id' => 5, 'name' => 'Yıldırım', 'code' => '03'],
            ['city_id' => 5, 'name' => 'Mudanya', 'code' => '04'],
            ['city_id' => 5, 'name' => 'Gemlik', 'code' => '05'],
        ];

        DB::table('districts')->insert($districts);
    }
}