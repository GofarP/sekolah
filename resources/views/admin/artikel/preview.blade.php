@extends('admin.header.header-admin')

@section('content-header')
    <h1 class="h3 mb-0 text-gray-800">Preview Artikel</h1>
@endsection

@section('content')
    <div class="card ml-2" style="width:100%;">

        <div class="container">
            <div class="row">
                <div class="pt-3">
                    <img src="{{ asset('storage/' . $artikel->image) }}" alt="gambar preview" height="300" width="500">
                </div>
            </div>

            <div class="ml-2 pt-2 pb-2" style="color:#2D2D2D;">
                <h3>{{ $artikel->title }}</h3>

                <i class="fa fa-user" aria-hidden="true"></i> <span>{{ $artikel->penulis }}</span>
                |
                <i class="fa fa-tags" aria-hidden="true"></i> <span>{{ $artikel->kategori->kategori }}</span>
            </div>

            <div class="ml-2" style="color:#2d2d2d">
                <p>{!! $artikel->artikel !!}</p>
            </div>
        </div>




    </div>
@endsection
