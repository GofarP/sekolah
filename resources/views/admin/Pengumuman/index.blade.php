@extends('admin.header.header-admin')

@section('content-header')
    <h1 class="h3 mb-0 text-gray-800">Daftar Pengumuman</h1>
@endsection

@section('content')
    @include('sweetalert::alert')
    <div class="ml-auto mb-3">
        <a href="/admin/pengumuman/create" class="btn btn-success ">Tambah Pengumuman Baru</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered pengumuman-table" id="table-pengumuman">
            <thead style="background-color:#4E73DF; color:white">
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Pengumuman</th>
                    <th>Untuk Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($pengumuman as $umum)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $umum->title }}</td>
                        <td>{!! Str::limit($umum->pengumuman, 20) !!}</td>
                        <td>{{ \Carbon\Carbon::parse($umum->untuk_tanggal)->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('pengumuman.edit', $umum->slug) }}" class="btn btn-warning">Ubah</a>
                            <form action="{{ route('pengumuman.destroy', $umum->slug) }}" method="POST"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-hapus">Hapus</button>
                            </form>
                            <a href="#" id="btnmodalpreview" data-title="{{ $umum->title }}"
                                data-tanggal="{{ \Carbon\Carbon::parse($umum->untuk_tanggal)->format('d-m-Y') }}"
                                data-pengumuman="{{ $umum->pengumuman }}" class="btn btn-primary" data-toggle="modal"
                                data-target="#modalpreview">Preview</a>
                        </td>
                    </tr>
                    <?php $no++; ?>
                @endforeach
            </tbody>
        </table>
    </div>

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
                    <p id="pengumumanpreview"></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table-pengumuman').DataTable();
        });

        $('.btn-hapus').click(function(event) {
            var form = $(this).closest("form");
            var kategori = $(this).data("slug");
            event.preventDefault();
            swal({
                    title: `Mau hapus kategori ini  ?`,
                    text: "Data akan hilang selamanya.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });


        $(document).on('click', '#btnmodalpreview', function() {
            var title = $(this).data('title');
            var tanggal = $(this).data('tanggal');
            var pengumuman = $(this).data('pengumuman');

            $('#titlepreview').text(title);
            $('#tanggalpreview').text(tanggal);
            $('#pengumumanpreview').html(pengumuman);
        })
    </script>
@endsection
