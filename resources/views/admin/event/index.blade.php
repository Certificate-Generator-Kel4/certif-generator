@extends('layouts_dashboard.app')

@section('content')
<div class="card-header py-3 d-flex justify-content-start">
    <h6 class="m-0 font-weight-bold text-primary mt-1">Data Event</h6>
    <a href="{{route('admin.event.create')}}" class="btn btn-primary btn-sm ml-4">Add data event</a>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Event</th>
                    <th>Penyelenggara</th>
                    <th>Tanggal</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Event</th>
                    <th>Penyelenggara</th>
                    <th>tanggal</th>
                    <th>Email</th>
                    <th>action</th>
                </tr>
            </tfoot>

            <?php $number = 1; ?>

            <tbody>
                @foreach ($get_event as $data_event)
                <tr>
                    <td>{{ $number }}</td>
                    <?php $number++; ?>
                    <td>{{$data_event->nama_event}}</td>
                    <td>{{$data_event->user->name}}</td>
                    <td>{{$data_event->tanggal}}</td>
                    <td>{{$data_event->email}}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('admin.event.edit', $data_event->id) }}"
                            class="btn btn-warning btn-sm mr-2"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a href="{{ route('admin.event.show', $data_event->id) }}"
                            class="btn btn-success btn-sm mr-2"><i class="fa-solid fa-circle-info"></i></a>
                        <a href="{{ route('admin.event.destroy', $data_event->id) }}" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@endsection('content')
