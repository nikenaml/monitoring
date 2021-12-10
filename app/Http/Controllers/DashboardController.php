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
        // $avg_ratio = FalseAlarm::avg('sum_alert_email');
        $items = FalseAlarm::orderBy('id','DESC')->take(5)->get();

        return view('pages.dashboard')->with([
            'sum_alert' => $sum_alert,
            'sum_false' => $sum_false,
            // 'avg_ratio' => $avg_ratio
            'items' => $items,

        ]);
    }
}
