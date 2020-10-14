@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                    <div id="eventsContainer" class="s-events">
                        @if(isset($events))
                            <div class="row">
                            @foreach($events as $event)

                                <div class="s-event_item col-12" data-event-id="{{$event->id}}">
                                    <div class="row">
                                        <div class="col-2">
                                            <h3>Квест</h3>
                                            <div>{{$event->quest->name}}</div>
                                        </div>
                                        <div class="col-2">
                                            <h3>Дата</h3>
                                            <div>{{$event->event_date}}</div>
                                        </div>
                                        <div class="col-2">
                                            <h3>Имя</h3>
                                            <div>{{$event->user_name}}</div>
                                        </div>
                                        <div class="col-2">
                                            <h3>Телефон</h3>
                                            <div>{{$event->user_phone}}</div>
                                        </div>
                                        <div class="col-2">
                                            <h3>Email</h3>
                                            <div>{{$event->user_email}}</div>
                                        </div>
                                        <div class="col-2">
                                            <h3>Статус</h3>
                                            <select>
                                                <option value="P" @if($event->status === 'P')selected @endif>Оплачено</option>
                                                <option value="N" @if($event->status === 'N')selected @endif>Новый</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn">Сохранить</button>

                                </div>


                            @endforeach
                            </div>


                        @endif
                    </div>

                    <div>
{{--                        {{ $events->links() }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
