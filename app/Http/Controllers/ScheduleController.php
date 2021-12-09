<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\ScheduleRequest;
use Illuminate\Support\Str;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScheduleController extends Controller
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
    public function index(Request $request)
    {
        $sch = Schedule::all();

        // if($request->has('search')){
        //     $sch = Schedule::where('name','like',"%".$search."%")->paginate(10);
        // }
        // else {
        // // untuk ambil data di db berdasarkan paginate halaman
        // $sch = Schedule::paginate(10);
        // }

        return view('pages.schedules.index')->with([
            'sch' => $sch
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Schedule::create($data);
        return redirect()->route('schedules.index')->with('success','Data berhasil ditambahkan!');
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
    public function edit($id)
    {
        $s = Schedule::findOrFail($id);

        return view('pages.schedules.edit')->with([
            's' => $s
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $s = Schedule::findOrFail($id);
        $s->update($data);

        return redirect()->route('schedules.index')->with('info','Data berhasil diperharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = Schedule::findOrFail($id);
        $s->delete();

        return redirect()->route('schedules.index')->with('error','Data berhasil dihapus!');
    }

    public function createPDF() {
        // retreive all records from db
        $sch = Schedule::all();

        // share data to view
        view()->share('sch',$sch);
        $pdf = PDF::loadView('pages.schedules.laporanpdf', $sch);

        // download PDF file with download method
        return $pdf->stream('Rekap Laporan Data Schedule.pdf');
    }

    public function search(Request $request){
        $search = $request->search;

        // $sch = Schedule::where('name','like',"%".$search."%")->paginate(10);
        $sch = Schedule::where('name','like',"%".$search."%")->get();

        return view('pages.schedules.index',['sch' => $sch]);

    }
}
