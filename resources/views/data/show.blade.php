@extends('layouts.main')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ url('/data') }}">Data</a></li>
@endsection
@section('content')
  <div class="card">
    <div class="card-header bg-info text-light">
      <h5>Hasil Perhitungan</h5>
    </div>
    <div class="card-body">
      <form action="{{ url('home/store') }}">
        <h4 class="card-title text-info">Parameter Penilaian</h4>
        <p class="card-text">Parameter penilaian merupakan data yang telah diinput sebelumnya.</p>  
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Nomer Induk Perawat</span>
          <input type="text" value="{{ $model->nip }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Nama Lengkap</span>
          <input type="text" value="{{ $model->full_name }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Tulis</span>
          <input type="text" value="{{ $model->result->test_write }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Praktek</span>
          <input type="text" value="{{ $model->result->test_practice }}" class="form-control">
        </div>
        <hr class="my-4">
        <h4 class="card-title text-info">Derajat Keanggotaan</h4>
        <p class="card-text">Derajat keanggotaan merupakan proses perolehan dari Min Max.</p>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">Tes Tulis Kurang</span>
              <input type="number" value="{{ $model->conjunction->write_low }}" class="form-control">
            </div>
          </div>
          <div class="col-auto"></div>
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">Tes Praktek Kurang</span>
              <input type="number" value="{{ $model->conjunction->practice_low }}" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5  input-group-text bg-light">Tes Tulis Cukup</span>
              <input type="number" value="{{ $model->conjunction->write_mid }}" class="form-control">
            </div>
          </div>
          <div class="col-auto"></div>
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">Tes Praktek Cukup</span>
              <input type="number" value="{{ $model->conjunction->practice_mid }}" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">Tes Tulis Baik</span>
              <input type="number" value="{{ $model->conjunction->write_high }}" class="form-control">
            </div>
          </div>
          <div class="col-auto"></div>
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">Tes Praktek Baik</span>
              <input type="number" value="{{ $model->conjunction->practice_high }}" class="form-control">
            </div>
          </div>
        </div>
        
        <hr class="my-4">
        <h4 class="card-title text-info">Konjungsi</h4>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Tulis Kurang</span>
          <input type="number" value="{{ $model->conjunction->write_low }}" class="form-control">
          <span class="input-group-text bg-light">AND</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Kurang</span>
          <input type="number" value="{{ $model->conjunction->practice_low }}" class="form-control">
          <span class="input-group-text bg-light">THEN</span>
          <span class="col-2 input-group-text bg-light">Tes Tulis Kurang</span>
          <input type="number" value="{{ $model->disjunction->write_low }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Tulis Kurang</span>
          <input type="number" value="{{ $model->conjunction->write_low }}" class="form-control">
          <span class="input-group-text bg-light">AND</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Cukup</span>
          <input type="number" value="{{ $model->conjunction->practice_mid }}" class="form-control">
          <span class="input-group-text bg-light">THEN</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Cukup</span>
          <input type="number" value="{{ $model->disjunction->practice_mid }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Tulis Cukup</span>
          <input type="number" value="{{ $model->conjunction->write_mid }}" class="form-control">
          <span class="input-group-text bg-light">AND</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Kurang</span>
          <input type="number" value="{{ $model->conjunction->practice_low }}" class="form-control">
          <span class="input-group-text bg-light">THEN</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Kurang</span>
          <input type="number" value="{{ $model->disjunction->practice_low }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Tulis Cukup</span>
          <input type="number" value="{{ $model->conjunction->write_mid }}" class="form-control">
          <span class="input-group-text bg-light">AND</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Cukup</span>
          <input type="number" value="{{ $model->conjunction->practice_mid }}" class="form-control">
          <span class="input-group-text bg-light">THEN</span>
          <span class="col-2 input-group-text bg-light">Tes Tulis Cukup</span>
          <input type="number" value="{{ $model->disjunction->write_mid }}" class="form-control">
        </div>

        <hr class="my-4">
        <h4 class="card-title text-info">Disjungsi</h4>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Tulis Kurang</span>
          <input type="number" value="{{ $model->disjunction->write_low }}" class="form-control">
          <span class="input-group-text bg-light">OR</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Kurang</span>
          <input type="number" value="{{ $model->disjunction->practice_low }}" class="form-control">
          <span class="input-group-text bg-light">THEN</span>
          <span class="col-2 input-group-text bg-light">Tidak Lulus</span>
          <input type="number" value="{{ $model->disjunction->graduate_not }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Praktek Cukup</span>
          <input type="number" value="{{ $model->disjunction->practice_mid }}" class="form-control">
          <span class="input-group-text bg-light">OR</span>
          <span class="col-2 input-group-text bg-light">Tes Tulis Cukup</span>
          <input type="number" value="{{ $model->disjunction->write_mid }}" class="form-control">
          <span class="input-group-text bg-light">THEN</span>
          <span class="col-2 input-group-text bg-light">Lulus</span>
          <input type="number" value="{{ $model->disjunction->graduate_yes }}" class="form-control">
        </div>

        <hr class="my-4">
        <h4 class="card-title text-info">Defuzzyfikasi</h4>
        <div class="input-group mb-3">
          <span class="col-3 input-group-text bg-light">Total Penilaian Keseluruhan</span>
          <input type="number" value="{{ $model->result->defuzzy }}" class="form-control">
          <span class="col-3 input-group-text bg-light">dan Dinyatakan</span>
          <input type="text" value="{{ $model->result->graduate }}" class="form-control">
        </div>

        <a href="{{ url('data') }}" class="btn btn-danger">Kembali</a>
      </form>
    </div>
  </div>
@endsection