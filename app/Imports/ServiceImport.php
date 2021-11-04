<?php

namespace App\Imports;

use App\Models\Service;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ServiceImport implements ToModel,WithStartRow
{
    
    public function model(array $row)
    {
        return new Service([
            'title'=>$row[1],
            'description'=>$row[2],
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
