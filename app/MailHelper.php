<?php

namespace App;

use App\Mail\ProjectTaskConfirmation;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;

class MailHelper
{
    public static function sendTaskEmail($assignToId, $taskName, $description, $sendMail = true)
    {
        if ($sendMail) {
            $user = Admin::findOrFail($assignToId);
            $taskDetails = [
                'assign_to_name' => $user->name,
                'task_name' => $taskName,
                'description' => $description,
            ];

            Mail::to($user->email)->send(new ProjectTaskConfirmation($taskDetails));
        }
    }
}
