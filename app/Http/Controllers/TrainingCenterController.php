<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingCenter;

class TrainingCenterController extends Controller
{
    public function index()
    {
        $training_centers = TrainingCenter::all();

        return view('Trainig_Center.create', compact('training_centers'));
    }

    public function create()
    {
        $training_centers = TrainingCenter::all();

        return view('Trainig_Center.create', compact('training_centers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        TrainingCenter::create($data);

        return redirect()
            ->route('training_center.create')
            ->with('success', 'Centro de formación creado correctamente.');
    }

    public function show(TrainingCenter $training_center)
    {
        return view('Trainig_Center.show', compact('training_center'));
    }

    public function edit(TrainingCenter $training_center)
    {
        return view('Trainig_Center.edit', compact('training_center'));
    }

    public function update(Request $request, TrainingCenter $training_center)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $training_center->update($data);

        return redirect()
            ->route('training_center.create')
            ->with('success', 'Centro de formación actualizado correctamente.');
    }

    public function destroy(TrainingCenter $training_center)
    {
        $training_center->delete();

        return redirect()
            ->route('training_center.create')
            ->with('success', 'Centro de formación eliminado correctamente.');
    }
}