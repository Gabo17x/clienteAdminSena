<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    private function fetchDataFromApi( string $url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $computers = $this->fetchDataFromApi($url . '/computer');

        return view('computer.index', compact('computers'));
    }

    public function show(string $id)
    {
        $url = env('URL_SERVER_API');

        $computer = $this->fetchDataFromApi($url . '/computer/' . $id);

        return view('computer.show', compact('computer'));
    }
    public function create()
    {
        return view('computer.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/computer', $request->all());

        return redirect()->route('computer.index');
    }

    public function edit(string $id)
    {
        $url = env('URL_SERVER_API');
        $computer = $this->fetchDataFromApi($url . '/computer/' . $id);
        return view('computer.edit', compact('computer'));
    }

    public function update(Request $request, string $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/computer/' . $id, $request->all());

        return redirect()->route('computer.index');
    }

    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/computer/' . $id);
        return redirect()->route('computer.index');
    }
}