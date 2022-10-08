<?php

namespace App\Http\Controllers\Kader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('kader.dashboard', [
            'title' => 'dashboard',
            'subtitle' => '',
            'data' => '',
            'active' => 'dashboard',
        ]);
    }
}
