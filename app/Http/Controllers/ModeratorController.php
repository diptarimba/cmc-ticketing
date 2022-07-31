<?php

namespace App\Http\Controllers;

use App\Models\EventRegister;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function index()
    {
        $audience = EventRegister::count();
        $audienceSemnas = EventRegister::whereNull('team_name')->whereNull('team_leader')->count();
        $audienceLomba = EventRegister::whereNotNull('team_name')->whereNotNull('team_leader')->count();
        return view('moderator.index', compact('audience', 'audienceSemnas', 'audienceLomba'));
    }
}
