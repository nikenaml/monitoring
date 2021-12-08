<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\FalseAlarmRequest;
use App\Models\FalseAlarm;

use Illuminate\Http\Request;

class FalseAlarmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $fas = FalseAlarm::with('schedule')->get();
        $fas = FalseAlarm::all();

        return view('pages.falsealarms.index')->with([
            'fas' => $fas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $schedules = Schedule::all();
        // $fas = FalseAlarm::all();

        return view('pages.falsealarms.create');
        // ->with([
        //     'fas' => $fas
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FalseAlarmRequest $request)
    {
        $data = $request->all();
        // $data['slug'] = Str::slug($request->name);

        FalseAlarm::create($data);
        return redirect()->route('falsealarms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $fa = FalseAlarm::with('details.falsealarm')->findOrFail($id);
        $fa = FalseAlarm::findOrFail($id);

        return view('pages.falsealarms.show')->with([
            'fa' => $fa
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
        // $fas = FalseAlarm::with('schedule')->get();
        $fa = FalseAlarm::findOrFail($id);

        return view('pages.falsealarms.edit')->with([
            'fa' => $fa
        ]);
    }

    /**mjbv
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FalseAlarmRequest $request, $id)
    {
        $data = $request->all();

        $fa = FalseAlarm::findOrFail($id);
        $fa->update($data);

        return redirect()->route('falsealarms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fa = FalseAlarm::findOrFail($id);
        $fa->delete();

        return redirect()->route('falsealarms.index');
    }
}
