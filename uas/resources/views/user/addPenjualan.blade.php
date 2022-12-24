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
              <form class="form" action="{{ url('/addPenjualan') }}" method="POST" enctype="multipart/form-data"
                id="registrationForm">
                @csrf
                <h1>Tambah data penjualan</h1>
                <div class="tab-content">
                  <div class="tab-pane active" id="home">
                    <div class="form-group">
                      <div class="col-xs-6">
                        <label for="first_name">
                          <h5>Nama</h5>
                        </label>
                        <input type="text" class="form-control" name="nama" id="first_name"
                          placeholder="Nama Produk">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-6">
                        <label for="email">
                          <h5>Deskripsi</h5>
                        </label><br>
                        <textarea name="deskripsi" id="email" cols="80" class="w-full" placeholder="Deskripsi Produk" rows="10"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-6">
                        <label for="phone">
                          <h5>Harga</h5>
                        </label>
                        <input type="number" class="form-control" name="harga" id="alamat"
                          placeholder="Harga produk">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-6">
                        <label for="foto_ktp">
                          <h5>Foto Produk</h5>
                        </label>
                        <input type="file" class="form-control" id="foto_ktp" name="foto">
                        <img alt="" id="preview_foto_ktp" class="w-50 mt-3">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12">
                        <br>
                        <button class="btn btn-lg btn-success" type="submit"><i class="fa fas-save"></i>Simpan</button>
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
