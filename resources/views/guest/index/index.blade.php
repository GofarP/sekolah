@extends('guest.main.main')

@section('container')
    <section>
        <div class="slider_img layout_two">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">

                    {{-- @if (count($artikel) == 0)
                        <div class="carousel-item active">
                            <img class="d-block" src="{{ url('images/themes/slider.jpg') }}" alt="First slide" />
                            <div class="carousel-caption d-md-block">
                                <div class="slider_title">
                                    <h1>Bepikir Kreaftif &amp; Inovatif</h1>
                                    <h4>
                                        Bagi kami kreativitas merupakan gerbang masa depan.<br />
                                        kreativitas akan mendorong inovasi. <br />
                                        Itulah yang kami lakukan.
                                    </h4>
                                    <div class="slider-btn">
                                        <a href="#" class="btn btn-default">Learn more</a>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @endif --}}

                    <div class="carousel-item active">
                        <img class="d-block" 
                            src="{{ asset('storage/artikel-images/' . 'anu.jpg') }}" alt="First slide" />
                        <div class="carousel-caption d-md-block">
                            <div class="slider_title">
                                <h1>Bepikir Kreaftif &amp; Inovatif</h1>
                                <h4>
                                    Bagi kami kreativitas merupakan gerbang masa depan.<br />
                                    kreativitas akan mendorong inovasi. <br />
                                    Itulah yang kami lakukan.
                                </h4>
                                <div class="slider-btn">
                                    <a href="#" class="btn btn-default">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block" src="{{ url('images/themes/slider-2.jpg') }}" alt="Second slide" />
                        <div class="carousel-caption d-md-block">
                            <div class="slider_title">
                                <h1>Guru Bekualitas Tinggi</h1>
                                <h4>
                                    Guru merupakan faktor penting dalam proses
                                    belajar-mengajar.<br />
                                    Itulah kenapa kami mendatangkan guru-guru <br />terbaik dari
                                    berbagai penjuru.
                                </h4>
                                <div class="slider-btn">
                                    <a href="#" class="btn btn-default">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block" src="{{ url('images/themes/slider-3.jpg') }}" alt="Third slide" />
                        <div class="carousel-caption d-md-block">
                            <div class="slider_title">
                                <h1>Proses Belajar Interatif</h1>
                                <h4>
                                    Kami membuat proses belajar mengajar menjadi lebih
                                    interatif.<br />
                                    dengan demikian siswa lebih menyukai <br />proses belajar.
                                </h4>
                                <div class="slider-btn">
                                    <a href="#" class="btn btn-default">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <section class="our_courses">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Artikel Terbaru</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($artikel->take(4) as $art)
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

                        <div class="courses_box mb-4 h-100">

                            <div class="container">

                                <img src="{{ asset('storage/' . $art->image) }}" class="img-fluid pt-3"
                                    alt="courses-img" />

                                <!-- // end .course-img-wrap -->
                                <a href="{{ url('artikel/' . $art->slug) }}" class="course-box-content">
                                    <h3 style="text-align: center">{{ $art->title }}</h3>
                                </a>
                                <div class="pb-3 font-weight-bold">{!! substr(strip_tags($art->artikel), 0, 60) !!}
                                    @if (strlen($art->artikel) >= 100)
                                        ...
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
            @if (count($artikel) == 0)
                <h4 class="text-center ml-3">Belum Ada Artikel Ditambahkan</h4>
            @endif
            <br />
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="/artikel" class="btn btn-default btn-courses">View More</a>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="event">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="text-center">Pengumuman</h3>
                    <hr class="pengumuman-line mx-auto">
                    <div class="event-img2">
                        @foreach ($pengumuman as $umum)
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="{{ url('images/themes/announcement-icon.png') }}" class="img-fluid"
                                        alt="event-img" />
                                </div>
                                <!-- // end .col-sm-3 -->
                                <div class="col-sm-9">
                                    <h3>
                                        <a href="#" id="btnpengumuman" data-target="#modalpreview" data-toggle="modal"
                                            data-title="{{ $umum->title }}"
                                            data-tanggal="{{ \Carbon\Carbon::parse($umum->untuk_tanggal)->format('d-m-Y H:i') }}"
                                            data-pengumuman="{{ $umum->pengumuman }}">{{ $umum->title }}</a>
                                    </h3>
                                    <span>{{ \Carbon\Carbon::parse($umum->untuk_tanggal)->format('d - m - Y') }}</span>
                                    <p>{!! substr(strip_tags($umum->pengumuman), 0, 30) !!}
                                        @if (strlen($umum->pengumuman) >= 60)
                                            ...
                                        @endif
                                    </p>
                                </div>
                                <!-- // end .col-sm-7 -->
                            </div>
                            <!-- // end .row -->
                        @endforeach
                    </div>

                    @if (count($pengumuman) == 0)
                        <h3 class="text-center">Belum Ada Pengumuman Ditambahkan</h3>
                    @endif

                    <div class="container bg-light mb-4">
                        <div class="col-md-12 text-center">
                            <a href="pengumuman/" class="btn btn-primary text-center mt-3 mb-3">Lihat Pengumuman Yang
                                Lain</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h3 class="text-center">Agenda</h3>
                    <hr class="agenda-line mx-auto">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($agenda as $agen)
                                <div class="event_date">
                                    <div class="event-date-wrap">
                                        <p>{{ \Carbon\Carbon::parse($agen->created_at)->format('d') }}</p>
                                        <span>{{ \Carbon\Carbon::parse($agen->created_at)->format('M Y') }}</span>
                                    </div>
                                </div>
                                <div class="date-description">
                                    <h3>
                                        <a href="#" data-target="#modalpreview" id="btnagenda" data-toggle="modal"
                                            data-title="{{ $agen->title }}"
                                            data-tanggal="{{ \Carbon\Carbon::parse($agen->untuk_tanggal)->format('d-m-Y H:i') }}"
                                            data-agenda="{{ $agen->agenda }}">{{ $agen->title }}</a>
                                    </h3>
                                    <p>
                                        {!! substr(strip_tags($agen->agenda), 0, 30) !!}
                                        @if (strlen($agen->agenda) >= 30)
                                            ...
                                        @endif
                                    </p>
                                    <hr class="event_line" />
                                    <div class="container bg-light">

                                    </div>
                                </div>
                            @endforeach

                            @if (count($agenda) == 0)
                                <h3 style="text-align: center">Belum Ada Agenda Ditambahkan</h3>
                            @endif

                        </div>

                        <div class="container bg-light mt-2 mb-4 text-center">
                            <a href="/agenda" class="btn btn-primary ">Lihat Agenda Yang Lain</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    {{-- <div class="detailed_chart">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom">
                    <div class="chart-img">
                        <img src="{{ url('images/themes/chart-icon_1.png') }}" class="img-fluid" alt="chart_icon" />
                    </div>
                    <div class="chart-text">
                        <p><span class="counter">0</span> Guru</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom chart_top">
                    <div class="chart-img">
                        <img src="{{ url('images/themes/chart-icon_2.png') }}" class="img-fluid" alt="chart_icon" />
                    </div>
                    <div class="chart-text">
                        <p>
                            <span class="counter">0</span> Siswa
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_top">
                    <div class="chart-img">
                        <img src="{{ url('images/themes/chart-icon_3.png') }}" class="img-fluid" alt="chart_icon" />
                    </div>
                    <div class="chart-text">
                        <p>
                            <span class="counter">0</span> Download
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="chart-img">
                        <img src="{{ url('images/themes/chart-icon_4.png') }}" class="img-fluid" alt="chart_icon" />
                    </div>
                    <div class="chart-text">
                        <p>
                            <span class="counter">0</span> Agenda
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="modal fade" id="modalpreview" tabindex="-1" role="dialog" aria-labelledby="titlepreview"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titlepreview"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="font-weight-bold">Untuk Tanggal: <span id="tanggalpreview"></span>
                    </p>
                    <p id="isipreview"></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        $(document).on('click', '#btnpengumuman', function() {
            var title = $(this).data('title');
            var tanggal = $(this).data('tanggal');
            var pengumuman = $(this).data('pengumuman');

            $('#titlepreview').text(title);
            $('#tanggalpreview').text(tanggal);
            $('#isipreview').html(pengumuman);
        })

        $(document).on('click', '#btnagenda', function() {
            var title = $(this).data('title');
            var tanggal = $(this).data('tanggal');
            var agenda = $(this).data('agenda');

            $('#titlepreview').text(title);
            $('#tanggalpreview').text(tanggal);
            $('#isipreview').html(agenda);
        })
    </script>

@endsection
