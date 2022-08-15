<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPackage;
use App\Models\EventRegister;
use App\Models\EventTransaction;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Ramsey\Uuid\Uuid;

class HomeController extends Controller
{
    public function index()
    {
        $eventReg = Event::with('event_image')->where('is_gallery', 0)->get();
        $eventNonReg = Event::with('event_image')->where('is_gallery', 1)->get();
        // dd($eventNonReg);
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
        $package = EventPackage::whereHas('event', function($query) use ($id){
            $query->whereId($id);
        })->get();

        if($event == null){
            return redirect()->route('guest.home.index')->with('success', 'Register Tidak Ditemukan');
        }

        if(count($package) == 0){
            return redirect()->route('guest.home.index')->with('error', 'Paket tidak tersedia');
        }
        return view('home.register', compact('event', 'package'));
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
                'package_id' => 'required',
                'card' => 'required|mimes:jpeg,jpg,png|max:1024',
                'photo' => 'required|max:1024|mimes:jpeg,jpg,png',
                'twibbon' => 'required|max:1024|mimes:jpeg,jpg,png',
                'follow_ig_cmc' => 'required|max:1024|mimes:jpeg,jpg,png',
                'follow_ig_sekoin' => 'required|max:1024|mimes:jpeg,jpg,png',
                // 'payment' => 'required|max:1024|mimes:jpeg,jpg,png',
                'event_id' => 'required|exists:events,id'
            ]);

            $registran = EventRegister::create(array_merge($request->all(), [
                'card' => '/storage/' . $request->file('card')->storePublicly('card'),
                'photo' => '/storage/' . $request->file('photo')->storePublicly('photo'),
                'twibbon' => '/storage/' . $request->file('twibbon')->storePublicly('twibbon'),
                'follow_ig_cmc' => '/storage/' . $request->file('follow_ig_cmc')->storePublicly('follow_ig_cmc'),
                'follow_ig_sekoin' => '/storage/' . $request->file('follow_ig_sekoin')->storePublicly('follow_ig_sekoin'),
                // 'payment' => '/storage/' . $request->file('payment')->storePublicly('payment')
            ]));

            $transaction = EventTransaction::create([
                'event_package_id' => $request->package_id,
                'event_register_id' => $registran->id,
                'order_id' => Uuid::uuid4()
            ]);

            return redirect()->route('guest.payment', $transaction->order_id)->with('success', 'Anda berhasil mendaftar! Silahkan selesaikan pembayaran!');

        } else {
            // dd($request->all());
            $this->validate($request,[
                'team_leader' => 'required',
                'team_name' => 'required',
                'package_id' => 'required',
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
                // 'payment' => 'required|max:1024|mimes:jpeg,jpg,png',
                'event_id' => 'required|exists:events,id'
            ]);
            $tokenRegister = Uuid::uuid4();
            for($x = 0; $x < count($request->data); $x++){
                $registran = EventRegister::create(array_merge($request->all(),[
                    'card' => '/storage/' . $request->file('data.*.card')[$x]->storePublicly('card'),
                    'photo' => '/storage/' . $request->file('data.*.photo')[$x]->storePublicly('photo'),
                    'twibbon' => '/storage/' . $request->file('data.*.twibbon')[$x]->storePublicly('twibbon'),
                    'follow_ig_cmc' => '/storage/' . $request->file('data.*.follow_ig_cmc')[$x]->storePublicly('follow_ig_cmc'),
                    'follow_ig_sekoin' => '/storage/' . $request->file('data.*.follow_ig_sekoin')[$x]->storePublicly('follow_ig_sekoin'),
                    // 'payment' => '/storage/' . $request->file('payment')->storePublicly('payment'),
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

                $transaction = EventTransaction::create([
                    'event_package_id' => $request->package_id,
                    'event_register_id' => $registran->id,
                    'order_id' => $tokenRegister
                ]);
            };
            return redirect()->route('guest.payment', $transaction->order_id)->with('success', 'Anda berhasil mendaftar! Silahkan selesaikan pembayaran!');
            // return redirect()->route('guest.home.index')->with('success', 'Anda berhasil mendaftar! Silahkan tunggu info berikutnya');
        }
    }

    public function payment($uuid){
        $trx = EventTransaction::with('event_package', 'event_register.event')->whereOrderId($uuid)->whereNull('pay_status')->whereNull('pay_time')->first();

        if($trx == null)
        {
            return redirect()->route('guest.home.index')->with('error', 'Transaction Not Found');
        }

        $params = array(
            'transaction_details' => array(
                'order_id' => $uuid . '-' . substr(time(), -5),
                'gross_amount' => $trx->event_package->price,
            ),
            'payment_type' => 'qris',
            'customer_details' => array(
                'first_name' => $trx->event_register->name,
                'email' => $trx->event_register->email,
            ),
        );

        $snapToken = Snap::getSnapToken($params);

        return view('home.payment', compact('trx', 'snapToken'));
    }

    public function thankyou(){

        return view('home.thankyou');
    }

}
