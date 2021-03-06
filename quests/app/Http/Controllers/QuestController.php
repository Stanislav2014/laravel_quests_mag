<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quest;
use Carbon\Carbon;
use Validator;
use App\Models\Event;

class QuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', ['quests' => Quest::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required',
            ]);
        $questId = $request->input('quest_id');

        $event = new Event();

        $event->quest_id = $questId;
        $event->user_name = $request->input('name');
        $event->user_email = $request->input('email');
        $event->user_phone = $request->input('phone');
        $event->event_date = Carbon::create($request->input('date'))->format('Y-m-d H:i');
        $event->status = 'N';
//        dd($event);
        $event->save();

        return redirect()->route('quests.show', ['quest' => $questId])->with('message', 'Квест успешно забронирован');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        return view('show', [
            'quest' => Quest::find($id),
            'currentDate'=> Carbon::today()->format('Y-m-d'),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
