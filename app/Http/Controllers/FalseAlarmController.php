<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\FalseAlarmRequest;
use App\Models\FalseAlarm;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;
// use Barryvdh\DomPDF\Facade as PDF;

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
        // untuk ambil data di db berdasarkan paginate halaman
        // $fas = FalseAlarm::paginate(5);

        return view('pages.falsealarms.index')->with([
            'fas' => $fas
        ]);

        // return view('pages.falsealarms.index', compact('fas'));
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
        return redirect()->route('falsealarms.index')->with('success','Data berhasil ditambahkan!');
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

        return redirect()->route('falsealarms.index')->with('info','Data berhasil diperharui!');
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

        return redirect()->route('falsealarms.index')->with('error','Data berhasil dihapus!');
    }

    // public function cetakPdf(){
    //     $fas = FalseAlarm::all();
    //     $pdf = PDF::loadView('pages.falsealarms.laporanpdf', ['fas' => $fas]);
    //     return $pdf->stream('Laporan Daftar False Alarm.pdf');
    // }

    // public function cetak_pdf()
    // {
    // 	// $fas= FalseAlarm::all();
    //     $fas = FalseAlarm::findOrFail($id);

    // 	$pdf = PDF::loadview('pages.falsealarms.laporanpdf',['fas'=>$fas]);
    // 	return $pdf->download('laporan-pegawai-pdf');
    // }



    public function createPDF() {
        // retreive all records from db
        $fas = FalseAlarm::all();

        // share data to view
        view()->share('fas',$fas);
        $pdf = PDF::loadView('pages.falsealarms.laporanpdf', $fas);

        // download PDF file with download method
        return $pdf->stream('Rekap Laporan Data False Alarm.pdf');
    }

    public function searchBydate(Request $request)
    {
        $fas = FalseAlarm::where('tanggal_alert','>=',$request->from)->where('tanggal_alert','<=',$request->to)->get();
        return view('pages.falsealarms.index',compact('fas'));
    }
}
