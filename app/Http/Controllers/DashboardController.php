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

        return view('pages.dashboard')->with([
            'sum_alert' => $sum_alert
        ]);
    }
}
