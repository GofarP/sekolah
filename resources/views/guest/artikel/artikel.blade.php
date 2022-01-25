@extends('guest.main.main')

<!--============================= BLOG =============================-->

@section('container')
    <section class="blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    @forelse ($artikel as $art )
                        <div class="blog-single-item">
                            <div class="blog-img_block">
                                <img src="{{ asset('storage/' . $art->image) }}" class="img-fluid"
                                    style="height:350px;width:350px" alt="blog-img" />
                                <div class="blog-date">
                                    <span>{{ $art->created_at->format('d-m-Y') }}</span>
                                </div>
                            </div>
                            <div class="blog-tiltle_block">
                                <h4>
                                    <a>{{ $art->title }}</a>
                                </h4>
                                <h6>
                                    <a><i class="fa fa-user" aria-hidden="true"></i><span>{{ $art->penulis }}</span>
                                    </a>
                                    |
                                    <a href="#"><i class="fa fa-tags"
                                            aria-hidden="true"></i><span>{{ $art->kategori->kategori }}</span></a>
                                </h6>
                                {!! substr(strip_tags($art->artikel), 0, 60) !!}
                                @if (strlen($art->artikel) >= 60)
                                    ...
                                @endif
                                <div class="blog-icons">
                                    <div class="blog-share_block">
                                        <a href="{{ url('artikel/' . $art->slug) }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 class="text-center">Artikel Tidak Ditemukan Atau Belum Ditambahkan Untuk Kategori Ini</h3>
                    @endforelse

                </div>
                <div class="col-md-4">
                    <div class="blog-category_block">
                        <form class="form" method="get" action="{{ route('search') }}">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" style="height:34px"
                                    placeholder="Cari Judul Artikel">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <h3>Kategori</h3>
                        <ul>
                            @forelse ($kategori->take(5) as $kat)
                                <li>
                                    <a href="{{ url('/artikel/kategori/' . $kat->slug) }}">
                                        {{ $kat->kategori }}
                                        <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                </li>
                            @empty
                                <li>
                                    <span>Belum Ada Kategori ditambahkan <i class="fa fa-caret-right"
                                            aria-hidden="true"></i></span>
                                </li>
                            @endforelse

                        </ul>

                        <a href="/kategori">Kategori Lain...</a>

                    </div>
                </div>
                <div class="col-md-12 text-center">
                    {{ $artikel->links() }}
                </div>
            </div>
        </div>
    @endsection
</section>

</html>
