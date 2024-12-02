@extends('layouts_dashboard.app')

@section('content')

  <form action="{{ route('superadmin.certificate.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control" 
                    placeholder="Enter certificate ID..." 
                    value="{{ request('search') }}" 
                    required
                >
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>


@endsection('content')