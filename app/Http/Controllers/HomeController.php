<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $event = Event::with('event_image')->get();
        return view('home.index', compact('event'));
    }

    public function detail($id)
    {
        $event = Event::with('event_image', 'event_document')->whereId($id)->first();
        return view('home.detail', compact('event'));
    }

    public function register(Request $request)
    {

    }

}
