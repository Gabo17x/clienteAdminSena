<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    private function fetchDataFromApi(string $url): array
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $courses = $this->fetchDataFromApi($url . '/course');
        return view('course.index', compact('courses'));
    }

    public function show(string $id)
    {
        $url = env('URL_SERVER_API');
        $course = $this->fetchDataFromApi($url . '/course/' . $id);
        return view('course.show', compact('course'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $areas = $this->fetchDataFromApi($url . '/area');
        $training_centers = $this->fetchDataFromApi($url . '/training-center');
        return view('course.create', compact('areas', 'training_centers'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');
        Http::post($url . '/course', $request->all());
        return redirect()->route('course.index');
    }

    public function edit(string $id)
    {
        $url = env('URL_SERVER_API');
        $course = $this->fetchDataFromApi($url . '/course/' . $id);
        $areas = $this->fetchDataFromApi($url . '/area');
        $training_centers = $this->fetchDataFromApi($url . '/training-center');
        return view('course.edit', compact('course', 'areas', 'training_centers'));
    }

    public function update(Request $request, string $id)
    {
        $url = env('URL_SERVER_API');
        Http::put($url . '/course/' . $id, $request->all());
        return redirect()->route('course.index');
    }

    public function destroy(string $id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/course/' . $id);
        return redirect()->route('course.index');
    }
}