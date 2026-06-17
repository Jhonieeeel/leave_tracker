<?php

namespace App\Actions\Leave;

use App\Data\LeaveData;
use App\Models\Leave;
use Illuminate\Validation\ValidationException;

class RecordFileLeave
{
    public function __invoke(LeaveData $data): Leave
    {
        $leaveBalance = Leave::query()
            ->where('user_id', $data->user_id)
            ->where('leave_type', $data->leave_type)
            ->sum('balance');

        if ($data->balance > $leaveBalance) {
            throw ValidationException::withMessages(
                ['balance' => "You dont have enought balance $data->leave_type"]
            );
        }

        return Leave::create($data->toArray());
    }
}
