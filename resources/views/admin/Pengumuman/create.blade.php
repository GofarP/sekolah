<head>
    <link rel="stylesheet" type="text/css" href="{{ url('bs/css/trix.css') }}">
    <script src="{{ url('bs/js/trix.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

    </style>
</head>
@extends('admin.header.header-admin')


@section('content-header')
    <h1 class="h3 mb-0 text-gray-800">Tambah Pengumuman</h1>
@endsection

@section('content')
    @include('sweetalert::alert')

    <div class="card w-75">
        <div class="container">
            <div class="col-lg-8">
                <form method="post" action="{{ route('pengumuman.store') }}" class="mb-5"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="mt-3">Judul Pengumuman</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                            placeholder="judul pengumuman anda" value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="mt-3">Slug:</label>
                        <input type="text" name="slug" id=slug class="form-control  @error('slug') is-invalid @enderror"
                            placeholder="Slug pengumuman anda" value="{{ old('slug') }}" readOnly>
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="mt-3">Tanggal Pengumuman:</label>
                        <div class="input-group date" id="datepicker">
                            <input type="text" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                id="tanggal" value="{{ old('tanggal') }}">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                            @error('tanggal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="pengumuman" class="mt-3">Pengumuman:</label>
                        <input id="pengumuman" type="hidden" name="pengumuman" value="{{ old('pengumuman') }}">

                        <trix-editor input="pengumuman" class=" @error('pengumuman') is-invalid @enderror form-control"
                            style=" overflow-y: auto ; height:300px"></trix-editor>


                        @error('pengumuman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success form-control text-center mt-3"> Tambah
                            Pengumuman</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener('change', function() {
            fetch('createslug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        
        $(function() {
            $('#datepicker').datetimepicker({
                format: 'DD-MM-YYYY HH:mm ',
                icons: {
                    time: "fas fa-clock"
                }
            });
        });
    </script>

@endsection
