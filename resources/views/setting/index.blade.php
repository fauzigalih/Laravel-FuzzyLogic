@extends('layouts.main')

@section('content')
  <div class="card">
    <div class="card-header bg-info text-light">
      <h5>Pengaturan Dinamis</h5>
    </div>
    <div class="card-body">
      <form action="{{ url('setting/1') }}" method="POST">
        @method('PUT')
        @csrf
        <h4 class="card-title text-info">Pengaturan Nilai</h4>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum tempora fugit quas maiores odit, numquam voluptate eum ex rem.</p>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">write_low</span>
              <input type="number" name="write_low" value="{{ $model->write_low }}" class="form-control">
            </div>
          </div>
          <div class="col-auto"></div>
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">practice_low</span>
              <input type="number" name="practice_low" value="{{ $model->practice_low }}" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5  input-group-text bg-light">write_low_mid</span>
              <input type="number" name="write_low_mid" value="{{ $model->write_low_mid }}" class="form-control">
            </div>
          </div>
          <div class="col-auto"></div>
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">practice_low_mid</span>
              <input type="number" name="practice_low_mid" value="{{ $model->practice_low_mid }}" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">write_high_mid</span>
              <input type="number" name="write_high_mid" value="{{ $model->write_high_mid }}" class="form-control">
            </div>
          </div>
          <div class="col-auto"></div>
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">practice_high_mid</span>
              <input type="number" name="practice_high_mid" value="{{ $model->practice_high_mid }}" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">write_high</span>
              <input type="number" name="write_high" value="{{ $model->write_high }}" class="form-control">
            </div>
          </div>
          <div class="col-auto"></div>
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">practice_high</span>
              <input type="number" name="practice_high" value="{{ $model->practice_high }}" class="form-control">
            </div>
          </div>
        </div>
        {{-- Pengaturan Penentuan Kelulusan --}}
        <hr class="my-4">
        <h4 class="card-title text-info">Pengaturan Penentuan Kelulusan</h4>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum tempora fugit quas maiores odit, numquam voluptate eum ex rem.</p>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">graduate_low</span>
              <input type="number" name="graduate_low" value="{{ $model->graduate_low }}" class="form-control">
            </div>
          </div>
          <div class="col-auto"></div>
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">graduate_high_mid</span>
              <input type="number" name="graduate_high_mid" value="{{ $model->graduate_high_mid }}" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">graduate_low_mid</span>
              <input type="number" name="graduate_low_mid" value="{{ $model->graduate_low_mid }}" class="form-control">
            </div>
          </div>
          <div class="col-auto"></div>
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">graduate_high</span>
              <input type="number" name="graduate_high" value="{{ $model->graduate_high }}" class="form-control">
            </div>
          </div>
        </div>
        {{-- Pengaturan Kelulusan --}}
        <hr class="my-4">
        <h4 class="card-title text-info">Pengaturan Kelulusan</h4>
        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum tempora fugit quas maiores odit, numquam voluptate eum ex rem.</p>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">graduate_not</span>
              <input type="text" name="graduate_not" value="{{ $model->graduate_not }}" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-5">
            <div class="input-group mb-3">
              <span class="col-5 input-group-text bg-light">graduate_yes</span>
              <input type="text" name="graduate_yes" value="{{ $model->graduate_yes }}" class="form-control">
            </div>
          </div>
        </div>
        
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info text-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Simpan dan Update
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Informasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Apakah kamu yakin ingin mengubah data pengaturan ini?
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
  </div>
@endsection