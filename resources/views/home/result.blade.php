@extends('layouts.main')

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
          <input type="text" name="nip" value="{{ $model->nip }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Nama Lengkap</span>
          <input type="text" value="{{ $model->full_name }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Tulis</span>
          <input type="text" name="test_write" value="{{ $request->test_write }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Praktek</span>
          <input type="text" name="test_practice" value="{{ $request->test_practice }}" class="form-control">
        </div>
        <hr class="my-4">
        <h4 class="card-title text-info">Derajat Keanggotaan</h4>
        <p class="card-text">Derajat keanggotaan merupakan proses perolehan dari Min Max.</p>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">Tes Tulis Kurang</span>
              <input type="number" name="write_low_level" value="{{ $result->writeLowLevel }}" class="form-control">
            </div>
          </div>
          <div class="col-auto"></div>
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">Tes Praktek Kurang</span>
              <input type="number" name="practice_low_level" value="{{ $result->practiceLowLevel }}" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5  input-group-text bg-light">Tes Tulis Cukup</span>
              <input type="number" name="write_mid_level" value="{{ $result->writeMidLevel }}" class="form-control">
            </div>
          </div>
          <div class="col-auto"></div>
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">Tes Praktek Cukup</span>
              <input type="number" name="practice_mid_level" value="{{ $result->practiceMidLevel }}" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">Tes Tulis Baik</span>
              <input type="number" name="write_high_level" value="{{ $result->writeHighLevel }}" class="form-control">
            </div>
          </div>
          <div class="col-auto"></div>
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">Tes Praktek Baik</span>
              <input type="number" name="practice_high_level" value="{{ $result->practiceHighLevel }}" class="form-control">
            </div>
          </div>
        </div>
        
        <hr class="my-4">
        <h4 class="card-title text-info">Konjungsi</h4>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Tulis Kurang</span>
          <input type="number" value="{{ $result->writeLowConjunction }}" class="form-control">
          <span class="input-group-text bg-light">AND</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Kurang</span>
          <input type="number" value="{{ $result->practiceLowConjunction }}" class="form-control">
          <span class="input-group-text bg-light">THEN</span>
          <span class="col-2 input-group-text bg-light">Tes Tulis Kurang</span>
          <input type="number" name="write_low_disjunction" value="{{ $result->writeLowDisjunction }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Tulis Kurang</span>
          <input type="number" value="{{ $result->writeLowConjunction }}" class="form-control">
          <span class="input-group-text bg-light">AND</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Cukup</span>
          <input type="number" value="{{ $result->practiceMidConjunction }}" class="form-control">
          <span class="input-group-text bg-light">THEN</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Cukup</span>
          <input type="number" name="practice_mid_disjunction" value="{{ $result->practiceMidDisjunction }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Tulis Cukup</span>
          <input type="number" value="{{ $result->writeMidConjunction }}" class="form-control">
          <span class="input-group-text bg-light">AND</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Kurang</span>
          <input type="number" value="{{ $result->practiceLowConjunction }}" class="form-control">
          <span class="input-group-text bg-light">THEN</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Kurang</span>
          <input type="number" name="practice_low_disjunction" value="{{ $result->practiceLowDisjunction }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Tulis Cukup</span>
          <input type="number" value="{{ $result->writeMidConjunction }}" class="form-control">
          <span class="input-group-text bg-light">AND</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Cukup</span>
          <input type="number" value="{{ $result->practiceMidConjunction }}" class="form-control">
          <span class="input-group-text bg-light">THEN</span>
          <span class="col-2 input-group-text bg-light">Tes Tulis Cukup</span>
          <input type="number" name="write_mid_disjunction" value="{{ $result->writeMidDisjunction }}" class="form-control">
        </div>

        <hr class="my-4">
        <h4 class="card-title text-info">Disjungsi</h4>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Tulis Kurang</span>
          <input type="number" value="{{ $result->writeLowDisjunction }}" class="form-control">
          <span class="input-group-text bg-light">OR</span>
          <span class="col-2 input-group-text bg-light">Tes Praktek Kurang</span>
          <input type="number" value="{{ $result->practiceLowDisjunction }}" class="form-control">
          <span class="input-group-text bg-light">THEN</span>
          <span class="col-2 input-group-text bg-light">Tidak Lulus</span>
          <input type="number" name="graduate_not" value="{{ $result->graduateNot }}" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="col-2 input-group-text bg-light">Tes Praktek Cukup</span>
          <input type="number" value="{{ $result->practiceMidDisjunction }}" class="form-control">
          <span class="input-group-text bg-light">OR</span>
          <span class="col-2 input-group-text bg-light">Tes Tulis Cukup</span>
          <input type="number" value="{{ $result->writeMidDisjunction }}" class="form-control">
          <span class="input-group-text bg-light">THEN</span>
          <span class="col-2 input-group-text bg-light">Lulus</span>
          <input type="number" name="graduate_yes" value="{{ $result->graduateYes }}" class="form-control">
        </div>

        <hr class="my-4">
        <h4 class="card-title text-info">Defuzzyfikasi</h4>
        <div class="input-group mb-3">
          <span class="col-3 input-group-text bg-light">Total Penilaian Keseluruhan</span>
          <input type="number" name="defuzzyfication" value="{{ $result->defuzzyfication }}" class="form-control">
          <span class="col-3 input-group-text bg-light">dan Dinyatakan</span>
          <input type="text" name="graduate_final" value="{{ $result->graduateFinal }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-info text-light mt-3">Simpan Data</button>
      </form>
    </div>
  </div>
@endsection