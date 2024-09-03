<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $student = QueryBuilder::for(Student::class)
            ->allowedFilters(['name','course','phone','email'])
            ->defaultSort('course')
            ->allowedSorts(['name', 'course','email','phone'])
            ->paginate();
        return new StudentCollection($student);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): StudentResource
    {
        /*$validated = $request->validate([
            'name' => 'required|max:255',
            'course' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|string'
        ]);*/
        $validated = $request->validated();

        $student = Student::create($validated);
        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, Student $student)
    {
        $validated = $request->validated();
        $student->update($validated);

        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return response()->noContent();
    }
}
