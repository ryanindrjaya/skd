@extends('layouts.home')
@php
  function rupiah($angka)
  {
      $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
      return $hasil_rupiah;
  }
@endphp
@section('content')
  <div class="max-w-2xl lg:max-w-7xl m-auto px-10">

    <div class="bg-white">
      <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-7xl ">
        <h2 class="text-2xl font-bold tracking-tight sm:text-3xl mb-3">All Product</h2>

        <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
          @foreach ($penjualans as $penjualan)
            <a href="/detailProduct/{{ $penjualan->id }}" class="group">
              <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
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
