
{{-- LAYOUT --}}
@extends('layouts/app')

{{--
    Boucle pour afficher les notes de la table notefinale ($note) récupérés de la  BDD
    --}}




@section('notedump')
{{-- <p> {% images %} </p> --}}
<h3 class="rouge">
{{ $notedechets ?? '' }}
</h3>
@endsection

@section('noteantenne')
{{-- <p> {% images %} </p> --}}
<h3 class="rouge">
{{ $noteantenne ?? '' }}
</h3>
@endsection
