<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warehouse::create([
            'name' => 'Main Warehouse',
            'address' => 'Okwei Street'
        ],[
            'name' => 'Woman Sense Warehouse',
            'address' => 'Frontline Main Market'
        ],[
            'name' => 'Jasmine Plaza',
            'address' => 'Opposite Mosque Onitsha Main Market'
            ]
            );

    }
}
