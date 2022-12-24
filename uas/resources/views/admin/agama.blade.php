@extends('layouts.admin')

@php
  $admin = session('admin');
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
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="w-100 card-header card-header-primary">
              <h1 class="card-title ">Data Agama</h1>
            </div>
            <div class="card-body">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModalCenter">
                + Tambah
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Tambah data agama</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ url('/tambahAgama98') }}" method="POST">
                      @csrf
                      <div class="modal-body">
                        <div class="input-group mb-3">
                          <input name="nama_agama" type="name" class="form-control" placeholder="Nama agama">
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-database"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        @if ($errors->any())
                          <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                              {{ $error }}
                            @endforeach
                          </div>
                        @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      ID
                    </th>
                    <th>
                      Nama
                    </th>
                    <th>
                      Action
                    </th>
                  </thead>
                  <tbody>
                    @foreach ($agamas as $agama)
                      <tr>
                        <td>
                          {{ $agama->id }}
                        </td>
                        <td>
                          {{ $agama->nama_agama }}
                        </td>
                        <td>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit">
                            Edit
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Edit data agama</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="{{ url('/updateAgama98', $agama->id) }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <div class="modal-body">
                                    <div class="input-group mb-3">
                                      <input name="nama_agama" type="name" value="{{ $agama->nama_agama }}"
                                        class="form-control" placeholder="Nama agama">
                                      <div class="input-group-append">
                                        <div class="input-group-text">
                                          <span class="fas fa-database"></span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    @if ($errors->any())
                                      <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                          {{ $error }}
                                        @endforeach
                                      </div>
                                    @endif
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>

                          <a href="{{ url("hapusAgama98/{$agama->id}") }}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/row-->
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.row -->
@endsection
