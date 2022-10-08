<?php

namespace App\Http\Controllers\PKK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pkk.dashboard', [
            'title' => 'dashboard',
            'subtitle' => '',
            'data' => '',
            'active' => 'dashboard',
        ]);
    }
}
