<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('admin');
        $this->request = $request;
    }

    //
    public function index()
    {
        return view('admin/calendar/index');
    }
}
