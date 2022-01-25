  @extends('admin.header.header-admin')

  @section('content-header')
      <h1 class="h3 mb-0 text-gray-800">Artikel Anda</h1>
  @endsection

  @section('content')
      @include('sweetalert::alert')

      <div class="ml-auto mb-3">
          <a href="/admin/artikel/create" class="btn btn-success ml-auto mb-3">Tambah Artikel Baru</a>
      </div>

      <div class="table-responsive">
          <table class="table table-bordered" id="tabel-artikel">
              <thead style="background-color:#4E73DF; color:white">
                  <tr>
                      <th>#</th>
                      <th>Judul</th>
                      <th>Penulis</th>
                      <th>Kategori</th>
                      <th>Artikel</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 1; ?>

                  @foreach ($artikel as $art)
                      <tr>
                          <td>{{ $no }}</td>
                          <td>{{ Str::limit($art->title) }}</td>
                          <td>{{ $art->penulis }}</td>
                          <td>{{ $art->kategori->kategori }}</td>
                          <td>{!! Str::limit($art->artikel, 10) !!}</td>
                          <td>{{ \Carbon\Carbon::parse($art->created_at)->format('d-m-Y') }}</td>
                          <td>
                              <a href="{{ route('artikel.edit', $art->slug) }}" class="btn btn-Warning">Ganti</a>
                              <form action="{{ route('artikel.destroy', $art->slug) }}" method="POST"
                                  class="d-inline">
                                  @csrf
                                  @method("DELETE")
                                  <button class="btn btn-danger">Hapus</button>
                              </form>
                              <a href="{{ route('artikel.show', $art->slug) }}" class="btn btn-primary">Preview</a>
                          </td>
                      </tr>

                      <?php $no++; ?>
                  @endforeach
              </tbody>
          </table>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

      <script>
          $(document).ready(function() {
              $('#tabel-artikel').DataTable();
          });
      </script>

  @endsection
