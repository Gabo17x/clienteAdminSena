<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function index()
    {
        $computers = Computer::all();

        return view('Computer.create', compact('computers'));
    }

    public function create()
    {
        $computers = Computer::all();

        return view('Computer.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'brand'  => 'required|string|max:100',
        ]);

        Computer::create($data);

        return redirect()
            ->route('computer.create')
            ->with('success', 'Computador registrado correctamente.');
    }

    public function show(Computer $computer)
    {
        return view('Computer.show', compact('computer'));
    }

    public function edit(Computer $computer)
    {
        return view('Computer.edit', compact('computer'));
    }

    public function update(Request $request, Computer $computer)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'brand'  => 'required|string|max:100',
        ]);

        $computer->update($data);

        return redirect()
            ->route('computer.create')
            ->with('success', 'Computador actualizado correctamente.');
    }

    public function destroy(Computer $computer)
    {
        $computer->delete();

        return redirect()
            ->route('computer.create')
            ->with('success', 'Computador eliminado correctamente.');
    }
}