@extends('layouts.main')

@section('content')

    <div class="quests">
        @foreach($quests as $quest)
            <div class="quest__item">
                <h2>
                    <a href="{{route('quests.show', ['quest' => $quest->id])}}">{{ $quest->name }}</a>
                </h2>

                <img src="{{ $quest->img }}" alt="{{ $quest->name }}"/>
            </div>

        @endforeach

    </div>


@endsection
