@extends('layouts.home')
@php
  function rupiah($angka)
  {
      $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
      return $hasil_rupiah;
  }
@endphp
@section('content')
  @include('partials.hero')

  <div class="max-w-2xl lg:max-w-7xl m-auto px-10">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block rounded-xl w-100"
            src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2022/12/8/72d31d4a-774f-403d-811f-596f222a5a79.jpg.webp?ect=4g"
            alt="First slide">
        </div>
        <div class="carousel-item mt-4">
          <img class="d-block rounded-xl w-100"
            src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2022/12/11/70aa3b9a-4519-45a8-a471-7e635c450c62.jpg.webp?ect=4g"
            alt="Second slide">
        </div>
      </div>
    </div>

    <div class="bg-white">
      <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-7xl ">
        <h2 class="text-2xl font-bold tracking-tight sm:text-3xl mb-3">Products by our seller</h2>

        <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
          @foreach ($penjualans as $penjualan)
            <a href="/detailProduct/{{ $penjualan->id }}" class="group">
              <div
                class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                <img src="{{ asset('img/' . $penjualan->foto) }}"
                  alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                  class="h-full w-full object-cover object-center group-hover:opacity-75">
              </div>
              <h3 class="mt-4 text-sm text-gray-700">{{ $penjualan->nama }}</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">{{ rupiah($penjualan->harga) }}</p>
            </a>
          @endforeach

          <!-- More products... -->
        </div>
      </div>
    </div>
  @endsection
