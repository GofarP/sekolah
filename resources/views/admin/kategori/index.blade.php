@extends('admin.header.header-admin')

@section('content-header')
    <h1 class="h3 mb-0 text-gray-800">Daftar Kategori Anda</h1>
@endsection

@section('content')

    @include('sweetalert::alert')

    <div class="ml-auto mb-3">
        <a href="/admin/kategori/create" class="btn btn-success ">Tambah Kategori Baru</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered kategori-table" id="table-kategori">
            <thead style="background-color:#4E73DF; color:white">
                <tr>
                    <th>#</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($category as $cat)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $cat->kategori }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $cat->slug) }}" class="btn btn-Warning">Ganti</a>

                            <form action="{{ route('kategori.destroy', $cat->slug) }}" method="POST"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-hapus">Hapus</button>
                            </form>
                            {{-- <a href="/admin/kategori/delete/{{ $cat->slug }}" class="btn btn-danger">Hapus</a> --}}
                        </td>
                    </tr>
                    <?php $no++; ?>
                @endforeach

            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table-kategori').DataTable();
        });
    </script>

    <script type="text/javascript">
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
    </script>

@endsection
