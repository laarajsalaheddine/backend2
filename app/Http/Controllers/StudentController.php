<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $students = Student::all(); // recupérer tous les enregistrements 
            // equivalente de Select * from students
            // foreach($students as $student){
            //     dump($student->name);
            // }
            // dd("hello");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        return view('students.index', ['students' => $students]);
        //  return view('students.index', compact('students'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Nouveau student vide
            // $newStudent = new Student();
            // $newStudent->name = $request->input('name');
            // $newStudent->age = $request->input('age');
            // $newStudent->email = $request->input('email');
            // $newStudent->save();

            $newStudent = [
                'name' => $request->input('name'),
                'age' => $request->input('age'),
                'email' => $request->input('email'),
            ];

            Student::create($newStudent);
            return redirect()->route('students.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $student = Student::find($id);
            // equivalent de  Select * from students where id = $id 
            // $student  = Student::findOrFail($id);

            return view('students.show', ['student' => $student]);
        } catch (Exception $e) {
            dd($e->getMessage());
            // les fichier de journalisation (logs) 
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $student = Student::find($id);
            return view('students.edit', ['student' => $student]);
        } catch (Exception $e) {
            dd($e->getMessage());
            // les fichier de journalisation (logs) 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // select depuis la bdd
            $student = Student::find($id);
            // $student->name = $request->input('name');
            // $student->age = $request->input('age');
            // $student->email = $request->input('email');
            // $student->save();

            $updatedStudent = [
                'name' => $request->input('name'),
                'age' => $request->input('age'),
                'email' => $request->input('email'),
            ];

            $student->update($updatedStudent);
            // equivalent de update students set name = ..., age=... , email=... where id = $id
            // Student::update($updatedStudent);

            return redirect()->route('students.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd("delete student id : " . $id);
        try {
            Student::destroy($id);
            return redirect()->route('students.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
