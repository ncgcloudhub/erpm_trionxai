<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Customer::all();

        return Customer::select('company_name','user_name','email','office_phone','personal_phone','address','city')->get();
    }
}
