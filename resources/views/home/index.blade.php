@extends('layouts.main')

@section('content')
  <div class="card">
    <div class="card-header bg-info text-light">
      <h5>Sistem Pakar Fuzzy Logic Mamdani</h5>
    </div>
    <div class="card-body">
      <h4 class="card-title text-info">Sertifikasi Perawat</h4>
      <p class="card-text">Masukan nilai yang ditentukan berdasarkan Tes Tulis dan Tes Praktek.</p>
      <form action="{{ url('result') }}" method="GET">
        <div class="mb-3">
          <label class="form-label">Nomer Induk Perawat</label>
          <input class="form-control" name="nip" list="nipOptions" placeholder="NIP - Nama Lengkap" autocomplete="off" required>
          <datalist id="nipOptions">
            @foreach ($models as $model)
              <option value="{{ $model->nip }} "> 
                  {{ $model->full_name }} 
              </option>
            @endforeach
          </datalist>
        </div>
        
        <div class="mb-3">
          <label class="form-label">Tes Tulis</label>
          <input type="number" name="test_write" class="form-control" id="testWrite" placeholder="Tes Tulis" required>
        </div>
        
        <div class="mb-3">
          <label class="form-label">Tes Praktek</label>
          <input type="number" name="test_practice" class="form-control" id="testPractice" placeholder="Tes Praktek" required>
        </div>
        
        <a href="{{ url('/') }}" class="btn btn-danger text-light mt-3">Reset Ulang</a>
        <button type="submit" class="btn btn-info text-light mt-3">Cek Hasil</button>
        
      </form>
    </div>
  </div>
@endsection