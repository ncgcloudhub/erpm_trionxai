<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaxCustomersImport implements ToModel, WithHeadingRow
{
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

        // Ensure that the SSN is treated as a string with leading zeros
        $row['ssn'] = sprintf('%04d', $row['ssn']);

        // Handle date field (business_started) if it exists
        if (isset($row['business_started']) && !empty($row['business_started'])) {
            try {
                $row['business_started'] = \Carbon\Carbon::parse($row['business_started'])->toDateString();
            } catch (\Exception $e) {
                \Log::error("Error parsing date for row: " . json_encode($row));
                // Handle the error, log, or perform other actions as needed
            }
        }

         // Delay for 1 second
         sleep(1);

        // Create a new customer without checking for duplicates
        Customer::create($row);

        return null; // Returning null to skip the import of this row
    }
}
