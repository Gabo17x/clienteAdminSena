<?php

namespace App\Http\Controllers;

use App\Models\apprentice;
use App\Models\Computer;
use App\Models\course;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    public function index()
    {
        return redirect()->route('apprentice.create');
    }

    public function show(string $id)
    {
        $apprentice = apprentice::findOrFail($id);

        return view('Apprentice.show', compact('apprentice'));
    }

    public function create()
    {
        $apprentices = apprentice::with(['course', 'computer'])->get();
        $courses = course::all();
        $computers = Computer::all();

        return view('Apprentice.create', compact('apprentices', 'courses', 'computers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'course_id' => ['nullable', 'exists:courses,id'],
            'computer_id' => ['nullable', 'exists:computer,id'],
        ]);

        apprentice::create($data);

        return redirect()->route('apprentice.create')->with('success', 'Aprendiz registrado correctamente.');
    }

    public function edit(string $id)
    {
        $apprentice = apprentice::findOrFail($id);
        $courses = course::all();
        $computers = Computer::all();

        return view('Apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'course_id' => ['nullable', 'exists:courses,id'],
            'computer_id' => ['nullable', 'exists:computer,id'],
        ]);

        $apprentice = apprentice::findOrFail($id);
        $apprentice->update($data);

        return redirect()->route('apprentice.create')->with('success', 'Aprendiz actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        apprentice::findOrFail($id)->delete();

        return redirect()->route('apprentice.create')->with('success', 'Aprendiz eliminado correctamente.');
    }
}