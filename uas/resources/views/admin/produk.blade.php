@extends('layouts.admin')

@php
  use App\Models\Agama;
  use Illuminate\Support\Facades\Auth;
  $agamas = Agama::all();
  $user = Auth::user();
  $detailUser = session('detailUser');
  
  function rupiah($angka)
  {
      $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
      return $hasil_rupiah;
  }
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
      <div class="card">
        <div class="card-header card-header-primary">
          <h1 class="card-title ">Data Produk</h1> <br>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Nama
                </th>
                <th>
                  Deskripsi
                </th>
                <th>
                  Foto
                </th>
                <th>
                  Harga
                </th>
                <th>
                  Penjualan
                </th>
                <th>
                  Published
                <th>
                  Action
                </th>
              </thead>
              <tbody>
                @foreach ($penjualans as $penjualan)
                  <tr>
                    <td>
                      {{ $penjualan->nama }}
                    </td>
                    <td>
                      {{ $penjualan->deskripsi }}
                    </td>
                    <td>
                      <img style="width: 5rem; height: 5rem;" src="{{ asset('img/' . $penjualan->foto) }}"
                        alt="foto produk">

                    </td>
                    <td>
                      {{ rupiah($penjualan->harga) }}
                    </td>
                    <td>
                      {{ $penjualan->penjualan }}
                    </td>
                    <td>
                      <form action="{{ url('setPublished/' . $penjualan->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <div class="btn-group btn-toggle">
                          <button {{ $penjualan->published === 1 ? '' : 'type="submit"' }}
                            class="btn btn-md {{ $penjualan->published == 1 ? 'btn-primary active' : 'btn-default' }}">Published</button>
                          <button {{ $penjualan->published === 0 ? '' : 'type="submit"' }}
                            class="btn btn-md {{ $penjualan->published == 0 ? 'btn-primary active' : 'btn-default' }}">Unpublished</button>
                        </div>
                        <input type="number" name="published" id="published"
                          value="{{ $penjualan->published == 1 ? 0 : 1 }}" hidden>
                      </form>
                    </td>
                    {{-- detail --}}
                    <td>
                      <a href="{{ url('detailProduct/' . $penjualan->id) }}" class="btn btn-primary btn-sm">Detail</a>
                      <a href="{{ url('deleteProduct/' . $penjualan->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--/col-9-->
    </div>
    <script>
      function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split = number_string.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }
    </script>
    <!--/row-->
    <!-- /.card-body -->
  </div>
@endsection
