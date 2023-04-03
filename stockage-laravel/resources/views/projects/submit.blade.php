{{-- resources/views/projects/submit_poject.blade.php --}}

@extends('layouts.app')

@section('title', 'Soumettre un projet')

@section('content')

<div class="container-fluid custom-container form-container80">

    <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Titre du projet</label>
            <input type="text" class="form-control" id="tirow justify-content-centertle" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Description détaillée du projet</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="benefits">Objectifs et bénéfices attendus</label>
            <textarea class="form-control" id="benefits" name="benefits" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="estimated_cost">Coût estimé du projet (en euros)</label>
            <input type="number" class="form-control" id="estimated_cost" name="estimated_cost" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="start_date">Date de début prévue</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>

        <div class="form-group">
            <label for="end_date">Date de fin prévue</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>

        <div class="form-group">
            <label for="attachments">Documents ou images supplémentaires (optionnel)</label>
            <input type="file" class="form-control-file" id="attachments" name="attachments[]" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Soumettre le projet</button>
    </form>
</div>
@endsection