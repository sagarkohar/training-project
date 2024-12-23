<?php

namespace App\Http\Controllers;

use App\Models\attendace;
use Illuminate\Http\Request;

class secondController extends Controller
{
    public function attendaceHome()
    {
        $employee = attendace::all();

        return view("attendace.attendace_home", compact("employee"));
    }

    public function addAttendace()
    {

        return view("attendace.add_attendace");
    }

    public function newAttendance(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'employee' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'date' => 'required|date',
            'in-time' => 'required|date_format:H:i',
            'out-time' => 'required|date_format:H:i',
        ]);

        try {
            // Save the attendance data
            $attendance = new attendace();
            $attendance->employee = $request->employee;
            $attendance->department = $request->department;
            $attendance->designation = $request->designation;
            $attendance->date = $request->date;
            $attendance->in_time = $request->input('in-time');
            $attendance->out_time = $request->input('out-time');
            $attendance->save();

            return response()->json(['message' => 'Attendance added successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to add attendance.', 'details' => $e->getMessage()], 500);
        }
    }


    public function deleteAttendance(Request $request)
    {


        attendace::whereIn("employee", $request['ids'])->delete();

        return response()->json(["result" => "DEL"]);
    }
}
