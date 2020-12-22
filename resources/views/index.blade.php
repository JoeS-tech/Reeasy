
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

<h3 class="rouge">
{{ $noteantenne ?? '' }}
</h3>
@endsection

@section('notepollution')

<h3 class="rouge">
{{ $notepollution ?? '' }}
</h3>
@endsection
