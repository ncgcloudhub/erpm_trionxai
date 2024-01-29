<?php

namespace App\Exports;

use App\Models\TaxTaskProject;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportTasksCustomers implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TaxTaskProject::all();
    }
}
