@extends('layouts.admin')

@php
  $admin = session('admin');
  $users = session('users');
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
            <div class="card-header card-header-primary">
              <h1 class="card-title ">Data User</h1>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      ID
                    </th>
                    <th>
                      Name
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Role
                    </th>
                    <th>
                      Aktif
                    </th>
                    <th>
                      Action
                    </th>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr {{ $user->role === 2 ? 'hidden' : '' }}>
                        <td>
                          {{ $user->id }}
                        </td>
                        <td>
                          {{ $user->name }}
                        </td>
                        <td>
                          {{ $user->email }}
                        </td>
                        <td>
                          {{ $user->role === 1 ? 'User' : '' }}
                          {{ $user->role === 2 ? 'Admin' : '' }}
                          {{ $user->role === 3 ? 'Seller' : '' }}
                        </td>
                        <td>
                          <form action="{{ url('setIsAktif98/' . $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <div class="btn-group btn-toggle">
                              <button {{ $user->is_aktif === 1 ? '' : 'type="submit"' }}
                                class="btn btn-md {{ $user->is_aktif == 1 ? 'btn-primary active' : 'btn-default' }}">Aktif</button>
                              <button {{ $user->is_aktif === 0 ? '' : 'type="submit"' }}
                                class="btn btn-md {{ $user->is_aktif == 0 ? 'btn-primary active' : 'btn-default' }}">Nonaktif</button>
                            </div>
                            <input type="number" name="is_aktif" id="is_aktif"
                              value="{{ $user->is_aktif == 1 ? 0 : 1 }}" hidden>
                          </form>
                        </td>
                        {{-- detail --}}
                        <td>
                          <a href="{{ url('detailUser98/' . $user->id) }}" class="btn btn-primary btn-sm">Detail</a>
                          <a href="{{ url('deleteUser/' . $user->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
