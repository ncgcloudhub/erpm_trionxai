<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class TaxCustomersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'company_name'     => $row[0],
            'user_name'    => $row[1], 
            'email' => $row[2],
            'office_phone' => $row[3],
            'personal_phone' => $row[4],
            'address' => $row[5],
            'city' => $row[6],
           
        ]);
    }

}
