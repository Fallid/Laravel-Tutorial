<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10); //this is ORM of Pagination
        $employees = Employee::paginate(10);
        return view('employee', ['contacts' => $contacts, 'employees' => $employees, 'show_all' => true]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee_create',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'division' => ['required'],
            'position' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric']
        ]);

        $new_employee = Employee::create([
            'name' => $request->name,
            'division' => $request->division,
            'position' => $request->position
        ]);
        $employeeId = $new_employee->id;
        Contact::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'employee_id' => $employeeId
        ]);

        return redirect('employee');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);
        return view('employee_detail', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('employee_update', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $update_employee = Employee::find($contact->employee->id);
        $update_employee->update([
            'name' => $request->name,
            'division' => $request->division,
            'position' => $request->position
        ]);
        $contact->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'employee_id' => $contact->employee->id
        ]);
        return Redirect::route('employees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
