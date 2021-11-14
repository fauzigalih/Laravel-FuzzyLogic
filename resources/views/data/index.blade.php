@extends('layouts.main')

@section('content')
    @if (session('status'))
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>     
    @endif

    <div class="d-flex justify-content-between mb-3">
      <h4 class="text-info">Daftar Perawat</h4>
      <a class="btn btn-info text-light" href="{{ url('data/create') }}" role="button">Tambah Data</a>
    </div>
    <table class="table table-striped table-bordered">
      <thead>
        <tr class="bg-info text-light">
          <th scope="col">No.</th>
          <th scope="col">Nomer Induk Perawat</th>
          <th scope="col">Nama Lengkap</th>
          <th scope="col">Sertifikasi</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @if (count($models) === 0)
          <tr>
            <td colspan="5">Data tidak ada.</td>
          </tr>
        @endif
        @foreach ($models as $model)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $model->nip }}</td>
            <td>{{ $model->full_name }}</td>
            <td>{{ $model->result->graduate ?? 'Belum diketahui' }}</td>
            <td>
              <div class="d-flex">
                <form action="{{ url('data/' . $model->id) }}" method="POST" class="me-2">
                  @method('GET')
                  <button type="submit" class="btn btn-info text-light">Lihat</button>
                </form>
                <form action="{{ url('data/' . $model->id . '/edit') }}" method="POST" class="me-2">
                  @method('GET')
                  <button type="submit" class="btn btn-info text-light">Ubah</button>
                </form>
                <form action="{{ url('data/' . $model->id) }}" method="POST">
                  @method('DELETE')
                  @csrf

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-info text-light" data-bs-toggle="modal" data-bs-target="#modal{{ $model->id }}">
                    Hapus
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="modal{{ $model->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Informasi</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah kamu yakin ingin menghapus data perawat ini beserta nilai sertifikasinya?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                          <button type="submit" class="btn btn-info text-light px-3">Ya</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
@endsection