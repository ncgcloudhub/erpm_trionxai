<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;

class UpdateNetPay extends Command
{
    protected $signature = 'update:netpay';
    protected $description = 'Update net_pay field for all employees at the beginning of each month';

    public function handle()
    {
        $employees = Employee::all();

        foreach ($employees as $employee) {
            // Assuming you want to set net_pay to the salary amount
            $employee->update(['net_pay' => $employee->salary + $employee->net_pay]);
        }

        $this->info('Net Pay updated for all employees.');
    }
}
