
{{-- LAYOUT --}}
@extends('app')

{{--
    Boucle pour afficher les notes de la table notefinale ($note) récupérés de la  BDD
    --}}



@section('valdechets')
<h3>
{{$dump }}
</h3>
@endsection



@section('noteFinale')
    @foreach($notefinale as $note)
    <ul>
        <li>
            <h4>{{ $note->notedump }}</h4>
            <h4>{{ $note->notetransport }}</h4>
            <h4>{{ $note->notesonor }}</h4>
            <h4>{{ $note->notepollution }}</h4>
            <h4>{{ $note->noteenergy }}</h4>
            <h4>{{ $note->noteantenas }}</h4>
            <br>
        </li>

        <li>
            <h3> La note finale est:{{ $note->notefinale }} </h3>
        </li>

    </ul>
    @endforeach
@endsection


