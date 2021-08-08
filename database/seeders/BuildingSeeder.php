<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Building;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $building =[
            ['Building_name'=>'Main Campus','Address'=>'Rizal Corner Elizano Streets, Legaszpi City'],
            ['Building_name'=>'Main Office','Address'=>'2nd Floor King`s Commercial Bldg.Peñaranda St. Legazpi City'],
            ['Building_name'=>'Forbes Academy','Address'=>'Lakandula Drive, Legazpi City']
        ];
        Building::insert($building);
    }
}
