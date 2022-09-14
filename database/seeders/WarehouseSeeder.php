<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [[
            'name' => 'Main Warehouse',
            'address' => 'Okwei Street',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'name' => 'Woman Sense Warehouse',
            'address' => 'Frontline Main Market',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'name' => 'Jasmine Plaza',
            'address' => 'Opposite Mosque Onitsha Main Market',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]];

        DB::table('warehouses')->insert($items);

    }
}
