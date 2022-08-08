<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\EventRegister;

class HomeController extends Controller
{
    public function index()
    {
        $audience = EventRegister::count();
        $audienceSemnas = EventRegister::whereNull('team_name')->whereNull('team_leader')->count();
        $audienceLomba = EventRegister::whereNotNull('team_name')->whereNotNull('team_leader')->count();
        return view('admin.home', compact('audience', 'audienceSemnas', 'audienceLomba'));
    }
}
