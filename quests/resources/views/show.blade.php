@extends('layouts.app')


@section('content')

    <div class="quest">
        <h1>{{ $quest->name }}</h1>
        <img src="{{$quest->img}}" alt="{{ $quest->name }}"/>
    </div>
    {{$date}}
    <label for="start">Выберите время:</label>

    <input type="date" id="start" name="trip-start"
           value="{{ $currentDate }}"
           >


@endsection
