<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $counter = 1;
        //orm per tutti i record del db -> $projects
        //da all() a latest per poter usare il paginator
        //consultare Providers/AppServiceProvider
        $projects = Project::latest()->paginate(5);
        // rotta per la vista
        return view('admin.projects.index', compact('projects', 'counter'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        //validazione dati provvisoria
        $validated = $request->validate([
            'url' => 'required',
            'image' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'languages' => 'required|array',
        ]);

        $validated['languages'] = implode(',', $validated['languages']);
        Project::create($validated);


        return redirect()->route('projects.index'); //da rivedere
    }


    //dettaglio 
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }


    //modifiche
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }


    //aggiornamento
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'url' => 'required',
            'image' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'languages' => 'required|array',
        ]);

        $validated['languages'] = implode(',', $validated['languages']);
        $project->update($validated);

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
