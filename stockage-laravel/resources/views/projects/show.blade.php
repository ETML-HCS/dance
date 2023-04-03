@extends('layouts.app')

@php
use Carbon\Carbon;

$userName = htmlspecialchars($project->user->name);

$strDateStart = $project->start_date;
$strDateEnd = $project->end_date;

$carbonDateStart = Carbon::parse($strDateStart);
$carbonDateEnd = Carbon::parse($strDateEnd);

@endphp

@section('title', 'Détails du projet')

@section('content')


<div class="container form-container80">

<div class="row mb-4">
  <div class="col-8">
    <h1 class="d-flex justify-content-between align-items-center " style="line-height: 1.2;">{{ $project->title }}</h1>
  </div>
  <div class="col d-flex align-items-center justify-content-end">
    @if (!$project->votes->contains('user_id', auth()->id()))
      <form method="POST" action="{{ route('votes.store') }}">
        @csrf
        <input type="hidden" name="project_id" value="{{ $project->id }}">
        <div class="d-flex align-items-center"">
          <label for="vote" class="mr-2 ">Vote:</label>
          <select class="form-control" id="vote" name="vote" required>
            <option value="">Sélectionnez votre vote</option>
            <option value="pour">Pour</option>
            <option value="contre">Contre</option>
            <option value="indifferent">Indifférent</option>
          </select>
        </div>
        <button class="btn btn-outline-primary float-end" type="submit">Soumettre</button>
      </form>
    @else
      <button class="btn btn-outline-primary float-end"  disabled>Déjà voté</button>
    @endif
  </div>
</div>


    <p>{{ $project->description }}</p>

    <p> {{_('coût estimé')}} : {{$project->estimated_cost}} FRS</p>

    <p> {{_('Projet créer le ')}} {{$project->created_at->format('d/m/Y')}}
        {{_('par')}} : <strong>{{$userName}}</strong>
    </p>

    <p>
        {{ _('Devrait démarrer le ') }} {{ $carbonDateStart->format('d/m/Y') }}
        {{ _('jusqu\'au')}} {{ $carbonDateEnd->format('d/m/Y') }}
        {{ _('soit un total de ') }} {{ $carbonDateStart->diffInDays($carbonDateEnd) }} {{ _('jours') }}
    </p>

</div>

@endsection