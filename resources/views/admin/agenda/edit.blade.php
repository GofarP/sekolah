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
    <h1 class="h3 mb-0 text-gray-800">Edit Agenda</h1>
@endsection

@section('content')
    @include('sweetalert::alert')
    <div class="card w-75">
        <div class="container">
            <div class="col-lg-8">
                <form method="post" action="{{ route('agenda.update', $agenda->slug) }}" class="mb-5"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="mt-3">Judul</label>
                        <input type="text" name="title" id="title" placeholder="Judul Agenda Anda"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $agenda->title) }}">

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="mt-3">Slug</label>

                        <input type="text" name="slug" id="slug" placeholder="Slug anda"
                            class="form-control @error('slug') is-invalid @enderror"
                            value="{{ old('slug', $agenda->slug) }}" readonly>
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="mt-3">Tanggal Agenda Dijalankan</label>
                        <div class="input-group date" id="datepicker">
                            <input type="text" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                id="tanggal"
                                value="{{ old('tanggal', \Carbon\Carbon::parse($agenda->untuk_tanggal)->format('d-m-Y')) }}">
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
                        <label for="agenda" class="mt-3">Agenda:</label>
                        <input id="agenda" type="hidden" name="agenda" value="{{ old('agenda', $agenda->agenda) }}">

                        <trix-editor input="agenda" class=" @error('agenda') is-invalid @enderror form-control"
                            style=" overflow-y: auto ; height:300px"></trix-editor>


                        @error('agenda')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success form-control">edit Agenda</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.addEventListener('trix-file-accept', function(e) {
                e.preventDefault();
            })

            const url = "/admin/agenda/createslug?title="
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');
            title.addEventListener('change', function() {
                fetch(url + title.value)
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
