<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\VoteController;

/*--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| le nom de la route doit correspondre à la vue !!
*/

//Il s'agit de la route par défaut menant à la page de connexion.
Route::get('/',[HomeController::class,'showLoginForm'])->name('login');

//Cette route est appelée si la connexion est réussie à partir du formulaire
Route::post('/login',[HomeController::class,'login'])->name('login');

// Affiche le formulaire d'inscription
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Traite les données soumises par le formulaire d'inscription
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Les routes qui nécessitent une connexion
Route::group(['middleware' => 'auth'], function () {
   
    Route::get('/dashboard',[DashboardController::class,'showDashboard'])->name('dashboard');

    // permet de regrouper toutes les routes qui commence par /projects 
    Route::prefix('/projects')->group(function(){
        Route::get('/submit', [ProjectController::class, 'create'])->name('projects.submit');
        Route::post('/submit', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/{project}', [ProjectController::class, 'show'])->name('projects.show');
    }); 

    Route::post('/votes', [VoteController::class, 'store'])->name('votes.store');

});

