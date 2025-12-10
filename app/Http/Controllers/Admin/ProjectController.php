<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Type;
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
        // prendo tutti i types
        $types = Type::all();
        $tags = Tag::all();
        return view('projects.create', compact('types', 'tags'));
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
        $newProject->type_id = $data['type_id'];
        // Li salvo nel database
        $newProject->save();

        // Attacco i tag
        if ($request->has('tags')) {
            $newProject->tags()->attach($data['tags']);
        }

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

        $project->load('tags');

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        // cambiando nella funzione il modello e il nome del modello in piccolo [ex (Project $project)] cambia tutto in automatico senza dover usare metodi, qualora tutto combaciasse

        // Questo garantisce che $project->tags sia una Collection (anche se vuota) e non null.
        $project->load('tags');
        $types = Type::all();
        $tags = Tag::all();
        return view('projects.edit', compact('project', 'types', 'tags'));
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
        $project->type_id = $data['type_id'];
        // Aggiorno i dati nel database
        $project->update();

        // Sincronizzo i tag che cambiano
        if ($request->has('tags')) {
            $project->tags()->sync($data['tags']);
        } else {
            $project->tags()->detach();
        }

        // Faccio tornare alla vista show
        return redirect()->route('admin.projects.show', $project);
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
