<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\FalseAlarmRequest;
use App\Models\FalseAlarm;
use Barryvdh\DomPDF\Facade as PDF;
// use PDF;
use Maatwebsite\Excel\Facades\Excel as Excel;
use App\Exports\FalseAlarmsExport;

// use DB;
use Illuminate\Support\Facades\DB;
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
        $fas = FalseAlarm::latest()->paginate(5);
        return view('pages.falsealarms.index')->with([
            'fas' => $fas
        ]);
        // nama 'fas' boleh bebas, asalkan nanti di index.blade.php disesuaikan untuk forelse nya

        // untuk ambil data di db berdasarkan paginate halaman
        // $fas = FalseAlarm::latest()->paginate(2);
        // return view('pages.falsealarms.index', compact('fas'));

        // if($request->has('searchBydate')){
        //     $fas = FalseAlarm::where('alert_date','>=',$request->from)->where('alert_date','<=',$request->to)->paginate(2);
        // }
        // else {
        // // untuk ambil data di db berdasarkan paginate halaman
        // $fas = FalseAlarm::paginate(5);}

        // return view('pages.falsealarms.index')->with([
        //     'fas' => $fas
        // ]);
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
        $calculation = (intval($request->sum_false_alarm) / intval($request->sum_alert_email)) * 100;

        $flA = new FalseAlarm;
        $flA->alert_date = $request->alert_date;
        $flA->note_alert_schedule = $request->note_alert_schedule;
        $flA->sum_alert_email = $request->sum_alert_email;
        $flA->id_comment = $request->id_comment;
        $flA->sum_false_alarm = $request->sum_false_alarm;
        $flA->ratio_false = round($calculation, 2);
        $flA->save();
        //$result = FalseAlarm::create($data);
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
        $calculation = (intval($request->sum_false_alarm) / intval($request->sum_alert_email)) * 100;
        $fa->alert_date = $request->alert_date;
        $fa->note_alert_schedule = $request->note_alert_schedule;
        $fa->sum_alert_email = $request->sum_alert_email;
        $fa->id_comment = $request->id_comment;
        $fa->sum_false_alarm = $request->sum_false_alarm;
        $fa->ratio_false = round($calculation, 2);
        $fa->save();
        return redirect()->route('falsealarms.index')->with('info','Data berhasil diperbaharui!');
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

    public function createPDF()
    {
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
        $data = $request->all();
        if ($request->has('from') && $request->has('to')) {
            $fas = FalseAlarm::where('alert_date','>=',$request->from)->where('alert_date','<=',$request->to)->paginate(5);
        } else {
            $fas = FalseAlarm::paginate(5);
        }
        return view('pages.falsealarms.index',compact('fas','data'));
    }

    public function exportBydate(Request $request)
    {
        $method = $request->method();

        if ($request->isMethod('post'))
        {
            $from = $request->input('from');
            $to   = $request->input('to');
            if ($request->has('search'))
            {
                // select search
                $fas = FalseAlarm::where('alert_date','>=',$request->from)->where('alert_date','<=',$request->to)->get();
                return view('pages.falsealarms.index',['fas' => $fas]);
            }
            elseif ($request->has('exportPDF'))
            {
                // select PDF
                $PDFReport = DB::select("SELECT * FROM false_alarms WHERE alert_date BETWEEN '$from' AND '$to'");
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

    // public function createExcel()
    // {
    // $fa_data = FalseAlarm::all()->toArray();
    // // $customer_data = DB::table('tbl_customer')->get()->toArray();
    // $fa_array[] = array('No', 'Tanggal Alert', 'Note Jumlah Alert per schedule', 'Total Alert', 'Id Komentar Salah Prediksi', 'Jumlah Komentar Salah Prediksi', 'Persentase Salah Prediksi', 'created_at', 'updated_at');
    // foreach($fa_data as $fa)
    //  { $fa_array[] = array(
    //    'No'  => $fa->id,
    //    'Tanggal Alert' => $fa->alert_date,
    //    'Note Jumlah Alert per schedule' => $fa->note_alert_schedule,
    //    'Total Alert'  => $fa->sum_alert_email,
    //    'Id Komentar Salah Prediksi' => $fa->id_comment,
    //    'Jumlah Komentar Salah Prediksi' => $fa->sum_false_alarm,
    //    'Persentase Salah Prediksi' => $fa->ratio_false,
    //    'created_at' => $fa->created_at,
    //    'updated_at' => $fa->updated_at

    //   );
    //  }

    // Excel::create('False Alarm Data', function($excel) use ($fa_array)
    // {
    // $excel->setTitle('False Alarm Data');
    // $excel->sheet('False Alarm Data', function($sheet) use ($fa_array){
    // $sheet->fromArray($fa_array, null, 'A1', false, false);});
    // })->download('xlsx');
    // }

    // public function createExcel(Request $request){
    //     dd($request->all());
    //     return Excel::download(new FalseAlarmsExport, 'Rekap Data False Alarms.xlsx');
    // }

    public function createExcel(){
        return Excel::download(new FalseAlarmsExport, 'Rekap Data False Alarms.xlsx');
    }
}
