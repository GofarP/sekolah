 @extends('admin.header.header-admin')

 @section('content-header')
     <h1 class="h3 mb-0 text-gray-800">Daftar Agenda</h1>
 @endsection

 @section('content')
     @include('sweetalert::alert')

     <div class="ml-auto mb-3">
         <a href="/admin/agenda/create" class="btn btn-success ml-auto mb-3">Tambah Agenda Baru</a>
     </div>

     <div class="table-responsive">
         <table class="table table-bordered" id="tabel-agenda">
             <thead style="background-color:#4E73DF; color:white">
                 <th>#</th>
                 <th>Title</th>
                 <th>Pembuat</th>
                 <th>agenda</th>
                 <th>Tanggal</th>
                 <th>Aksi</th>
             </thead>

             <tbody>
                 <?php $no = 1; ?>

                 @foreach ($agenda as $agen)
                     <tr>
                         <td>{{ $no }}</td>
                         <td>{{ $agen->title }}</td>
                         <td>{{ $agen->user->username }}</td>
                         <td>{!! Str::limit($agen->agenda, 20) !!}</td>
                         <td>{{ \Carbon\Carbon::parse($agen->untuk_tanggal)->format('d-m-Y') }}</td>
                         <td>
                             <a href="{{ route('agenda.edit', $agen->slug) }}" class="btn btn-Warning">Ganti</a>
                             <form action="{{ route('agenda.destroy', $agen->slug) }}" method="POST"
                                 class="d-inline">
                                 @csrf
                                 @method("DELETE")
                                 <button class="btn btn-danger btn-hapus">Hapus</button>
                             </form>
                             <a href="#" id="btnmodalpreview" data-title="{{ $agen->title }}"
                                 data-artikel="{!! $agen->agenda !!}>"
                                 data-tanggal="{{ \Carbon\Carbon::parse($agen->untuk_tanggal)->format('d-m-Y') }}"
                                 class="btn btn-primary btn-preview" data-toggle="modal"
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
                     <p id="artikelpreview"></p>
                 </div>
             </div>
         </div>
     </div>

     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

     <script>
         $(document).ready(function() {
             $('#tabel-agenda').DataTable();
         });

         $('.btn-hapus').click(function(event) {
             var form = $(this).closest("form");
             var kategori = $(this).data("slug");
             event.preventDefault();
             swal({
                     title: `Mau hapus agenda ini  ?`,
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
             var artikel = $(this).data('artikel');

             $('#titlepreview').text(title);
             $('#tanggalpreview').text(tanggal);
             $('#artikelpreview').html(artikel);

         })
     </script>
 @endsection
