<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\WorkTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkTimeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'monday_in' => 'nullable|date_format:H:i',
            'monday_out' => 'nullable|date_format:H:i',
            'tuesday_in' => 'nullable|date_format:H:i',
            'tuesday_out' => 'nullable|date_format:H:i',
            'wednesday_in' => 'nullable|date_format:H:i',
            'wednesday_out' => 'nullable|date_format:H:i',
            'thursday_in' => 'nullable|date_format:H:i',
            'thursday_out' => 'nullable|date_format:H:i',
            'friday_in' => 'nullable|date_format:H:i',
            'friday_out' => 'nullable|date_format:H:i',
            'saturday_in' => 'nullable|date_format:H:i',
            'saturday_out' => 'nullable|date_format:H:i',
            'sunday_in' => 'nullable|date_format:H:i',
            'sunday_out' => 'nullable|date_format:H:i',
        ]);

        $company = Company::findOrFail($request->company_id);
        $workTime = $company->workTimes ?? new WorkTime;

        $workTime->monday = $request->monday_in . '-' . $request->monday_out;
        $workTime->tuesday = $request->tuesday_in . '-' . $request->tuesday_out;
        $workTime->wednesday = $request->wednesday_in . '-' . $request->wednesday_out;
        $workTime->thursday = $request->thursday_in . '-' . $request->thursday_out;
        $workTime->friday = $request->friday_in . '-' . $request->friday_out;
        $workTime->saturday = $request->saturday_in . '-' . $request->saturday_out;
        $workTime->sunday = $request->sunday_in . '-' . $request->sunday_out;

        $workTime->company_id = $company->id;

        $workTime->save();

        $company->workTimes()->save($workTime);

        return redirect()->back()->with('success', 'Jam kerja berhasil diperbarui.');
    }
}
