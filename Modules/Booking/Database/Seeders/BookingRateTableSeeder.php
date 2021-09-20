<?php

namespace Modules\Booking\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Booking\Entities\BookingRate;

class BookingRateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $data = [
            [
                'name'       => 'Any',
                'rate'       => 143,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'       => 'Regular(A$143)',
                'rate'       => 143,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'       => 'Same Day 10% Extra(A$157)',
                'rate'       => 157,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'       => 'Weekends 10% Extra(A$157)',
                'rate'       => 157,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        BookingRate::insert($data);
    }
}
