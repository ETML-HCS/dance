<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $user = Auth::user();
        $projects = $user->projects()->where('end_date', '>=', Carbon::today())->get();

        return view('dashboard', compact('projects'));
    }

}
