<?php

namespace App\Http\Controllers;

use App\Models\leave_request;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function EmployeeDashboard()
    {
        return view('employee.dashboard');
    }

    public function index()
    {
        $user = Auth::user();
        $leave_requests = leave_request::where('user_id', $user->id)->orderByDesc('id')->paginate(10);
        return view('employee.index', compact('leave_requests'));
    }

    public function create()
    {

        $leaves_request = new leave_request();
        $leaveTypes = LeaveType::all();
        return view('employee.create', compact('leaves_request', 'leaveTypes'));
    }
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'leave_type_id' => 'required',
            'start_date' => 'required',
            'duration_days' => 'required',

        ]);

        // Store data to database
        leave_request::create([
            'user_id' => Auth::user()->id,
            'leave_type_id' => $request->leave_type_id,
            'start_date' => $request->start_date,
            'duration_days' => $request->duration_days,
        ]);

        // Redirect the user
        return redirect()->route('employee.index')->with('msg', 'Created Leaves Request successfully!');
    }
}
