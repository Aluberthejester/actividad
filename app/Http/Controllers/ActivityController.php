<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Carbon\Carbon;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::paginate(5);
        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:100',
            'state' => 'required',
            ]);
            $activity = Activity::create([
            'name' => $request->name,
            'description' => $request->description,
            'state' => $request->state,
            'register_date' => now(),
            'finished_date' => now(),
            'change_date' => now(),
            ]);
            $activity->save();
            return redirect()->route('activities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Activity $activity)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:100',
            'state' => 'required',
            'register_date' => 'required',
            'finished_date' => 'required',
            ]);
            $activity->fill([
            'name' => $request->name,
            'description' => $request->description,
            'state' => $request->state,
            'register_date' => $request->register_date,
            'finished_date' => $request->finished_date,
            'change_date' => now(),
            ]);
            $activity->save();
            return redirect()->route('activities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $arrayValues = ['waiting', ' finished,', 'postponed', 'cancelled', 'removed'];
        $activity->fill([
            //'name' => $this->name,
            //'description' => $this->description,
            'state' => $arrayValues[4],
            //'register_date' => $this->register_date,
            //'finished_date' => $this->finished_date,
            'change_date' => now(),
            ]);
            $activity->save();
            return redirect()->route('activities.index');
    }
}
