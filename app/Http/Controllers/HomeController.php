<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegister;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $eventReg = Event::with('event_image')->where('is_gallery', 0)->get();
        $eventNonReg = Event::with('event_image')->where('is_gallery', 1)->get();
        return view('home.index', compact('eventReg', 'eventNonReg'));
    }

    public function detail($id)
    {
        $event = Event::with('event_image', 'event_document')->whereId($id)->first();
        return view('home.detail', compact('event'));
    }

    public function indexRegister($id)
    {
        $event = Event::whereId($id)->first();
        if($event == null){
            return redirect()->route('guest.home.index')->with('success', 'Register Tidak Ditemukan');
        }

        return view('home.register', compact('event'));
    }

    public function register(Request $request)
    {

        // dd($request->all());
        $this->validate($request, [
            'register_type' => 'required'
        ]);

        if($request->register_type == 'SINGLE')
        {
            $this->validate($request, [
                'name' => 'required',
                'gender' => 'required',
                'email' => 'required|email',
                'agency' => 'required',
                'phone' => 'required',
                'card' => 'required|mimes:jpeg,jpg,png|max:1024',
                'photo' => 'required|max:1024|mimes:jpeg,jpg,png',
                'twibbon' => 'required|max:1024|mimes:jpeg,jpg,png',
                'follow_ig_cmc' => 'required|max:1024|mimes:jpeg,jpg,png',
                'follow_ig_sekoin' => 'required|max:1024|mimes:jpeg,jpg,png',
                'payment' => 'required|max:1024|mimes:jpeg,jpg,png',
                'event_id' => 'required|exists:events,id'
            ]);

            EventRegister::create(array_merge($request->all(), [
                'card' => '/storage/' . $request->file('card')->storePublicly('card'),
                'photo' => '/storage/' . $request->file('photo')->storePublicly('photo'),
                'twibbon' => '/storage/' . $request->file('twibbon')->storePublicly('twibbon'),
                'follow_ig_cmc' => '/storage/' . $request->file('follow_ig_cmc')->storePublicly('follow_ig_cmc'),
                'follow_ig_sekoin' => '/storage/' . $request->file('follow_ig_sekoin')->storePublicly('follow_ig_sekoin'),
                'payment' => '/storage/' . $request->file('payment')->storePublicly('payment')
            ]));

            return redirect()->route('guest.home.index')->with('success', 'Anda berhasil mendaftar! Silahkan tunggu info berikutnya');

        } else {
            // dd($request->all());
            $this->validate($request,[
                'team_leader' => 'required',
                'team_name' => 'required',
                'data.*.name' => 'required',
                'data.*.gender' => 'required',
                'data.*.email' => 'required',
                'data.*.agency' => 'required',
                'data.*.phone' => 'required',
                'data.*.card' => 'required|mimes:jpeg,jpg,png|max:1024',
                'data.*.photo' => 'required|max:1024|mimes:jpeg,jpg,png',
                'data.*.twibbon' => 'required|max:1024|mimes:jpeg,jpg,png',
                'data.*.follow_ig_cmc' => 'required|max:1024|mimes:jpeg,jpg,png',
                'data.*.follow_ig_sekoin' => 'required|max:1024|mimes:jpeg,jpg,png',
                'payment' => 'required|max:1024|mimes:jpeg,jpg,png',
                'event_id' => 'required|exists:events,id'
            ]);
            for($x = 0; $x < count($request->data); $x++){
                EventRegister::create(array_merge($request->all(),[
                    'card' => '/storage/' . $request->file('data.*.card')[$x]->storePublicly('card'),
                    'photo' => '/storage/' . $request->file('data.*.photo')[$x]->storePublicly('photo'),
                    'twibbon' => '/storage/' . $request->file('data.*.twibbon')[$x]->storePublicly('twibbon'),
                    'follow_ig_cmc' => '/storage/' . $request->file('data.*.follow_ig_cmc')[$x]->storePublicly('follow_ig_cmc'),
                    'follow_ig_sekoin' => '/storage/' . $request->file('data.*.follow_ig_sekoin')[$x]->storePublicly('follow_ig_sekoin'),
                    'payment' => '/storage/' . $request->file('payment')->storePublicly('payment'),
                    'name' => $request->data[$x]['name'],
                    'gender' => $request->data[$x]['gender'],
                    'email' => $request->data[$x]['email'],
                    'agency' => $request->data[$x]['agency'],
                    'phone' => $request->data[$x]['phone'],
                    'team_leader' => $request->team_leader,
                    'team_name' => $request->team_name,
                    'event_id' => $request->event_id,
                    'register_type' => $request->register_type
                ]));
            };

            return redirect()->route('guest.home.index')->with('success', 'Anda berhasil mendaftar! Silahkan tunggu info berikutnya');
        }
    }

}
