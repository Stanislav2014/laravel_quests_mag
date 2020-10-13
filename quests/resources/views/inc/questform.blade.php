<?php
?>
<form id="reservQuestForm" class="" action="{{ route('quests.store') }}" method="post" >
    @csrf
    <input type="hidden" name="quest_id" value="{{ $quest->id }}">
    <input type="text" class="form-control" name="name"  placeholder="Имя">
    <input type="email" class="form-control" name="email" placeholder="Email">
    <input type="tel" class="form-control" name="phone" placeholder="Телефон">
    <input type="text" class="form-control" name="date" placeholder="Дата квеста">
<button class="btn" type="submit">Submit</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif


