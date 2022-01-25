<head>

    <link rel="stylesheet" type="text/css" href="{{ url('bs/css/trix.css') }}">
    <script src="{{ url('bs/js/trix.js') }}"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

    </style>
</head>

@extends('admin.header.header-admin')
@section('content-header')
    <h1 class="h3 mb-0 text-gray-800">Edit Artikel</h1>
@endsection

@section('content')
    @include('sweetalert::alert')
    <div class="card w-75">
        <div class="container">
            <div class="col-lg-8">
                <form method="post" action="{{ route('artikel.update', $artikel->slug) }}" class="mb-5"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="mt-3">Judul:</label>
                        <input type="text" name="title" id="title" placeholder="Judul Tulisan Anda"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('value', $artikel->title) }}">

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="mt-3">Slug:</label>
                        <input type="text" name="slug" id=slug class="form-control  @error('slug') is-invalid @enderror"
                            placeholder="Slug artikel anda" value="{{ old('slug', $artikel->slug) }}" readonly>
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="mt-3">Kategori</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') @enderror">
                            @foreach ($category as $cat)
                                @if (old('category_id') == $cat->id)
                                    <option value="{{ $cat->id }}" selected>{{ $cat->kategori }}</option>
                                @else
                                    <option value="{{ $cat->id }}">{{ $cat->kategori }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="mt-3">Gambar</label>
                        <input type="file" name="image" id="image"
                            class="form-control-file @error('image') is-invalid  @enderror" onchange="previewImage()">
                        <input type="hidden" name="oldImage" value={{ $artikel->image }}>

                        @if ($artikel->image)
                            <img src="{{ asset('storage/' . $artikel->image) }}"
                                class="img-preview img-fluid mt-3 mb-3 col-sm-5">
                        @else
                            <img class="img-preview img-fluid mt-3 mb-3 col-sm-5">
                        @endif

                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="artikel" class="mt-3">Isi Artikel:</label>

                        <input id="artikel" type="hidden" name="artikel" value="{{ old('artikel', $artikel->artikel) }}">

                        <trix-editor input="artikel" class=" @error('artikel') is-invalid @enderror form-control"
                            style=" overflow-y: auto ; height:300px"></trix-editor>

                        @error('artikel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success form-control text-center mt-3"> Edit Artikel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const url = '/admin/artikel/createslug?title='
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch(url + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })


        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
