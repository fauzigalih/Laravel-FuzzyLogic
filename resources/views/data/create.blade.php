@extends('layouts.main')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ url('/data') }}">Data</a></li>
@endsection
@section('content')
<div class="card">
  <div class="card-header bg-info text-light">
    <h5>{{ $title }}</h5>
  </div>
  <div class="card-body">
    <form action="{{ url('data') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Nomer Induk Perawat</label>
        <input name="nip" type="number" class="form-control" placeholder="Nomer Induk Perawat" autocomplete="OFF">
      </div>
      
      <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input name="full_name" type="text" class="form-control" placeholder="Nama Lengkap">
      </div>

      <a href="{{ url('data') }}" class="btn btn-danger text-light mt-3">Kembali</a>
      <button type="submit" class="btn btn-info text-light mt-3">Simpan</button>
    </form>
  </div>
</div>
@endsection