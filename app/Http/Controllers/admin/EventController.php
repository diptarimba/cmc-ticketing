<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $event = Event::select();
            return DataTables::of($event)
            ->addIndexColumn()
            ->addColumn('action', function ($query){
                return $this->getActionColumn($query);
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.event.index');
    }

    public function create()
    {
        $register_type = [
            'SINGLE' => 'SINGLE',
            'TEAM' => 'TEAM'
        ];
        return view('admin.event.create-edit', compact('register_type'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'date' => 'required',
            'register_type' => is_null($request->is_register) ? 'nullable' : 'required',
            'description' => 'required',
            'image' => 'required|max:1024|mimes:jpg,jpeg,png',
        ]);

        if(!is_null($request->file) || !is_null($request->file_name))
        {
            $this->validate($request, [
                'file_name' => 'required',
                'file' => 'required|max:1024',
            ]);
        }

        $event = Event::create(array_merge($request->only('name', 'location', 'date', 'description'),[
            'register_type' => in_array($request->register_type, ['SINGLE', 'TEAM']) ? $request->register_type : null,
            'is_register' => is_null($request->is_register) ? 0 : 1,
            'is_gallery' => is_null($request->is_gallery) ? 0 : 1
        ]));

        $event->event_image()->create([
            'image' => $request->hasFile('image') ? '/storage/' . $request->file('image')->storePublicly('image') : '',
            'thumbnail' => 1
        ]);

        if($request->hasFile('file')){
            $event->event_document()->create([
                'name' => $request->file_name,
                'document' => '/storage/' . $request->file('file')->storePublicly('file')
            ]);
        }

        return redirect()->route('event.index')->with('success', 'Successfully create event');
    }

    public function edit(Event $event)
    {
        $register_type = [
            'SINGLE' => 'SINGLE',
            'TEAM' => 'TEAM'
        ];
        $image = $event->event_image;
        $document = $event->event_document;

        return view('admin.event.create-edit', compact('event', 'register_type', 'image', 'document'));
    }

    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
            'date' => 'required',
            'register_type' => is_null($request->is_register) ? 'nullable' : 'required',
            'description' => 'required',
            'image' => 'nullable|max:1024|mimes:jpg,jpeg,png',
        ]);

        if(!is_null($request->file) || !is_null($request->file_name))
        {
            $this->validate($request, [
                'file_name' => 'required',
                'file' => 'required|max:1024',
            ]);
        }

        $event->update(array_merge($request->only('name', 'location', 'date', 'description'), [
            'register_type' => in_array($request->register_type, ['SINGLE', 'TEAM']) ? $request->register_type : null,
            'is_register' => is_null($request->is_register) ? 0 : 1,
            'is_gallery' => is_null($request->is_gallery) ? 0 : 1
        ]));

        $event->event_image()->update([
            'image' => $request->hasFile('image') ? '/storage/' . $request->file('image')->storePublicly('image') : $event->event_image->image,
            'thumbnail' => 1
        ]);

        if($request->hasFile('file')){
            $event->event_document()->create([
                'name' => $request->file_name,
                'document' => '/storage/' . $request->file('file')->storePublicly('file')
            ]);
        }

        return redirect()->route('event.index')->with('success', 'Successfully update event');
    }

    public function destroy(Event $event)
    {
        try{
            $event->delete();
            return redirect()->route('event.index')->with('success', 'Success Delete Event');
        }catch(\Throwable $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function documentDestory(EventDocument $document)
    {
        try{
            $document->delete();
            unlink($document->document);
            return redirect()->route('event.index')->with('success', 'Success Delete Document');
        }catch(\Throwable $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function getActionColumn($data)
    {
        $editBtn = route('event.edit', $data->id);
        $packageBtn = route('event.package.index', $data->id);
        $deleteBtn = route('event.destroy', $data->id);
        $ident = Str::random(15);
        $dataReturn = '';
        $dataReturn .= '<a href="'.$editBtn.'" class="btn mx-1 my-1 btn-sm btn-outline-success">Edit</a>'
        .'<a href="'.$packageBtn.'" class="btn mx-1 my-1 btn-sm btn-outline-warning">Package</a>'
        . '<input form="form'.$ident .'" type="submit" value="Delete" class="mx-1 my-1 btn btn-sm btn-outline-danger">
        <form id="form'.$ident .'" action="'.$deleteBtn.'" method="post">
        <input type="hidden" name="_token" value="'.csrf_token().'" />
        <input type="hidden" name="_method" value="DELETE">
                </form>';

        return $dataReturn;
    }

}
