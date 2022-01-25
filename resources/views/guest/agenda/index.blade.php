@extends('guest.main.main')

@section('container')
    <section class="events">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="event-title">Agenda</h2>
                </div>
                <div class="col-md-8">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item nav-tab1">
                            <a class="nav-link tab-list active" data-toggle="tab" href="#upcoming-events" role="tab">Agenda
                                Terbaru </a>
                        </li>

                    </ul>
                </div>
            </div>
            <br>
            <div class="row">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="upcoming-events" role="tabpanel">
                        @forelse($agenda as $agen)
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="event-date">
                                            <h4>{{ \Carbon\Carbon::parse($agen->untuk_tanggal)->format('d') }} </h4>
                                            <span>{{ \Carbon\Carbon::parse($agen->untuk_tanggal)->format('M Y') }} </span>
                                        </div>
                                        <span
                                            class="event-time">{{ \Carbon\Carbon::parse($agen->untuk_tanggal)->format('H:i') }}</span>
                                    </div>
                                    <div class="col">
                                        <div class="event-heading">
                                            <h3>
                                                {{ $agen->title }}
                                            </h3>
                                            <p>
                                                {!! substr(strip_tags($agen->agenda), 0, 30) !!}
                                                @if (strlen($agen->agenda) >= 30)
                                                    ...
                                                @endif

                                            </p>
                                            <div class=" ml-auto">
                                                <button type="button" id="btnagenda" class="btn btn-success"
                                                    data-toggle="modal" data-target="#modalagenda"
                                                    data-title="{{ $agen->title }}"
                                                    data-tanggal="{{ \Carbon\Carbon::parse($agen->untuk_tanggal)->format('d M Y H:i') }}"
                                                    data-agenda="{{ $agen->agenda }}">
                                                    Lihat Pengumuman
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="event-underline">
                            </div>
                        @empty
                            <h3 class="text-center">Belum Ada Agenda Ditambahkam</h3>
                        @endforelse

                        <div class="col-md-12 text-center">
                            {{ $agenda->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- Modal Agenda --}}
    <div class="modal fade" id="modalagenda" tabindex="-1" role="dialog" aria-labelledby="titleagenda"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleagenda"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="font-weight-bold">Untuk Tanggal: <span id="tanggalagenda"></span></p>
                    <p id="agenda"></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        $(document).on('click', '#btnagenda', function() {
            var title = $(this).data('title');
            var tanggal = $(this).data('tanggal');
            var agenda = $(this).data('agenda');

            $('#titleagenda').text(title);
            $('#tanggalagenda').text(tanggal);
            $('#agenda').html(agenda);
        })
    </script>

@endsection
