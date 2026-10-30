<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\teacher;
use App\Models\TrainingCenter;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return redirect()->route('teacher.create');
    }

    public function show(string $id)
    {
        $teacher = teacher::with(['area', 'trainingCenter'])->findOrFail($id);

        return view('Teacher.show', compact('teacher'));
    }

    public function create()
    {
        $teachers = teacher::with(['area', 'trainingCenter'])->get();
        $areas = Area::all();
        $training_centers = TrainingCenter::all();

        return view('Teacher.create', compact('teachers', 'areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'area_id' => ['required', 'exists:area,id'],
            'training_center_id' => ['required', 'exists:training_center,id'],
        ]);

        teacher::create($data);

        return redirect()->route('teacher.create')->with('success', 'Instructor registrado correctamente.');
    }

    public function edit(string $id)
    {
        $teacher = teacher::findOrFail($id);
        $areas = Area::all();
        $training_centers = TrainingCenter::all();

        return view('Teacher.edit', compact('teacher', 'areas', 'training_centers'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'area_id' => ['required', 'exists:area,id'],
            'training_center_id' => ['required', 'exists:training_center,id'],
        ]);

        teacher::findOrFail($id)->update($data);

        return redirect()->route('teacher.create')->with('success', 'Instructor actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        teacher::findOrFail($id)->delete();

        return redirect()->route('teacher.create')->with('success', 'Instructor eliminado correctamente.');
    }
}
