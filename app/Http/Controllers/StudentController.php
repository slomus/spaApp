<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Response;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Students/Index', [
            'students' => Student::all(),
            'status' => session('status'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'min:6'],
            'last_name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'age' => ['required'],
            'description' => ['nullable', 'string'],
            'paid' => ['required'],
        ]);

        $max_index = Student::max('index');
        $max_index = $max_index ?? 1;

        Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'index' => $max_index,
            'email' => $request->email,
            'age' => $request->age,
            'description' => $request->description,
            'paid' => $request->paid,
        ]);

        return Redirect::route('students');
    }

    public function edit(Student $student): Response
    {
        return Inertia::render('Students/Edit', [
            'student' => $student,
            'isUpdating' => true
        ]);
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return Redirect::route('students');
    }

    public function set_paid(Request $request, Student $student): RedirectResponse
    {
        $validateData = $request->validate(['paid' => 'required|boolean']);

        $student->update($validateData);

        return Redirect::route('students');
    }
}
