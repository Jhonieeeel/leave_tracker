<?php

namespace App\Actions\Leave;

use App\Data\LeaveData;
use App\Models\Leave;

class RecordMonthlyAccrual
{
    public function __invoke(LeaveData $data): void
    {
        $this->vacationLeave($data);
        $this->sickLeave($data);
    }

    private function vacationLeave(LeaveData $data): Leave
    {
        return Leave::create([
            'user_id'    => $data->user_id,
            'leave_type' => 'vacation leave',
            'event_type' => 'accrual',
            'balance'    => 1.25,
            'event_tag'  => null,
            'starts_at'  => $data->starts_at,
            'ends_at'    => $data->ends_at
        ]);
    }

    private function sickLeave(LeaveData $data): Leave
    {
        return Leave::create([
            'user_id'    => $data->user_id,
            'leave_type' => 'sick leave',
            'event_type' => 'accrual',
            'balance'    => 1.25,
            'event_tag'  => null,
            'starts_at'  => $data->starts_at,
            'ends_at'    => $data->ends_at
        ]);
    }
}
