<?php

namespace App\Exports;

use App\Models\TaxTaskProject;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportTasksCustomers implements FromCollection, WithHeadings, WithStyles, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return TaxTaskProject::with(['user', 'admin', 'project', 'customer'])->get();
    }

    public function headings(): array
    {
        // Get the column names from the database table
        $columns = Schema::getColumnListing('tax_task_projects');

        // Optionally, you can customize or format the headings as needed
        $formattedHeadings = array_map('ucfirst', $columns);

        // Replace 'customer_id' with 'Customer Name' in the headings
        $key = array_search('Customer_id', $formattedHeadings);
        if ($key !== false) {
            $formattedHeadings[$key] = 'Customer Name';
        }

        // Add custom headings for customer SSN and phone number
        $formattedHeadings[] = 'Customer SSN';
        $formattedHeadings[] = 'Customer Phone Number';

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
     * @param \App\Models\TaxTaskProject $task
     * @return array
     */
    public function map($task): array
    {
        // Map all original fields from TaxTaskProject
        $originalFields = [
            $task->id,
            optional($task->customer)->user_name ?? 'N/A', // Replace customer_id with customer name
            $task->task_id,
            $task->description,
            $task->comment,
            $task->assign_date,
            $task->completion_date,
            optional($task->user)->name ?? 'N/A', // 'user' is the relationship method for 'assigned_by'
            optional($task->admin)->name ?? 'N/A', // 'admin' is the relationship method for 'assign_to'
            optional($task->project)->project_name ?? 'N/A', // 'project' is the relationship method for 'project_list'
            $task->hyperlinks,
            $task->priority,
            $task->status,
            $task->tax_year,
            $task->eSignature,
            $task->ef_status,
            $task->logged_in_user,
            $task->created_at,
            $task->updated_at,
        ];

        // Add related fields
        $relatedFields = [
            optional($task->customer)->ssn ?? 'N/A',
            optional($task->customer)->personal_phone ?? 'N/A',
        ];

        return array_merge($originalFields, $relatedFields);
    }
}
