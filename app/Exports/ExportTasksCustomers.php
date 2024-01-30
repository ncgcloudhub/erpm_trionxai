<?php

namespace App\Exports;

use App\Models\TaxTaskProject;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportTasksCustomers implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return TaxTaskProject::all();
    }

    public function headings(): array
    {
        // Get the column names from the database table
        $columns = Schema::getColumnListing('tax_task_projects');

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

    /**
     * @param TaxTaskProject $task
     * @return array
     */
    public function map($task): array
    {
        // Fetch related names instead of IDs
        return [
            optional($task->user)->name,  // 'user' is the relationship method for 'assigned_by'
            optional($task->admin)->name, // 'admin' is the relationship method for 'assign_to'
            optional($task->project)->project_name,// 'project' is the relationship method for 'project_list'
           
        ];
    }
}
