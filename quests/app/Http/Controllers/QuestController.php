<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quest;
use Carbon\Carbon;

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
        $quest = new Quest;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questTimeMinutes = 60;

        $daysCountByWeek = 7;

        $shedule = [];



        $zeroTime = new Carbon();
        $zeroTime->setHour(0);
        $zeroTime->setMinute(0);
        $zeroTime->format('H:i');

        $times = [];

        $index = 0;

//        while() {
//
//            $index++;
//        }

            $index = 0;

        while($index < $daysCountByWeek) {
            $day = $index === 0 ? Carbon::now() : Carbon::now()->addDay();

//            $shedule[$day] =

            $index++;
        }



        $quest = new Quest;

//        dd(Carbon::today());

        return view('show', [
            'quest' => $quest->find($id),
            'currentDate'=> Carbon::today()->format('Y-m-d'),
            'date' => $zeroTime->format('H:i'),
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
