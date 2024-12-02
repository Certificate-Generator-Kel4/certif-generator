@extends('layouts_dashboard.app')

@section('content')

    <!-- Daftar Peserta -->
    <div class="card mt-4">
        <div class="card-header">
            <h4>Daftar User</h4>
            <a href="{{ route('superadmin.user.create') }}"
                class="btn btn-sm btn-primary">Add
                User</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $key => $p)
                    <tr>
                        <td>{{ $key + 1}}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->role }}</td>
                        <td class="d-flex justify-content-center">
                        <a href="{{ route('superadmin.user.edit', $p->id) }}"
                            class="btn btn-warning btn-sm mr-2"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="{{ route('superadmin.user.destroy', $p->id) }}" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></a>
                    </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection('content')