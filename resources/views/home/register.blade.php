@extends('layouts.master')

@section('header')
@endsection

@section('body')
    <div class="row">
        <div class="container pt-5 mb-5">
            <a href="{{ route('guest.home.detail', $event->id) }}" class="btn btn-pill btn-outline-secondary btn-sm">Back</a>
            <x-flash />
            <div class="card mt-2 shadow">
                <div class="card-body">
                    <form action="{{ route('guest.post.register') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($event->register_type == 'TEAM')
                            <x-forms.input label="Nama Team" name="team_name" value="" />
                            <x-forms.input label="Ketua Team" name="team_leader" value="" />
                            @for ($x = 0; $x < 2; $x++)
                                <hr>
                                @if ($x > 0)
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="alonely">
                                    <label class="form-check-label" for="alonely">Saya seorang diri</label>
                                  </div>
                                    <div id="alone">
                                @endif
                                <label for="" class="form-label text-center">Peserta {{$x+1}}</label>
                                <x-forms.input label="Nama Lengkap" name="{{ 'data[' .$x .'][name]' }}" value="" />
                                <div class="mb-2">
                                    <div class="col-form-label">Jenis Kelamin</div>
                                    <select class="form-control" name="{{ 'data[' .$x .'][gender]' }}">
                                        <option value="M">Laki Laki</option>
                                        <option value="F">Perempuan</option>
                                    </select>
                                </div>
                                <x-forms.input label="Email" name="{{ 'data[' .$x .'][email]' }}" value="" />
                                <x-forms.input label="Asal Instansi" name="{{ 'data[' .$x .'][agency]' }}" value="" />
                                <x-forms.input label="Nomor Hp" name="{{ 'data[' .$x .'][phone]' }}" value="" />
                                <x-forms.file label="Foto KTM" name="{{ 'data[' .$x .'][card]' }}" id="gallery-photo-add-{{$x}}-ktm" />
                                <div class="gallery-{{$x}}-ktm row row-cols-12 justify-content-center" id="isi-gallery-{{$x}}-ktm"></div>

                                <x-forms.file label="Foto Pas" name="{{ 'data[' .$x .'][photo]' }}" id="gallery-photo-add-{{$x}}-photo" />
                                <div class="gallery-{{$x}}-photo row row-cols-12 justify-content-center" id="isi-gallery-{{$x}}-photo"></div>

                                <x-forms.file label="Bukti Twibbon" name="{{ 'data[' .$x .'][twibbon]' }}" id="gallery-photo-add-{{$x}}-twibbon" />
                                <div class="gallery-{{$x}}-twibbon row row-cols-12 justify-content-center" id="isi-gallery-{{$x}}-twibbon"></div>

                                <x-forms.file label="Bukti Follow Ig @comcpolines" name="{{ 'data[' .$x .'][follow_ig_cmc]' }}" id="gallery-photo-add-{{$x}}-cmc" />
                                <div class="gallery-{{$x}}-cmc row row-cols-12 justify-content-center" id="isi-gallery-{{$x}}-cmc"></div>

                                <x-forms.file label="Bukti Follow Ig @sekoin2022" name="{{ 'data[' .$x .'][follow_ig_sekoin]' }}" id="gallery-photo-add-{{$x}}-sekoin" />
                                <div class="gallery-{{$x}}-sekoin row row-cols-12 justify-content-center" id="isi-gallery-{{$x}}-sekoin"></div>
                                @if ($x > 0)
                                    </div>
                                @endif
                            @endfor
                            <hr>
                            <x-forms.file label="Bukti Pembayaran" name="payment" id="gallery-photo-add-payment" />
                            <div class="gallery-payment row row-cols-12 justify-content-center" id="isi-gallery-payment"></div>
                            <div class="mb-2">
                                <input type="hidden" name="register_type" value="TEAM">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                            </div>
                        @else
                            <x-forms.input label="Nama Lengkap" name="name" value="" />
                            <div class="mb-2">
                                <div class="col-form-label">Jenis Kelamin</div>
                                <select class="form-control" name="gender">
                                    <option value="M">Laki Laki</option>
                                    <option value="F">Perempuan</option>
                                </select>
                            </div>
                            <x-forms.input label="Email" name="email" value="" />
                            <x-forms.input label="Asal Instansi" name="agency" value="" />
                            <x-forms.input label="Nomor Hp" name="phone" value="" />
                            <x-forms.file label="Foto KTM" name="card" id="gallery-photo-add-ktm" />
                            <div class="gallery-ktm row row-cols-12 justify-content-center" id="isi-gallery-ktm"></div>
                            <x-forms.file label="Foto Pas" name="photo" id="gallery-photo-add-photo" />
                            <div class="gallery-photo row row-cols-12 justify-content-center" id="isi-gallery-photo"></div>
                            <x-forms.file label="Bukti Twibbon" name="twibbon" id="gallery-photo-add-twibbon" />
                            <div class="gallery-twibbon row row-cols-12 justify-content-center" id="isi-gallery-twibbon">
                            </div>
                            <x-forms.file label="Bukti Follow Ig @comcpolines" name="follow_ig_cmc"
                                id="gallery-photo-add-cmc" />
                            <div class="gallery-cmc row row-cols-12 justify-content-center" id="isi-gallery-cmc"></div>
                            <x-forms.file label="Bukti Follow Ig @sekoin2022" name="follow_ig_sekoin"
                                id="gallery-photo-add-sekoin" />
                            <div class="gallery-sekoin row row-cols-12 justify-content-center" id="isi-gallery-sekoin">
                            </div>
                            <x-forms.file label="Bukti Pembayaran" name="payment" id="gallery-photo-add-payment" />
                            <div class="gallery-payment row row-cols-12 justify-content-center" id="isi-gallery-payment">
                            </div>
                            <div class="mb-2">
                                <input type="hidden" name="register_type" value="SINGLE">
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                            </div>
                        @endif
                        <button class="btn btn-primary d-flex" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('imageReview.js') }}"></script>
    <script src="{{asset('singleReview.js')}}"></script>
    <script>
        @if ($event->register_type == 'TEAM')
        @php
        $items = [
            'ktm',
            'photo',
            'twibbon',
            'cmc',
            'sekoin',
            'payment'
        ];
        for($x = 0; $x < 2; $x++){
            foreach($items as $each){
                echo "$(`#gallery-photo-add-$x-$each`).on('change', function () {\nimagesPreview(this, `div.gallery-$x-$each`);\n});" . PHP_EOL;

                echo "$(`#gallery-photo-add-$x-$each`).on('click', function () {\nlet parent = document.getElementById(`isi-gallery-$x-$each`)\nwhile (parent.firstChild) {\n\tparent.firstChild.remove()\n}\n});";
            }
        }
        @endphp
        @endif
        $(document).ready(() => {
            $('#alonely').on('click', function(){
                if ($('#alonely').is(':checked')) {
                    console.log('checked');
                    $('#alone :input').attr('disabled', true);
                    $('#alone :button').attr('disabled', true);
                }
            })
        })
    </script>
@endsection
