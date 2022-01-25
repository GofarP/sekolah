@extends('guest.main.main')

<!--============================= BLOG =============================-->

@section('container')

    <section class="blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-img_block">
                        <img src="{{ asset('storage/' . $artikel->image) }}" class="img-fluid"
                            style="width: 95%; height:400px" alt="blog-img" />
                        <div class="blog-date">
                            <span>{{ $artikel->created_at->format('d-m-Y') }}</span>
                        </div>
                    </div>
                    <div class="blog-tiltle_block mr-auto">
                        <h4>
                            <p>{{ $artikel->title }}</p>
                        </h4>
                        <h6>
                            <i class="fa fa-user" aria-hidden="true"></i> <span>{{ $artikel->penulis }}</span>
                            |
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <span>{{ $artikel->kategori->kategori }}</span>
                        </h6>
                        <div class="mt-3">
                            {!! $artikel->artikel !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blog-category_block">
                        <h3>Kategori</h3>
                        <ul>
                            @foreach ($kategori->take(5) as $kat)
                                <li>
                                    <a href="{{ url('kategori/' . $kat->slug) }}">
                                        {{ $kat->kategori }}
                                        <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ url('/kategori') }}">Kategori Lain...</a>
                    </div>
    </section>

@endsection
