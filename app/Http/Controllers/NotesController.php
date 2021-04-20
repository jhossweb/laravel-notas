<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotes;
use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    // Mostrar tareas  recien creadas o sin terminar
    public function index()
    {
    	$notes = Notes::where('user_id', auth()->user()->id)->paginate();
    	return view('notes.index', compact('notes'));
    }


    // Muestra el formulario para crear las tareas
    public function create()
    {
    	return view('notes.create');
    }


    // Muestra los detalles de las tareas
    public function show(Notes $notes)
    {
        // $note = Notes::find($id);
        return view('notes.show', compact('notes'));
    }

    // Formulario para editar la tarea
    public function edit(Notes $notes)
    {
        return view('notes.edit', compact('notes'));
    }

    // Insersión de la tarea
    public function store(StoreNotes $request)
    {
    	Notes::create($request->all());
    	return redirect()->route('notes.index');
    }

    // proceso de actualización de las tareas
    public function update(StoreNotes $request, Notes $notes)
    {
        $notes->update($request->all());
        return redirect()->route('notes.show', $notes);
    }

    // Proceso de tarea Terminada
    public function completed (Request $request, Notes $notes)
    {
        // Compara si el checked está llegando
        if ($request->completed) {

            // el checked llega como : on. Entonces, lo convierto a un numero
            $request->completed = 1;

            $notes->where('id', $request->id)
                  ->update(["completed" => $request->completed]);
        }

        return redirect()->route('notes.index');
    }

    // Eliminar una Tarea
    public function destroy (Notes $notes)
    {
        $notes->delete();
        return redirect()->route('notes.index');
    }



    // Tareas terminadas
    public function notesCompleted ()
    {
        $notes = Notes::where('user_id', auth()->user()->id)
                        ->where('completed', 1)->paginate();
        return view('notes.vcompleted', compact('notes'));
    }
}
