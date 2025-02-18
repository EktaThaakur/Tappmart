<?php

namespace App\Imports;

use App\Models\category;
use Illuminate\Container\Attributes\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CatImport implements ToCollection, WithHeadingRow, WithChunkReading
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            category::create([
                'name' => $row['name'],
                'tappsure' => $row['tappsure'],

            ]);
        } //
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
