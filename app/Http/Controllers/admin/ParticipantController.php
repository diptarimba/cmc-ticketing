<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\EventRegister;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $registran = EventRegister::with('event_transaction', 'event_package', 'event')->select();
            return DataTables::of($registran)
            ->addIndexColumn()
            ->addColumn('action', function ($query){
                return $this->getActionColumn($query) ?? '';
            })
            ->addColumn('package_name', function ($query){
                return isset($query->event_package->name) ?
                    $query->event_package->name : '';
            })
            ->addColumn('package_price', function ($query){
                return isset($query->event_package->price) ?
                $query->event_package->price : '';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('admin.participant.index');
    }

    public function edit($id)
    {
        $registran = EventRegister::with('event_transaction', 'event_package', 'event')->whereId($id)->first();
        return view('admin.participant.create-edit', compact('registran'));
    }

    public function getActionColumn($data)
    {
        $editBtn = route('audience.edit', $data->id);
        $dataReturn = '';
        $dataReturn .= '<a href="'.$editBtn.'" class="btn mx-1 my-1 btn-sm btn-outline-success">Edit</a>';

        return $dataReturn;
    }
}
