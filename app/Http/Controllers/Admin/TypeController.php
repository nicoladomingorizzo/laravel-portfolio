<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;  // 👈 Importiamo il modello Type
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource. (INDEX - READ all)
     */
    public function index()
    {
        // Prendo tutti i record del modello Type
        $types = Type::all();
        // Ritorno alla vista index, passando la lista dei tipi
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource. (CREATE)
     */
    public function create()
    {
        // Ritorna la vista con il form per creare un nuovo Tipo
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage. (STORE - CREATE)
     */
    public function store(Request $request)
    {
        // Ottengo i dati dalla richiesta (solitamente solo 'name' e 'description')
        $data = $request->all();

        // Credo e salvo una nuova istanza di Type
        $newType = new Type();
        $newType->name = $data['name'];
        $newType->description = $data['description'];
        $newType->save();

        // Reindirizzo alla vista show del Type appena creato
        return redirect()->route('admin.types.show', $newType);
    }

    /**
     * Display the specified resource. (SHOW - READ single)
     */
    public function show(Type $type)
    {
        // Grazie all'iniezione di dipendenza (Type $type) Laravel trova il tipo con quell'ID
        // e lo passa alla vista.
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource. (EDIT)
     */
    public function edit(Type $type)
    {
        // Ritorna la vista con il form per modificare il Tipo
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage. (UPDATE)
     */
    public function update(Request $request, Type $type)
    {
        // Ottengo i dati modificati
        $data = $request->all();

        // Aggiorno le proprietà del modello
        $type->name = $data['name'];
        $type->description = $data['description'];

        // Salvo le modifiche sul database
        $type->update();

        // Reindirizzo alla vista show del Type modificato
        return redirect()->route('admin.types.show', $type);
    }

    /**
     * Remove the specified resource from storage. (DESTROY - DELETE)
     */
    public function destroy(Type $type)
    {
        // Elimino il Type dal database
        $type->delete();

        return redirect()->route('admin.types.index');
    }
}
