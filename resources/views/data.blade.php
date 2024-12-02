@extends('layouts_dashboard.app')

@section('content')
<div>
    <h4 class="mb-3 text-center mt-5">Table for Managing Data of Participating Participants</h4>

    {{-- search --}}
    <div class="mb-3 text-end">
        <div class="input-group w-25 ms-auto">
            <input type="text" class="form-control" placeholder="Search">
            <button class="btn btn-outline-secondary" type="button">
                <i class="bi bi-search"></i> 
            </button>
        </div>
    </div>

    <!-- Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="background-color: #FFEE32;"><input type="checkbox"></th>
                <th style="background-color: #FFEE32;">UID</th>
                <th style="background-color: #FFEE32;">Complete Name</th>
                <th style="background-color: #FFEE32;">Email Address</th>
                <th style="background-color: #FFEE32;">Event</th>
                <th style="background-color: #FFEE32;">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox"></td>
                <td>WD-UIUX-16112024-1</td>
                <td>Lindsey Stroud Smith</td>
                <td>lindsey.stroud@gmail.com</td>
                <td>Workshop Design UI/UX</td>
                <td>
                    <!-- Edit Button in Blue with Icon (Only Icon) -->
                    <button class="btn btn-primary btn-sm">
                        <i class="bi bi-pencil"></i> <!-- Bootstrap Icon for Edit -->
                    </button>
                    <!-- Delete Button in Red with Icon (Only Icon) -->
                    <button class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i> <!-- Bootstrap Icon for Delete -->
                    </button>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td>WD-UIUX-16112024-2</td>
                <td>Sarah Brown Mars</td>
                <td>sarah.brown@gmail.com</td>
                <td>Workshop Design UI/UX</td>
                <td>
                    <!-- Edit Button in Blue with Icon (Only Icon) -->
                    <button class="btn btn-primary btn-sm">
                        <i class="bi bi-pencil"></i> <!-- Bootstrap Icon for Edit -->
                    </button>
                    <!-- Delete Button in Red with Icon (Only Icon) -->
                    <button class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i> <!-- Bootstrap Icon for Delete -->
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
