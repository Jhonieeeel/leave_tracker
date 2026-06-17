<?php

namespace App\Actions\Leave;

use App\Data\LeaveData;
use App\Models\Leave;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class RecordDeductionTime
{
    public function __invoke(LeaveData $data): Leave
    {
        $starts_at = Carbon::parse($data->starts_at);
        $ends_at   = Carbon::parse($data->ends_at);
        $minutes   = $starts_at->diffInMinutes($ends_at);

        if ($minutes > 0) {
            throw ValidationException::withMessages(
                ['balance' => 'Invalid leave amount or Please select a valid leave duration']
            );
        }

        return Leave::create($data->toArray());
    }
}
