<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\EventTransaction;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $order_id = substr($request->order_id, 0, -6);

        EventTransaction::whereOrderId($order_id)->update([
            'pay_status' => $request->transaction_status,
            'pay_time' => $request->transaction_time
        ]);
    }
}
