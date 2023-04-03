<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Vote;

class ProjectController extends Controller
{
    /**
     * Affiche le formulaire de soumission d'un projet.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.submit');
    }

    /**
     * Affiche le projet spécifié.
     *
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Stocke le projet soumis dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'benefits' => 'required',
            'estimated_cost' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'attachments.*' => 'file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        // Créer un nouveau projet avec les données validées
        $project = new Project();
        $project->fill($validatedData);

        // Associer le projet à l'utilisateur actuellement connecté
        $project->user_id = auth()->user()->id;

        // Enregistrer le projet dans la base de données
        $project->save();

        // Gérer le téléchargement des fichiers joints
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = $file->getClientOriginalName();
                $path = $file->storeAs('attachments/' . $project->id, $filename, 'public');
                // Vous pouvez ajouter du code ici pour enregistrer les informations de fichier
                // dans une table de base de données si nécessaire
            }
        }

        return redirect()->route('projects.show', $project->id)->with('success', 'Votre projet a été soumis avec succès !');
    }

    /**
     * Gère le vote pour un projet.
     * ==> est confié au controller vote ...
     * @param int $projectId
     * @return \Illuminate\Http\Response
     */
    public function vote($projectId)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour voter');
        }

        // Vérifier si l'utilisateur a déjà voté pour ce projet
        $vote = Vote::where('user_id', Auth::id())
            ->where('project_id', $projectId)
            ->first();

        if ($vote) {
            return redirect()->back()->with('error', 'Vous avez déjà voté pour ce projet');
        }

        // Ajouter une entrée dans la table "votes" pour cet utilisateur et ce projet
        $vote = new Vote;
        $vote->user_id = Auth::id();
        $vote->project_id = $projectId;
        $vote->save();

        return redirect()->back()->with('success', 'Votre vote a été enregistré');
    }
}

