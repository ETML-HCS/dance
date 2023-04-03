@extends('layouts.app')

@php

$title=__('Tableau de board')

@endphp

@section('title',$title)

@section('content')
<br>

<style>
    .btn-project {
        background-color: #2C5F2D;
        border-color: #2C5F2D;
        color: #FFFFFF;
        height: 3 em;
        width: auto;
        border-radius: 5px;
    }

    .btn-project:hover,
    .btn-project:focus,
    .btn-project:active {
        background-color: #204529;
        border-color: #204529;
        color: whitesmoke;
    }
</style>
<div class="container">

    <div class="row">

        <div class="col">
            <div class="d-grid gap-2">
                <a class="btn btn-project" href="{{ route('projects.submit') }}"> <i class="fas fa-tasks"></i> {{_('nouveau projet')}}</a>
                <button class="btn btn-project">Bouton 2</button>
            </div>
        </div>

        <div class="col">
            <div class="d-grid gap-2">
                <button class="btn btn-project">Bouton 5</button>
                <button class="btn btn-project">Bouton 6</button>
            </div>
        </div>

    </div>
</div>

<br>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card d-grid gap-2">
                <div class="card-header">{{ __('Projets en cours') }}</div>
                <div class="card-body">
                    @include('projects.ongoing', ['projects' => $projects])
                </div>
            </div>
        </div>
        <div class="col"></div>
    
    </div>
</div>



@endsection