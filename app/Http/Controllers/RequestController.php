<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;
use App\Models\leave_request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $leave_requests = leave_request::orderByDesc('id')->paginate(10);
        return view('requests.index', compact('leave_requests','user'));
    }

    public function create()
    {
        $leaveTypes = new LeaveType();
        return view('requests.create', compact('leaveTypes'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        // Store data to database
        LeaveType::create([
            'name' => $request->name,
        ]);

        // Redirect the user
        return redirect()->route('request.index')->with('msg', 'New Type created successfully');
    }

    public function edit($id)
    {
        $leave_request = leave_request::find($id);
        return view('requests.edit', compact('leave_request'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'reason' => 'nullable',
        ]);

        $leave_request = leave_request::find($id);

        // Store data to database
        $leave_request->update([
            'status' => $request->status,
            'reason' => $request->reason,
        ]);

        // Redirect the user
        return redirect()->route('request.index')->with('msg', 'Response updated successfully');
    }

    public function typeEdit($id)
    {
        $leaveTypes = LeaveType::find($id);
        return view('requests.typeEdit', compact('leaveTypes'));
    }

    public function type()
    {
        $leaveTypes = LeaveType::all();
        return view('requests.show', compact('leaveTypes'));
    }
    public function type_edit_Update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $leaveTypes = LeaveType::find($id);

        // Store data to database
        $leaveTypes->update([
            'name' => $request->name,
        ]);

        // Redirect the user
        return redirect()->route('request.type')->with('msg', 'updated type  successfully');
    }

    public function delete($id){
        LeaveType::destroy($id);
        return redirect()->back()->with('msg', 'Type deleted successfully');
    }
    public function type_trash(){
        $leaveTypes = LeaveType::onlyTrashed()->orderByDesc('id')->get();
        return view('requests.typetrash', compact('leaveTypes'));
    }
    public function type_restore($id)
    {
        LeaveType::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with('msg', 'User Restor successfully');
    }

    public function type_forcedelete($id)
    {
        LeaveType::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('msg', 'User deleted successfully');
    }

}
