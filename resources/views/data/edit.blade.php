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
    <form action="{{ url('data/' . $model->id) }}" method="POST">
      @method('PUT')
      @csrf

      <div class="mb-3">
        <label class="form-label">Nomer Induk Perawat</label>
        <input disabled name="nip" type="number" class="form-control" placeholder="Nomer Induk Perawat" value="{{ $model->nip }}">
      </div>
      
      <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input name="full_name" type="text" class="form-control" placeholder="Nama Lengkap" value="{{ $model->full_name }}">
      </div>

      <a href="{{ url('data') }}" class="btn btn-danger text-light mt-3">Kembali</a>
      <button type="submit" class="btn btn-info text-light mt-3">Simpan</button>
    </form>
  </div>
</div>
@endsection