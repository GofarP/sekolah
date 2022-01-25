@extends('admin.header.header-admin')


@section('content-header')
    <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
@endsection

@section('content')
    @include('sweetalert::alert')

    <div class="card w-75">
        <div class="container">
            <div class="col-lg-8">
                <form method="post" action="{{ route('kategori.store') }}" class="mb-5"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="kategori" class="mt-3">Nama Kategori:</label>
                        <input type="text" name="kategori" id="kategori" placeholder="Nama Kategori Anda"
                            class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}">
                        @error('kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="mt-3">Slug:</label>
                        <input type="text" name="slug" id=slug class="form-control  @error('slug') is-invalid @enderror"
                            placeholder="Slug artikel anda" value="{{ old('slug') }}" readOnly>
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="mt-3">Gambar</label>
                        <input type="file" name="image" id="image"
                            class="form-control-file @error('image') is-invalid @enderror" onchange="previewImage()">
                        <img class="img-preview img-fluid mt-3 mb-3 col-sm-5">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success form-control text-center mt-3"> Tambah
                            Kategori</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const kategori = document.querySelector('#kategori');
        const slug = document.querySelector('#slug');

        kategori.addEventListener('change', function() {
            fetch('createslug?kategori=' + kategori.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
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
