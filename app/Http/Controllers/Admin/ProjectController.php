<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Prendo i dati che mi arrivano da create e li salvo sul database
        // Prendo i dati tramite $request->all()
        $data = $request->all();
        // Credo una nuova classe
        $newProject = new Project();
        // Collego gli attributi ai rispettivi dati
        $newProject->title = $data['title'];
        $newProject->content = $data['content'];
        $newProject->tools = $data['tools'];
        // Li salvo nel database
        $newProject->save();

        // Faccio tornare alla vista show
        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // progetto con id nel db
        // con metodoto where, first
        // $project = Project::where('id', $id)->first();
        // con metodo find
        // $project = Project::find($id);
        // alla fine cambiando nella funzione il modello e il nome del modello in piccolo [ex (Project $project)] cambia tutto in automatico senza dover usare metodi, qualora tutto combaciasse
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // cambiando nella funzione il modello e il nome del modello in piccolo [ex (Project $project)] cambia tutto in automatico senza dover usare metodi, qualora tutto combaciasse
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // Prendo i dati tramite $request->all()
        $data = $request->all();
        // Modifico le informazioni del progetto
        $project->title = $data['title'];
        $project->content = $data['content'];
        $project->tools = $data['tools'];
        // Aggiorno i dati nel database
        $project->update();

        // Faccio tornare alla vista show
        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Elimino il progetto
        $project->delete();
        // Reindirizzo alla index
        return redirect()->route('projects.index');
    }
}
