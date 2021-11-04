<?php

namespace App\Exports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ServiceExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {

        return [
            'ID',
            'TITLE',
            'DESCRIPTION',
        ];
    }
    public function collection()
    {
        //
        return Service::all(['id','title','description']);
    }
}
