@php
use Carbon\Carbon;
// initialisation de $carbonDate
$carbonDate = Carbon::now();
@endphp

<table class="table table-striped">
    <thead>
        <tr>
            <th>{{ __('Réf.') }}</th>
            <th>{{ __('Titre') }}</th>
            <th>{{ __('Auteur') }}</th>
            <th>{{ __('Créé') }}</th>
            <th>{{ __('Démarre dans ') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)

        @php

        // mise à jour de $carbonDate pour chaque projet
        $carbonDate = Carbon::parse($project->start_date);

        @endphp

        <tr onclick="document.getElementById('project-form-{{ $project->id }}').submit();">
            <form id="project-form-{{ $project->id }}" 
            action="{{ route('projects.show', $project->id) }}" 
            method="get">
                @csrf
                <td>{{ $project->id }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->user->name }}</td>
                <td>{{ $project->created_at->format('d/m/Y') }}</td>
                <td>{{ $carbonDate->diffInDays()+1 }}</td>
            </form>
        </tr>

        @endforeach
    </tbody>
</table>