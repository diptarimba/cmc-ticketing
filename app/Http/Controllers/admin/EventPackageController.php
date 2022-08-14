<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventPackage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EventPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event, Request $request)
    {
        if($request->ajax()){
            $package = EventPackage::whereHas('event', function ($query) use ($event)
            {
                $query->whereId($event->id);
            })->select();
            return DataTables::of($package)
            ->addIndexColumn()
            ->addColumn('action', function ($query){
                return $this->getActionColumn($query);
            })
            ->rawColumns(['action'])
            ->make(true);

        }
        return view('admin.event.package.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        return view('admin.event.package.create-edit', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required'
        ]);

        $event->event_package()->create($request->all());

        return redirect()->route('event.package.index', $event->id)->with('status', 'Success create event package');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventPackage  $package
     * @return \Illuminate\Http\Response
     */
    public function show(EventPackage $package)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventPackage  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event, EventPackage $package)
    {
        return view('admin.event.package.create-edit', compact('package', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventPackage  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Event $event, Request $request, EventPackage $package)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required'
        ]);

        $package->update($request->toArray());

        return redirect()->route('event.package.index', $event->id)->with('status', 'Success updating event package');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventPackage  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, EventPackage $package)
    {
        try {
            $package->delete();

            return redirect()->route('event.package.index', $event->id)->with('status', 'Success delete package');
        } catch (\Throwable $e)
        {
            return redirect()->route('event.package.index', $event->id)->with('error', 'Failed delete package');
        }
    }

    public function getActionColumn($data)
    {
        $editBtn = route('event.package.edit', ['event' => $data->event_id, 'package' => $data->id]);
        $deleteBtn = route('event.package.destroy', ['event' => $data->event_id, 'package' => $data->id]);
        $ident = Str::random(15);
        $dataReturn = '';
        $dataReturn .= '<a href="'.$editBtn.'" class="btn mx-1 my-1 btn-sm btn-outline-success">Edit</a>'
        . '<input form="form'.$ident .'" type="submit" value="Delete" class="mx-1 my-1 btn btn-sm btn-outline-danger">
        <form id="form'.$ident .'" action="'.$deleteBtn.'" method="post">
        <input type="hidden" name="_token" value="'.csrf_token().'" />
        <input type="hidden" name="_method" value="DELETE">
                </form>';

        return $dataReturn;
    }
}
