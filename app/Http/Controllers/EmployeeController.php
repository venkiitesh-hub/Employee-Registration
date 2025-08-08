<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;


class EmployeeController extends Controller
{
    public function index(Request $request)
{
    $query = Employee::query();

    if ($request->filled('firstname')) {
        $query->where('firstname', 'like', '%' . $request->firstname . '%');
    }

    if ($request->filled('lastname')) {
        $query->where('lastname', 'like', '%' . $request->lastname . '%');
    }

    if ($request->filled('email')) {
        $query->where('email', 'like', '%' . $request->email . '%');
    }

    if ($request->filled('phone')) {
        $query->where('phone', 'like', '%' . $request->phone . '%');
    }

    $sortBy = $request->get('sort_by', 'employee_id');
    $order = $request->get('order', 'asc');

    $employees = $query->orderBy($sortBy, $order)
                       ->paginate(5)
                       ->appends($request->all());

    return view('employees.index', compact('employees'));
}

    


    public function create() { return view('employees.create'); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'date_of_birth' => 'required|date',
            'education_qualification' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required',
            'photo' => 'nullable|image',
            'resume' => 'nullable|mimes:pdf,doc,docx'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');

        }
        if ($request->hasFile('resume')) {
            $data['resume'] = $request->file('resume')->store('resumes', 'public');
        }

        Employee::create($data);
        return redirect()->route('employees.index')->with('success', 'Employee added successfully');
    }

    public function show(Employee $employee) {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee) {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'date_of_birth' => 'required|date',
            'education_qualification' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:employees,email,'.$employee->employee_id.',employee_id',
            'phone' => 'required',
            'photo' => 'nullable|image',
            'resume' => 'nullable|mimes:pdf,doc,docx'
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }
        if ($request->hasFile('resume')) {
            $data['resume'] = $request->file('resume')->store('resumes', 'public');
        }

        $employee->update($data);
        return redirect()->route('employees.index')->with('success', 'Employee updated');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted');
    }

   
}
