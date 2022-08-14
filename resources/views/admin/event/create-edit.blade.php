@extends('layouts.admin.master')

@section('title', 'Event Management')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Event Management" mainTitle="SEKOIN 2022" subTitle="Event Management">
        <x-card.card>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('event.create') ? route('event.store') : route('event.update', @$event->id) }}"
                    method="post" enctype="multipart/form-data">
                    @if (request()->routeIs('event.edit'))
                        <div class="col-12 card previewPictDB">
                            <div class="my-auto">
                                <img class="img-thumbnail imagePreview" src="{{ asset($image->image) }}" alt="">
                            </div>
                        </div>
                    @endif
                    @csrf
                    <x-forms.put-method />
                    <x-forms.input required="" label="Nama Event" name="name" :value="@$event->name" />
                    <x-forms.input required="" label="Lokasi" name="location" :value="@$event->location" />
                    <x-forms.date required="" label="Diadakan pada" name="date" :value="@\Carbon\Carbon::parse($event->date)->format('Y-m-d')" />
                    <x-forms.select label="Select Type Register" :items="$register_type" name="register_type" :value="@$event->register_type" />
                    <x-forms.wysiwyg label="Deskripsi" name="description" :value="@$event->description" />
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_register" id="flexSwitchCheckChecked"
                            {{ @$event->is_register ? 'checked=""' : '' }}>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Perlu Registrasi</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_gallery" id="flexSwitchCheckChecked"
                            {{ @$event->is_gallery ? 'checked=""' : '' }}>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Hanya Galeri</label>
                    </div>
                    <x-forms.input required="" label="File Name" name="file_name" :value="@$event->locatio" />
                    <x-forms.file name="file" label="File Document" />
                    <x-forms.file label="Foto Event" name="image" id="gallery-photo-add" />
                    <div class="gallery row row-cols-12 justify-content-center" id="isi-gallery"></div>
                </form>
                <button form="form" class="btn btn-outline-primary btn-pill">Submit</button>
                <x-action.cancel />
                <hr />
                @if (request()->routeIs('event.edit'))
                    <div class="mb-3">
                        <span class="form-label">File Tersedia : </span>
                        <ul>
                            @foreach ($document as $each)
                                <li class="mb-1"><a href="{{ $each->document }}"
                                        class="btn btn-sm btn-primary">{{ $each->name }}</a>
                                    <x-action.delete action="{{ route('document.destroy', $each->id) }}"
                                        ident="{{ Illuminate\Support\Str::random(10) }}" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')
    <script src="{{ asset('imageReview.js') }}"></script>
    <script>
        //Menampilkan Thumbnail sebelum upload
        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'div.gallery');
        });

        //Menghapus Thumbnail apabila terdapat pergantian file upload
        $('#gallery-photo-add').on('click', function() {
            // console.log('Masuk')
            let parent = document.getElementById("isi-gallery")
            while (parent.firstChild) {
                parent.firstChild.remove()
            }
        });
    </script>
@endsection
