<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    /**
     * Stocke le vote de l'utilisateur pour un projet
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour voter');
        }
    
        // Vérifier si l'utilisateur a déjà voté pour ce projet
        $vote = Vote::where('user_id', Auth::id())
            ->where('project_id', $request->project_id)
            ->first();
    
        if ($vote) {
            return redirect()->back()->with('error', 'Vous avez déjà voté pour ce projet');
        }
    
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'vote' => 'required|in:pour,contre,indifferent',
            'project_id' => 'required|exists:projects,id',
        ]);
    
        // Créer un nouveau vote avec les données validées
        $vote = new Vote;
        $vote->fill($validatedData);
        $vote->user_id = Auth::id();
    
        // Enregistrer le vote dans la base de données
        $vote->save();
    
        return redirect()->back()->with('success', 'Votre vote a été enregistré');
    }
}
