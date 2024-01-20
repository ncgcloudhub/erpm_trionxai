<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CustomerExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::all();

        // return Customer::select('company_name','user_name','email','office_phone','personal_phone','address','city')->get();
    }

    public function headings(): array
    {
        
        // Get the column names from the database table
        $columns = Schema::getColumnListing('customers');

        // Optionally, you can customize or format the headings as needed
        // For example, you might want to capitalize the first letter of each heading
        $formattedHeadings = array_map('ucfirst', $columns);

        return $formattedHeadings;

    }

    public function styles(Worksheet $sheet)
    {
        // Make the first row (headings) bold
        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);
    }
}
