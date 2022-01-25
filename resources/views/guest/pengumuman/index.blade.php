@extends('guest.main.main')
<!--============================= EVENTS =============================-->

@section('container')
    <section class="events">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="event-title">Pengumuman</h2>
                </div>
                <div class="col-md-8">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item nav-tab1">
                            <a class="nav-link tab-list active" data-toggle="tab" href="#upcoming-events"
                                role="tab">Pengumuman Terbaru </a>
                        </li>

                    </ul>
                </div>
            </div>
            <br>
            <div class="row">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="upcoming-events" role="tabpanel">
                        @forelse ($pengumuman as $umum )
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="event-date">
                                            <h4>{{ \Carbon\Carbon::parse($umum->untuk_tanggal)->format('d') }} </h4>
                                            <span>{{ \Carbon\Carbon::parse($umum->untuk_tanggal)->format('M Y') }}</span>
                                        </div>
                                        <span
                                            class="event-time">{{ \Carbon\Carbon::parse($umum->untuk_tanggal)->format('H:i') }}</span>
                                    </div>
                                    <div class="col w-25">
                                        <div class="event-heading w-auto">
                                            <h3>{{ $umum->title }}
                                            </h3>
                                            <p>
                                                {!! substr(strip_tags($umum->pengumuman), 0, 30) !!}
                                                @if (strlen($umum->pengumuman) >= 30)
                                                    ...
                                                @endif
                                            </p>
                                            <div class=" ml-auto">
                                                <button type="button" id="btnpengumuman" class="btn btn-success"
                                                    data-toggle="modal" data-target="#modalpengumuman"
                                                    data-title="{{ $umum->title }}"
                                                    data-tanggal="{{ \Carbon\Carbon::parse($umum->untuk_tanggal)->format('d-m-Y H:i') }}"
                                                    data-pengumuman="{{ $umum->pengumuman }}">
                                                    Lihat Pengumuman
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="event-underline">
                            </div>
                        @empty
                            <h3 class="text-center">Belum Ada Pengumuman Ditambahkam</h3>
                        @endforelse
                    </div>
                    <div class="col-md-12 text-center">
                        {{ $pengumuman->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal Pengumuman --}}
    <div class="modal fade" id="modalpengumuman" tabindex="-1" role="dialog" aria-labelledby="titlepengumuman"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titlepengumuman"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="font-weight-bold">Untuk Tanggal: <span id="tanggalpengumuman"></span></p>
                    <p id="pengumuman"></p>
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

            $('#titlepengumuman').text(title);
            $('#tanggalpengumuman').text(tanggal);
            $('#pengumuman').html(pengumuman);
        })
    </script>

@endsection
