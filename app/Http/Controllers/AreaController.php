<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('Area.index', compact('areas'));
    }

    public function create()
    {
        $areas = Area::all();

        return view('Area.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Area::create($data);

        return redirect()
            ->route('area.create')
            ->with('success', 'Área creada correctamente.');
    }

    public function show(Area $area)
    {
        return view('Area.show', compact('area'));
    }

    public function edit(Area $area)
    {
        return view('Area.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area->update($data);

        return redirect()->route('area.create')->with('success', 'Área actualizada correctamente.');
    }

    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('area.create')->with('success', 'Área eliminada correctamente.');
    }
}