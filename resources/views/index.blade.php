
{{-- LAYOUT --}}
@extends('layouts/app')


    @section('notefinale')
        <h3 class="rouge">

    {{ $notefinale ?? '' }}
    </h3>
    @endsection

  @section('notedump')

<h3 class="rouge">

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
