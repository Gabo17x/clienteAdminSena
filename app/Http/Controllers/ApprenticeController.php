<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApprenticeController extends Controller
{
    private function fetchDataFromApi(string $url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $apprentices = $this->fetchDataFromApi($url . '/apprentice');
        return view('Apprentice.index', compact('apprentices'));
    }

    public function show(string $id)
    {
        $url = env('URL_SERVER_API');
        $apprentice = $this->fetchDataFromApi($url . '/apprentice/' . $id);
        return view('Apprentice.show', compact('apprentice'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $courses = $this->fetchDataFromApi($url . '/course');
        $computers = $this->fetchDataFromApi($url . '/computer');
        return view('Apprentice.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/apprentice', $request->all());
        return redirect()->route('apprentice.index');
    }

    public function edit(string $id)
    {
        $url = env('URL_SERVER_API');
        $apprentice = $this->fetchDataFromApi($url . '/apprentice/' . $id);
        $courses = $this->fetchDataFromApi($url . '/course');
        $computers = $this->fetchDataFromApi($url . '/computer');
        return view('Apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, string $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/apprentice/' . $id, $request->all());
        return redirect()->route('apprentice.index');
    }

    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/apprentice/' . $id);
        return redirect()->route('apprentice.index');
    }
}