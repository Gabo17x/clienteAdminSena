<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
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

        $teachers = $this->fetchDataFromApi($url . '/teacher');

        return view('teacher.index', compact('teachers'));
    }

    public function show(string $id)
    {
        $url = env('URL_SERVER_API');

        $teacher = $this->fetchDataFromApi($url . '/teacher/' . $id);

        return view('teacher.show', compact('teacher'));
    }


    public function create()
    {
        $url = env('URL_SERVER_API');

        $areas = $this->fetchDataFromApi($url . '/area');
        $training_centers = $this->fetchDataFromApi($url . '/training-center');

        return view('teacher.create', compact('areas', 'training_centers'));
    }



    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/teacher', $request->all());

        return redirect()->route('teacher.index');
    }

    public function edit(string $id)
    {
        $url = env('URL_SERVER_API');
        
        $teacher = $this->fetchDataFromApi($url . '/teacher/' . $id);
        $areas = $this->fetchDataFromApi($url . '/area');
        $training_centers = $this->fetchDataFromApi($url . '/training-center');


        return view('teacher.edit', compact('teacher', 'areas', 'training_centers'));
    }

    public function update(Request $request, string $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/teacher/' . $id, $request->all());

        return redirect()->route('teacher.index');
    }
          
    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/teacher/' . $id);
        return redirect()->route('teacher.index');
    }
}