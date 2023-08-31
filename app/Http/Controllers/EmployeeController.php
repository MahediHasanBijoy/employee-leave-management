<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // all employees
        $employees = User::all();

        return view('pages.employee.index', ['employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // all departments
        $departments = Department::all();

        // show create page
        return view('pages.employee.create', ['departments'=>$departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Input validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|min_digits:11|max_digits:11',
            'department' => 'required',
            'address' => 'required',
            'password' => 'required',
            'photo' => [File::image()->min('1kb')->max('500kb')],
        ]);

        // file validation
        if($request->hasFile('photo')){
            $path = $request->file('photo')->store('public/profile-pic');
            $filename = basename($path);
        }
        
        // store in database
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'department_id' => $request->input('department'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('password')),
            'photo' => $filename
        ]);

        return "saved successfully";
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
