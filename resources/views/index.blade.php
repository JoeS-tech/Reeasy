
{{-- LAYOUT --}}
@extends('layouts/app')

{{--
    Boucle pour afficher les notes de la table notefinale ($note) récupérés de la  BDD
    --}}




@section('notedump')
{{-- <p> {% images %} </p> --}}
<h3 class="rouge">
{{-- {{ $notedechets }} --}}
{{ $notedechets ?? '' }}
</h3>
@endsection

@section('noteantenne')
{{-- <img :src= photo  /> --}}
<img :src="getColorFromNote(6)" />
{{-- <p> {% images %} </p>
<img src= './storage/assets/uploads/Green-note-vert.png' /> --}}

<h3 class="rouge">
{{ $noteantenne ?? '' }}
</h3>
@endsection
