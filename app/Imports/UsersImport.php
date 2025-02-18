<?php

namespace App\Imports;

use App\Models\MasterPincode;
use App\Models\User;
// use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use App\Imports\Rules\Password;
use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Support\Facades\Password as FacadesPassword;
// use Illuminate\Validation\Rules\Password as RulesPassword;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Log;

class UsersImport implements ToCollection, WithHeadingRow, ShouldQueue, WithChunkReading
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // dd($collection);
        Log::info('Processing collection', ['collection' => $collection]);

        foreach ($collection as $row) {
            // dd($row);
            $user = User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'address' => $row['address'],
                'IR-Code' => $row['ir_code'],
                'password' => Hash::make($row['password']),
            ]);

            // Convert comma-separated pincodes to an array and remove empty spaces
            $pincodeArray = array_map('trim', explode(',', $row['pincodes']));
            // dd($pincodeArray);
            // Fetch valid pincode IDs from the database
            $validPincodeIds = MasterPincode::whereIn('pincodes', $pincodeArray)->pluck('id')->toArray();
            // Attach multiple pincodes to the user
            if (!empty($validPincodeIds)) {
                $user->pincodes()->attach($validPincodeIds);
            }
            // dd($row['category']);

            $user->categories()->attach(explode(',', $row['category']));
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
