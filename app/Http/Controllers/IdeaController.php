<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Support\Facades\DB; // Uso DB para consultas directas en la tabla idea_votes

class IdeaController extends Controller
{
    // Muestra la lista de ideas ordenadas por votos (de mayor a menor)
    public function index()
    {
        $ideas = Idea::orderBy('votes', 'desc')->get();

        // Devuelve la vista con las ideas para mostrarlas
        return view('ideas.index', compact('ideas'));
    }

    // Guarda una nueva idea en la base de datos
    public function store(Request $request)
    {
        // Validamos que el título sea obligatorio y tenga un máximo de caracteres
        // La descripción es opcional
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Creamos la idea con votos iniciales a cero
        Idea::create([
            'title' => $request->title,
            'description' => $request->description,
            'votes' => 0,
        ]);

        // Redirigimos a la lista de ideas con un mensaje de éxito
        return redirect()->route('ideas.index')->with('success', 'Idea successfully proposed!');
    }

    // Método para votar una idea concreta, evitando votos duplicados por sesión
    public function vote(Request $request, $id)
    {
        // Buscamos la idea o falla si no existe
        $idea = Idea::findOrFail($id);

        // Obtenemos el ID de sesión para identificar al votante
        $sessionId = $request->session()->getId();

        // Verificamos si esta sesión ya ha votado esta idea
        $alreadyVoted = DB::table('idea_votes')
            ->where('idea_id', $id)
            ->where('session_id', $sessionId)
            ->exists();

        // Si ya votó, volvemos con error
        if ($alreadyVoted) {
            return redirect()->route('ideas.index')->with('error', 'You have already voted for this idea.');
        }

        // Si no ha votado, insertamos el voto en la tabla idea_votes
        DB::table('idea_votes')->insert([
            'idea_id' => $id,
            'session_id' => $sessionId,
            'value' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Incrementamos el contador de votos en la tabla ideas
        $idea->increment('votes');

        // Redirigimos con mensaje de agradecimiento
        return redirect()->route('ideas.index')->with('success', 'Thank you for voting.');
    }
}
