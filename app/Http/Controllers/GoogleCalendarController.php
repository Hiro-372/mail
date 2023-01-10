<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;

class GoogleCalendarController extends Controller
{
    public function index(Calendar $calendar,Request $request)
    {
        $calendar->index($request);
        return redirect('/');
    }
}