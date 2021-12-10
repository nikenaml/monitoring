<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\FalseAlarmRequest;
use App\Models\FalseAlarm;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

use DB;
// use Illuminate\Support\Facades\DB;
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
    public function index(Request $request)
    {
        // $fas = FalseAlarm::with('schedule')->get();
        // $fas = FalseAlarm::all();
        // return view('pages.falsealarms.index')->with([
        //     'fas' => $fas
        // ]);

        // untuk ambil data di db berdasarkan paginate halaman
        // $fas = FalseAlarm::latest()->paginate(2);
        // return view('pages.falsealarms.index', compact('fas'));

        if($request->has('searchBydate')){
            $fas = FalseAlarm::where('tanggal_alert','>=',$request->from)->where('tanggal_alert','<=',$request->to)->get()->toArray()->paginate(2);
        }
        else {
        // untuk ambil data di db berdasarkan paginate halaman
        $fas = FalseAlarm::paginate(5);}

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
        $fas = FalseAlarm::where('tanggal_alert','>=',$request->from)->where('tanggal_alert','<=',$request->to)->get()->paginate(10);
        return view('pages.falsealarms.index',compact('fas'));
    }

    public function exportBydate(Request $req)
    {
        $method = $req->method();

        if ($req->isMethod('post'))
        {
            $from = $req->input('from');
            $to   = $req->input('to');
            if ($req->has('search'))
            {
                // select search
                $fas = FalseAlarm::where('tanggal_alert','>=',$request->from)->where('tanggal_alert','<=',$request->to)->get();
                return view('pages.falsealarms.index',['fas' => $fas]);
            }
            elseif ($req->has('exportPDF'))
            {
                // select PDF
                $PDFReport = DB::select("SELECT * FROM false_alarms WHERE tanggal_alert BETWEEN '$from' AND '$to'");
                $pdf = PDF::loadView('PDF_report', ['PDFReport' => $PDFReport])->setPaper('a4', 'landscape');
                return $pdf->download('PDF-report.pdf');
            }
        }

        else
        {
            //select all
            $fas = FalseAlarm::all();
            return view('pages.falsealarms.index')->with([
                'fas' => $fas
            ]);
        }
    }
}
