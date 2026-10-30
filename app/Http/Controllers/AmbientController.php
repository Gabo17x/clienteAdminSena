<?php

namespace App\Http\Controllers;


use App\Models\Ambient;
use App\Models\TrainingCenter;
use App\Models\Area;
use Illuminate\Http\Request;

class AmbientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ambients = Ambient::with(['trainingCenter', 'area'])->get();
        return view('Ambients.index', compact('ambients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ambients = Ambient::with(['trainingCenter', 'area'])->get();
        $trainingCenters = TrainingCenter::all();
        $areas = Area::all();
        
        return view('Ambients.create', compact('ambients', 'trainingCenters', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|string|max:20',
            'capacity' => 'required|integer|min:1',
            'type' => 'required|in:aula,laboratorio,taller',
            'status' => 'required|in:disponible,ocupado,mantenimiento',
            'training_center_id' => 'nullable|exists:training_centers,id',
            'area_id' => 'nullable|exists:areas,id',
        ]);

        Ambient::create($data);

        return redirect()->route('ambients.create')->with('success', 'Ambiente registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ambient = Ambient::with(['trainingCenter', 'area'])->findOrFail($id);
        return view('Ambients.show', compact('ambient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ambient = Ambient::findOrFail($id);
        $trainingCenters = TrainingCenter::all();
        $areas = Area::all();

        return view('Ambients.edit', compact('ambient', 'trainingCenters', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'number' => 'required|string|max:20',
            'capacity' => 'required|integer|min:1',
            'type' => 'required|in:aula,laboratorio,taller',
            'status' => 'required|in:disponible,ocupado,mantenimiento',
            'training_center_id' => 'nullable|exists:training_centers,id',
            'area_id' => 'nullable|exists:areas,id',
        ]);

        $ambient = Ambient::findOrFail($id);
        $ambient->update($data);

        return redirect()->route('ambients.index')->with('success', 'Ambiente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ambient = Ambient::findOrFail($id);
        $ambient->delete();

        return redirect()->route('ambients.index')->with('success', 'Ambiente eliminado correctamente.');
    }
}
