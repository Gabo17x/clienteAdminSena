<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AreaController extends Controller
{

    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi(string $url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $area = $this->fetchDataFromApi($url . '/area');

        return view('area.index', compact('area'));
    }

    public function show(int $id)
    {
        $url = env('URL_SERVER_API');

        $area = $this->fetchDataFromApi($url . '/area/' . $id);

        return view('area.show', compact('area'));
    }


    public function create()
    {
        return view('area.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/area', $request->all());

        return redirect()->route('area.index');
    }

    public function edit(int $id)
    {
        $url = env('URL_SERVER_API');
        $area = $this->fetchDataFromApi($url . '/area/' . $id);
        return view('area.edit', compact('area'));
    }

    public function update(Request $request, int $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/area/' . $id, $request->all());

        return redirect()->route('area.index');
    }

    public function destroy(int $id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/area/' . $id);
        return redirect()->route('area.index');
    }

}