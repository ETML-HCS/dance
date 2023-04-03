<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function about(){
        return ('A propos de l\'entreprise');
    }

    public function showLoginForm()
    {
        $data = [
            'h1' => 'Accueil',
            'h2' => 'Bienvenue sur la page d\'accueil.',
            'p1' => 'Connectez-vous en entrant vos informations'
        ];
    
        return view('login')->with($data);
    }
    
    public function login(Request $request)
    {
        // Récupère les informations d'identification depuis le formulaire de connexion
        $credentials = $request->only('email', 'password');
    
        // Essaie de connecter l'utilisateur avec les informations d'identification fournies
        if (Auth::attempt($credentials,$request->only('remember'))) 
        {
            // La connexion a réussi, redirige l'utilisateur vers la page de tableau de bord (ou la page demandée avant la connexion)
            return redirect()->intended('/dashboard');
        }
    
        // La connexion a échoué, redirige l'utilisateur vers la page de connexion avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne sont pas valides.',
        ]);
    }

   
    
}
