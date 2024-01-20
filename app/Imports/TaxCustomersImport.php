<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaxCustomersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new Customer([
    //         'company_name'     => $row[0],
    //         'user_name'    => $row[1], 
    //         'email' => $row[2],
    //         'office_phone' => $row[3],
    //         'personal_phone' => $row[4],
    //         'address' => $row[5],
    //         'city' => $row[6],
           
    //     ]);
    // }

public function model(array $row)
    {
        // Use the delay function to wait for 1 seconds before processing each row
        sleep(1);

        // Generate the customer_id with the desired format
        $formattedDateTime = now()->format('ymdHis');
        $row['customer_id'] = 'C' . $formattedDateTime;

        // Check if a customer with the same personal_phone already exists
        $existingCustomer = Customer::where('personal_phone', $row['personal_phone'])->first();

        // If the customer doesn't exist, create a new one
        if (!$existingCustomer) {
            return new Customer($row);
        }

        // Check if any fields have changed
        $changes = array_diff_assoc($row, $existingCustomer->toArray());

        // If there are changes, update the existing customer
        if (!empty($changes)) {
            $existingCustomer->update($row);
        }

        // Return null to skip the import of this row
        return null;
    }

}
