<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\MasterPincode;
use App\Models\State;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityStateseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = \Illuminate\Support\Facades\File::get("database/data/states.json");
        $data = json_decode($json);
        foreach ($data as $state) {
            State::updateOrCreate([
                'name' => $state->name,

            ]);
        }

        $json = \Illuminate\Support\Facades\File::get("database/data/districts.json");
        $data = json_decode($json);
        foreach ($data as $city) {
            City::updateOrCreate([
                'name' => $city->name,
                'state_id' => $city->state_id,
            ]);
        }

        $json = \Illuminate\Support\Facades\File::get("database/data/pin_codes.json");
        $data = json_decode($json);
        foreach ($data as $pincode) {
            MasterPincode::updateOrCreate([
                'pincodes' => $pincode->pin_code,
                'city_id' => $pincode->district_id
            ]);
            //
        }
    }
}
