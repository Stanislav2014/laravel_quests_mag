@extends('layouts.main')


@section('content')

    <div class="quest">
        <h1>{{ $quest->name }}</h1>
        <img src="{{$quest->img}}" alt="{{ $quest->name }}"/>
    </div>
    <div id="calendarContainer">
        <label for="start">Выберите время:</label>

        <input type="date" id="start" name="trip-start"
               value="{{ $currentDate }}"
        >
    </div>

    <div id="sheduleContainer" class="s-shedule-container" data-quest-id="{{ $quest->id }}"></div>

    @include('inc.questform')


@endsection


