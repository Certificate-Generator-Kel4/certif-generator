@extends('layouts_dashboard.app')

@section('back')
<a href="javascript:history.back()" class="btn btn-primary mb-3"><i class="fa-solid fa-backward"></i></a>
@endsection

@section('content')
<div class="card-header">
    <h3>Detail Event: {{ $detail_event->nama_event }}</h3>
</div>
<div class="card-body">
    <div class="row">
        <!-- Detail Event -->
        <div class="col-md-6">
            <h5>Informasi Event</h5>
            <p><strong>Nama Event:</strong> {{ $detail_event->nama_event }}</p>
            <p><strong>Email:</strong> {{ $detail_event->email }}</p>
            <p><strong>No. Telp:</strong> {{ $detail_event->no_telp }}</p>
            <p><strong>Deskripsi:</strong></p>
            <p>{{ $detail_event->deskripsi }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($detail_event->tanggal)->format('d M Y') }}</p>
            <p><strong>TTD:</strong> {{ $detail_event->ttd }}</p>
        </div>

        <!-- Logo Event -->
        <div class="col-md-6 text-center">
            <h5>Logo Event</h5>
            @if($detail_event->logo)
            <img src="{{ asset('storage/' . $detail_event->logo) }}" alt="Logo Event" class="img-fluid"
                style="max-height: 200px;">
            @else
            <p>Logo tidak tersedia</p>
            @endif
        </div>
    </div>

    <!-- Daftar Peserta -->
    <div class="card mt-4">
        <div class="card-header">
            <h4>Daftar Peserta</h4>
            <a href="{{ route('superadmin.participant.import.create',  $detail_event->id) }}"
                class="btn btn-sm btn-primary">Add
                participant</a>
            <a href="{{ route('superadmin.participant.destroy_all',  $detail_event->id) }}"
                class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete All participant</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($participant as $key => $p)
                    <tr>
                        <td>{{ $key + 1}}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->no_telp }}</td>
                        <td class="d-flex justify-content-center">
                        <a href="{{ route('superadmin.participant.edit', $p->id) }}"
                            class="btn btn-warning btn-sm mr-2"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="{{ route('superadmin.participant.destroy', $p->id) }}" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></a>
                    </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
