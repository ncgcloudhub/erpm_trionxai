<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaxCustomersImport implements ToModel, WithHeadingRow
{
    // Keep track of processed SSNs
    protected $processedSSNs = [];

    public function model(array $row)
    {

         // Remove the 'id' key from the $row array
         unset($row['id']);

        // Log the row data before the database operation
        \Log::info("Processing row: " . json_encode($row));

        // If the customer doesn't have a customer_id, generate one
        if (empty($row['customer_id'])) {
            // Generate the customer_id with the desired format
            $formattedDateTime = now()->format('ymdHis');
            $row['customer_id'] = 'C' . $formattedDateTime;
        }

        // Check if the SSN has already been processed
        if (in_array($row['ssn'], $this->processedSSNs)) {
            \Log::info("Skipping row due to duplicate SSN: " . json_encode($row));
            return null; // Skip processing this row
        }

        // Add the SSN to the processed list
        $this->processedSSNs[] = $row['ssn'];

        // Delay for 1 second
        sleep(1);

        // Check if a customer with the same SSN already exists
        $existingCustomer = Customer::where('ssn', $row['ssn'])->first();

        // If the customer with the same SSN exists, update the record; otherwise, create a new one
        if ($existingCustomer) {
            $existingCustomer->update($row);
        } else {
            Customer::create($row);
        }

        return null; // Returning null to skip the import of this row
    }
}
