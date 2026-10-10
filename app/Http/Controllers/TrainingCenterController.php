<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
    private function fetchDataFromApi(string $url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');

        $trainingCenters = $this->fetchDataFromApi($url . '/training-center');

        return view('trainingCenter.index', compact('trainingCenters'));
    }

    public function show(string $id)
    {
        $url = env('URL_SERVER_API');

        $trainingCenter = $this->fetchDataFromApi($url . '/training-center/' . $id);

        return view('trainingCenter.show', compact('trainingCenter'));
    }
    public function create()
    {
        return view('trainingCenter.create');
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/training-center', $request->all());

        return redirect()->route('trainingCenter.index');
    }

    public function edit(string $id)
    {
        $url = env('URL_SERVER_API');
        $trainingCenter = $this->fetchDataFromApi($url . '/training-center/' . $id);
        return view('trainingCenter.edit', compact('trainingCenter'));
    }

    public function update(Request $request, string $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/training-center/' . $id, $request->all());

        return redirect()->route('trainingCenter.index');
    }

    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/training-center/' . $id);
        return redirect()->route('trainingCenter.index');
    }
}