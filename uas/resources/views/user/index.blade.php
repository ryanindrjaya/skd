@extends('layouts.user')

@php
  use App\Models\Agama;
  use Illuminate\Support\Facades\Auth;
  $agamas = Agama::all();
  $user = Auth::user();
  $detailUser = session('detailUser');
@endphp

@section('content')
  <div class="row">
    <div class="col-md-12">
      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif

      @if (session('error'))
        <div class="alert alert-error">
          {{ session('error') }}
        </div>
      @endif
      <div class="card p-4">
        <div class="container bootstrap snippet">
          <div class="row">
            <!--/col-3-->
            <div class="col-sm-12">
              <form class="form" action="{{ url('/updateData98') }}" method="POST" enctype="multipart/form-data"
                id="registrationForm">
                @csrf
                @method('PUT')
                <h1>Profile</h1>
                <div class="tab-content">
                  <div class="tab-pane active" id="home">
                    <div class="w-100 d-flex justify-content-center">
                      <label for="foto" class="text-center">
                        <img style="cursor: pointer;"
                          src="{{ str_contains($user?->foto, 'https') ? $user?->foto : asset('img/' . $user?->foto) }}"
                          width="200px" height="200px" class="rounded-circle" alt="foto profil" id="preview_foto">
                      </label>
                      <input type="file" name="foto" id="foto" value="{{ $user?->foto }}" hidden>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-6">
                        <label for="first_name">
                          <h5>Nama</h5>
                        </label>
                        <input type="text" class="form-control" name="name" id="first_name"
                          placeholder="Nama lengkap anda" value="{{ $user?->name }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-6">
                        <label for="email">
                          <h5>Email</h5>
                        </label>
                        <input type="text" class="form-control" name="email" id="email"
                          placeholder="user@example.com" value="{{ $user?->email }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-6">
                        <label for="phone">
                          <h5>Alamat</h5>
                        </label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat anda"
                          value="{{ $detailUser?->alamat }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-6">
                        <label for="mobile">
                          <h5>Tempat Lahir</h5>
                        </label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                          placeholder="Tempat lahir anda" value="{{ $detailUser?->tempat_lahir }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-6">
                        <label for="email">
                          <h5>Tanggal Lahir</h5>
                        </label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                          value="{{ date('Y-m-d', strtotime($detailUser?->tanggal_lahir)) }}">
                      </div>
                    </div>
                    <div class="form-group
                    ">
                      <div class="col-xs-6 mb-3">
                        <label for="agama_id">
                          <h5>Agama</h5>
                        </label>
                        <select name="agama_id" id="agama_id" class="form-control">
                          @foreach ($agamas as $agama)
                            <option value="{{ $agama->id }}"
                              {{ $detailUser?->agama_id == $agama->id ? 'selected' : '' }}>
                              {{ $agama->nama_agama }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <div class="col-xs-6">
                          <label for="foto_ktp">
                            <h5>Foto KTP</h5>
                          </label>
                          <input type="file" class="form-control" value="{{ $detailUser?->foto_ktp }}" id="foto_ktp"
                            name="foto_ktp">
                          <img src="{{ asset('img/' . $detailUser?->foto_ktp) }}" alt="" id="preview_foto_ktp"
                            class="w-50 mt-3">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-xs-6">
                          <label for="foto_ktp">
                            <h5>Umur</h5>
                          </label>
                          <input type="number" class="form-control" id="umur" name="umur"
                            value="{{ $detailUser?->umur }}">
                        </div>
                      </div>
                      <a href="{{ url('/user/lupaPassword98') }}" class="text-primary">Lupa password</a>
                      <input type="text" name="id" id="id" value="{{ $user->id }}" hidden>
                      <div class="form-group">
                        <div class="col-xs-12">
                          <br>
                          <button class="btn btn-lg btn-success" type="submit"><i class="fa fas-save"></i>Simpan
                            Profile</button>
                        </div>
                      </div>
              </form>

              <hr>

            </div>

          </div>
          <!--/tab-pane-->
        </div>
        <!--/tab-content-->

      </div>
      <!--/col-9-->
    </div>
    <!--/row-->
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->
@endsection
