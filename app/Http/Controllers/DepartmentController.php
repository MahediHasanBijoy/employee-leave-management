<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // all departments
        $departments = Department::all();
        return view('pages.department.index', ['departments'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show create page
        return view('pages.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate input
        $request->validate([
            'name' => 'required',
        ]);

        // insert a new record
        Department::create([
            'name' => $request->name
        ]);

        // return to index page with a flush message
        return redirect()->route('department.index')->with('success', 'Department created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // find department with specified id
        $dept = Department::find($id);

        // show edit page
        return view('pages.department.edit', ['dept'=>$dept]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // input validation
        $request->validate([
            'name' => 'required',
        ]);

        // find dept record with id
        $dept = Department::find($id);

        // update record
        $dept->update([
            'name' => $request->input('name')
        ]);

        // return to index page with a flush message
        return redirect()->route('department.index')->with('success', 'Updated department successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete a record from departments
        Department::find($id)->delete();

        return redirect()->route('department.index')->with('success', 'Department deleted successfully');
    }
}
