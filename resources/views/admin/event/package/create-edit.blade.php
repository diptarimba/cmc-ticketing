@extends('layouts.admin.master')

@section('title', 'Event Package Management')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Event Package Management" mainTitle="SEKOIN 2022" subTitle="Event Package Management">
        <x-card.card>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('event.package.create', $event->id) ? route('event.package.store', $event->id) : route('event.package.update', ['event' => $event->id, 'package' => $package->id]) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.input required="" label="Package Name" name="name" :value="@$package->name" />
                    <x-forms.input required="" type="number" label="Price" name="price" :value="@$package->price" />
                </form>
                <button form="form" class="btn btn-outline-primary btn-pill">Submit</button>
                <x-action.cancel />
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
