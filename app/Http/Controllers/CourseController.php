<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Computer;
use App\Models\course;
use App\Models\TrainingCenter;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return redirect()->route('course.create');
    }

    public function show(string $id)
    {
        $course = course::with(['area', 'trainingCenter'])->findOrFail($id);

        return view('Courses.show', compact('course'));
    }

    public function create()
    {
        $courses = course::with(['area', 'trainingCenter'])->get();
        $areas = Area::all();
        $training_centers = TrainingCenter::all();

        return view('Courses.create', compact('courses', 'areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_number' => ['required', 'string', 'max:255'],
            'day' => ['required', 'string', 'max:255'],
            'area_id' => ['required', 'exists:area,id'],
            'training_center_id' => ['required', 'exists:training_center,id'],
        ]);

        course::create($data);

        return redirect()->route('course.create')->with('success', 'Curso registrado correctamente.');
    }

    public function edit(string $id)
    {
        $course = course::findOrFail($id);
        $areas = Area::all();
        $training_centers = TrainingCenter::all();

        return view('Courses.edit', compact('course', 'areas', 'training_centers'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'course_number' => ['required', 'string', 'max:255'],
            'day' => ['required', 'string', 'max:255'],
            'area_id' => ['required', 'exists:area,id'],
            'training_center_id' => ['required', 'exists:training_center,id'],
        ]);

        course::findOrFail($id)->update($data);

        return redirect()->route('course.create')->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        course::findOrFail($id)->delete();

        return redirect()->route('course.create')->with('success', 'Curso eliminado correctamente.');
    }
}
