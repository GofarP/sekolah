@extends('guest.main.main')

@section('container')
    <div class="container pb-3">
        <div class="row">
            <div class="card w-100 h-75 mt-5 mb-3">
                <div class="card-body">
                    <h1 class="h3 mb-0 text-gray-800 pt-3 pl-3 ml-3">Semua Kategori</h1>

                    <div class="row ml-3">

                        @foreach ($kategori as $kat)
                            <a href="{{ url('/artikel/kategori/' . $kat->slug) }}">
                                <div class="card mt-4 ml-3 mb-3" style="height:200px;width:200px;">
                                    <img class="card-img-top" style="height: 150px"
                                        src="{{ asset('storage/'.$kat->image)}}" alt="Card image cap">
                                    <p class="text-center mt-2" style="color:black;">{{ $kat->kategori }}</p>
                                </div>
                            </a>
                        @endforeach

                    </div>

                    @if (sizeof($kategori) == 0)
                        <h3 class="text-center">Belum Ada Kategori Ditambahkan</h3>
                    @endif

                    <div class="ml-4 mt-3 mb-3">
                        {{ $kategori->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
