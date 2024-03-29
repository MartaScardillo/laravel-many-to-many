<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\Project;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'required|string',
            'description' => 'required|string',
            'type_id' => 'required',
            'technologies' => 'array',
        ]);

        $project = Project::create($request->all());

        if ($request->has('technologies')) {
            $technologies = $request->input('technologies');
            $project->technologies()->sync($technologies);
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Progetto creato');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        $project = Project::with('technologies')->find($id);

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image_path' => 'required|string',
            'description' => 'required|string',
            'type_id' => 'required',
            'technologies' => 'array',
        ]);

        $project = Project::findOrFail($id);
        $project->update($request->all());

        if ($request->has('technologies')) {
            $technologies = $request->input('technologies');
            $project->technologies()->sync($technologies);
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Progetto creato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        $project->technologies()->detach();

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Progetto eliminato');
    }
}
