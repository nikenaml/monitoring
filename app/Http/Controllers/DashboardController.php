<?php

namespace App\Http\Controllers;
use App\Models\FalseAlarm;


use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sum_alert = FalseAlarm::sum('sum_alert_email');
        $sum_false = FalseAlarm::sum('sum_false_alarm');
        $avg_ratio = FalseAlarm::avg('ratio_false');
        $items = FalseAlarm::orderBy('id','DESC')->take(5)->get();

        return view('pages.dashboard')->with([
            'sum_alert' => $sum_alert,
            'sum_false' => $sum_false,
            'avg_ratio' => $avg_ratio,
            'items' => $items,

        ]);
    }

    // public function chart()
    // {
    //  $data['lineChart'] = false_alarm::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"),\DB::raw('max(created_at) as createdAt'))
    //     ->whereYear('created_at', date('Y'))
    //     ->groupBy('month_name')
    //     ->orderBy('createdAt')
    //     ->get();

    //     return view('google-line-chart', $data);
    // }
}
